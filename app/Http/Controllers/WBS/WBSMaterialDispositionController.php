<?php

namespace App\Http\Controllers\WBS;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use DB;
use Config;
use Carbon\Carbon;
use PDF;
use App;
use Excel;

class WBSMaterialDispositionController extends Controller
{
    protected $mysql;
    protected $mssql;
    protected $common;
    protected $com;
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->com = new CommonController;

        if (Auth::user() != null) {
            $this->mysql = $this->com->userDBcon(Auth::user()->productline,'wbs');
            $this->mssql = $this->com->userDBcon(Auth::user()->productline,'mssql');
            $this->common = $this->com->userDBcon(Auth::user()->productline,'common');
        } else {
            return redirect('/');
        }
    }

    public function index()
    {
        if(!$this->com->getAccessRights(Config::get('constants.MODULE_CODE_MATDIS'), $userProgramAccess))
        {
            return redirect('/home');
        }
        else
        {
            $dispositions = $this->com->getDropdownById(48);
            return view('wbs.materialdisposition',[
                'userProgramAccess' => $userProgramAccess,
                'dispositions' => $dispositions
            ]);
        }
    }

    public function search_item(Request $req)
    {
        $data = [
            'item_desc' => '',
            'lot_no' => ''
        ];

        $item = DB::connection($this->mysql)->table('tbl_wbs_inventory')
                    ->select('item_desc')
                    ->where('item',$req->item)
                    ->first();

        if (count((array)$item) > 0) {
            $lot = DB::connection($this->mysql)->table('tbl_wbs_inventory')
                        ->select('id','item','item_desc','lot_no','qty', DB::raw("qty as current_qty"))
                        ->where('item',$req->item)
                        ->where('qty','>',0)
                        ->get();

            $data = [
                'item_desc' => $item->item_desc,
                'lot_no' => $lot
            ];

            return response()->json($data);
        }
    }


    public function save_item(Request $req)
    {
        $data = [
            'msg' => 'Saving failed.',
            'status' => 'failed'
        ];
        
        $check = DB::connection($this->mysql)->table('tbl_wbs_material_disposition')
                    ->where('id',$req->transaction_id)
                    ->count();

        if ($check > 0) { // check kung may laman pag meron update nya. 
            $info = DB::connection($this->mysql)->table('tbl_wbs_material_disposition')
                    ->where('id',$req->transaction_id)
                    ->update([
                        'item' => $req->item,
                        'item_desc'=> $req->item_desc,
                        'updated_at' => date('Y-m-d H:i:s'),
                        'update_user' => Auth::user()->user_id
                    ]);

            if ($info) {
                // items collection 
                 $items = DB::connection($this->mysql)->table('tbl_wbs_material_disposition_details')
                    ->select('inv_id','qty')
                    ->where('desposition_id',$req->transaction_id)
                    ->get();

                //ano yung mga item
                foreach ($items as $key => $item) {
                    //pag nag update kung ano yung unang mong binawas i aad nya muna yon bago ulit sya magbawas.
                    DB::connection($this->mysql)->table('tbl_wbs_inventory')
                        ->where('id',$item->inv_id)
                        ->increment('qty',$item->qty);
                }        


                // select * item from tbl_wbs_material_disposition_details na corresponding sa desposition_id

                //loop items then 
                // yun qty plus sa inv qty


                DB::connection($this->mysql)->table('tbl_wbs_material_disposition_details')
                   ->where('desposition_id',$req->transaction_id)->delete();

                foreach ($req->lot_nos as $key => $value) {
                    $wbsdetails  = DB::connection($this->mysql)->table('tbl_wbs_material_disposition_details')
                        ->insert([
                            'desposition_id' => $req->transaction_id,
                            'transaction_code' => $req->transaction_code,
                            'item' => $value['item'],
                            'item_desc'=> $value['item_desc'],
                            'qty' =>$value['qty'],
                            'lot_no' => $value['lot_no'],
                            'exp_date' => ($value['exp_date'] == "")? "0000-00-00" : $this->com->convertDate($value['exp_date'],'Y-m-d'),
                            'disposition'=>$value['disposition'],
                            'remarks'=>$value['remarks'],
                            'inv_id'=>$value['inv_id'],
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                            'create_user' => Auth::user()->user_id,
                            'update_user' => Auth::user()->user_id
                        ]);


                    DB::connection($this->mysql)->table('tbl_wbs_inventory')
                        ->where('id',$value['inv_id'])
                        ->decrement('qty',$value['qty']);


                }


                $data = [
                    'msg' => 'Successfully saved.',
                    'status' => 'success',
                ];
            }

        } else {
            $transaction_code = $this->com->getTransCode('MAT_DIS');


            $info = DB::connection($this->mysql)->table('tbl_wbs_material_disposition')   
                    ->insert([
                        'transaction_code' => $transaction_code, 
                        'item' => $req->item,
                        'item_desc'=> $req->item_desc,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        'create_user' => Auth::user()->user_id,
                        'update_user' => Auth::user()->user_id
                    ]);

            if ($info) {

                $lastInsertedID = $this->LastInsertedID();
                

                DB::connection($this->mysql)->table('tbl_wbs_material_disposition_details')
                    ->where('desposition_id',$lastInsertedID)->delete();

                foreach ($req->lot_nos as $key => $value) {
                     DB::connection($this->mysql)->table('tbl_wbs_material_disposition_details')
                        ->insert([
                            'desposition_id' => $lastInsertedID,
                            'transaction_code' => $transaction_code,
                            'item' => $value['item'],
                            'item_desc'=> $value['item_desc'],
                            'qty' =>$value['qty'],
                            'lot_no' => $value['lot_no'],
                            'exp_date' => ($value['exp_date'] == "")? "0000-00-00" : $this->com->convertDate($value['exp_date'],'Y-m-d'),
                            'disposition'=>$value['disposition'],
                            'remarks'=>$value['remarks'],
                            'inv_id'=>$value['inv_id'],
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                            'create_user' => Auth::user()->user_id,
                            'update_user' => Auth::user()->user_id
                        ]);
                }

                $data = [
                    'msg' => 'Successfully saved.',
                    'status' => 'success',
                ];
            }

           
        }

           return response()->json($data); 

    }

    private function LastInsertedID()
    {
        $query = DB::connection($this->mysql)->table('tbl_wbs_material_disposition')
                    ->select('id')->orderBy('id','desc')
                    ->first();

        return $query->id;
    }

    public function get_current_qty(Request $req)
    {
        $current_qty = 0;

        $item = DB::connection($this->mysql)->table('tbl_wbs_inventory')
                    ->select('qty')
                    ->where('id',$req->id)
                    ->first();

        if (count((array)$item) > 0) {
            $current_qty = $item->qty;
        }

        $data = [
            'current_qty' => $current_qty
        ];

        return response()->json($data);
    }


    public function get_item(Request $req)
    {
        if (empty($req->to) && !empty($req->transaction_code)) {
            $info = DB::connection($this->mysql)->table('tbl_wbs_material_disposition')
                        ->select('id',
                            'transaction_code',
                            'item',
                            'item_desc',
                            'create_user',
                            'update_user',
                            DB::raw("DATE_FORMAT(created_at, '%m/%d/%Y %h:%i %p') as created_at"),
                            DB::raw("DATE_FORMAT(updated_at, '%m/%d/%Y %h:%i %p') as updated_at"))
                        ->where('transaction_code',$req->transaction_code)
                        ->first();

            if ($this->com->checkIfExistObject($info) > 0) {
                $details = DB::connection($this->mysql)->table('tbl_wbs_material_disposition_details')
                                ->where('transaction_code',$info->transaction_code)
                                ->select('id',
                                    DB::raw("IFNULL(desposition_id,'') AS desposition_id"),
                                    DB::raw("IFNULL(item,'') AS item"),
                                    DB::raw("IFNULL(item_desc,'') AS item_desc"),
                                    DB::raw("IFNULL(qty,'') AS qty"),
                                    DB::raw("IFNULL(lot_no,'') AS lot_no"),
                                    DB::raw("DATE_FORMAT(exp_date, '%Y-%m-%d') as exp_date"),
                                    DB::raw("IFNULL(disposition,'') AS disposition"),
                                    DB::raw("IFNULL(remarks,'') AS remarks"),
                                    DB::raw("IFNULL(inv_id,0) AS inv_id"),
                                    DB::raw("IFNULL(create_user,'') AS create_user"),
                                    DB::raw("IFNULL(update_user,'') AS update_user"),
                                    DB::raw("DATE_FORMAT(created_at, '%m/%d/%Y %h:%i %p') as created_at"),
                                    DB::raw("DATE_FORMAT(updated_at, '%m/%d/%Y %h:%i %p') as updated_at"),
                                    DB::raw("DATE_FORMAT(issued_date, '%m/%d/%Y') as issued_date"))
                                ->get();

                return $data = [
                                'info' => $info,
                                'details' => $details
                            ];
            } else {
                return $data = [
                    'status' => 'failed',
                    'msg' => 'No data found.'
                ];
            }
        }

        if (!empty($req->to) && !empty($req->transaction_code)) {
            return $this->navigate($req->to,$req->transaction_code);
        }
        if (empty($req->to) && empty($req->transaction_code)) {
            return $this->last();
        }

    }

    private function navigate($to,$transaction_code)
    {
        switch ($to) {
            case 'first':
                return $this->first();
                break;

            case 'prev':
                return $this->prev($transaction_code);
                break;

            case 'next':
                return $this->next($transaction_code);
                break;

            case 'last':
                return $this->last();
                break;

            default:
                return $this->last();
                break;
        }
    }

    private function first() 
    {
        $data = [];
        $info = DB::connection($this->mysql)->table('tbl_wbs_material_disposition')
                        ->select('id',
                            'transaction_code',
                            'item',
                            'item_desc',
                            'create_user',
                            'update_user',
                            DB::raw("DATE_FORMAT(created_at, '%m/%d/%Y %h:%i %p') as created_at"),
                            DB::raw("DATE_FORMAT(updated_at, '%m/%d/%Y %h:%i %p') as updated_at"))
                        ->where("id", "=", function ($query) {
                            $query->select(DB::raw(" MIN(id)"))
                              ->from('tbl_wbs_material_disposition');
                          })
                        ->first();

        if ($this->com->checkIfExistObject($info) > 0) {
            $details = DB::connection($this->mysql)->table('tbl_wbs_material_disposition_details')
                            ->where('transaction_code',$info->transaction_code)
                            ->select('id',
                                DB::raw("IFNULL(desposition_id,'') AS desposition_id"),
                                DB::raw("IFNULL(item,'') AS item"),
                                DB::raw("IFNULL(item_desc,'') AS item_desc"),
                                DB::raw("IFNULL(qty,'') AS qty"),
                                DB::raw("IFNULL(lot_no,'') AS lot_no"),
                                DB::raw("DATE_FORMAT(exp_date, '%Y-%m-%d') as exp_date"),
                                DB::raw("IFNULL(disposition,'') AS disposition"),
                                DB::raw("IFNULL(remarks,'') AS remarks"),
                                DB::raw("IFNULL(inv_id,0) AS inv_id"),
                                DB::raw("IFNULL(create_user,'') AS create_user"),
                                DB::raw("IFNULL(update_user,'') AS update_user"),
                                DB::raw("DATE_FORMAT(created_at, '%m/%d/%Y %h:%i %p') as created_at"),
                                DB::raw("DATE_FORMAT(updated_at, '%m/%d/%Y %h:%i %p') as updated_at"))
                        ->get();

            return $data = [
                            'info' => $info,
                            'details' => $details
                        ];
        }
        return $data;
    }

    private function prev($transaction_code) 
    {
        $data = [];
        $nxt = DB::connection($this->mysql)->table('tbl_wbs_material_disposition')
                ->where('transaction_code',$transaction_code)
                ->select('id')->first();

        if ($this->com->checkIfExistObject($nxt) > 0) {
            $info = DB::connection($this->mysql)->table('tbl_wbs_material_disposition')
                        ->select('id',
                            'transaction_code',
                            'item',
                            'item_desc',
                            'create_user',
                            'update_user',
                            DB::raw("DATE_FORMAT(created_at, '%m/%d/%Y %h:%i %p') as created_at"),
                            DB::raw("DATE_FORMAT(updated_at, '%m/%d/%Y %h:%i %p') as updated_at"))
                        ->where("id","<",$nxt->id)
                        ->orderBy("id","DESC")
                        ->first();

            if ($this->com->checkIfExistObject($info) > 0) {

                $details =  DB::connection($this->mysql)->table('tbl_wbs_material_disposition_details')
                                ->where('transaction_code',$info->transaction_code)
                                ->select('id',
                                    DB::raw("IFNULL(desposition_id,'') AS desposition_id"),
                                    DB::raw("IFNULL(item,'') AS item"),
                                    DB::raw("IFNULL(item_desc,'') AS item_desc"),
                                    DB::raw("IFNULL(qty,'') AS qty"),
                                    DB::raw("IFNULL(lot_no,'') AS lot_no"),
                                    DB::raw("DATE_FORMAT(exp_date, '%Y-%m-%d') as exp_date"),
                                    DB::raw("IFNULL(disposition,'') AS disposition"),
                                    DB::raw("IFNULL(remarks,'') AS remarks"),
                                    DB::raw("IFNULL(inv_id,0) AS inv_id"),
                                    DB::raw("IFNULL(create_user,'') AS create_user"),
                                    DB::raw("IFNULL(update_user,'') AS update_user"),
                                    DB::raw("DATE_FORMAT(created_at, '%m/%d/%Y %h:%i %p') as created_at"),
                                    DB::raw("DATE_FORMAT(updated_at, '%m/%d/%Y %h:%i %p') as updated_at"))
                                ->get();

                return $data = [
                                'info' => $info,
                                'details' => $details
                            ];
            } else {
                return $this->first();
            }
        } else {
            $data = [
                'msg' => "You've reached the first Request Number",
                'status' => 'failed'
            ];
        }
        return $data;
    }

    private function next($transaction_code) 
    {
        $data = [];
        $nxt = DB::connection($this->mysql)->table('tbl_wbs_material_disposition')
                ->where('transaction_code',$transaction_code)
                ->select('id')->first();

        if ($this->com->checkIfExistObject($nxt) > 0) {
            $info =  DB::connection($this->mysql)->table('tbl_wbs_material_disposition')
                        ->select('id',
                            'transaction_code',
                            'item',
                            'item_desc',
                            'create_user',
                            'update_user',
                            DB::raw("DATE_FORMAT(created_at, '%m/%d/%Y %h:%i %p') as created_at"),
                            DB::raw("DATE_FORMAT(updated_at, '%m/%d/%Y %h:%i %p') as updated_at"))
                        ->where("id",">",$nxt->id)
                        ->orderBy("id")
                        ->first();

            if ($this->com->checkIfExistObject($info) > 0) {
                $details =  DB::connection($this->mysql)->table('tbl_wbs_material_disposition_details')
                                ->where('transaction_code',$info->transaction_code)
                                ->select('id',
                                    DB::raw("IFNULL(desposition_id,'') AS desposition_id"),
                                    DB::raw("IFNULL(item,'') AS item"),
                                    DB::raw("IFNULL(item_desc,'') AS item_desc"),
                                    DB::raw("IFNULL(qty,'') AS qty"),
                                    DB::raw("IFNULL(lot_no,'') AS lot_no"),
                                    DB::raw("DATE_FORMAT(exp_date, '%Y-%m-%d') as exp_date"),
                                    DB::raw("IFNULL(disposition,'') AS disposition"),
                                    DB::raw("IFNULL(remarks,'') AS remarks"),
                                    DB::raw("IFNULL(inv_id,0) AS inv_id"),
                                    DB::raw("IFNULL(create_user,'') AS create_user"),
                                    DB::raw("IFNULL(update_user,'') AS update_user"),
                                    DB::raw("DATE_FORMAT(created_at, '%m/%d/%Y %h:%i %p') as created_at"),
                                    DB::raw("DATE_FORMAT(updated_at, '%m/%d/%Y %h:%i %p') as updated_at"))
                                ->get();

                return $data = [
                                'info' => $info,
                                'details' => $details
                            ];
            } else {
                return $this->last();
            }
        } else {
            $data = [
                    'msg' => "You've reached the last Request Number",
                    'status' => 'failed'
                ];
        }

        return $data;
    }

    private function last() 
    {
        $data = [];
        $info = DB::connection($this->mysql)->table('tbl_wbs_material_disposition')
                        ->select('id',
                            'transaction_code',
                            'item',
                            'item_desc',
                            'create_user',
                            'update_user',
                            DB::raw("DATE_FORMAT(created_at, '%m/%d/%Y %h:%i %p') as created_at"),
                            DB::raw("DATE_FORMAT(updated_at, '%m/%d/%Y %h:%i %p') as updated_at"))
                        ->where("id", "=", function ($query) {
                            $query->select(DB::raw(" MAX(id)"))
                              ->from('tbl_wbs_material_disposition');
                          })
                        ->first();

        if ($this->com->checkIfExistObject($info) > 0) {
            $details = DB::connection($this->mysql)->table('tbl_wbs_material_disposition_details')
                            ->where('transaction_code',$info->transaction_code)
                            ->select('id',
                                DB::raw("IFNULL(desposition_id,'') AS desposition_id"),
                                DB::raw("IFNULL(item,'') AS item"),
                                DB::raw("IFNULL(item_desc,'') AS item_desc"),
                                DB::raw("IFNULL(qty,'') AS qty"),
                                DB::raw("IFNULL(lot_no,'') AS lot_no"),
                                DB::raw("DATE_FORMAT(exp_date, '%Y-%m-%d') as exp_date"),
                                DB::raw("IFNULL(disposition,'') AS disposition"),
                                DB::raw("IFNULL(remarks,'') AS remarks"),
                                DB::raw("IFNULL(inv_id,0) AS inv_id"),
                                DB::raw("IFNULL(create_user,'') AS create_user"),
                                DB::raw("IFNULL(update_user,'') AS update_user"),
                                DB::raw("DATE_FORMAT(created_at, '%m/%d/%Y %h:%i %p') as created_at"),
                                DB::raw("DATE_FORMAT(updated_at, '%m/%d/%Y %h:%i %p') as updated_at"))
                        ->get();

            return $data = [
                            'info' => $info,
                            'details' => $details
                        ];
        }
        return $data;
    }

    public function get_searched_materials(Request $req)
    {
        $item_cond = "";
        $date_cond = "";

        if (empty($req->item)) {

            $item_cond = "";
        } else {
            $item_cond = " AND item = '".$req->item."'";
        }

        if (empty($req->srch_from) || empty($req->srch_to)) {
            $date_cond = "";
        } else {
            $date_cond = "AND LEFT(created_at,10) BETWEEN '".$req->srch_from."' AND '".$req->srch_to."'";
        }


        $query = DB::connection($this->mysql)
                    ->select(
                        "SELECT * FROM tbl_wbs_material_disposition
                        WHERE 1=1".$item_cond.$date_cond
                    );

        if (count((array)$query) > 0) {
            return response()->json($query);
        } else {
            $data = [
                'msg' => 'No transaction found.',
                'status' => 'failed'
            ];
            return response()->json($data);
        }
    }

    public function get_data_export(Request $req)
    {
        $date = date('Y-m-d');
        $com_info = $this->com->getCompanyInfo();

        Excel::create('Material_disposition_'.$date, function($excel) use($com_info,$req)
        {
            $excel->sheet('Report', function($sheet) use($com_info,$req)
            {
                $sheet->setHeight(1, 15);
                $sheet->mergeCells('A1:I1');
                $sheet->cells('A1:I1', function($cells) {
                    $cells->setAlignment('center');
                });
                $sheet->cell('A1',$com_info['name']);

                $sheet->setHeight(2, 15);
                $sheet->mergeCells('A2:I2');
                $sheet->cells('A2:I2', function($cells) {
                    $cells->setAlignment('center');
                });
                $sheet->cell('A2',$com_info['address']);

                $sheet->setHeight(4, 20);
                $sheet->mergeCells('A4:I4');
                $sheet->cells('A4:I4', function($cells) {
                    $cells->setAlignment('center');
                    $cells->setFont([
                        'family'     => 'Calibri',
                        'size'       => '14',
                        'bold'       =>  true,
                        'underline'  =>  true
                    ]);
                });
                $sheet->cell('A4',"WBS MATERIAL DISPOSITION");

                $sheet->setHeight(6, 15);
                $sheet->cells('A6:I6', function($cells) {
                    $cells->setFont([
                        'family'     => 'Calibri',
                        'size'       => '11',
                        'bold'       =>  true,
                    ]);
                    // Set all borders (top, right, bottom, left)
                    $cells->setBorder('solid', 'solid', 'solid', 'solid');
                });
                $sheet->cell('A6', "Transaction Code");
                $sheet->cell('B6', 'Item Code');
                $sheet->cell('C6', "Description");
                $sheet->cell('D6', "Lot No.");
                $sheet->cell('E6', "Qty");
                $sheet->cell('F6', "Exp Date");
                $sheet->cell('G6', "Disposition");
                $sheet->cell('H6', "Remarks");
                $sheet->cell('I6', "Disposition Date");

                $row = 7;

                $from = $this->com->convertDate($req->from,'Y-m-d');
                $to = $this->com->convertDate($req->to,'Y-m-d');
                //$created_at = $this->com->convertDate($req->created_at,'Y-m-d');

                $data = DB::connection($this->mysql)->select(
                            "SELECT * FROM tbl_wbs_material_disposition_details
                            WHERE created_at BETWEEN '".$from."' and '".$to."'"
                        );

                foreach ($data as $key => $md) {
                    $sheet->setHeight($row, 20);
                    $sheet->cell('A'.$row, $md->transaction_code);
                    $sheet->cell('B'.$row, $md->item);
                    $sheet->cell('C'.$row, $md->item_desc);
                    $sheet->cell('D'.$row, $md->lot_no);
                    $sheet->cell('E'.$row, $md->qty);
                    $sheet->cell('F'.$row, $md->exp_date);
                    $sheet->cell('G'.$row, $md->disposition);
                    $sheet->cell('H'.$row, $md->remarks);
                    $sheet->cell('I'.$row, $this->com->convertDate($md->created_at,'Y-m-d'));
                  // $this->com->convertDate($md->created_at,'Y-m-d'));

                    $sheet->cells('A6:I'.$row, function($cells) {
                        $cells->setBorder('solid', 'solid', 'solid', 'solid');
                    });
                    $row++;
                }

                
            });
        })->download('xlsx');
    }

    public function delete_item(Request $req)
    {
        $ids = explode(',', $req->ids);

        $data = [
                'msg' => 'Deleting failed.',
                'status' => 'failed'
            ];

        foreach ($ids as $key => $id) {
            $inv = DB::connection($this->mysql)->table('tbl_wbs_material_disposition_details')
                    ->where('id',$id)
                    ->select('inv_id','qty')
                    ->first();

            DB::connection($this->mysql)->table('tbl_wbs_inventory')
                 ->where('id',$inv->inv_id)
                 ->increment('qty',$inv->qty);

            DB::connection($this->mysql)->table('tbl_wbs_material_disposition_details')
                    ->where('id',$id)
                    ->delete();

            $data = [
                'msg' => 'Successfully Deleted.',
                'status' => 'success'
            ];

        }

        return response()->json($data);
    }
}





























   /* public function display_get_materials(Request $req)
    {

        $query  = DB::connection($this->mysql)->table('tbl_wbs_material_disposition_details')
                    ->where('transaction_code',$req->transaction_code)
                    ->get();
        if(count((array)$query) >0){
            return response()->json($query);

        }else{

            $data = [

                'msg' => 'No transaction found.',
                'status'=> 'failed'
            ];

            return response()->json($data);
        }
    }*/


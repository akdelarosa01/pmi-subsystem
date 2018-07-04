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
use File;

class WBSProdMatReturnController extends Controller
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

    public function getProdMatReturn()
    {
        if(!$this->com->getAccessRights(Config::get('constants.MODULE_CODE_PRDMATRET'), $userProgramAccess))
        {
            return redirect('/home');
        }
        else
        {

	        return view('wbs.productionmaterialreturn',['userProgramAccess' => $userProgramAccess]);
	    }
    }

    public function getData(Request $req)
    {
        if (empty($req->to) && !empty($req->controlno)) {
            $info = DB::connection($this->mysql)->table('tbl_wbs_material_return')
                            ->select('id'
                                , 'controlno'
                                , 'po'
                                , 'date_returned'
                                , 'remarks'
                                , 'returned_by'
                                , 'create_user'
                                , DB::raw("DATE_FORMAT(created_at, '%m/%d/%Y %h:%i %p') as created_at")
                                , 'update_user'
                                , DB::raw("DATE_FORMAT(updated_at, '%m/%d/%Y %h:%i %p') as updated_at"))
                            ->where('controlno',$req->controlno)
                            ->first();

            if ($this->com->checkIfExistObject($info) > 0) {
                $details = DB::connection($this->mysql)->table('tbl_wbs_material_return_details')->where('controlno',$info->controlno)->get();

                return $data = [
                                'info' => $info,
                                'details' => $details
                            ];
            }
        }
        if (!empty($req->to) && !empty($req->controlno)) {
            return $this->navigate($req->to,$req->controlno);
        }
        if (empty($req->to) && empty($req->controlno)) {
            return $this->last();
        }
    }

    private function navigate($to,$controlno)
    {
        switch ($to) {
            case 'next':
                return $this->next($controlno);
                break;

            case 'prev':
                return $this->prev($controlno);
                break;

            case 'last':
                return $this->last();
                break;

            case 'first':
                return $this->first();
                break;

            default:
                return $this->last();
                break;
        }
    }

    private function next($controlno)
    {
        $data = [];
        $nxt = DB::connection($this->mysql)->table('tbl_wbs_material_return')
                        ->where('controlno',$controlno)
                        ->select('id')->first();
        if ($this->com->checkIfExistObject($nxt) > 0) {
            $nxtid = $nxt->id + 1;

            $info = $this->getReturnInfoByID($nxtid);

            if ($this->com->checkIfExistObject($info) > 0) {

                $details = DB::connection($this->mysql)->table('tbl_wbs_material_return_details')->where('controlno',$info->controlno)->get();

                return $data = [
                            'info' => $info,
                            'details' => $details,
                        ];
            } else {
                return $this->last();
            }
        } else {
            $data = [
                    'msg' => "You've reached the last Control Number",
                    'status' => 'failed'
                ];
        }

        return $data;
    }

    private function prev($controlno)
    {
        $data = [];
        $nxt = DB::connection($this->mysql)->table('tbl_wbs_material_return')
                        ->where('controlno',$controlno)
                        ->select('id')->first();

        if ($this->com->checkIfExistObject($nxt) > 0) {
            $nxtid = $nxt->id - 1;

            $info = $this->getReturnInfoByID($nxtid);

            if ($this->com->checkIfExistObject($info) > 0) {

                $details = DB::connection($this->mysql)->table('tbl_wbs_material_return_details')->where('controlno',$info->controlno)->get();

                return $data = [
                            'info' => $info,
                            'details' => $details
                        ];
            } else {
                return $this->first();
            }
        } else {
            $data = [
                'msg' => "You've reached the first Control Number",
                'status' => 'failed'
            ];
        }
        return $data;
    }

    private function last()
    {
        $data = [];
        $info =  DB::connection($this->mysql)->table('tbl_wbs_material_return')
                        ->select('id'
                            , 'controlno'
                            , 'po'
                            , 'date_returned'
                            , 'remarks'
                            , 'returned_by'
                            , 'create_user'
                            , DB::raw("DATE_FORMAT(created_at, '%m/%d/%Y %h:%i %p') as created_at")
                            , 'update_user'
                            , DB::raw("DATE_FORMAT(updated_at, '%m/%d/%Y %h:%i %p') as updated_at"))
                        ->orderBy('id','desc')
                        ->first();
        if ($this->com->checkIfExistObject($info) > 0) {

            $details = DB::connection($this->mysql)->table('tbl_wbs_material_return_details')->where('controlno',$info->controlno)->get();

            $data = [
                    'info' => $info,
                    'details' => $details
                ];
        }

        return $data;
    }

    private function first()
    {
        $data = [];
        $info = DB::connection($this->mysql)->table('tbl_wbs_material_return')
                        ->select('id'
                            , 'controlno'
                            , 'po'
                            , 'date_returned'
                            , 'remarks'
                            , 'returned_by'
                            , 'create_user'
                            , DB::raw("DATE_FORMAT(created_at, '%m/%d/%Y %h:%i %p') as created_at")
                            , 'update_user'
                            , DB::raw("DATE_FORMAT(updated_at, '%m/%d/%Y %h:%i %p') as updated_at"))
                        ->orderBy('id','asc')
                        ->first();
        if ($this->com->checkIfExistObject($info) > 0) {

            $details = DB::connection($this->mysql)->table('tbl_wbs_material_return_details')->where('controlno',$info->controlno)->get();

            $data = [
                    'info' => $info,
                    'details' => $details
                ];
        }
        return $data;
    }

    private function getReturnInfoByID($id)
    {
        return DB::connection($this->mysql)->table('tbl_wbs_material_return')
                    ->select('id'
                            , 'controlno'
                            , 'po'
                            , 'date_returned'
                            , 'remarks'
                            , 'returned_by'
                            , 'create_user'
                            , DB::raw("DATE_FORMAT(created_at, '%m/%d/%Y %h:%i %p') as created_at")
                            , 'update_user'
                            , DB::raw("DATE_FORMAT(updated_at, '%m/%d/%Y %h:%i %p') as updated_at"))
                    ->where("id", $id)
                    ->first();
    }

    public function postSaveMatReturn(Request $req)
    {
    	$data = [
            'msg' => "Saving failed.",
            'status' => 'failed'
        ];

        $checkControlNo = DB::connection($this->mysql)->table('tbl_wbs_material_return')
                            ->where('id',$req->id)->count();

        if ($checkControlNo > 0) {
            $update = DB::connection($this->mysql)->table('tbl_wbs_material_return')
                        ->where('id',$req->id)
                        ->update([
                            'date_returned' => $req->date_returned,
                            'remarks' => $req->remarks,
                            'returned_by' => $req->returned_by,
                            'update_user' => Auth::user()->user_id,
                            'updated_at' => date('Y-m-d h:i:s')
                        ]);

            $checkDetailControlNo = DB::connection($this->mysql)->table('tbl_wbs_material_return_details')
                            ->where('controlno',$req->controlno)->count();

            if ($checkDetailControlNo > 0) {
                foreach ($req->detail_id as $key => $id) {
                    $checkRecorded = DB::connection($this->mysql)->table('tbl_wbs_material_return_details')
                                        ->where('id',$id)->count();
                    if ($checkRecorded > 0) {
                        DB::connection($this->mysql)->table('tbl_wbs_material_return_details')
                            ->where('id',$id)
                            ->update([
                                'issuanceno' => $req->issuanceno[$key],
                                'item' => $req->item[$key],
                                'item_desc' => $req->item_desc[$key],
                                'lot_no' => $req->lot_no[$key],
                                'issued_qty' => $req->issued_qty[$key],
                                'required_qty' => $req->required_qty[$key],
                                'return_qty' => $req->return_qty[$key],
                                'actual_returned_qty' => $req->actual_returned_qty[$key],
                                'remarks' => $req->details_remarks[$key],
                                'update_user' => Auth::user()->user_id,
                                'updated_at' => date('Y-m-d h:i:s')
                            ]);

                    } else {
                        DB::connection($this->mysql)->table('tbl_wbs_material_return_details')
                            ->insert([
                                'controlno' => $req->controlno,
                                'po' => $req->po,
                                'issuanceno' => $req->issuanceno[$key],
                                'item' => $req->item[$key],
                                'item_desc' => $req->item_desc[$key],
                                'lot_no' => $req->lot_no[$key],
                                'issued_qty' => $req->issued_qty[$key],
                                'required_qty' => $req->required_qty[$key],
                                'return_qty' => $req->return_qty[$key],
                                'actual_returned_qty' => $req->actual_returned_qty[$key],
                                'remarks' => $req->details_remarks[$key],
                                'create_user' => Auth::user()->user_id,
                                'created_at' => date('Y-m-d h:i:s'),
                                'update_user' => Auth::user()->user_id,
                                'updated_at' => date('Y-m-d h:i:s')
                            ]);
                        $this->returnToInventory($req->item[$key],$req->lot_no[$key],$req->actual_returned_qty[$key]);
                    }
                }
            } else {
                foreach ($req->issuanceno as $key => $issuance) {
                    DB::connection($this->mysql)->table('tbl_wbs_material_return_details')
                        ->insert([
                            'controlno' => $req->controlno,
                            'po' => $req->po,
                            'issuanceno' => $issuance,
                            'item' => $req->item[$key],
                            'item_desc' => $req->item_desc[$key],
                            'lot_no' => $req->lot_no[$key],
                            'issued_qty' => $req->issued_qty[$key],
                            'required_qty' => $req->required_qty[$key],
                            'return_qty' => $req->return_qty[$key],
                            'actual_returned_qty' => $req->actual_returned_qty[$key],
                            'remarks' => $req->details_remarks[$key],
                            'create_user' => Auth::user()->user_id,
                            'created_at' => date('Y-m-d h:i:s'),
                            'update_user' => Auth::user()->user_id,
                            'updated_at' => date('Y-m-d h:i:s')
                        ]);
                    $this->returnToInventory($req->item[$key],$req->lot_no[$key],$req->actual_returned_qty[$key]);
                }
            }

            $data = [
                'msg' => "Control Number [".$req->controlno."] was updated.",
                'status' => 'success'
            ];
        } else {
            $controlno = $this->com->getTransCode('PRD_RET');

            $insert = DB::connection($this->mysql)->table('tbl_wbs_material_return')
                        ->where('id',$req->id)
                        ->insert([
                            'controlno' => $controlno,
                            'po' => $req->po,
                            'date_returned' => $req->date_returned,
                            'remarks' => $req->remarks,
                            'returned_by' => $req->returned_by,
                            'create_user' => Auth::user()->user_id,
                            'created_at' => date('Y-m-d h:i:s'),
                            'update_user' => Auth::user()->user_id,
                            'updated_at' => date('Y-m-d h:i:s')
                        ]);
            if (isset($req->detail_id)) {
                foreach ($req->item as $key => $item) {
                    DB::connection($this->mysql)->table('tbl_wbs_material_return_details')
                        ->insert([
                            'controlno' => $controlno,
                            'po' => $req->po,
                            'issuanceno' => $req->issuanceno[$key],
                            'item' => $item,
                            'item_desc' => $req->item_desc[$key],
                            'lot_no' => $req->lot_no[$key],
                            'issued_qty' => $req->issued_qty[$key],
                            'required_qty' => $req->required_qty[$key],
                            'return_qty' => $req->return_qty[$key],
                            'actual_returned_qty' => $req->actual_returned_qty[$key],
                            'remarks' => $req->details_remarks[$key],
                            'create_user' => Auth::user()->user_id,
                            'created_at' => date('Y-m-d h:i:s'),
                            'update_user' => Auth::user()->user_id,
                            'updated_at' => date('Y-m-d h:i:s')
                        ]);
                    $this->returnToInventory($req->item[$key],$req->lot_no[$key],$req->actual_returned_qty[$key]);
                }
            }
            $data = [
                'msg' => "Control Number [".$controlno."] was successfully saved.",
                'status' => 'success'
            ];
        }

        return $data;
    }

    public function getIssuanceno(Request $req)
    {
        $db = DB::connection($this->mysql)->table('tbl_wbs_sakidashi_issuance')
                ->where('po_no',$req->po)
                ->select(DB::raw('issuance_no as id'),DB::raw('issuance_no as text'))
                ->get();
        if ($this->com->checkIfExistObject($db) > 0) {
            return $db;
        }
    }

    public function getItemDetails(Request $req)
    {
        $db = DB::connection($this->mysql)->table('tbl_wbs_sakidashi_issuance_item')
                ->where('issuance_no',$req->issuanceno)
                ->select(
                        DB::raw('item as item'),
                        DB::raw('item_desc as item_desc'),
                        DB::raw('lot_no as lot_no'),
                        DB::raw('issued_qty as issued_qty'),
                        DB::raw('required_qty as required_qty'),
                        DB::raw('return_qty as return_qty'))
                ->first();
        if ($this->com->checkIfExistObject($db) > 0) {
            return json_encode($db);
        } else {
            return $db = [
                'msg' => "Issuance Number doesn't exist.",
                'status' => "failed"
            ];
        }
    }

    private function checkIfExistObject($object)
    {
       return count( (array)$object);
    }

    private function convertDate($date,$format)
    {
        $time = strtotime($date);
        $newdate = date($format,$time);
        return $newdate;
    }

    private function returnToInventory($item,$lot_no,$actual_returned_qty)
    {
        $checkInv = DB::connection($this->mysql)->table('tbl_wbs_inventory')
                        ->select('id','qty')
                        ->where('item',$item)
                        ->where('lot_no',$lot_no)
                        ->orderBy('received_date','desc')
                        ->first();

        if (count((array)$checkInv) > 0) {
            if ($checkInv->qty > 0) {
                DB::connection($this->mysql)->table('tbl_wbs_inventory')
                    ->where('id',$checkInv->id)
                    ->update([
                        'qty' => $checkInv->qty + $actual_returned_qty
                    ]);
            } else {
                DB::connection($this->mysql)->table('tbl_wbs_inventory')
                    ->where('id',$checkInv->id)
                    ->update([
                        'qty' => $actual_returned_qty
                    ]);
            }
            
        } else {
            $checkInv = DB::connection($this->mysql)->table('tbl_wbs_inventory')
                            ->select('id','qty','lot_no')
                            ->where('item',$item)
                            ->orderBy('received_date','desc')
                            ->first();
            if ($checkInv->qty > 0) {
                if ($checkInv->lot_no == null || empty($checkInv->lot_no) || $checkInv->lot_no == '') {
                    DB::connection($this->mysql)->table('tbl_wbs_inventory')
                        ->where('id',$checkInv->id)
                        ->update([
                            'lot_no' => $lot_no,
                            'qty' => $checkInv->qty + $actual_returned_qty
                        ]);
                } else {
                    DB::connection($this->mysql)->table('tbl_wbs_inventory')
                        ->where('id',$checkInv->id)
                        ->update([
                            'qty' => $checkInv->qty + $actual_returned_qty
                        ]);
                }
                
            } else {
                DB::connection($this->mysql)->table('tbl_wbs_inventory')
                    ->where('id',$checkInv->id)
                    ->update([
                        'qty' => $actual_returned_qty
                    ]);
            }
        }
    }

    private function deductToInventory($item,$lot_no,$qty_to_deduct)
    {
        $checkInv = DB::connection($this->mysql)->table('tbl_wbs_inventory')
                        ->select('id','qty')
                        ->where('item',$item)
                        ->where('lot_no',$lot_no)
                        ->orderBy('received_date','desc')
                        ->first();

        if (count((array)$checkInv) > 0) {
            if ($checkInv->qty > 0) {
                DB::connection($this->mysql)->table('tbl_wbs_inventory')
                    ->where('id',$checkInv->id)
                    ->update([
                        'qty' => $checkInv->qty - $qty_to_deduct
                    ]);
            } else {
                DB::connection($this->mysql)->table('tbl_wbs_inventory')
                    ->where('id',$checkInv->id)
                    ->update([
                        'qty' => 0 - $qty_to_deduct
                    ]);
            }
            
        } else {
            $checkInv = DB::connection($this->mysql)->table('tbl_wbs_inventory')
                            ->select('id','qty','lot_no')
                            ->where('item',$item)
                            ->orderBy('received_date','desc')
                            ->first();
            if ($checkInv->qty > 0) {
                if ($checkInv->lot_no == null || empty($checkInv->lot_no) || $checkInv->lot_no == '') {
                    DB::connection($this->mysql)->table('tbl_wbs_inventory')
                        ->where('id',$checkInv->id)
                        ->update([
                            'lot_no' => $lot_no,
                            'qty' => $checkInv->qty - $qty_to_deduct
                        ]);
                } else {
                    DB::connection($this->mysql)->table('tbl_wbs_inventory')
                        ->where('id',$checkInv->id)
                        ->update([
                            'qty' => $checkInv->qty - $qty_to_deduct
                        ]);
                }
                
            } else {
                DB::connection($this->mysql)->table('tbl_wbs_inventory')
                    ->where('id',$checkInv->id)
                    ->update([
                        'qty' => 0 - $qty_to_deduct
                    ]);
            }
        }
    }

    public function BrCodePrint(Request $req)
    {
        $data = DB::connection($this->mysql)->table('tbl_wbs_material_return_details as d')
                    ->leftJoin('tbl_wbs_material_return as r','d.controlno','=','r.controlno')
                    ->select(DB::raw("d.id as id"),
                            DB::raw("d.po as po"),
                            DB::raw("d.controlno as controlno"),
                            DB::raw("d.item as item"),
                            DB::raw("d.item_desc as item_desc"),
                            DB::raw("d.lot_no as lot_no"),
                            DB::raw("d.actual_returned_qty as actual_returned_qty"),
                            DB::raw("r.date_returned as date_returned"),
                            DB::raw("r.returned_by as returned_by")
                        )
                    ->where('d.id',$req->id)
                    ->first();

        $path = storage_path().'/brcodematreturn';
                        if (!File::exists($path)) {
                            File::makeDirectory($path, 0777, true, true);
                        }
        $filename = $data->controlno.'_'.$data->po.'_'.$data->item.'.prn';

        $content = 'CLIP ON'."\r\n";
        $content .= 'CLIP BARCODE ON'."\r\n";
        $content .= 'DIR2'."\r\n";
        $content .= 'PP310,766:AN7'."\r\n";
        $content .= 'DIR2'."\r\n";
        $content .= 'FT "Swiss 721 BT"'."\r\n";
        $content .= 'FONTSIZE 10'."\r\n";
        $content .= 'PP60,776:FT "Swiss 721 Bold BT",20,0,78'."\r\n";
        $content .= 'PP270,500:FT "Swiss 721 BT"'."\r\n";
        $content .= 'FONTSIZE 8'."\r\n";
        $content .= 'PT "DATE RETURNED"'."\r\n";
        $content .= 'PP270,200:FT "Swiss 721 BT"'."\r\n";
        $content .= 'FONTSIZE 8'."\r\n";
        $content .= 'PT "'.$this->convertDate($data->date_returned,"m/d/Y").'"'."\r\n";
        $content .= 'PP220,540:FT "Swiss 721 BT"'."\r\n";
        $content .= 'FONTSIZE 8'."\r\n";
        $content .= 'PT "Lot No."'."\r\n";
        $content .= 'PP180,540:BARSET "CODE128",2,1,3,30'."\r\n";
        $content .= 'PB "'.$data->lot_no.'"'."\r\n";
        $content .= 'PP145,380:FT "Swiss 721 BT"'."\r\n";
        $content .= 'FONTSIZE 6'."\r\n";
        $content .= 'PT "'.$data->lot_no.'"'."\r\n";
        $content .= 'PP125,500:FT "Swiss 721 BT"'."\r\n";
        $content .= 'FONTSIZE 10'."\r\n";
        $content .= 'PT "'.$data->item_desc.'"'."\r\n";
        $content .= 'PP125,190:FT "Swiss 721 BT"'."\r\n";
        $content .= 'FONTSIZE 10'."\r\n";
        $content .= 'PT "QTY: '.$data->actual_returned_qty.'"'."\r\n";
        $content .= 'PP80,540:BARSET "CODE128",2,1,3,30'."\r\n";
        $content .= 'PB "'.$data->item.'"'."\r\n";
        $content .= 'PP50,440:FT "Swiss 721 BT"'."\r\n";
        $content .= 'FONTSIZE 6'."\r\n";
        $content .= 'PT "'.$data->item.'"'."\r\n";
        $content .= 'PP75,190:FT "Swiss 721 BT"'."\r\n";
        $content .= 'FONTSIZE 6'."\r\n";
        $content .= 'PT "RETURNED BY: '.$data->returned_by.'"'."\r\n";
        $content .= 'PP150,779:AN7'."\r\n";
        $content .= 'PF'."\r\n";

        $myfile = fopen($path."/".$filename, "w") or die("Unable to open file!");
        fwrite($myfile, $content);
        fclose($myfile);

        $headers = [
                        'Content-type'=>'text/plain', 
                        'Content-Disposition'=>sprintf('attachment; filename="%s"', $filename)
                    ];
    
        return \Response::download($path.'/'.$filename, $filename, $headers);
    }

    public function deleteItem(Request $req)
    {
        $data = [
            'msg' => "Deleting failed.",
            'status' => 'failed'
        ];

        $deleted = false;
        foreach ($req->ids as $key => $id) {
            $get = DB::connection($this->mysql)->table('tbl_wbs_material_return_details')
                        ->where('id',$id)
                        ->first();
            $this->deductToInventory($get->item,$get->lot_no,$req->qty[$key]);

            $deleted = DB::connection($this->mysql)->table('tbl_wbs_material_return_details')
                        ->where('id',$id)
                        ->delete();
        }

        if ($deleted) {
            $data = [
                'msg' => "Details were successfully deleted.",
                'status' => 'success'
            ];
        }

        return $data;
    }

    public function searchReturns(Request $req)
    {
        $ctr = 0;
        $value = null;
        $result = null;

        $item_cond = '';
        $issuance_cond = '';
        $po_cond = '';
        $control_cond = '';

        try
        {
            if(empty($req->srch_control_no))
            {
                $control_cond ='';
            }
            else
            {
                $control_cond = " AND controlno like '%" . $req->srch_control_no . "%'";
            }

            if(empty($req->srch_po))
            {
                $po_cond ='';
            }
            else
            {
                $po_cond = " AND po like '%" . $req->srch_po . "%'";
            }

            if(empty($req->srch_issuance))
            {
                $issuance_cond ='';
            }
            else
            {
                $issuance_cond = " AND issuanceno like '%" . $req->srch_issuance . "%'";
            }

            if(empty($req->srch_item))
            {
                $item_cond = '';
            }
            else
            {
                $item_cond = "AND item like '%" . $req->srch_item . "%'";
            }

            $details = DB::connection($this->mysql)->table('tbl_wbs_material_return_details')
                        ->select( 'id',
                                'controlno',
                                'po',
                                'issuanceno',
                                'item',
                                'item_desc',
                                'lot_no',
                                'issued_qty',
                                'required_qty',
                                'return_qty',
                                'actual_returned_qty',
                                'remarks',
                                'create_user',
                                DB::raw("(CASE created_at
                                            WHEN '0000-00-00' THEN NULL
                                            ELSE DATE_FORMAT(created_at, '%m/%d/%Y %h:%i %p')
                                        END) AS created_at"),
                                'update_user',
                                DB::raw("(CASE updated_at
                                            WHEN '0000-00-00' THEN NULL
                                            ELSE DATE_FORMAT(updated_at, '%m/%d/%Y %h:%i %p')
                                        END) AS updated_at"))
                        ->whereRaw(" 1=1 "
                            . $po_cond
                            . $issuance_cond
                            . $item_cond
                            . $control_cond)
                        ->get();
        }
        catch (Exception $e)
        {
            Log::error($e->getMessage());
        }

        return $details;
    }

    public function printExcel(Request $req)
    {
        $dt = Carbon::now();
        $date = $dt->format('m-d-y');

        $com_info = $this->com->getCompanyInfo();

        $from_cond = '';
        $to_cond = '';

        if (!empty($req->from) && !empty($req->to)) {
            $from_cond = "AND r.date_returned BETWEEN '" . $req->from . "' AND '" . $req->to . "'";
        } else {
            $from_cond = '';
            $to_cond = '';
        }

        $data = DB::connection($this->mysql)->table('tbl_wbs_material_return_details as d')
                    ->leftJoin('tbl_wbs_material_return as r','d.controlno','=','r.controlno')
                    ->select( DB::raw('d.id as id'),
                            DB::raw('d.controlno as controlno'),
                            DB::raw('d.po as po'),
                            DB::raw('d.issuanceno as issuanceno'),
                            DB::raw('d.item as item'),
                            DB::raw('d.item_desc as item_desc'),
                            DB::raw('d.lot_no as lot_no'),
                            DB::raw('d.issued_qty as issued_qty'),
                            DB::raw('d.required_qty as required_qty'),
                            DB::raw('d.return_qty as return_qty'),
                            DB::raw('d.actual_returned_qty as actual_returned_qty'),
                            DB::raw('d.remarks as remarks'),
                            DB::raw('r.returned_by as returned_by'),
                            DB::raw('r.date_returned as date_returned'))
                    ->whereRaw(" 1=1 "
                        . $from_cond)
                    ->get();
        
        Excel::create('Material_Return_'.$date, function($excel) use($data,$com_info)
        {
            $excel->sheet('Report', function($sheet) use($data,$com_info)
            {
                $sheet->setHeight(1, 15);
                $sheet->mergeCells('A1:J1');
                $sheet->cells('A1:J1', function($cells) {
                    $cells->setAlignment('center');
                });
                $sheet->cell('A1',$com_info['name']);

                $sheet->setHeight(2, 15);
                $sheet->mergeCells('A2:J2');
                $sheet->cells('A2:J2', function($cells) {
                    $cells->setAlignment('center');
                });
                $sheet->cell('A2',$com_info['address']);

                $sheet->setHeight(4, 20);
                $sheet->mergeCells('A4:J4');
                $sheet->cells('A4:J4', function($cells) {
                    $cells->setAlignment('center');
                    $cells->setFont([
                        'family'     => 'Calibri',
                        'size'       => '14',
                        'bold'       =>  true,
                        'underline'  =>  true
                    ]);
                });
                $sheet->cell('A4',"PRODUCTION MATERIAL RETURN");

                $sheet->setHeight(6, 15);
                $sheet->cells('A6:J6', function($cells) {
                    $cells->setFont([
                        'family'     => 'Calibri',
                        'size'       => '11',
                        'bold'       =>  true,
                    ]);
                    // Set all borders (top, right, bottom, left)
                    $cells->setBorder('solid', 'solid', 'solid', 'solid');
                });
                $sheet->cell('A6', "Issuance No.");
                $sheet->cell('B6', "Item Code");
                $sheet->cell('C6', "Description");
                $sheet->cell('D6', "Lot No.");
                $sheet->cell('E6', "Issued Qty.");
                $sheet->cell('F6', "Required Qty.");
                $sheet->cell('G6', "Return Qty.");
                $sheet->cell('H6', "Actual Return Qty.");
                $sheet->cell('I6', "Remarks");
                $sheet->cell('J6', "Returned By");

                $row = 7;

                foreach ($data as $key => $mk) {
                    $sheet->setHeight($row, 15);
                    $sheet->cell('A'.$row, $mk->issuanceno);
                    $sheet->cell('B'.$row, $mk->item);
                    $sheet->cell('C'.$row, $mk->item_desc);
                    $sheet->cell('D'.$row, $mk->lot_no);
                    $sheet->cell('E'.$row, $mk->issued_qty);
                    $sheet->cell('F'.$row, $mk->required_qty);
                    $sheet->cell('G'.$row, $mk->return_qty);
                    $sheet->cell('H'.$row, $mk->actual_returned_qty);
                    $sheet->cell('I'.$row, $mk->remarks);
                    $sheet->cell('J'.$row, $mk->returned_by);
                    $row++;
                }

                $sheet->cells('A6:J'.$row, function($cells) {
                    $cells->setBorder('solid', 'solid', 'solid', 'solid');
                });
            });
        })->download('xls');
    }
}

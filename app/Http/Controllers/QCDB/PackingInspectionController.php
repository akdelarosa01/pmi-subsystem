<?php

namespace App\Http\Controllers\QCDB;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use DB;
use Config;
use App\PackingInspection;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth; #Auth facade
use Dompdf\Dompdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use PDF;
use Excel;

class PackingInspectionController extends Controller
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
            $this->mysql = $this->com->userDBcon(Auth::user()->productline,'mysql');
            $this->mssql = $this->com->userDBcon(Auth::user()->productline,'mssql');
            $this->common = $this->com->userDBcon(Auth::user()->productline,'common');
        } else {
            return redirect('/');
        }
    }

    public function index()
    {
        if(!$this->com->getAccessRights(Config::get('constants.MODULE_CODE_PCKNGDB')
                                    , $userProgramAccess))
        {
            return redirect('/home');
        }
        else
        {
            return view('qcdb.packinginspection',['userProgramAccess' => $userProgramAccess]);
        }
    }

    public function getDataInspected()
    {
    	$inspected = DB::connection($this->mysql)->table('packing_inspections')
    					->orderBy('id','desc')->get();
    	return response()->json($inspected);
    }

    public function getRuncard(Request $req)
    {
    	$runcard;

    	if ($req->inspection_id !== 0 || $req->inspection_id !== null) {
    		$runcard = DB::connection($this->mysql)->table('tbl_packinginspection_runcard')
    					->where('inspection_id',$req->inspection_id)
    					->get();
    	} else {
    		$runcard = DB::connection($this->mysql)->table('tbl_packinginspection_runcard')
    					->where('pono',$req->pono)
    					->get();
    	}

    	return response()->json($runcard);
    }

    public function getMOD(Request $req)
    {
    	$mod;
    	$total_qty = 0;
    	$data = [];

    	if ($req->inspection_id !== 0 || $req->inspection_id !== null) {
    		$mod = DB::connection($this->mysql)->table('tbl_packmod')
    					->where('inspection_id',$req->inspection_id)
    					->get();
    	} else {
    		$mod = DB::connection($this->mysql)->table('tbl_packmod')
    					->where('po_no',$req->po_no)
    					->get();
    	}

    	if (count((array)$mod) > 0) {
			foreach ($mod as $key => $md) {
    			$total_qty += $md->qty;
    		}
		}

		$data = [
			'mod' => $mod,
			'no_of_defects' => $total_qty
		];

    	return response()->json($data);
    }

    public function poDetails(Request $req)
    {
        $data = [
            'device_name' => ''
        ];

        $ms = DB::connection($this->mssql)->table('XRECE as R')
                ->select(
                        DB::raw("R.SORDER as po"),
                        DB::raw("R.CODE as device_code"),
                        DB::raw("H.NAME as device_name"),
                        DB::raw("SUM(R.KVOL) as POQTY")
                    )
                ->leftJoin("XHEAD as H","R.CODE","=","H.CODE")
                ->where('R.SORDER',$req->po_num)
                ->groupBy('R.SORDER',
                        'R.CODE',
                        'H.NAME')
                ->first();

        if (count((array)$ms) > 0) {
            $data = [
                'device_name' => $ms->device_name
            ];
        }

        return response()->json($data);
    }

    public function initData()
    {
        $packingtype = $this->com->getDropdownById(20);
        $unitcondition = $this->com->getDropdownById(21);
        $packingcodeperseries = $this->com->getDropdownById(23);
        $mod = $this->com->getDropdownById(31);
        $packingoperator = $this->com->getDropdownById(22);

        return $data = [
            'packing_type'=> $packingtype,
            'unit_condition'=> $unitcondition,
            'packing_code_series'=> $packingcodeperseries,
            'mods'=> $mod,
            'packing_operator'=> $packingoperator
        ];
    }

    public function getStampCode()
    {
        $stamps = DB::connection($this->common)->table('tbl_mdropdowns')
                    ->select('description')
                    ->where('category',42)
                    ->where('description','like',Auth::user()->firstname.' '.Auth::user()->Lastname.'%')
                    ->first();
        if (count((array)$stamps) > 0) {
            $stamp = explode('/',$stamps->description);
            return $stamp;
        }
    }

    public function save_inspection(Request $req)
    {
    	$data = [
    		'msg' => 'Saving failed.',
    		'status' => 'failed',
    	];

    	$query;

    	if (isset($req->id) || $req->id !== '') {
    		$query = DB::connection($this->mysql)->table('packing_inspections')
    					->where('id',$req->id)
    					->update([
    						'po_num' => $req->po_num,
    						'date_inspected' => $req->date_inspected,
    						'shipment_date' => $req->shipment_date,
    						'device_name' => $req->device_name,
    						'inspector' => $req->inspector,
    						'packing_type' => $req->packing_type,
    						'unit_condition' => $req->unit_condition,
    						'packing_operator' => $req->packing_operator,
    						'remarks' => $req->remarks,
    						'packing_code_series' => $req->packing_code_series,
    						'carton_num' => $req->carton_num,
    						'packing_code' => $req->packing_code,
    						'judgement' => $req->judgement,
    						'total_qty' => $req->total_qty,
                            'no_of_defects' => $req->no_of_defects,
                            'updated_at' => date('Y-m-d h:i:s')
    					]);
            $data = [
                'msg' => 'No changes Made.',
                'status' => 'failed',
                'inspection' => '',
            ];
    	} else {
    		$query = DB::connection($this->mysql)->table('packing_inspections')
    					->insert([
    						'po_num' => $req->po_num,
    						'date_inspected' => $req->date_inspected,
    						'shipment_date' => $req->shipment_date,
    						'device_name' => $req->device_name,
    						'inspector' => $req->inspector,
    						'packing_type' => $req->packing_type,
    						'unit_condition' => $req->unit_condition,
    						'packing_operator' => $req->packing_operator,
    						'remarks' => $req->remarks,
    						'packing_code_series' => $req->packing_code_series,
    						'carton_num' => $req->carton_num,
    						'packing_code' => $req->packing_code,
    						'judgement' => $req->judgement,
    						'total_qty' => $req->total_qty,
                            'no_of_defects' => $req->no_of_defects,
                            'created_at' => date('Y-m-d h:i:s'),
                            'updated_at' => date('Y-m-d h:i:s')
    					]);
    	}

    	if ($query) {
    		$data = [
	    		'msg' => 'Successfully saved.',
	    		'status' => 'success'
	    	];
    	}

        return response()->json($data);
    }

    public function save_runcard(Request $req)
    {
        $total_qty = 0;
    	$data = [
    		'msg' => 'Saving failed.',
    		'status' => 'failed',
    		'runcard' => '',
    	];

    	$query;

    	if (!isset($req->runcard_id) || $req->runcard_id == '' || empty($req->runcard_id)) {

            $query = DB::connection($this->mysql)->table('tbl_packinginspection_runcard')
                        ->insert([
                            'pono' => $req->runcard_po,
                            'carton_no' => $req->runcard_carton_no,
                            'runcard_no' => $req->runcard_no,
                            'runcard_qty' => $req->runcard_qty,
                            'runcard_remarks' => $req->runcard_remarks,
                            'inspection_id' => $req->runcard_id_inspection,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        ]);
            $data = [
                'msg' => 'INSERT',
                'status' => 'failed',
                'runcard' => '',
            ];

    	} else {
    		$query = DB::connection($this->mysql)->table('tbl_packinginspection_runcard')
                        ->where('id',$req->runcard_id)
                        ->update([
                            'pono' => $req->runcard_po,
                            'carton_no' => $req->runcard_carton_no,
                            'runcard_no' => $req->runcard_no,
                            'runcard_qty' => $req->runcard_qty,
                            'runcard_remarks' => $req->runcard_remarks,
                            'updated_at' => date('Y-m-d H:i:s')
                        ]);
            $data = [
                'msg' => 'No changes Made.',
                'status' => 'failed',
                'runcard' => '',
            ];
    	}

    	if ($query) {
    		$runcard = DB::connection($this->mysql)->table('tbl_packinginspection_runcard')
    					->where('pono',$req->runcard_po)
    					->orderBy('id','desc')->get();
            foreach ($runcard as $key => $rc) {
                $total_qty += $rc->runcard_qty;
            }

    		$data = [
	    		'msg' => 'Successfully saved.',
	    		'status' => 'success',
	    		'runcard' => $runcard,
                'total_qty' => $total_qty
	    	];
    	}

        return response()->json($data);
    }

    public function save_mod(Request $req)
    {
    	$total_qty = 0;
        $data = [
            'msg' => 'Saving failed.',
            'status' => 'failed',
            'mod' => '',
        ];

        $query;

        if (!isset($req->mod_id) || $req->mod_id == '' || empty($req->mod_id)) {

            $query = DB::connection($this->mysql)->table('tbl_packmod')
                        ->insert([
                            'po_no' => $req->po_inspection,
                            'mod' => $req->mod,
                            'qty' => $req->mod_qty,
                            'inspection_id' => $req->id_inspection,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        ]);

        } else {
            $query = DB::connection($this->mysql)->table('tbl_packmod')
                        ->where('id',$req->mod_id)
                        ->update([
                            'po_no' => $req->po_inspection,
                            'mod' => $req->mod,
                            'qty' => $req->mod_qty,
                            'inspection_id' => $req->id_inspection,
                            'updated_at' => date('Y-m-d H:i:s')
                        ]);
            $data = [
                'msg' => 'No changes Made.',
                'status' => 'failed',
                'mod' => '',
            ];
        }

        if ($query) {
            $mod = DB::connection($this->mysql)->table('tbl_packmod')
                        ->where('po_no',$req->po_inspection)
                        ->orderBy('id','desc')->get();
            foreach ($mod as $key => $md) {
                $total_qty += $md->qty;
            }

            $data = [
                'msg' => 'Successfully saved.',
                'status' => 'success',
                'mod' => $mod,
                'total_qty' => $total_qty
            ];
        }

        return response()->json($data);
    }

    public function delete_inspection(Request $req)
    {
        $query;
        $data = [
            'msg' => 'Deleting failed.',
            'status' => 'failed'
        ];

        if (count($req->ids) > 0) {
            $query = DB::connection($this->mysql)->table('packing_inspections')
                        ->whereIn('id',$req->ids)->delete();

            DB::connection($this->mysql)->table('tbl_packinginspection_runcard')
                ->whereIn('inspection_id',$req->ids)->delete();
            DB::connection($this->mysql)->table('tbl_packmod')
                ->whereIn('inspection_id',$req->ids)->delete();
        }

        if ($query) {
            $data = [
                'msg' => 'Successfully deleted',
                'status' => 'success'
            ];
        }

        return response()->json($data);
    }

    public function delete_runcard(Request $req)
    {
        $total_qty = 0;
        $query;
        $data = [
            'msg' => 'Deleting failed.',
            'status' => 'failed'
        ];

        if (count($req->ids) > 0) {
            $query = DB::connection($this->mysql)->table('tbl_packinginspection_runcard')
                        ->whereIn('id',$req->ids)->delete();
        }

        if ($query) {

            $runcard = DB::connection($this->mysql)->table('tbl_packinginspection_runcard')
                        ->where('pono',$req->po)
                        ->orderBy('id','desc')->get();
            foreach ($runcard as $key => $rc) {
                $total_qty += $rc->runcard_qty;
            }

            $data = [
                'msg' => 'Successfully deleted',
                'status' => 'success',
                'total_qty' => $total_qty
            ];
        }

        return response()->json($data);
    }

    public function delete_mod(Request $req)
    {
        $total_qty = 0;
        $query;
        $data = [
            'msg' => 'Deleting failed.',
            'status' => 'failed'
        ];

        if (count($req->ids) > 0) {
            $query = DB::connection($this->mysql)->table('tbl_packmod')
                        ->whereIn('id',$req->ids)->delete();
        }

        if ($query) {
            $mod = DB::connection($this->mysql)->table('tbl_packmod')
                        ->where('po_no',$req->po)
                        ->orderBy('id','desc')->get();
            foreach ($mod as $key => $md) {
                $total_qty += $md->qty;
            }

            $data = [
                'msg' => 'Successfully deleted',
                'status' => 'success',
                'total_qty' => $total_qty
            ];
        }

        return response()->json($data);
    }

    public function search_pdf(Request $req)
    {
        $po_cond = '';
        $date_cond = '';

        $dt = Carbon::now();
        $date = substr($dt->format('  M j, Y A'), 2);
        $company_info = $this->com->getCompanyInfo();

        if(empty($req->search_po) || $req->search_po == '')
        {
            $po_cond ='';
        }
        else
        {
            $po_cond = " AND i.po_num like '" . $req->search_po . "'";
        }

        if(empty($req->search_from) && empty($req->search_to))
        {
            $date_cond ='';
        }
        else
        {
            $date_cond = " AND i.date_inspected BETWEEN '" . $req->search_from . "' AND '". $req->search_to ."'";
        }

        $header = DB::connection($this->mysql)->table('packing_inspections as i')
                        ->whereRaw("1=1".$po_cond.$date_cond)
                        ->select(
                            DB::raw("i.device_name as device_name"),
                            DB::raw("i.po_num as po_num"),
                            DB::raw("i.packing_type as packing_type"),
                            DB::raw("i.unit_condition as unit_condition"),
                            DB::raw("i.inspector as inspector")
                        )->groupBy(
                            'i.device_name',
                            'i.po_num',
                            'i.packing_type',
                            'i.unit_condition',
                            'i.inspector'
                        )->get();
        $header_arr = [];

        foreach ($header as $key => $hd) {
            $ms = DB::connection($this->mssql)->table('XRECE as R')
                    ->select(
                            DB::raw("R.SORDER as po"),
                            DB::raw("R.CODE as device_code"),
                            DB::raw("H.NAME as device_name"),
                            DB::raw("SUM(R.KVOL) as po_qty")
                        )
                    ->leftJoin("XHEAD as H","R.CODE","=","H.CODE")
                    ->where('R.SORDER',$hd->po_num)
                    ->groupBy('R.SORDER',
                            'R.CODE',
                            'H.NAME')
                    ->first();
            array_push($header_arr, [
                'device_name' => $hd->device_name,
                'po_num' => $hd->po_num,
                'packing_type' => $hd->packing_type,
                'unit_condition' => $hd->unit_condition,
                'po_qty' => $ms->po_qty,
                'inspector' => $hd->inspector
            ]);
        }

        $details = DB::connection($this->mysql)->table('packing_inspections as i')
                        ->leftJoin('tbl_packinginspection_runcard as r','i.po_num','=','r.pono')
                        ->leftJoin('tbl_packmod as m','i.po_num','=','m.po_no')
                        ->whereRaw("1=1".$po_cond.$date_cond)
                        ->select(
                            DB::raw("i.po_num as po_num"),
                            DB::raw("i.date_inspected as date_inspected"),
                            DB::raw("i.shipment_date as shipment_date"),
                            DB::raw("i.packing_code as packing_code"),
                            DB::raw("r.runcard_no as lot_no"),
                            DB::raw("r.runcard_qty as quantity"),
                            DB::raw("m.mod as mode_of_defects"),
                            DB::raw("i.inspector as inspector"),
                            DB::raw("i.remarks as remarks")
                        )
                        ->groupBy(
                                'i.po_num',
                                'i.date_inspected',
                                'i.shipment_date',
                                'i.packing_code',
                                'r.runcard_no',
                                'r.runcard_qty',
                                'm.mod',
                                'i.inspector',
                                'i.remarks'
                        )
                        ->get();
        $data = [
            'po' => $req->search_po,
            'date' => $date,
            'company_info' => $company_info,
            'header' => $header_arr,
            'details' => $details,
        ];

        $pdf = PDF::loadView('pdf.packing_inspection', $data)
                    ->setPaper('A4')
                    ->setOption('margin-top', 10)->setOption('margin-bottom', 5)
                    ->setOrientation('landscape');
        return $pdf->inline('Packing_Inspection_'.$date);
    }

    public function search_excel(Request $req)
    {
        $po_cond = '';
        $date_cond = '';

        $dt = Carbon::now();
        $date = substr($dt->format('  M j, Y A'), 2);
        $com_info = $this->com->getCompanyInfo();

        if(empty($req->search_po) || $req->search_po == '')
        {
            $po_cond ='';
        }
        else
        {
            $po_cond = " AND i.po_num like '" . $req->search_po . "'";
        }

        if(empty($req->search_from) && empty($req->search_to))
        {
            $date_cond ='';
        }
        else
        {
            $date_cond = " AND i.date_inspected BETWEEN '" . $req->search_from . "' AND '". $req->search_to ."'";
        }

        $header = DB::connection($this->mysql)->table('packing_inspections as i')
                        ->whereRaw("1=1".$po_cond.$date_cond)
                        ->select(
                            DB::raw("i.device_name as device_name"),
                            DB::raw("i.po_num as po_num"),
                            DB::raw("i.packing_type as packing_type"),
                            DB::raw("i.unit_condition as unit_condition"),
                            DB::raw("i.inspector as inspector")
                        )->groupBy(
                            'i.device_name',
                            'i.po_num',
                            'i.packing_type',
                            'i.unit_condition',
                            'i.inspector'
                        )->get();
        $header_arr = [];

        foreach ($header as $key => $hd) {
            $ms = DB::connection($this->mssql)->table('XRECE as R')
                    ->select(
                            DB::raw("R.SORDER as po"),
                            DB::raw("R.CODE as device_code"),
                            DB::raw("H.NAME as device_name"),
                            DB::raw("SUM(R.KVOL) as po_qty")
                        )
                    ->leftJoin("XHEAD as H","R.CODE","=","H.CODE")
                    ->where('R.SORDER',$hd->po_num)
                    ->groupBy('R.SORDER',
                            'R.CODE',
                            'H.NAME')
                    ->first();
            array_push($header_arr, [
                'device_name' => $hd->device_name,
                'po_num' => $hd->po_num,
                'packing_type' => $hd->packing_type,
                'unit_condition' => $hd->unit_condition,
                'po_qty' => $ms->po_qty,
                'inspector' => $hd->inspector
            ]);
        }

        $details = DB::connection($this->mysql)->table('packing_inspections as i')
                        ->leftJoin('tbl_packinginspection_runcard as r','i.po_num','=','r.pono')
                        ->leftJoin('tbl_packmod as m','i.po_num','=','m.po_no')
                        ->whereRaw("1=1".$po_cond.$date_cond)
                        ->select(
                            DB::raw("i.po_num as po_num"),
                            DB::raw("i.date_inspected as date_inspected"),
                            DB::raw("i.shipment_date as shipment_date"),
                            DB::raw("i.packing_code as packing_code"),
                            DB::raw("r.runcard_no as lot_no"),
                            DB::raw("r.runcard_qty as quantity"),
                            DB::raw("m.mod as mode_of_defects"),
                            DB::raw("i.inspector as inspector"),
                            DB::raw("i.remarks as remarks")
                        )
                        ->groupBy(
                                'i.po_num',
                                'i.date_inspected',
                                'i.shipment_date',
                                'i.packing_code',
                                'r.runcard_no',
                                'r.runcard_qty',
                                'm.mod',
                                'i.inspector',
                                'i.remarks'
                        )
                        ->get();
        
        $po = $req->search_po;

        Excel::create('Packing_Inspection_Report'.$date, function($excel) use($po,$date,$com_info,$header_arr,$details)
        {
            foreach ($header_arr as $key => $info) {
                $excel->sheet($info['po_num'], function($sheet) use($po,$date,$com_info,$info,$details)
                {
                    $sheet->setFreeze('A11');

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
                    $sheet->cell('A4',"PACKING INSPECTION RESULT");

                    $sheet->setHeight(11, 15);
                    $sheet->cells('A10:I10', function($cells) {
                        $cells->setBorder('thin','thin','thin','thin');
                        $cells->setFont([
                            'family'     => 'Calibri',
                            'size'       => '12',
                            'bold'       =>  true,
                        ]);
                    });

                    $sheet->cell('B6', function($cell) {
                        $cell->setValue('Series Name');
                        $cell->setFont([
                            'family'     => 'Calibri',
                            'size'       => '11',
                            'bold'       =>  true,
                        ]);
                    });

                    $sheet->cell('B7', function($cell) {
                        $cell->setValue('P.O. Number');
                        $cell->setFont([
                            'family'     => 'Calibri',
                            'size'       => '11',
                            'bold'       =>  true,
                        ]);
                    });                    

                    $sheet->cell('B8', function($cell) {
                        $cell->setValue('P.O. Quantity');
                        $cell->setFont([
                            'family'     => 'Calibri',
                            'size'       => '11',
                            'bold'       =>  true,
                        ]);
                    });

                    $sheet->cell('C6',$info['device_name']);
                    $sheet->cell('C7',$info['po_num']);
                    $sheet->cell('C8',$info['po_qty']);

                    $sheet->cell('F6', function($cell) {
                        $cell->setValue('Packing Type');
                        $cell->setFont([
                            'family'     => 'Calibri',
                            'size'       => '11',
                            'bold'       =>  true,
                        ]);
                    });

                    $sheet->cell('F7', function($cell) {
                        $cell->setValue('Unit Condition');
                        $cell->setFont([
                            'family'     => 'Calibri',
                            'size'       => '11',
                            'bold'       =>  true,
                        ]);
                    });

                    $sheet->cell('G6',$info['packing_type']);
                    $sheet->cell('G7',$info['unit_condition']);

                    $sheet->setHeight(6, 15);
                    $sheet->setHeight(7, 15);
                    $sheet->setHeight(8, 15);
                    $sheet->setHeight(9, 15);

                    $sheet->cell('B10',"Date Inspected");
                    $sheet->cell('C10',"Shipment Date");
                    $sheet->cell('D10',"Packing Code");
                    $sheet->cell('E10',"Lot Number");
                    $sheet->cell('F10',"Quantity");
                    $sheet->cell('G10',"Mode of Defects");
                    $sheet->cell('H10',"Inspector");
                    $sheet->cell('I10',"Remarks");

                    $row = 11;

                    $sheet->setHeight(11, 15);

                    $quantity = 0;
                    $po_qty = $info['po_qty'];
                    $balance = 0;
                    $mod = '';

                    foreach ($details as $key => $pk) {
                        if ($pk->po_num == $info['po_num'] && $pk->inspector == $info['inspector']) {
                            if (is_numeric($pk->quantity)) {
                                $quantity += $pk->quantity;
                            }

                            if ($pk->mode_of_defects == '' || $pk->mode_of_defects == null) {
                                $mod = 'NDF';
                            } else {
                                $mod = $pk->mode_of_defects;
                            }

                            $sheet->cells('B'.$row.':I'.$row, function($cells) {
                                // Set all borders (top, right, bottom, left)
                                $cells->setBorder(array(
                                    'top'   => array(
                                        'style' => 'thin'
                                    ),
                                ));
                                $cells->setFont([
                                    'family'     => 'Calibri',
                                    'size'       => '11',
                                ]);
                            });

                            $sheet->cell('B'.$row, function($cell) use($pk) {
                                $cell->setValue($pk->date_inspected);
                                $cell->setBorder('thin','thin','thin','thin');
                            });

                            $sheet->cell('C'.$row, function($cell) use($pk) {
                                $cell->setValue($pk->shipment_date);
                                $cell->setBorder('thin','thin','thin','thin');
                            });

                            $sheet->cell('D'.$row, function($cell) use($pk) {
                                $cell->setValue($pk->packing_code);
                                $cell->setBorder('thin','thin','thin','thin');
                            });

                            $sheet->cell('E'.$row, function($cell) use($pk) {
                                $cell->setValue($pk->lot_no);
                                $cell->setBorder('thin','thin','thin','thin');
                            });

                            $sheet->cell('F'.$row, function($cell) use($pk) {
                                $cell->setValue($pk->quantity);
                                $cell->setBorder('thin','thin','thin','thin');
                            });

                            $sheet->cell('G'.$row, function($cell) use($pk,$mod) {
                                $cell->setValue($mod);
                                $cell->setBorder('thin','thin','thin','thin');
                            });

                            $sheet->cell('H'.$row, function($cell) use($pk) {
                                $cell->setValue($pk->inspector);
                                $cell->setBorder('thin','thin','thin','thin');
                            });

                            $sheet->cell('I'.$row, function($cell) use($pk) {
                                $cell->setValue($pk->remarks);
                                $cell->setBorder('thin','thin','thin','thin');
                            });
                            
                            $sheet->row($row, function ($row) {
                                $row->setFontFamily('Calibri');
                                $row->setFontSize(11);
                            });
                            $sheet->setHeight($row,20);
                            $row++;
                        }
                    }

                    $balance = $po_qty - $quantity;

                    $sheet->cell('B'.$row, "Total Qty:");
                    $sheet->cell('C'.$row, $quantity);
                    $sheet->setHeight($row,20);
                    $row++;
                    $sheet->cell('B'.$row, "Balance:");
                    $sheet->cell('C'.$row, ($balance == 0)? '0.00':$balance);
                    $sheet->setHeight($row,20);
                    $row++;
                    $sheet->cell('B'.$row, "Date:");
                    $sheet->cell('C'.$row, $date);
                    $sheet->setHeight($row,20);
                });
            }

        })->download('xls');
    }

    public function group_pdf(Request $req)
    {
        # code...
    }

    public function group_excel(Request $req)
    {
        # code...
    }

    public function CalculateDPPM(Request $req)
    {
        $g1 = (!isset($req->field1) || $req->field1 == '' || $req->field1 == null)? '': $req->field1;
        $g2 = (!isset($req->field2) || $req->field2 == '' || $req->field2 == null)? '': $req->field2;
        $g3 = (!isset($req->field3) || $req->field3 == '' || $req->field3 == null)? '': $req->field3;
        $content1 = (isset($req->content1) || $req->content1 == '' || $req->content1 == null)? '%': $req->content1;
        $content2 = (isset($req->content2) || $req->content2 == '' || $req->content2 == null)? '%': $req->content2;
        $content3 = (isset($req->content3) || $req->content3 == '' || $req->content3 == null)? '%': $req->content3;

        $groupby = DB::connection($this->mysql)
                ->select(
                    DB::raw(
                        "CALL GetPackingInspectionGroupBy(
                        '".$this->com->convertDate($req->gfrom,'Y-m-d')."',
                        '".$this->com->convertDate($req->gto,'Y-m-d')."',
                        '".$g1."',
                        '".$content1."',
                        '".$g2."',
                        '".$content2."',
                        '".$g3."',
                        '".$content3."')"
                    )
                );

        $data = [];
        $node1 = [];
        $node2 = [];
        $node3 = [];
        $details = [];

        if ($g1 !== '') {
            $grp1_query = DB::connection($this->mysql)->table('packing_inspection_group')
                            ->select('g1','L1','DPPM1')
                            ->groupBy($g1)
                            ->orderBy('g1')
                            ->get();
            
            foreach ($grp1_query as $key => $gr1) {
                if ($g2 == '') {
                    $details_query = DB::connection($this->mysql)->table('packing_inspection_group')
                                    ->select('po_num',
                                            'date_inspected',
                                            'shipment_date',
                                            'device_name',
                                            'inspector',
                                            'packing_type',
                                            'unit_condition',
                                            'packing_operator',
                                            'remarks',
                                            'packing_code_series',
                                            'carton_num',
                                            'packing_code',
                                            'judgement',
                                            'total_qty',
                                            'no_of_defects')
                                    ->where('g1',$gr1->g1)
                                    ->get();

                    array_push($node1, [
                        'group' => $gr1->g1,
                        'LAR' => $gr1->L1,
                        'DPPM' => $gr1->DPPM1,
                        'field' => $g1,
                        'details' => $details_query
                    ]);
                } else {

                    $grp2_query = DB::connection($this->mysql)->table('packing_inspection_group')
                                    ->select('g1','g2','L2','DPPM2')
                                    ->where('g1',$gr1->g1)
                                    ->groupBy($g2)
                                    ->orderBy('g2')
                                    ->get();

                    foreach ($grp2_query as $key => $gr2) {
                        if ($g3 == '') {
                            $details_query = DB::connection($this->mysql)->table('packing_inspection_group')
                                                ->select('po_num',
                                                        'date_inspected',
                                                        'shipment_date',
                                                        'device_name',
                                                        'inspector',
                                                        'packing_type',
                                                        'unit_condition',
                                                        'packing_operator',
                                                        'remarks',
                                                        'packing_code_series',
                                                        'carton_num',
                                                        'packing_code',
                                                        'judgement',
                                                        'total_qty',
                                                        'no_of_defects')
                                                ->where('g1',$gr1->g1)
                                                ->where('g2',$gr2->g2)
                                                ->get();
                            array_push($node2, [
                                'g1' => $gr1->g1,
                                'group' => $gr2->g2,
                                'LAR' => $gr2->L2,
                                'DPPM' => $gr2->DPPM2,
                                'field' => $g2,
                                'details' => $details_query
                            ]);
                        } else {

                           $grp3_query = DB::connection($this->mysql)->table('packing_inspection_group')
                                            ->select('g1','g2','g3','L3','DPPM3')
                                            ->where('g1',$gr1->g1)
                                            ->where('g2',$gr2->g2)
                                            ->groupBy($g3)
                                            ->orderBy('g3')
                                            ->get();

                            foreach ($grp3_query as $key => $gr3) {
                                $details_query = DB::connection($this->mysql)->table('packing_inspection_group')
                                                    ->select('po_num',
                                                            'date_inspected',
                                                            'shipment_date',
                                                            'device_name',
                                                            'inspector',
                                                            'packing_type',
                                                            'unit_condition',
                                                            'packing_operator',
                                                            'remarks',
                                                            'packing_code_series',
                                                            'carton_num',
                                                            'packing_code',
                                                            'judgement',
                                                            'total_qty',
                                                            'no_of_defects')
                                                    ->where('g1',$gr1->g1)
                                                    ->where('g2',$gr2->g2)
                                                    ->where('g3',$gr3->g3)
                                                    ->get();
                                array_push($node3, [
                                    'g1' => $gr1->g1,
                                    'g2' => $gr2->g2,
                                    'group' => $gr3->g3,
                                    'LAR' => $gr3->L3,
                                    'DPPM' => $gr3->DPPM3,
                                    'field' => $g3,
                                    'details' => $details_query
                                ]);
                            }

                            array_push($node2, [
                                'g1' => $gr1->g1,
                                'group' => $gr2->g2,
                                'LAR' => $gr2->L2,
                                'DPPM' => $gr2->DPPM2,
                                'field' => $g2,
                                'details' => []
                            ]);
                        }
                    }

                    array_push($node1, [
                        'group' => $gr1->g1,
                        'LAR' => $gr1->L1,
                        'DPPM' => $gr1->DPPM1,
                        'field' => $g1,
                        'details' => []
                    ]);
                }
            }
        }

        $data = [
            'node1' => $node1,
            'node2' => $node2,
            'node3' => $node3
        ];
        
        
        return response()->json($data);
    }

    public function GroupByValues(Request $req)
    {
        $data = DB::connection($this->mysql)->table('packing_inspections')
                ->select($req->field.' as field')
                ->distinct()
                ->get();

        return $data;
    }

}

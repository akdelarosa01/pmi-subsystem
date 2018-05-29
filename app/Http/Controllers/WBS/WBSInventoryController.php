<?php

namespace App\Http\Controllers\WBS;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Datatables;
use Config;
use DB;
use Excel;

class WBSInventoryController extends Controller
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
        if(!$this->com->getAccessRights(Config::get('constants.MODULE_WBS_INV'), $userProgramAccess))
        {
            return redirect('/home');
        }
        else
        {
            # Render WBS Page.
            return view('wbs.wbsinventory',['userProgramAccess' => $userProgramAccess]);
        }
    }

    public function list()
    {
        $inv = DB::connection($this->mysql)->table('tbl_wbs_inventory')
                    ->orderBy('received_date')
                    ->select([
                        'id',
                        'wbs_mr_id',
                        'invoice_no',
                        'item',
                        'item_desc',
                        'qty',
                        'lot_no',
                        'location',
                        'supplier',
                        'not_for_iqc',
                        'iqc_status',
                        'judgement',
                        'create_user',
                        'received_date',
                        'update_user',
                        'updated_at',
                        'mat_batch_id',
                        'loc_batch_id'
                    ]);
        return Datatables::of($inv)
                        ->editColumn('id', function($data) {
                            return $data->id;
                        })
                        ->editColumn('iqc_status', function($data) {
                            if ($data->iqc_status == 1) {
                                return 'Accept';
                            }

                            if ($data->iqc_status == 2) {
                                return 'Reject';
                            }

                            if ($data->iqc_status == 3) {
                                return 'On-going';
                            }

                            if ($data->iqc_status == 0) {
                                return 'Pending';
                            }
                        })
                        ->addColumn('action', function($data) {
                            return '<button class="btn btn-sm btn-primary btn_edit" data-id="'.$data->id.'"
                                    data-wbs_mr_id="'.$data->wbs_mr_id.'"
                                    data-invoice_no="'.$data->invoice_no.'"
                                    data-item="'.$data->item.'"
                                    data-item_desc="'.$data->item_desc.'"
                                    data-qty="'.$data->qty.'"
                                    data-lot_no="'.$data->lot_no.'"
                                    data-location="'.$data->location.'"
                                    data-supplier="'.$data->supplier.'"
                                    data-not_for_iqc="'.$data->not_for_iqc.'"
                                    data-iqc_status="'.$data->iqc_status.'"
                                    data-judgement="'.$data->judgement.'"
                                    data-mat_batch_id="'.$data->mat_batch_id.'"
                                    data-loc_batch_id="'.$data->loc_batch_id.'">
                                        <i class="fa fa-edit"></i>
                                    </button>';
                        })->make(true);
    }
}

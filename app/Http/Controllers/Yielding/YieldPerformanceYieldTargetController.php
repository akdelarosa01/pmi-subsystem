<?php
namespace App\Http\Controllers\Yielding;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; #Auth facade
use Datatables;
use App\Http\Requests;
use App\Poregistration;
use App\Deviceregistration;
use App\Seriesregistration;
use App\Modregistration;
use Carbon\Carbon;
use Config;
use DB;
use Dompdf\Dompdf;
use Excel;
use PDF;

class YieldPerformanceYieldTargetController extends Controller
{
    protected $mysql;
    protected $mssql;
    protected $common;

    public function __construct()
    {
        $this->middleware('auth');
        $com = new CommonController;

        if (Auth::user() != null) {
            $this->mysql = $com->userDBcon(Auth::user()->productline,'yielding');
            $this->mssql = $com->userDBcon(Auth::user()->productline,'mssql');
            $this->common = $com->userDBcon(Auth::user()->productline,'common');
        } else {
            return redirect('/');
        }
    }

    public function getYieldTarget(Request $request)
    {
        $common = new CommonController;
         if(!$common->getAccessRights(Config::get('constants.MODULE_CODE_YIELDTAR'), $userProgramAccess))
        {
            return redirect('/home');
        }
        else
        { 
        
            $msrecords = DB::connection($this->mssql)
                ->table('XRECE as d')
                ->join('XHEAD as h','d.CODE','=','h.CODE')
                ->select(DB::raw("d.SORDER as PO")
                    , DB::raw("d.CODE as devicecode")
                    , DB::raw("h.NAME as devicename")
                    , DB::raw("SUM(d.KVOL) as POqty"))
                ->where('d.SORDER',$request->pono)
                ->groupBy('d.SORDER','d.CODE','h.NAME')
                ->get();
                       
            $targetyield = DB::connection($this->mysql)->table("tbl_targetregistration")->distinct()->get();
                       
            $target = DB::connection($this->mysql)->table("tbl_targetregistration")->orderBy('datefrom','asc')->get();
            
            
            return view('yielding.YieldPerformanceYieldTarget',['userProgramAccess' => $userProgramAccess,
                'msrecords'=>$msrecords, 
                'target' => $target,
                'targetyield' => $targetyield]); 
        }
    }

    public function get_outputs()
    {
        $target = DB::connection($this->mysql)->table("tbl_targetregistration")->orderBy('datefrom','asc')->get();
        return response()->json($target);
    }
   
    //displaying  tbl_target Registration records----------------
    private function displaytargetreg(){
        $table = DB::connection($this->mysql)->table('tbl_targetregistration')->get();
        return $table;
    }

    public function targetregistration(Request $request){
        if ($request->id != 0) {
            DB::connection($this->mysql)->table('tbl_targetregistration')
                ->where('id','=',$request->id)
                ->update(array(
                'datefrom'=>$request->datefrom,
                'dateto'=>$request->dateto,
                'yield'=>$request->yield,
                'dppm'=>$request->dppm,
                'ptype'=>$request->ptype,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s') ));
        }else{
            DB::connection($this->mysql)->table('tbl_targetregistration')
                ->insert([
                'datefrom'=>$request->datefrom,
                'dateto'=>$request->dateto,
                //'dateto'=>$this->$com->convertDate($request->dateto,'Y-m-d'),
                'yield'=>$request->yield,
                'dppm'=>$request->dppm,
                'ptype'=>$request->ptype,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now() ]);
        }
        $target = DB::connection($this->mysql)->table("tbl_targetregistration")->orderBy('datefrom','asc')->get();
        return response()->json(['data' => $target,"status"=>"success", "msg"=>"Successfully saved!"]);    
    }
    
    public function edittargetreg(Request $request)
    {    
        $search = $request->editsearch;
        $ok =DB::connection($this->mysql)->table('tbl_targetregistration')
        ->where('id', $search)
        ->get();
        return $ok;
    }
    //Delete records for tbl_targetregistration------------------
    public function deletetargetreg(Request $request){  
        $tray = $request->tray;
        $traycount = $request->traycount;  

        if($traycount > 0){
            DB::connection($this->mysql)->table('tbl_targetregistration')->wherein('id',$tray)->delete();  
        } 
        $target = DB::connection($this->mysql)->table("tbl_targetregistration")->orderBy('datefrom','asc')->get();
        return response()->json($target);
    }
}

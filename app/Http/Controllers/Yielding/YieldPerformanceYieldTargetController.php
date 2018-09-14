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

   
    //displaying  tbl_target Registration records----------------
    private function displaytargetreg(){
        $table = DB::connection($this->mysql)->table('tbl_targetregistration')->get();
        return $table;
    }

    public function getTargetYield(){
         $targetyield = DB::connection($this->mysql)->table('tbl_targetregistration')
                    ->orderBy('id','DESC')
                    ->select(
                        'id',
                        'datefrom',
                        'dateto',
                        'yield',
                        'dppm',
                        'ptype'
                    )->get();
        return response()->json($targetyield);
    }

  
    public function targetregistration(Request $request){
        $status = $request->status;
        $id = $request->id;

        $data = [
            'msg' => 'Saving failed.',
            'status' => 'failed',
            'target_reg' => ''
        ];

        $insert = false;
     
        if($status == "ADD"){
            $insert = DB::connection($this->mysql)->table('tbl_targetregistration')
                       ->insert([
                           'datefrom'=>$request->datefrom,
                           'dateto'=>$this->$com->convertDate($request->dateto,'Y-m-d'),
                           'yield'=>$request->yielding,
                           'dppm'=>$request->dppm,
                           'ptype'=>$request->ptype,
                           'created_at' => Carbon::Now(),
                           'updated_at' => Carbon::Now()
                        ]);

        }   
        return $this->displaytargetreg(); 

        // if($status == "EDIT"){
        //     $insert = DB::connection($this->mysql)->table('tbl_targetregistration')
        //                 ->where('id','=',$request->id)
        //                 ->update(array(
        //                    'datefrom'=>$request->datefrom,
        //                    'dateto'=>$request->dateto,
        //                    'yield'=>$request->yielding,
        //                    'dppm'=>$request->dppm,
        //                    'ptype'=>$request->ptype,
        //                    'created_at' => date('Y-m-d H:i:s'),
        //                    'updated_at' => date('Y-m-d H:i:s')
        //                 ));
        // }

        // if ($insert) {
        //     $target_reg = DB::connection($this->mysql)->table('tbl_targetregistration')->orderBy('id','DESC')->get();
        //     $data = [
        //         'msg' => 'Successfully saved.',
        //         'status' => 'success',
        //         'target_reg' => $target_reg
        //     ];
        // }

        // return response()->json($data);
    }



    //    $status = $request->status;
    //     $id = $request->id;
    //     if($status == "ADD"){
    //        DB::connection($this->mysql)->table('tbl_targetregistration')
    //             ->insert([
    //                 'datefrom'=>$request->datefrom,
    //                 'dateto'=>$request->dateto,
    //                 'yield'=>$request->yielding,
    //                 'dppm'=>$request->dppm,
    //                 'ptype'=>$request->ptype
    //             ]);    
    //     }
    //     if($status == "EDIT"){
    //         DB::connection($this->mysql)->table('tbl_targetregistration')
    //             ->where('id','=',$id)
    //             ->update(array(
    //                 'datefrom'=>$request->datefrom,
    //                 'dateto'=>$request->dateto,
    //                 'yield'=>$request->yielding,
    //                 'dppm'=>$request->dppm,
    //                 'ptype'=>$request->ptype
    //             ));
    //     }
    //     return $this->displaytargetreg();  
    // }
    //Edit records for tbl_targetregistration------------------
    
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
        return $this->displaytargetreg();
    }


    public function deleteAllPost(Request $request)
    {      
        $tray = $request->tray;
        $traycount = $request->traycount;

       /* return $tray;*/
        if($traycount > 0){
            $ok = DB::connection($this->mysql)->table('tbl_yielding_performance')->wherein('id',$tray)->delete();
        
            if ($ok) {
                $msg = "Successfully deleted selected records.";
                return redirect('/yieldperformance')->with(['message'=>$msg]);
            } else {
                $msg = "No Record Exists.";
                return redirect('/yieldperformance')->with(['err_message'=>$msg]);
            }
        } else {
            $ok = DB::connection($this->mysql)->table('tbl_yielding_performance')->delete();
        
            if ($ok) {
                $msg = "Successfully deleted all records.";
                return redirect('/yieldperformance')->with(['message'=>$msg]);
            } else {
                $msg = "No Record Exists.";
                return redirect('/yieldperformance')->with(['err_message'=>$msg]);
            }
        }
       
    }

    public function deleteAll(Request $request)
    {
       
        $tray = $request->tray;
        $traycount = $request->traycount;
       /* return $tray;*/
        if($traycount > 0){
            $ok = DB::connection($this->mysql)->table('tbl_yielding_performance')->wherein('id',$tray)->delete();
        
            if ($ok) {
                $msg = "Successfully deleted selected records.";
                return redirect('/targetyieldperformance')->with(['message'=>$msg]);
            } else {
                $msg = "No Record Exists.";
                return redirect('/targetyieldperformance')->with(['err_message'=>$msg]);
            }
        } else {
             $ok = DB::connection($this->mysql)->table('tbl_wbssetting')->delete();
        
            if ($ok) {
                $msg = "Successfully deleted all records.";
                return redirect('/targetyieldperformance')->with(['message'=>$msg]);
            } else {
                $msg = "No Record Exists.";
                return redirect('/targetyieldperformance')->with(['err_message'=>$msg]);
            }
        }
       
    } 

 
    public function udpateyieldsummary(Request $request)
    {
        $table = "tbl_yielding_performance";
        $exist = $request->data;

  
        $ok = DB::connection($this->mysql)->table($table)
            ->where('id', $exist['masterid'])
            ->update(array('pono'=>$exist['pono'],'poqty' =>$exist['poqty'],'device' =>$exist['device'],'series' =>$exist['series'],'family' =>$exist['family'],'toutput' =>$exist['toutput'],'treject' =>$exist['treject'],'twoyield' =>$exist['twoyield'] ));
      
        if ($ok) {
            $msg = "Successfully saved.";
            return redirect('/yieldperformance')->with(['message'=>$msg]);
        } else {
             $msg = "Saving Failed.";
            return redirect('/yieldperformance')->with(['err_message'=>$msg]);
        }
    }

    function summarychart(){
        $ok =DB::connection($this->mysql)->table('tbl_yielding_performance')->get();
        return $ok;
    }

    public function exportToexcel(Request $request)
    {
        try
        {
            $dt = Carbon::now();
            $date = substr($dt->format('Ymd'), 2);
            $path = public_path().'/Yielding_Performance_Data_Check/export';

            Excel::create('Summary_Records_'.$date, function($excel)
            {
                $excel->sheet('Sheet1', function($sheet)
                {
                    $sheet->cell('A1', "PO NO");
                    $sheet->cell('B1', "PO QUANTITY");
                    $sheet->cell('C1', "DEVICE NAME");
                    $sheet->cell('D1', "SERIES");
                    $sheet->cell('E1', "FAMILY");
                    $sheet->cell('F1', "TOTAL OUTPUT");
                    $sheet->cell('G1', "TOTAL REJECT");
                    $sheet->cell('H1', "TOTAL YIELD");

                    $sheet->row(4, function ($row) {
                        $row->setFontFamily('Calibri');
                        $row->setBackground('##ADD8E6');
                        $row->setFontSize(10);
                        $row->setAlignment('center');
                    });
                    $sheet->row(1, function ($row) {
                        $row->setFontFamily('Calibri');
                        $row->setBackground('##ADD8E6');
                        $row->setFontSize(10);
                        $row->setAlignment('center');
                    });
                    $sheet->row(3, function ($row) {
                        $row->setFontFamily('Calibri');
                        $row->setFontSize(10);
                        $row->setAlignment('center');
                    });
                    $sheet->setStyle(array(
                        'font' => array(
                            'name'      =>  'Calibri',
                            'size'      =>  10,
                        )
                    ));
                    $row = 2;
                    $data = DB::connection($this->mysql)->table('tbl_yielding_performance')->get();
                    foreach ($data as $key => $val) {
                        $sheet->cell('A'.$row, $val->pono);
                        $sheet->cell('B'.$row, $val->poqty);
                        $sheet->cell('C'.$row, $val->device);
                        $sheet->cell('D'.$row, $val->series);
                        $sheet->cell('E'.$row, $val->family);
                        $sheet->cell('F'.$row, $val->accumulatedoutput);
                        $sheet->cell('G'.$row, $val->qty);
                        $sheet->cell('H'.$row, $val->twoyield);
                        $row++;
                    }

                });

            })->download('xls');


        } catch (Exception $e) {
            return redirect(url('/yieldperformance'))->with(['err_message' => $e]);
        }
    }

    public function exportTopdf(Request $request)
    {
        $field = DB::connection($this->mysql)->table('tbl_yielding_performance')->get();
            $html1 = '<style>
                        #data {
                          border-collapse: collapse;
                          width: 100%;
                          font-size:10px
                        }

                        #data thead td {
                          border: 1px solid black;
                          text-align: center;
                        }

                        #data tbody td {
                          border-bottom: 1px solid black;
                          alignment:center;
                        }

                        #info {
                          width: 100%;
                          font-size:10px;
                        }

                        #info thead td {
                          text-align: center;
                        }
                        #date{
                            text-align:right;
                        }

                      </style>
                      <table id="info">
                        <thead>
                          <tr>
                            <td colspan="5">
                              <h2>YIELDING PERFORMANCE</h2>
                            </td>
                          </tr>
                          <tr>
                            <td colspan="5">
                              
                            </td>
                          </tr>
                          <tr>
                            <td id="date" colspan="6" style="margin-right:20%">
                              '.date("m/d/Y").'
                            </td>
                          </tr>
                        </thead>
                      </table>
                      <table id="data">
                        <thead>
                          <tr>
                            <td>P.O #</td>
                            <td>P.O QUANTITY</td>
                            <td>DEVICE NAME</td>
                            <td>SERIES</td>
                            <td>FAMILY</td>
                            <td>TOTAL OUTPUT</td>
                            <td>TOTAL REJECT</td>
                            <td>TOTAL YIELD</td>

                          </tr>
                        </thead>
                        <tbody>';

            $html3 = '</tbody>
                      </table>';
           
            $html2 = '';
            foreach ($field as $key => $v) {
               $html2 .= '<tr>
                    <td>'.$v->pono.'</td>
                    <td>'.$v->poqty.'</td>
                    <td>'.$v->device.'</td>
                    <td>'.$v->series.'</td>
                    <td>'.$v->family.'</td>
                    <td>'.$v->accumulatedoutput.'</td>
                    <td>'.$v->qty.'</td>
                    <td>'.$v->twoyield.'</td>
                   
                </tr>';
            }

            $html_final = $html1.$html2.$html3;
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html_final);
            $dompdf->setPaper('letter', 'landscape');
            $dompdf->render();
            $dompdf->stream('Yielding_Performance'.Carbon::now().'.pdf');    
    }

   

 

    public function loadchart(Request $request){
        $df = $request->datefroms;
        $dt = $request->datetos;
        $pieces = explode("/", $df);
        $pieces2 = explode("/", $dt);
        $fixeddf = $pieces[2]."-".$pieces[0]."-".$pieces[1];
        $fixeddt = $pieces2[2]."-".$pieces2[0]."-".$pieces2[1];
       // var_dump($fixeddf);
        $table = DB::connection($this->mysql)->table('tbl_yielding_performance')
                    ->select('family',DB::raw("SUM(toutput) as toutput"),DB::raw("SUM(qty) as qty"))
                    ->groupBy('family')
                    ->orderBy('family')
                    ->whereBetween('productiondate', [$fixeddf, $fixeddt])
                    ->get();
       return $table;
    }

}

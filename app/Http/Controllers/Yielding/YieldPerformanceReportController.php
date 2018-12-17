<?php
namespace App\Http\Controllers\Yielding;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Config;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth; #Auth facade
use Excel;
use PDF;
use Carbon\Carbon;
use Dompdf\Dompdf;

class YieldPerformanceReportController extends Controller
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
            $this->mysql = $this->com->userDBcon(Auth::user()->productline,'yielding');
            $this->mssql = $this->com->userDBcon(Auth::user()->productline,'mssql');
            $this->common = $this->com->userDBcon(Auth::user()->productline,'common');
        } else {
            return redirect('/');
        }
    }


    public function getYieldPerformanceReport(Request $request)
    {
        if(!$this->com->getAccessRights(Config::get('constants.MODULE_CODE_REP'), $userProgramAccess))
        {
            return redirect('/home');
        }
        else
        { 
            $msrecords = DB::connection($this->mssql)
                            ->table('XSLIP as s')
                            ->leftJoin('XHEAD as h', 's.CODE', '=', 'h.CODE')
                            ->leftjoin('XRECE as r', 's.SEIBAN','=','r.SORDER')
                            ->select(DB::raw('s.SEIBAN as PO'),
                                            DB::raw('s.CODE as devicecode'),
                                            DB::raw('h.NAME as devicename'),
                                            DB::raw('r.KVOL as POqty'),
                                            DB::raw('r.SEDA as branch'))
                            ->where('s.SEIBAN',$request->pono)
                            ->orderBy('r.SEDA','desc')
                            // ->first()
                            ->get();

            $datenow = date('Y/m/d');
            $count = DB::connection($this->mysql)->table("tbl_yielding_pya")->orderBy('id','desc')->first();
            $targetyield = DB::connection($this->mysql)->table("tbl_targetregistration")->distinct()->get();
            $countpya = DB::connection($this->mysql)->table("tbl_yielding_performance")->count(); 
            $countcmq = DB::connection($this->mysql)->table("tbl_yielding_performance")->count(); 
            //$family = DB::connection($this->mysql)->table("tbl_seriesregistration")->select('family')->distinct()->get();
            $modefect = $this->com->getDropdownByName('Mode of Defect - Yield Performance');
            $family = $this->com->getDropdownByName('Family');
            $series = $this->com->getDropdownByName('Series');
            $target = DB::connection($this->mysql)->table("tbl_targetregistration")->orderBy('datefrom','asc')->get();
            $ys = $this->com->getDropdownByName('Yielding Station');
            $record = DB::connection($this->mysql)->table("tbl_yielding_performance")
                        ->groupBy('pono')
                        ->get();

            return view('yielding.YieldPerformanceReport',[
                'userProgramAccess' => $userProgramAccess,
                'family' => $family,
                'modefect' => $modefect,
                'yieldstation' => $ys,
                'yieldingno'=>$count,
                'series'=>$series,
                'msrecords'=>$msrecords, 
                'target' => $target,
                'count'=> $count,
                'countpya'=> $countpya,
                'countcmq'=> $countcmq,
                'targetyield' => $targetyield
            ]); 
        }
    }

    public function searchPOdetails(Request $req)
    {
        if (isset($req->po)) {
            $data = DB::connection($this->mysql)
                        ->select("SELECT pono,
                                        device_code,
                                        device_name,
                                        family,
                                        prod_type,
                                        series
                                FROM tbl_poregistration
                                where pono='".$req->po."'");
            if (count((array)$data) > 0) {
                return response()->json($data[0]);
            } else {
                $data = DB::connection($this->mssql)
                            ->SELECT("SELECT r.SORDER as pono, r.CODE as device_code, h.NAME as device_name, r.KVOL as po_qty, SUBSTRING(h.NAME, 1, CHARINDEX('-',h.NAME) - 1) as  series,
                                UPPER(i.BUNR) as prodtype, h.NOTE as family 
                                FROM XRECE r 
                                     LEFT JOIN XITEM i ON i.CODE = r.CODE
                                     LEFT JOIN XHEAD h ON h.CODE = r.CODE
                                WHERE i.BUNR IN('Burn-In','Test Sockets') AND r.SORDER = '$req->po'
                                GROUP BY r.SORDER, r.CODE, h.NAME, r.KVOL, i.BUNR, h.NOTE
                                ORDER BY i.BUNR, r.CODE");
                if (count((array)$data) > 0) {
                    return response()->json($data[0]);
                }
            }
        }
    }

    public function records()
    {
        $records = DB::connection($this->mysql)->table("tbl_yielding_performance as y")
                        ->leftJoin('tbl_yielding_pya as p','y.pono','=','p.pono')
                        ->select(
                                DB::raw('y.id as id'),
                                DB::raw('y.pono as pono'),
                                DB::raw('y.poqty as poqty'),
                                DB::raw('y.device as device'),
                                DB::raw('y.series as series'),
                                DB::raw('y.family as family'),
                                DB::raw('y.tinput as tinput'),
                                DB::raw('y.toutput as toutput'),
                                DB::raw('y.treject as treject'),
                                DB::raw("IFNULL(SUM(p.qty),0) as qty")
                            )
                        ->groupBy('y.id',
                                'y.pono',
                                'y.poqty',
                                'y.device',
                                'y.series',
                                'y.family',
                                'y.toutput',
                                'y.treject')
                        ->get();

        return response()->json($records);
    }

    public function summarychart()
    {
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

                    // $sheet->row(4, function ($row) {
                    //     $row->setFontFamily('Calibri');
                    //     $row->setBackground('##ADD8E6');
                    //     $row->setFontSize(10);
                    //     $row->setAlignment('center');
                    // });

                    $sheet->row(1, function ($row) {
                        $row->setFontFamily('Calibri');
                        $row->setBackground('##ADD8E6');
                        $row->setFontSize(10);
                        $row->setAlignment('center');
                    });
                    // $sheet->row(3, function ($row) {
                    //     $row->setFontFamily('Calibri');
                    //     $row->setFontSize(10);
                    //     $row->setAlignment('center');
                    // });
                    $sheet->setStyle(array(
                        'font' => array(
                            'name'      =>  'Calibri',
                            'size'      =>  10,
                        )
                    ));
                    $row = 2;
                    $data = DB::connection($this->mysql)->table('tbl_yielding_performance')
                                ->select(
                                    'pono',
                                    'poqty',
                                    'device',
                                    'series',
                                    'family',
                                    'toutput',
                                    'treject',
                                    'twoyield'
                                )
                                ->get();

                    foreach ($data as $key => $val) {
                        $sheet->cell('A'.$row, $val->pono);
                        $sheet->cell('B'.$row, $val->poqty);
                        $sheet->cell('C'.$row, $val->device);
                        $sheet->cell('D'.$row, $val->series);
                        $sheet->cell('E'.$row, $val->family);
                        $sheet->cell('F'.$row, $val->toutput);
                        $sheet->cell('G'.$row, $val->treject);
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
        $dt = Carbon::now();
        $date = substr($dt->format('  M j, Y A'), 2);

        $company_info = $this->com->getCompanyInfo();

        $yield_performance = DB::connection($this->mysql)->table('tbl_yielding_performance')
                                ->select(
                                    'pono',
                                    'poqty',
                                    'device',
                                    'series',
                                    'family',
                                    'toutput',
                                    'treject',
                                    'twoyield'
                                )
                                ->get();

        $data = [
                'date' => $date,
                'company_info' => $company_info,
                'yield_performance' => $yield_performance
            ];

        $pdf = PDF::loadView('pdf.yielding_performance', $data)
                    ->setPaper('A4')
                    ->setOption('margin-top', 10)->setOption('margin-bottom', 5)
                    ->setOrientation('landscape');

        return $pdf->inline('Yielding_Performance_'.date('Y-m-d'));
    }

    public function summaryReport(Request $req)
    {
        Excel::create('Yield_Performance_Report', function($excel) use($req)
        {
            $excel->sheet('Sheet1', function($sheet) use($req)
            {

                $date_cond = '';
                $ptype_cond = '';
                $family_cond = '';
                $series_cond = '';
                $device_cond = '';
                $po_cond = '';
                $datefrom = '';
                $dateto = '';
                $dates = [];

                if ($req->datefrom !== '') {
                    $datefrom = $this->com->convertDate($req->datefrom,'Y-m-d');
                    $dateto = $this->com->convertDate($req->dateto,'Y-m-d');

                    $date_cond = " AND p.productiondate BETWEEN '".$datefrom."' AND '".$dateto."'";
                }

                if ($req->ptype !== '') {
                    $ptype_cond = " AND y.prodtype='".$req->ptype."'";
                }

                if ($req->family !== '') {
                    $family_cond = " AND y.family='".$req->family."'";
                }

                if ($req->series !== '') {
                    $series_cond = " AND y.series='".$req->series."'";
                }

                if ($req->device !== '') {
                    $device_cond = " AND y.device like '%".$req->device."%'";
                }

                if ($req->po !== '') {
                    $po_cond = " AND y.pono='".$req->po."'";
                }

                $prod = DB::connection($this->mysql)
                                ->select("select date_format(p.productiondate,'%d-%m') as dates
                                        from tbl_yielding_performance as y
                                        inner join tbl_yielding_pya as p
                                        on y.pono = p.pono
                                        where p.mod <> ''".$date_cond.
                                        $ptype_cond.
                                        $family_cond.
                                        $series_cond.
                                        $device_cond.
                                        $po_cond."
                                        group by date_format(p.productiondate,'%d-%m')
                                        order by p.productiondate");


                foreach ($prod as $key => $prd) {
                    array_push($dates, $prd->dates);
                }

                $sheet->setAutoSize(true);
                $sheet->setCellValue('A1', 'Yield Performance Report');
                $sheet->mergeCells('A1:C1');

                $sheet->setHeight(1,30);
                $sheet->row(1, function ($row) {
                    $row->setFontFamily('Calibri');
                    $row->setFontSize(15);
                });

                $sheet->cell('A3', function($cell) {
                    $cell->setValue("Inclusive Date");
                    $cell->setFont([
                        'italic'       =>  true,
                    ]);
                });
                $sheet->setHeight(3,20);

                $sheet->cell('A4', function($cell) {
                    $cell->setValue("From:");
                    $cell->setFont([
                        'italic'       =>  true,
                    ]);
                });
                $sheet->setHeight(4,20);
                $sheet->mergeCells('B4:C4');
                $sheet->cell('B4',$datefrom);

                $sheet->cell('A5', function($cell) {
                    $cell->setValue("To:");
                    $cell->setFont([
                        'italic'       =>  true,
                    ]);
                });
                $sheet->setHeight(5,20);
                $sheet->mergeCells('B5:C5');
                $sheet->cell('B5',$dateto);

                $sheet->cell('A6', function($cell) {
                    $cell->setValue("Product Type:");
                    $cell->setFont([
                        'italic'       =>  true,
                    ]);
                });
                $sheet->setHeight(6,20);
                $sheet->cell('B6',$req->ptype);

                $sheet->cell('A7', function($cell) {
                    $cell->setValue("Family:");
                    $cell->setFont([
                        'italic'       =>  true,
                    ]);
                });
                $sheet->setHeight(7,20);
                $sheet->cell('B7',$req->family);

                $sheet->cell('A8', function($cell) {
                    $cell->setValue("Series Name:");
                    $cell->setFont([
                        'italic'       =>  true,
                    ]);
                });
                $sheet->setHeight(8,20);
                $sheet->cell('B8',$req->series);

                $sheet->cell('A9', function($cell) {
                    $cell->setValue("Device Name:");
                    $cell->setFont([
                        'italic'       =>  true,
                    ]);
                });
                $sheet->setHeight(9,20);
                $sheet->cell('B9',$req->device);

                $sheet->cell('A10', function($cell) {
                    $cell->setValue("PO Number:");
                    $cell->setFont([
                        'italic'       =>  true,
                    ]);
                });
                $sheet->setHeight(10,20);
                $sheet->cell('B10',$req->po);

                $sheet->setMergeColumn([
                    'columns' => ['A'],
                    'rows' => [
                        [11,12]
                    ]
                ]);

                $sheet->cell('A11', function($cell) {
                    $cell->setValue('Defects');
                    $cell->setBackground('#63ace5');
                    $cell->setBorder('thin', 'thin', 'thin', 'thin');
                });

                $dateColums = [
                    ['B','C'],['D','E'],['F','G'],['H','I'],['J','K'],["L","M"],["N","O"],
                    ["P","Q"],["R","S"],["T","U"],["V","W"],["X","Y"],["Z","AA"],["AB","AC"],
                    ["AD","AE"],["AF","AG"],["AH","AI"],["AJ","AK"],["AL","AM"],["AN","AO"],
                    ["AP","AQ"],["AR","AS"],["AT","AU"],["AV","AW"],["AX","AY"],["AZ","BA"],
                    ["AB","BB"],["BC","BD"],["BE","BF"],["BG","BH"],["BI","BJ"],["BK","BL"],
                    ["BM","BN"],["BO","BP"]
                ];

                $covereddates = [];

                foreach ($dates as $key => $st) {
                    array_push($covereddates, $dateColums[$key]);
                }

                $defect_data = DB::connection($this->mysql)
                                ->select(
                                    DB::raw(
                                        "CALL GetYieldPerformanceReport(
                                            '".$datefrom."',
                                            '".$dateto."',
                                            '".$req->po."',
                                            '".$req->family."',
                                            '".$req->ptype."',
                                            '".$req->series."',
                                            '".$req->device."')"
                                        )
                                );

                $defects = json_decode(json_encode($defect_data), true);

                $row = 13;
                $defect_names = [];

                foreach ($defects as $key => $df) {
                    $defect_names[$row] = $df['mod'];
                    $row++;
                }

                $rows = array_keys($defect_names);
                $lastColKey = 0;

                foreach ($covereddates as $datekey => $dt) {
                    $sheet->cells($dt[0].'11:'.$dt[1].'11', function($cells) {
                        $cells->setBackground('#63ace5');
                        $cells->setBorder('thin', 'thin', 'thin', 'thin');
                    });
                    $sheet->cells($dt[0].'12:'.$dt[1].'12', function($cells) {
                        $cells->setBackground('#63ace5');
                        $cells->setBorder('thin', 'thin', 'thin', 'thin');
                    });

                    $sheet->mergeCells($dt[0].'11:'.$dt[1].'11');
                    $sheet->cell($dt[0].'11',$dates[$datekey]);
                    $sheet->cell($dt[0].'12','PNG');
                    $sheet->cell($dt[1].'12','MNG');
                    $sheet->setHeight(11,20);
                    $sheet->setHeight(12,20);

                    foreach ($defects as $key => $df) {
                        $totals = $defect_names[$rows[$key]];

                        if ($totals == 'Input' || $totals == 'Output' || $totals == 'Production - NG' || $totals == 'Material - NG' || $totals == 'Yield w/o MNG(%)' || $totals == 'TotalYield(%)') {
                            $sheet->mergeCells($dt[0].$rows[$key].':'.$dt[1].$rows[$key]);

                            $sheet->cell('A'.$rows[$key], function($cell) use($totals){
                                $cell->setValue($totals);
                                $cell->setBackground('#fff9ae');
                                $cell->setBorder('thin', 'thin', 'thin', 'thin');
                            });

                            $sheet->cells($dt[0].$rows[$key].':'.$dt[1].$rows[$key], function($cells) {
                                $cells->setBackground('#fff9ae');
                                $cells->setBorder('thin', 'thin', 'thin', 'thin');
                            });
                            $sheet->cell($dt[0].$rows[$key],($df[$dates[$datekey].'_PNG'] == 0)? '0.00' : $df[$dates[$datekey].'_PNG']);
                        } else {
                            $sheet->cell('A'.$rows[$key], function($cell) use($totals){
                                $cell->setValue($totals);
                                $cell->setBorder('thin', 'thin', 'thin', 'thin');
                            });

                            $sheet->cells($dt[0].$rows[$key].':'.$dt[1].$rows[$key], function($cells) {
                                $cells->setBorder('thin', 'thin', 'thin', 'thin');
                            });
                            $sheet->cell($dt[0].$rows[$key],($df[$dates[$datekey].'_PNG'] == 0)? '0.00' : $df[$dates[$datekey].'_PNG']);
                            $sheet->cell($dt[1].$rows[$key],($df[$dates[$datekey].'_MNG'] == 0)? '0.00' : $df[$dates[$datekey].'_MNG']);
                        }
                        
                        $sheet->setHeight($rows[$key],20);
                    }

                    $lastColKey = $datekey;
                }

                $nextCol = $dateColums[$lastColKey+1];
                $sheet->cell($nextCol[0].'11','TOTAL');
                $sheet->cell($nextCol[0].'12','PNG');
                $sheet->cell($nextCol[1].'12','MNG');

                $sheet->cells($nextCol[0].'11:'.$nextCol[1].'11', function($cells) {
                    $cells->setBackground('#63ace5');
                    $cells->setBorder('thin', 'thin', 'thin', 'thin');
                });
                $sheet->cells($nextCol[0].'12:'.$nextCol[1].'12', function($cells) {
                    $cells->setBackground('#63ace5');
                    $cells->setBorder('thin', 'thin', 'thin', 'thin');
                });

                foreach ($defects as $key => $df) {
                    $totals = $defect_names[$rows[$key]];

                    if ($totals == 'Input' || $totals == 'Output' || $totals == 'Production - NG' || $totals == 'Material - NG' || $totals == 'Yield w/o MNG(%)' || $totals == 'TotalYield(%)') {

                        $sheet->mergeCells($nextCol[0].$rows[$key].':'.$nextCol[1].$rows[$key]);
                        $sheet->cells($nextCol[0].$rows[$key].':'.$nextCol[1].$rows[$key], function($cells) {
                            $cells->setBackground('#fff9ae');
                            $cells->setBorder('thin', 'thin', 'thin', 'thin');
                        });
                        $sheet->cell($nextCol[0].$rows[$key],($df['TOTAL_PNG'] == 0)? '0.00' : $df['TOTAL_PNG']);
                    } else {
                        $sheet->cells($nextCol[0].$rows[$key].':'.$nextCol[1].$rows[$key], function($cells) {
                            $cells->setBorder('thin', 'thin', 'thin', 'thin');
                        });
                        $sheet->cell($nextCol[0].$rows[$key],($df['TOTAL_PNG'] == 0)? '0.00' : $df['TOTAL_PNG']);
                        $sheet->cell($nextCol[1].$rows[$key],($df['TOTAL_MNG'] == 0)? '0.00' : $df['TOTAL_MNG']);
                    }

                    $sheet->setHeight($rows[$key],20);
                }
            });
        })->download('xls');
    }

    public function defectSummary(Request $req)
    {
        Excel::create('Defect_Summary_Report', function($excel) use($req)
        {
            $excel->sheet('Sheet1', function($sheet) use($req)
            {

                $date_cond = '';
                $ptype_cond = '';
                $family_cond = '';
                $series_cond = '';
                $device_cond = '';
                $po_cond = '';
                $datefrom = '';
                $dateto = '';
                $fams = [];

                if ($req->datefrom !== '') {
                    $datefrom = $this->com->convertDate($req->datefrom,'Y-m-d');
                    $dateto = $this->com->convertDate($req->dateto,'Y-m-d');

                    $date_cond = " AND p.productiondate BETWEEN '".$datefrom."' AND '".$dateto."'";
                }

                if ($req->ptype !== '') {
                    $ptype_cond = " AND y.prodtype='".$req->ptype."'";
                }

                if ($req->family !== '') {
                    $family_cond = " AND y.family='".$req->family."'";
                }

                if ($req->series !== '') {
                    $series_cond = " AND y.series='".$req->series."'";
                }

                if ($req->device !== '') {
                    $device_cond = " AND y.device like '%".$req->device."%'";
                }

                if ($req->po !== '') {
                    $po_cond = " AND y.pono='".$req->po."'";
                }

                $families = DB::connection($this->mysql)
                                ->select("select y.family
                                        from tbl_yielding_performance as y
                                        inner join tbl_yielding_pya as p
                                        on y.pono = p.pono
                                        where p.mod <> ''".$date_cond.
                                        $ptype_cond.
                                        $family_cond.
                                        $series_cond.
                                        $device_cond.
                                        $po_cond."
                                        group by y.family");


                foreach ($families as $key => $fam) {
                    array_push($fams, $fam->family);
                }

                $sheet->setAutoSize(true);
                $sheet->setCellValue('A1', 'Defect Summary Per Family');
                $sheet->mergeCells('A1:D1');

                $sheet->setHeight(1,30);
                $sheet->row(1, function ($row) {
                    $row->setFontFamily('Calibri');
                    $row->setFontSize(15);
                });

                $sheet->cell('A3',"DATE");

                $sheet->cell('C3',"From");
                $sheet->cell('D3',$datefrom);
                $sheet->cell('C4',"To");
                $sheet->cell('D4',$dateto);

                $sheet->setHeight(3,20);
                $sheet->setHeight(4,20);

                $sheet->cell('A6',"No.");
                $sheet->cell('B6',"Defectives");

                $cols = array("C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV","AW","AX","AY","AZ","BA","AB","BB","BC","BD","BE","BF","BG","BH","BI","BJ","BK","BL","BM","BN","BO","BP");

                $lastColKey = '';
                $nextCol = '';

                $defect_data = DB::connection($this->mysql)
                                ->select(
                                    DB::raw(
                                        "CALL GetDefectSummary(
                                            '".$datefrom."',
                                            '".$dateto."',
                                            '".$req->po."',
                                            '".$req->family."',
                                            '".$req->ptype."',
                                            '".$req->series."',
                                            '".$req->device."')"
                                        )
                                );

                $defects = json_decode(json_encode($defect_data), true);

                $row = 7;
                $defect_names = [];

                foreach ($defects as $key => $df) {
                    $defect_names[$row] = $df['mod'];
                    $row++;
                }

                $rows = array_keys($defect_names);

                
                foreach ($fams as $famkey => $family) {
                    $sheet->cell($cols[$famkey].'6',$family);

                    $no = 1;
                    foreach ($defects as $key => $df) {
                        $sheet->cell('A'.$rows[$key],$no);
                        $sheet->cell('B'.$rows[$key],$defect_names[$rows[$key]]);
                        $sheet->cell($cols[$famkey].$rows[$key],($df[$family] == 0)? '0.00' : $df[$family]);
                        $sheet->setHeight($rows[$key],20);
                        $no++;
                    }

                    $lastColKey = $famkey;
                }

                $nextCol = $cols[$lastColKey+1];
                $sheet->cell($nextCol.'6','TOTAL');

                foreach ($defects as $key => $df) {
                    $sheet->cell($nextCol.$rows[$key], function($cell) use($df) {
                        $cell->setValue($df['TOTAL']);
                        $cell->setFont([
                            'bold'       =>  true,
                        ]);
                    });
                }


                $sheet->cells('A6:'.$nextCol.'6', function($cells) {
                    $cells->setFont([
                        'family'     => 'Calibri',
                        'size'       => '11',
                        'bold'       =>  true,
                    ]);
                    // Set all borders (top, right, bottom, left)
                    $cells->setBorder('solid', 'solid', 'solid', 'solid');
                });

                $sheet->setHeight(6, 20);
            });
        })->download('xls');
    }

    public function yieldsumRpt(Request $req)
    {
        $date_cond = '';
        $ptype_cond = '';
        $fams = [];

        if ($req->datefrom !== '') {
            $datefrom = $this->com->convertDate($req->datefrom,'Y-m-d');
            $dateto = $this->com->convertDate($req->dateto,'Y-m-d');

            $date_cond = " AND p.productiondate BETWEEN '".$datefrom."' AND '".$dateto."'";
        }

        if ($req->prodtype !== '') {
            $ptype_cond = " AND y.prodtype='".$req->prodtype."'";
        }

        $families = DB::connection($this->mysql)
                        ->select("select y.family
                                from tbl_yielding_performance as y
                                inner join tbl_yielding_pya as p
                                on y.pono = p.pono
                                where 1=1".$date_cond.
                                $ptype_cond."
                                group by y.family");

        if (count((array)$families) > 0) {
            Excel::create('Yield_Performance_Summary_Report', function($excel) use($req)
            {
                $excel->sheet('Sheet1', function($sheet) use($req)
                {

                    $date_cond = '';
                    $ptype_cond = '';
                    $fams = [];

                    if ($req->datefrom !== '') {
                        $datefrom = $this->com->convertDate($req->datefrom,'Y-m-d');
                        $dateto = $this->com->convertDate($req->dateto,'Y-m-d');

                        $date_cond = " AND p.productiondate BETWEEN '".$datefrom."' AND '".$dateto."'";
                    }

                    if ($req->prodtype !== '') {
                        $ptype_cond = " AND y.prodtype='".$req->prodtype."'";
                    }

                    $sheet->setAutoSize(true);
                    $sheet->setCellValue('A1', 'Yield Performance Summary per Family - '.$req->prodtype);
                    $sheet->mergeCells('A1:G1');

                    $sheet->setHeight(1,30);
                    $sheet->row(1, function ($row) {
                        $row->setFontFamily('Calibri');
                        $row->setFontSize(15);
                    });

                    $sheet->cell('A3',"DATE");

                    $sheet->cell('B3',"From");
                    $sheet->cell('C3',$datefrom);
                    $sheet->cell('B4',"To");
                    $sheet->cell('C4',$dateto);

                    $sheet->setHeight(3,20);
                    $sheet->setHeight(4,20);

                    $sheet->cell('A6',"Family");

                    $sheet->cell('A13', function($cell) {
                        $cell->setValue("Target Yield");
                        $cell->setFont([
                            'family'     => 'Calibri',
                            'size'       => '11',
                            'bold'       =>  true,
                        ]);
                        $cell->setBackground('#fff9ae');
                        $cell->setBorder('thin', 'thin', 'thin', 'thin');
                    });

                    $cols = ["B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV","AW","AX","AY","AZ","BA","AB","BB","BC","BD","BE","BF","BG","BH","BI","BJ","BK","BL","BM","BN","BO","BP"];

                    $lastColKey = 0;
                    $nextCol = '';

                    $families = DB::connection($this->mysql)
                                    ->select("select y.family
                                            from tbl_yielding_performance as y
                                            inner join tbl_yielding_pya as p
                                            on y.pono = p.pono
                                            where 1=1".$date_cond.
                                            $ptype_cond."
                                            group by y.family");


                    foreach ($families as $key => $fam) {
                        array_push($fams, $fam->family);
                    }

                    $data = DB::connection($this->mysql)
                                    ->select(
                                        DB::raw(
                                            "CALL GetYieldPerformanceSummary(
                                                '".$datefrom."',
                                                '".$dateto."',
                                                '".$req->prodtype."')"
                                            )
                                    );

                    $totals = json_decode(json_encode($data), true);

                    $row = 7;
                    $total_names = [];

                    foreach ($totals as $key => $tn) {
                        $total_names[$row] = $tn['Input'];
                        $row++;
                    }

                    $rows = array_keys($total_names);

                    
                    foreach ($fams as $famkey => $family) {
                        $sheet->cell($cols[$famkey].'6', function($cell) use($family) {
                            $cell->setValue($family);
                            $cell->setFont([
                                'family'     => 'Calibri',
                                'size'       => '11',
                                'bold'       =>  true,
                            ]);
                            $cell->setBorder('thin', 'thin', 'thin', 'thin');
                        });

                        foreach ($totals as $key => $tl) {
                            $sheet->cell('A'.$rows[$key], function($cell) use($total_names,$rows,$key){
                                $cell->setValue($total_names[$rows[$key]]);
                                $cell->setFont([
                                    'family'     => 'Calibri',
                                    'size'       => '11',
                                    'bold'       =>  true,
                                ]);
                                $cell->setBackground('#fff9ae');
                                $cell->setBorder('thin', 'thin', 'thin', 'thin');
                            });

                            if ($total_names[$rows[$key]] == 'Yield w/o MNG' || $total_names[$rows[$key]] == 'Total Yield(%)') {
                                $sheet->cell($cols[$famkey].$rows[$key], function($cell) use($tl,$rows,$key,$family){
                                    $cell->setValue(($tl[$family] == 0)? '0.00%' : number_format($tl[$family],2).'%');
                                    $cell->setBorder('thin', 'thin', 'thin', 'thin');
                                });
                                $sheet->setHeight($rows[$key],20);
                            } else {
                                $sheet->cell($cols[$famkey].$rows[$key], function($cell) use($tl,$rows,$key,$family){
                                    $cell->setValue(($tl[$family] == 0)? '0.00' : $tl[$family]);
                                    $cell->setBorder('thin', 'thin', 'thin', 'thin');
                                });
                                $sheet->setHeight($rows[$key],20);
                            }
                        }

                        $sheet->cell($cols[$famkey].'13', number_format($req->target_yield,2).'%');

                        $lastColKey = $famkey;
                    }

                    $nextCol = $cols[$lastColKey+1];

                    $sheet->cell($nextCol.'6','TOTAL');

                    foreach ($totals as $key => $tl) {
                        if ($total_names[$rows[$key]] == 'Yield w/o MNG' || $total_names[$rows[$key]] == 'Total Yield(%)') {

                            $sheet->cell($nextCol.$rows[$key], function($cell) use($tl) {
                                $cell->setValue(number_format($tl['TOTAL'],2) . '%');
                                $cell->setFont([
                                    'family'     => 'Calibri',
                                    'size'       => '11',
                                    'bold'       =>  true,
                                ]);
                                $cell->setBackground('#77ab59');
                                $cell->setBorder('thin', 'thin', 'thin', 'thin');
                            });
                        } else {
                            $sheet->cell($nextCol.$rows[$key], function($cell) use($tl) {
                                $cell->setValue($tl['TOTAL']);
                                $cell->setFont([
                                    'family'     => 'Calibri',
                                    'size'       => '11',
                                    'bold'       =>  true,
                                ]);
                                $cell->setBackground('#77ab59');
                                $cell->setBorder('thin', 'thin', 'thin', 'thin');
                            });
                        }
                    }
                    $sheet->cells('A6:'.$nextCol.'6', function($cells) {
                        $cells->setFont([
                            'family'     => 'Calibri',
                            'size'       => '11',
                            'bold'       =>  true,
                        ]);
                        $cells->setBackground('#63ace5');
                        $cells->setBorder('thin', 'thin', 'thin', 'thin');
                    });

                    $sheet->setHeight(6, 20);

                    $sheet->cells('A13:'.$nextCol.'13', function($cells) {
                        $cells->setFont([
                            'family'     => 'Calibri',
                            'size'       => '11',
                            'bold'       =>  true,
                        ]);
                        $cells->setFontColor('#940000');
                        $cells->setBorder('thin', 'thin', 'thin', 'thin');
                    });

                    $sheet->setHeight(13, 20);
                });
            })->download('xls');
        } else {
        }
    }

    public function yieldsumfamRpt(Request $request)
    {
        try
        { 
            $dt = Carbon::now();
            $date = substr($dt->format('Ymd'), 2);
            $path = public_path().'/Yielding_Performance_Data_Check/export';
            $datefrom = $this->com->convertDate($request->datefrom,'Y-m-d');
            $dateto = $this->com->convertDate($request->dateto,'Y-m-d');
            $yieldtarget = $request->yieldtarget;
            $chosen = $request->chosen;
            $ptype = $request->ptype;

            $check = DB::connection($this->mysql)->table("tbl_yielding_performance as y")
                        ->join('tbl_yielding_pya as p','y.pono','=','p.pono')
                        ->whereBetween('p.productiondate', [
                            $this->com->convertDate($datefrom,'Y-m-d'), 
                            $this->com->convertDate($dateto,'Y-m-d')
                        ])
                        ->where('y.prodtype',$ptype)
                        ->count();

            $check1 = DB::connection($this->mysql)->table("tbl_yielding_performance as y")
                        ->join('tbl_yielding_pya as p','y.pono','=','p.pono')
                        ->whereBetween('p.productiondate', [
                            $this->com->convertDate($datefrom,'Y-m-d'), 
                            $this->com->convertDate($dateto,'Y-m-d')
                        ])
                        ->count();

            $check2 = DB::connection($this->mysql)->table("tbl_yielding_performance as y")
                        ->join('tbl_yielding_pya as p','y.pono','=','p.pono')
                        ->join('tbl_targetregistration as r', function($join) {
                            $join->where('r.ptype','=','y.prodtype');
                            $join->where('p.productiondate','>=','r.datefrom');
                            $join->where('p.productiondate','<=','r.dateto');
                        })
                        ->whereBetween('p.productiondate', [
                            $this->com->convertDate($datefrom,'Y-m-d'), 
                            $this->com->convertDate($dateto,'Y-m-d')
                        ])
                        ->where('r.yield',$yieldtarget)
                        ->count();

            if ($check > 0 || $check1 > 0 || $check2) {
            
                Excel::create('Yield_Summary_Family_Report_'.$date, function($excel) use($request)
                {
                    $excel->sheet('Sheet1', function($sheet) use($request)
                    {
                        $sheet->setAutoSize(true);
                        $datefrom = $this->com->convertDate($request->datefrom,'Y-m-d');
                        $dateto = $this->com->convertDate($request->dateto,'Y-m-d');
                        $yieldtarget = $request->yieldtarget;
                        $chosen = $request->chosen;
                        $ptype = $request->ptype;


                        $Outdata = DB::connection($this->mysql)->table('tbl_targetregistration')
                                        ->select('dppm','yield')
                                        ->where('yield',$yieldtarget)
                                        ->get();

                        $tardppm = 0;
                        foreach ($Outdata as $key => $value) {
                            $tardppm = $value->dppm;
                        }
                    
                        $sheet->setCellValue('A1', 'Yield Target Summary Per Family - '. $ptype);
                        $sheet->mergeCells('A1:E1');
                        $sheet->cell('A3',"DATE");
                        $date = date("Y-m-d");
                        $sheet->cell('B3',$date);
                        $sheet->cell('E3',"Date Froms");
                        $sheet->cell('F3',$datefrom);
                        $sheet->cell('E4',"Date To");
                        $sheet->cell('F4',$dateto);
                        $sheet->cell('A6',"Yield Target");
                        $sheet->cell('B6',$yieldtarget);
                        $sheet->cell('A7',"DPPM Target");
                        $sheet->cell('B7',$tardppm);
                        $sheet->getStyle('B6:B7')->getAlignment()->applyFromArray(array('horizontal' => 'center'));
                        $sheet->cells('B6:B7', function($cells) {$cells->setFontWeight('bold'); }); 
                        $sheet->cell('A8',"Family");
                        $sheet->cell('A9',"Input");
                        $sheet->cell('A10',"Output");
                        $sheet->cell('A11',"Production NG");
                        $sheet->cell('A12',"Material NG");
                        $sheet->cell('A13',"Yield W/o MNG");
                        $sheet->cell('A14',"Total Yield (%)");
                        $sheet->cell('A15',"DPPM");
                        $sheet->setHeight(1,30);

                        $sheet->row(1, function ($row) {
                            $row->setFontFamily('Calibri');
                            $row->setBackground('##ADD8E6');
                            $row->setFontSize(15);
                            $row->setAlignment('left');
                        });

                        $sheet->setStyle(array(
                            'font' => array(
                                'name'      =>  'Calibri',
                                'size'      =>  10
                            )
                        ));

                        $row = 2;
                        $datefrom = $request->datefrom;
                        $dateto = $request->dateto;
                        $yieldtarget = $request->yieldtarget;
                        $Outdata = DB::connection($this->mysql)->table("tbl_yielding_performance as y")
                                    ->join('tbl_yielding_pya as p','y.pono','=','p.pono')
                                    ->select(
                                        DB::raw('y.family as family'),
                                        DB::raw("SUM(p.accumulatedoutput) as accumulatedoutput"),
                                        DB::raw('y.toutput as toutput'),
                                        DB::raw('y.ywomng as ywomng'),
                                        DB::raw('y.tpng as tpng')
                                    )
                                    ->groupBy('y.family')
                                    ->orderBy('y.family')
                                    ->whereBetween('p.productiondate', [$datefrom, $dateto])
                                    ->get();

                        $arrayLetter = array("C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV","AW","AX","AY","AZ","BA","AB","BB","BC","BD","BE","BF","BG","BH","BI","BJ","BK","BL","BM","BN","BO","BP");
                        $modOfFam = [];
                        $fff = 0;
                        foreach ($Outdata as $key => $val) {
                            $modOfFam[$fff] = $val->family;
                            $fff++;
                        }

                        $Start = "A8";
                        $aa = 8;
                        $end = $arrayLetter[$fff];
                        $sheet->cells("$Start:$end$aa", function($cells) {$cells->setFontWeight('bold'); });
                        $sheet->cells("$Start:$end$aa", function($cells) {$cells->setBackground('#3366FF'); });
                        $sheet->cells('A9:A15', function($cells) {$cells->setBackground('#FFFF00'); });
                        $sheet->cells('A9:A15', function($cells) {$cells->setFontWeight('bold'); });
                        $Fams = array_unique($modOfFam);
                        $newFams = array_values($Fams);
                        $countFam = count($Fams);

                        $defe = 7;
                        $lete = 0;
                        for($x=0;$x<$countFam;$x++)
                        {
                            $row = 8;
                            $sheet->cell($arrayLetter[$lete].$row, $newFams[$x]); //family row
                            $sheet->getStyle($arrayLetter[$lete].$row)->getAlignment()->applyFromArray(array('horizontal' => 'center')); 
                            $lete++; 
                        }//FOR FAMILY
                        $nine = 9;
                        $fift = 15;
                        $start = $arrayLetter[$lete].$nine;
                        $end = $arrayLetter[$lete].$fift;
                        $sheet->cells("$start:$end", function($cells) {$cells->setFontWeight('bold'); });
                        $sheet->cell($arrayLetter[$lete].$row, "TOTAL");
                        $TO = [];
                        $tpng = [];
                        $row = 9;
                        $lete = 0;
                        foreach ($Outdata as $key => $val) {
                            $sheet->cell($arrayLetter[$lete].$row,"0.0");
                            $sheet->cell($arrayLetter[$lete].$row, $val->toutput);
                            $sheet->getStyle($arrayLetter[$lete].$row)->getAlignment()->applyFromArray(array('horizontal' => 'center')); 
                            $tpng[$lete] = $val->tpng;
                            $TO[$lete] = $val->toutput;
                            $lete++; 
                        }
                        $ACO = [];
                        $row++;
                        $lete = 0;
                        foreach ($Outdata as $key => $val) {

                            $sheet->cell($arrayLetter[$lete].$row, $val->accumulatedoutput);
                            $sheet->getStyle($arrayLetter[$lete].$row)->getAlignment()->applyFromArray(array('horizontal' => 'center')); 
                            $ACO[$lete] = $val->accumulatedoutput;
                            $lete++; 
                        }
                        $row++;
                        //FOR PRODUCTIOM
                        $Outdatas = DB::connection($this->mysql)->table("tbl_yielding_performance as y")
                                    ->join('tbl_yielding_pya as p','y.pono','=','p.pono')
                                    ->select(
                                        DB::raw("COUNT(*) as classificationCount"),
                                        DB::raw('y.family as family')
                                    )
                                    ->groupBy('y.family')
                                    ->orderBy('y.family')
                                    ->whereBetween('p.productiondate', [$datefrom, $dateto])
                                    ->get();
                              // for($x=0;$x<$countFam;$x++)
                              // {
                              //   $sheet->cell($arrayLetter[$x].$row, '0.0');
                              //   $sheet->getStyle($arrayLetter[$x].$row)->getAlignment()->applyFromArray(array('horizontal' => 'center')); 
                              // }//zero filler
                        $lete = 0;
                            
                        foreach ($Outdatas as $key => $val) {
                           
                            if (in_array($val->family, $newFams)) {
                                $key = array_search($val->family, $newFams);
                                $sheet->cell($arrayLetter[$key].$row, $val->classificationCount);
                                $sheet->getStyle($arrayLetter[$key].$row)->getAlignment()->applyFromArray(array('horizontal' => 'center'));

                                $privateRow = $row + 4;
                                $png = $val->classificationCount;
                                $dppm = ($png/($TO[$lete]+$tpng[$lete]))*1000000;
                                $percent = (round((float)$dppm));
                                $sheet->cell($arrayLetter[$key].$privateRow, $percent);
                                $sheet->getStyle($arrayLetter[$key].$privateRow)->getAlignment()->applyFromArray(array('horizontal' => 'center')); 
                                $sheet->setColumnFormat(array(
                                    $arrayLetter[$key].$privateRow => '0%'
                                ));
                            }
                            
                            $lete++; 
                        }

                        $row++;
                       
                        //FOR MATERIALS
                        $Outdatas = DB::connection($this->mysql)->table("tbl_yielding_performance as y")
                                        ->join('tbl_yielding_pya as p','y.pono','=','p.pono')
                                        ->select(
                                            DB::raw("COUNT(*) as classificationCount"),
                                            DB::raw('y.family as family')
                                        )
                                        ->groupBy('y.family')
                                        ->orderBy('y.family')
                                        ->where('p.classification','like','%Material%')
                                        ->whereBetween('p.productiondate', [$datefrom, $dateto])
                                        ->get();
                        for($x=0;$x<$countFam;$x++) {
                            $sheet->cell($arrayLetter[$x].$row, '0.0');
                            $sheet->getStyle($arrayLetter[$x].$row)->getAlignment()->applyFromArray(array('horizontal' => 'center'));
                        } //zero filler
                        $lete = 0;
                        foreach ($Outdatas as $key => $val) {
                            if (in_array($val->family, $newFams)) {
                                $indexs = array_search($val->family, $newFams);
                                $sheet->cell($arrayLetter[$indexs].$row, $val->classificationCount);
                                $sheet->getStyle($arrayLetter[$indexs].$row)->getAlignment()->applyFromArray(array('horizontal' => 'center')); 
                            }
                           
                            $lete++; 
                        }
                        $row++;
                        //TOTAL yield percentage
                        
                        $outputrow = 10;
                        $PNGrow = 11;
                        for($x=0;$x<$countFam;$x++)
                        {
                          
                            $out = $arrayLetter[$x].$outputrow;
                            $png = $arrayLetter[$x].$PNGrow;
                            $sheet->setCellValue($arrayLetter[$x].$row, "=(($out/($out + $png)))");
                            $x1 = $x+1;
                            $sheet->setColumnFormat(array($arrayLetter[$x].$row => '0%'));
                            $sheet->getStyle($arrayLetter[$x].$row)->getAlignment()->applyFromArray(array('horizontal' => 'center')); 
                           
                        }
                        $row++;
                        //FOR TOTAL YIELD %
                        for($x=0;$x<$countFam;$x++)
                        {

                            $Ypercent = (($TO[$x] / $ACO[$x]) * 100);
                            $percent = (round((float)$Ypercent))/100;
                            $sheet->cell($arrayLetter[$x].$row,$percent);
                            $sheet->setColumnFormat(array(
                                $arrayLetter[$x].$row => '0%'
                            ));
                            $sheet->getStyle($arrayLetter[$x].$row)->getAlignment()->applyFromArray(array('horizontal' => 'center')); 
                        }
                        //TO TOTAL ALL
                        $row=9;
                        $last = $countFam-1;
                        $per = 13;

                        for($x=1;$x<=7;$x++)
                        {
                            $start = "B".$row;
                            $end = $arrayLetter[$last].$row;
                            $sheet->setCellValue($arrayLetter[$countFam].$row, "=SUM($start:$end)");
                            $sheet->getStyle($arrayLetter[$countFam].$row)->getAlignment()->applyFromArray(array('horizontal' => 'center'));
                            if ($per < 15) {
                                $sheet->setColumnFormat(array(
                                    $arrayLetter[$countFam].$per => '0%'
                                ));
                                $per++;
                            }
                            $row++;
                        }
                    });
                })->download('xls');
            } else {
                $e = 'No data found.';
                return redirect(url('/ReportYieldPerformance'))->with(['err_message' => $e]);
            }
        } catch (Exception $e) {
            return redirect(url('/ReportYieldPerformance'))->with(['err_message' => $e]);
        }
    }

    

    public function loadchart(Request $request)
    {
        $df = $request->datefroms;
        $dt = $request->datetos;
       // var_dump($fixeddf);
        $table = DB::connection($this->mysql)->table('tbl_yielding_performance as y')
                    ->join('tbl_yielding_pya as pya','pya.pono','=','y.pono')
                    ->select(
                        DB::raw('y.family as family'),
                        DB::raw("SUM(y.toutput) as toutput"),
                        DB::raw("SUM(pya.qty) as qty"))
                    ->groupBy('y.family')
                    ->orderBy('y.family')
                    ->whereBetween('pya.productiondate', [
                        $this->com->convertDate($df,'Y-m-d'),
                        $this->com->convertDate($dt,'Y-m-d')
                    ])
                    ->get();
       return $table;
    }

    public function devreg_get_series(Request $request)
    {
        $family = $request->family;
        $table = DB::connection($this->mysql)->table('tbl_seriesregistration')->select('series')->where('family',$family)->get();
        return $table;
    }

    public function getYieldTargetForReport(Request $req)
    {
        $data = [];

        $datefrom = $this->com->convertDate($req->date_from,'Y-m-d');
        $dateto = $this->com->convertDate($req->date_to,'Y-m-d');

        $target = DB::connection($this->mysql)
                    ->select("SELECT yield FROM tbl_targetregistration
                            where '".$datefrom."' between datefrom and dateto
                            and '".$dateto."' between datefrom and dateto
                            and ptype = '".$req->prod_type."'");
        if (count((array)$target) > 0) {
            $data = [
                'target_yield' => $target[0]->yield
            ];
        } else {
            $data = [
                'target_yield' => 0.00
            ];
        }

        return response()->json($data);
    }

}

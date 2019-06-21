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

class ReworkYieldPerformanceController extends Controller
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



	public function GetReworkYieldPerformance(){
		  if(!$this->com->getAccessRights(Config::get('constants.MODULE_CODE_NEWTRAN'), $userProgramAccess))
        {
            return redirect('/home');
        }
        else
        { 

        	$modefect = $this->com->getDropdownByName('Mode of Defect - Yield Performance');
        	$ys = $this->com->getDropdownByName('Yielding Station');

			return view('Yielding.ReworkYieldPerformance',['userProgramAccess' => $userProgramAccess,'modefect'=> $modefect,'yieldstation'=> $ys]);

		}

	}
    public function GetPoDetails(Request $req)
    {
        $podetails = '';
        $pya = '';
        $cmq = '';
        $save_details = DB::connection($this->mysql)
                            ->table('tbl_yielding_performance')
                            ->where('pono',$req->po)
                            ->select(
                                'id',
                                'pono',
                                'poqty',
                                'device',
                                'family',
                                'series',
                                'prodtype',
                                'classification',
                                'mod',
                                'qty',
                                'trework',
                                'tinput',
                                'toutput',
                                'treject',
                                'tmng',
                                'tpng',
                                'ywomng',
                                'twoyield',
                                'created_at',
                                'updated_at'
                            )->get();
        $effect ="2";
            $pya = DB::connection($this->mysql)->table('tbl_yielding_pya')
                        ->where('pono','=',$req->po)
                        ->select('id','yield_id','productiondate','yieldingstation','accumulatedoutput','classification','mod','qty','rework','remarks')
                        ->orderBY('productiondate','DESC')
                        ->get();

            $cmq = DB::connection($this->mysql)->table('tbl_yielding_cmq')
                        ->where('pono','=',$req->po)
                        ->select('id','pono','classification','mod','qty','remarks')
                        ->orderBY('productiondate','DESC')
                        ->get();
        
        // if ($effect !== "2"){
        $result = [            
            'effect' => $effect,
            'yield_data' => $save_details,
            'pya' => $pya,
            'cmq' => $cmq
        ];

     // }
       
        return $result;
    }


    //  public function ReworkyieldPerformanceUpdate(Request $req)
    // {
    //     if(isset($req->newyieldingstation)){

    //         $status = $req->status;
    //         $classification = $req->classification;
    //         $x = 0;
    //         if ($req->id !== '' || !empty($req->id)) {
    //             $updated = DB::connection($this->mysql)->table("tbl_yielding_performance")
    //                         ->where('id',$req->id)
    //                         ->update([
    //                             'pono' => $req->pono,
    //                             'poqty' => $req->poqty,
    //                             'device' => $req->device,
    //                             'family' => $req->family,
    //                             'series' => $req->series,
    //                             'prodtype' => $req->prodtype,
    //                             'tinput' => $req->tinput,
    //                             'toutput' => $req->toutput,
    //                             'treject' => $req->treject,
    //                             'tmng' => $req->tmng,
    //                             'tpng' => $req->tpng,
    //                             'ywomng' => $req->ywomng,
    //                             'twoyield' => $req->twoyield,
    //                             'updated_at' => date('Y-m-d h:i:s')
    //                         ]);

    //             DB::connection($this->mysql)->table('tbl_yielding_pya')
    //                 ->where('yield_id',$req->id)
    //                 ->delete();

    //             foreach ($req->newyieldingstation as $key => $rec) {
    //             	 DB::connection($this->mysql)->table('tbl_yielding_pya')
    //                             ->insert([
    //                                 'yield_id' => $req->id,
    //                                 'pono' => $req->pono,
    //                                 'productiondate' => $req->newproductiondate[$key],
    //                                 'yieldingstation' => $rec,
    //                                 'accumulatedoutput' => $req->newaccumulatedoutput[$key],
    //                                 'mod' => $req->newmod[$key],
    //                                 'classification' => $req->newclassification[$key],
    //                                 'qty' => $req->newqty[$key],
    //                                 'rework' =>$req->newrework[$key],
    //                                 'remarks' => $req->remarks[$key],
    //                                 'updated_at' => date('Y-m-d h:i:s')
    //                             ]);
    //             }

    //         }else {
    //             $inserted = DB::connection($this->mysql)->table("tbl_yielding_performance")
    //                             ->insert([
    //                                 'pono' => $req->pono,
    //                                 'poqty' => $req->poqty,
    //                                 'device' => $req->device,
    //                                 'family' => $req->family,
    //                                 'series' => $req->series,
    //                                 'prodtype' => $req->prodtype,
    //                                 'tinput' => $req->tinput,
    //                                 'toutput' => $req->toutput,
    //                                 'treject' => $req->treject,
    //                                 'tmng' => $req->tmng,
    //                                 'tpng' => $req->tpng,
    //                                 'ywomng' => $req->ywomng,
    //                                 'twoyield' => $req->twoyield,
    //                                 'created_at' => date('Y-m-d h:i:s'),
    //                                 'updated_at' => date('Y-m-d h:i:s')
    //                             ]);

    //             $last_insert = DB::connection($this->mysql)->table("tbl_yielding_performance")
    //                     ->select('id')
    //                     ->orderBy('id','desc')
    //                     ->first();

    //             foreach ($req->newmod as $key => $rec) {
    //                 DB::connection($this->mysql)->table('tbl_yielding_cmq')
    //                     ->insert([
    //                         'yield_id' => $id,
    //                         'pono' => $req->pono,
    //                         'productiondate' => $req->productiondate,
    //                         'mod' => $rec,
    //                         'classification' => $req->newclassification[$key],
    //                         'qty' => $req->newqty[$key],
    //                         'remarks' => $req->remarks[$key],
    //                         'created_at' => date('Y-m-d h:i:s'),
    //                         'updated_at' => date('Y-m-d h:i:s')
    //                     ]);
    //             }

    //             foreach ($req->newyieldingstation as $key => $rec) {
    //                 DB::connection($this->mysql)->table('tbl_yielding_pya')
    //                             ->insert([
    //                                 'yield_id' => $last_insert->id,
    //                                 'pono' => $req->pono,
    //                                 'productiondate' => $req->newproductiondate[$key],
    //                                 'yieldingstation' => $rec,
    //                                 'accumulatedoutput' => $req->newaccumulatedoutput[$key],
    //                                 'mod' => $req->newmod[$key],
    //                                 'classification' =>$req->newclassification[$key],
    //                                 'qty' => $req->newqty[$key],
    //                                 'remarks' => $req->remarks[$key],
    //                                 'created_at' => date('Y-m-d h:i:s'),
    //                                 'updated_at' => date('Y-m-d h:i:s')
    //                             ]);
    //             }
                    

    //         }
    //         return response()->json(['msg' => 'Successfully saved.','status' => 'success']);
    //     }
    //      return response()->json( ['msg' => "Insert some data on the table.",'status' => 'failed']);
    // } 


    // public function ReworkyieldPerformanceUpdate(Request $req)
    // {
    //     if(isset($req->newyieldingstation)){

    //         $status = $req->status;
    //         $classification = $req->classification;
    //         $x = 0;
    //         if ($req->id !== '' || !empty($req->id)) {
    //             $updated = DB::connection($this->mysql)->table("tbl_yielding_performance")
    //                         ->where('id',$req->id)
    //                         ->update([
    //                             'pono' => $req->pono,
    //                             'poqty' => $req->poqty,
    //                             'device' => $req->device,
    //                             'family' => $req->family,
    //                             'series' => $req->series,
    //                            'prodtype' => $req->prodtype,
    //                             'tinput' => $req->tinput,
    //                             'toutput' => $req->toutput,
    //                             'treject' => $req->treject,
    //                             'tmng' => $req->tmng,
    //                             'tpng' => $req->tpng,
    //                             'ywomng' => $req->ywomng,
    //                             'twoyield' => $req->twoyield,
    //                             'updated_at' => date('Y-m-d h:i:s')
    //                         ]);

    //             DB::connection($this->mysql)->table('tbl_yielding_pya')
    //                 ->where('yield_id',$req->id)
    //                 ->delete();
    //             foreach ($req->newyieldingstation as $key => $rec) {
    //                 DB::connection($this->mysql)->table('tbl_yielding_pya')
    //                             ->insert([
    //                                 'yield_id' => $req->id,
    //                                 'pono' => $req->pono,
    //                                 'productiondate' => $req->newproductiondate[$key],
    //                                 'yieldingstation' => $rec,
    //                                 'accumulatedoutput' => $req->newaccumulatedoutput[$key],
    //                                 'mod' => $req->newmod[$key],
    //                                 'classification' => $req->newclassification[$key],
    //                                 'qty' => $req->newqty[$key],
    //                                 'rework' =>$req->newrework[$key],
    //                                 'remarks' => $req->remarks[$key],
    //                                 'updated_at' => date('Y-m-d h:i:s')
    //                             ]);
    //             }
                    
    //         }
    //         return response()->json(['msg' => 'Successfully saved.','status' => 'success']);
    //     }
    //      return response()->json( ['msg' => "Insert some data on the table.",'status' => 'failed']);
    // } 


      public function ReworkyieldPerformanceUpdate(Request $req)

    {

        if(isset($req->newyieldingstation)){

            $status = $req->status;
            $classification = $req->classification;
            $x = 0;
            if ($req->id !== '' || !empty($req->id)) {
                $updated = DB::connection($this->mysql)->table("tbl_yielding_performance")
                            ->where('id',$req->id)
                            ->update([
                                'pono' => $req->pono,
                                'poqty' => $req->poqty,
                                'device' => $req->device,
                                'family' => $req->family,
                                'series' => $req->series,
                                'prodtype' => $req->prodtype,
                                'tinput' => $req->tinput,
                                'toutput' => $req->toutput,
                                'treject' => $req->treject,
                                'trework' => $req->trework,
                                'tmng' => $req->tmng,
                                'tpng' => $req->tpng,
                                'ywomng' => $req->ywomng,
                                'twoyield' => $req->twoyield,
                                'updated_at' => date('Y-m-d h:i:s')
                            ]);

                DB::connection($this->mysql)->table('tbl_yielding_pya')
                    ->where('yield_id',$req->id)
                    ->delete();

                foreach ($req->newyieldingstation as $key => $rec) {
                    DB::connection($this->mysql)->table('tbl_yielding_pya')
                                ->insert([
                                    'yield_id' => $req->id,
                                    'pono' => $req->pono,
                                    'productiondate' => $req->newproductiondate[$key],
                                    'yieldingstation' => $rec,
                                    'accumulatedoutput' => $req->newaccumulatedoutput[$key],
                                    'mod' => $req->newmod[$key],
                                    'classification' => $req->newclassification[$key],
                                    'qty' => $req->newqty[$key],
                                    'rework' =>$req->newrework[$key],
                                    'remarks' => $req->remarks[$key],
                                    'updated_at' => date('Y-m-d h:i:s')
                                ]);
                }

            }else {

                $inserted = DB::connection($this->mysql)->table("tbl_yielding_performance")
                                ->insert([
                                    'pono' => $req->pono,
                                    'poqty' => $req->poqty,
                                    'device' => $req->device,
                                    'family' => $req->family,
                                    'series' => $req->series,
                                    'prodtype' => $req->prodtype,
                                    'tinput' => $req->tinput,
                                    'toutput' => $req->toutput,
                                    'treject' => $req->treject,
                                    'tmng' => $req->tmng,
                                    'tpng' => $req->tpng,
                                    'ywomng' => $req->ywomng,
                                    'twoyield' => $req->twoyield,
                                    'created_at' => date('Y-m-d h:i:s'),
                                    'updated_at' => date('Y-m-d h:i:s')
                                ]);

                $last_insert = DB::connection($this->mysql)->table("tbl_yielding_performance")
                        ->select('id')
                        ->orderBy('id','desc')
                        ->first();

                // foreach ($req->newmod as $key => $rec) {
                //     DB::connection($this->mysql)->table('tbl_yielding_cmq')
                //         ->insert([
                //             'yield_id' => $id,
                //             'pono' => $req->pono,
                //             'productiondate' => $req->productiondate,
                //             'mod' => $rec,
                //             'classification' => $req->newclassification[$key],
                //             'qty' => $req->newqty[$key],
                //             'remarks' => $req->remarks[$key],
                //             'created_at' => date('Y-m-d h:i:s'),
                //             'updated_at' => date('Y-m-d h:i:s')
                //         ]);
                // }

                foreach ($req->newyieldingstation as $key => $rec) {
                    DB::connection($this->mysql)->table('tbl_yielding_pya')
                                ->insert([
                                    'yield_id' => $last_insert->id,
                                    'pono' => $req->pono,
                                    'productiondate' => $req->newproductiondate[$key],
                                    'yieldingstation' => $rec,
                                    'accumulatedoutput' => $req->newaccumulatedoutput[$key],
                                    'mod' => $req->newmod[$key],
                                    'classification' =>$req->newclassification[$key],
                                    'qty' => $req->newqty[$key],
                                    'remarks' => $req->remarks[$key],
                                    'created_at' => date('Y-m-d h:i:s'),
                                    'updated_at' => date('Y-m-d h:i:s')
                                ]);
                }
                    

            }
            return response()->json(['msg' => 'Update rework yield successfully!.','status' => 'success']);
        }
         return response()->json( ['msg' => "Insert some data on the table.",'status' => 'failed']);
    } 


       
}

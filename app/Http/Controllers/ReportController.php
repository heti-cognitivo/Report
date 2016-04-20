<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use JasperPHP\JasperPHP;
use App\Http\Controllers\Controller;
use DB;
use App\discovery;
use View;
use Input;


class ReportController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $empresas= DB::table('app_company')->get();
       $sucursales= DB::table('app_branch')->get();
       $iterator = new \RecursiveDirectoryIterator(base_path() . '/app/Reports/');
       $filter = new \RegexIterator($iterator->getChildren(), '/.(jasper)$/');
       $filelist = array();
       foreach($filter as $entry) {
            $filelist[] = substr($entry->getFilename(), 0, strpos($entry->getFilename(), "."));
          }
        return view('dashboard',compact('empresas','sucursales','filelist'));
    }
    public function show(Request $request){
      $data =  json_decode($request->filterdata,true);
      $parameters = array();
      $file = $data["file"];
      $jasperPHP = new JasperPHP;
      $jasper_params = $jasperPHP->list_parameters(
      base_path() . '/app/Reports/' . $file . ".jasper"
      )->execute();
      if(count($data["filters"])){
        foreach ($jasper_params as $parameter_description) {
          $param = preg_split('/\s+/',$parameter_description)[1];
          if(array_key_exists($param,$data["filters"]))
            $parameters[$param] = "'" . $data["filters"][$param] . "'";
          else
            $parameters[$param] = "";
        }
      }
      $database = \Config::get('database.connections.mysql');
      $output = base_path() . '/public/report/' . $file;
      $ext = "html";
      $jasperPHP->process(
          base_path() . '/app/Reports/' . $file . ".jasper",
          $output,
          array($ext),
          $parameters,
          $database,
          false,
          false
      )->execute();
      return url() . "/report/" . $file . "." . $ext;
    }
}

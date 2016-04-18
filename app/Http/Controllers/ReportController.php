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
        return view('discovery.testdiscovery',compact('empresas','sucursales','filelist'));
    }
    public function show(Request $request){
      $data =  json_decode($request->filterdata,true);
      $parameters = array();
      $file = $data["file"];
      \Session::regenerate(true);
      \Session::put('empresa',trim($data["filters"]["empresa"]));
      if(Session::has('empresa')){
        $jasperPHP = new JasperPHP;
        $jasper_params = $jasperPHP->list_parameters(
        base_path() . '/app/Reports/' . $file . ".jasper"
        )->execute();
        foreach ($jasper_params as $parameter_description) {
          $param = preg_split('/\s+/',$parameter_description)[1];
          $parameters[$param] = "'" . $data["filters"][$param] . "'";
        }
        $database = \Config::get('database.connections.mysql');
        $output = base_path() . '/app/Reports/' . $file;
        $ext = "pdf";
        $jasperPHP->process(
            base_path() . '/app/Reports/' . $file . ".jasper",
            $output,
            array($ext),
            $parameters,
            $database,
            false,
            false
        )->execute();
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename='.time(). $file . '.'.$ext);
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($output.'.'.$ext));
        flush();
        readfile($output.'.'.$ext);
        unlink($output.'.'.$ext); // deletes the temporary file
      }
    }
}

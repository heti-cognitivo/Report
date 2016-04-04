<?php

namespace App\Http\Controllers;


use App\Http\Requests;
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
       $filter = new \RegexIterator($iterator->getChildren(), '/.(xml|jasper)$/');
       $filelist = array();
       foreach($filter as $entry) {
            $filelist[] = substr($entry->getFilename(), 0, strpos($entry->getFilename(), "."));
          }
        return view('dashboard',compact('empresas','sucursales','filelist'));
    }
    public function show(){
      //$file = \Config::get('app.reports_path') . "/" . Input::get('file') . ".jasper";
      $file = base_path() . '/app/Reports/' . Input::get('file') . ".jasper";
      if(Session::has('empresa')){
        $jasperPHP = new JasperPHP;
        $database = \Config::get('database.connections.mysql');
        $output = base_path() . '/app/Reports/' . Input::get('file');
        $ext = "pdf";
        $result = $jasperPHP->process(
            $file,
            $output,
            array($ext),
            array("sucursal"=>Session::get('sucursal'),"empresa"=>Session::get('empresa'),"fecha_inicio"=>Session::get('fecha_inicio'),"fecha_fin"=>Session::get('fecha_fin')),
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

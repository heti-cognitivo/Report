<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JasperPHP\JasperPHP;
use DB;
use App\discovery;
use View;
use Input;

class DiscoveryController extends Controller
{
    public function discover_fields_query(){
      $query = "select * from sales_invoice s inner join sales_invoice_detail as sid on s.id_sales_invoice = sid.id_sales_invoice";
      $discovery = new discovery();
      $table_columns = $discovery->discover_fields_sql($query);
      return View::make('discovery.fields',compact('table_columns'));
    }
    public function get_discovery_data(){
      $table = Input::get('table');
      $column = Input::get('column');
      $data_array = array();
      $entry_array = array();
      $data = DB::select(DB::raw("SELECT ". $column ." from " . $table . ";"));
      foreach($data as $entry){
        $entry_array = json_decode(json_encode($entry), True);
        $data_array[] = $entry_array[$column];
      }
      return $data_array;
    }
    public function discover_fields_jasper(){
      $text = array('java.lang.String', 'java.lang.Byte[]');
      $datetime = array('java.sql.Date', 'java.sql.Timestamp');
      $file = Input::get('file');
      $jasperPHP = new JasperPHP;
      $parametros=array();
      $query = "";
      $output = $jasperPHP->list_parameters(
      base_path() . '/app/Reports/' . Input::get('file') . ".jasper"
      )->execute();
      if (file_exists(base_path() . '/app/Reports/' . Input::get('file') . ".jrxml")) {
        $xml = simplexml_load_file(base_path() . '/app/Reports/' . Input::get('file') . ".jrxml",
                                  'SimpleXMLElement', LIBXML_NOCDATA);
        $array = json_decode(json_encode($xml), TRUE);
        $query = $array["queryString"];
        if(strpos($query, '|7|') !== FALSE AND strpos($mystring, '|11|') !== FALSE)
        {
            // Found them
        }
        if()
      }

       $cont=0;
      foreach ($output as $parameter_description) {
      $parametros[$cont]= $parameter_description;
      $cont++;
      }
      // $vista= view('reportes.filtros')->with('parametros',$parametros)->render();
      // return Response()->json(['html'=>$vista]);
    }
  }

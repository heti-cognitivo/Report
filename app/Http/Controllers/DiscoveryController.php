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
      $parameter_explode=array();
      $query = "";
      $parameter_details = array();
      $output = $jasperPHP->list_parameters(
      base_path() . '/app/Reports/' . Input::get('file') . ".jasper"
      )->execute();
      if (file_exists(base_path() . '/app/Reports/' . Input::get('file') . ".jrxml")) {
        $xml = simplexml_load_file(base_path() . '/app/Reports/' . Input::get('file') . ".jrxml",
                                  'SimpleXMLElement', LIBXML_NOCDATA);
        $array = json_decode(json_encode($xml), TRUE);
        $query = $array["queryString"];
        foreach ($output as $parameter_description) {
          $parameter_explode = preg_split('/\s+/',$parameter_description);
          $parameter_details[$parameter_explode[1]]["type"] = $parameter_explode[2];
          $parameter_jasper = '\$P{' . $parameter_explode[1] . '}';
          $query_split = preg_split('/' . $parameter_jasper . '/',$query);
          if(count($query_split)>1){
            $table_col_name=explode(' ',$query_split[0]);
            $pos = count($table_col_name)-3;
            $parameter_details[$parameter_explode[1]]["tablecol"] = $table_col_name[$pos];
          }
          unset($parameter_explode);
          $parameter_explode = array();
        }

        var_dump($parameter_details);

      }


      // $vista= view('reportes.filtros')->with('parametros',$parametros)->render();
      // return Response()->json(['html'=>$vista]);
    }
  }

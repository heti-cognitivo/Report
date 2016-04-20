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
      $table_col_name = Input::get('table_col');
      $table = explode(".",$table_col_name)[0];
      $column = explode(".",$table_col_name)[1];
      $isref = false;
      $refdata = DB::select(DB::raw("SELECT referenced_table_name, referenced_column_name
                            FROM
                                information_schema.KEY_COLUMN_USAGE
                            WHERE
                                constraint_schema = SCHEMA()
                            AND
                                table_name = '" . $table . "'
                            AND
                                column_name = '" . $column . "'
                            AND
                                referenced_column_name IS NOT NULL"));

      while(count($refdata)){
        $column = $refdata[0]->referenced_column_name;
        $table = $refdata[0]->referenced_table_name;
        $refdata = DB::select(DB::raw("SELECT referenced_table_name, referenced_column_name
                              FROM
                                  information_schema.KEY_COLUMN_USAGE
                              WHERE
                                  constraint_schema = SCHEMA()
                              AND
                                  table_name = '" . $table . "'
                              AND
                                  column_name = '" . $column . "'
                              AND
                                  referenced_column_name IS NOT NULL"));
        $isref = true;
      }
      if($isref){
        $findnamecol = DB::select(
                      DB::raw("SELECT column_name FROM information_schema.columns WHERE table_name = '" . $table . "'"));
        foreach ($findnamecol as $col) {
          if($col->column_name == "name"){
            $column = "name";
            break;
          }
        }
      }
      $data_array = array();
      $entry_array = array();
      $data = DB::select(DB::raw("SELECT ". $column ." FROM " . $table . ";"));
      foreach($data as $entry){
        $entry_array = json_decode(json_encode($entry), True);
        $data_array[] = $entry_array[$column];
      }
      return $data_array;
    }
    public function discover_fields_jasper(){
      $text = array('JAVA.LANG.STRING', 'JAVA.LANG.BYTE[]');
      $datetime = array('JAVA.SQL.DATE', 'JAVA.SQL.TIMESTAMP');
      $file = Input::get('file');
      $jasperPHP = new JasperPHP;
      $parameter_explode=array();
      $query = "";
      $parameter_details = array();
      $type = "";
      $noparam = true;
      $output = $jasperPHP->list_parameters(
      base_path() . '/app/Reports/' . $file . ".jasper"
      )->execute();
      if (file_exists(base_path() . '/app/Reports/' . Input::get('file') . ".jrxml")) {
        $xml = simplexml_load_file(base_path() . '/app/Reports/' . Input::get('file') . ".jrxml",
                                  'SimpleXMLElement', LIBXML_NOCDATA);
        $array = json_decode(json_encode($xml), TRUE);
        $query = $array["queryString"];
        foreach ($output as $parameter_description) {
          $parameter_explode = preg_split('/\s+/',$parameter_description);
          if(in_array(strtoupper($parameter_explode[2]),$text)){
            $type = "TEXT";
          }
          elseif (in_array(strtoupper($parameter_explode[2]),$datetime)) {
            $type = "DATETIME";
          }
          else {
            $type = "NUMBER";
          }
          $parameter_details[$parameter_explode[1]]["type"] = $type;
          $parameter_jasper = '\$P{' . $parameter_explode[1] . '}';
          $query_split = preg_split('/' . $parameter_jasper . '/',$query);
          if(count($query_split)>1){
            $table_col_name=explode(' ',$query_split[0]);
            $pos = count($table_col_name)-3;
            $parameter_details[$parameter_explode[1]]["tablecol"] = $table_col_name[$pos];
            $noparam = false;
          }
          else{
            $parameter_details[$parameter_explode[1]]["tablecol"] = "";
            $noparam = true;
          }
          unset($parameter_explode);
          $parameter_explode = array();
          $type = "";
        }
      }
      if(!$noparam)
        return View::make('discovery.fields',compact('file','parameter_details'));
      else
        return "NOFILTERS";
    }
  }

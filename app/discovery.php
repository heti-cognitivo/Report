<?php
namespace App;
use DB;
use PHPSQLParser\PHPSQLParser;
class discovery
{
  public function discover_fields($query){
    $text = array('char', 'varchar', 'binary', 'varbinary', 'blob', 'text', 'enum','longtext');
    $numeric = array('int', 'smallint', 'decimal', 'numeric','float', 'real', 'double precision');
    $datetime = array('date', 'time', 'datetime', 'timestamp', 'year');
    $checkbox = array('tinyint');
    $table_columns = array();
    $parser = new PHPSQLParser();
    $parsed = $parser->parse($query);
    $tables = $parsed['FROM'];
    $db = \Config::get('database.connections.mysql');
    foreach($tables as $table){
      $columns = array();
      $query_get_fields = "select column_name,data_type from information_schema.columns
                          where table_schema = '".$db['database']."' and table_name='". $table['table'] ."'
                          and column_name not like '%id_%' order by ordinal_position";
      $columns = DB::select(DB::raw($query_get_fields));
      foreach($columns as $col){
        if(in_array($col->data_type,$text))
          $col->data_type = 'TEXT';
        elseif(in_array($col->data_type,$numeric))
          $col->data_type = 'NUMERIC';
        elseif(in_array($col->data_type,$datetime))
          $col->data_type = 'DATE';
        elseif(in_array($col->data_type,$checkbox))
          $col->data_type = 'CHECKBOX';
        else
          $col->data_type = 'NONE';
      }
      $table_columns[$table['table']] = $columns;
    }
    return $table_columns;
  }
}
?>

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

        return view('dashboard')->with('empresas',$empresas)->with('sucursales',$sucursales);
    }

    public function libro_diario()
    {
        if(Session::has('empresa')){
            $jasperPHP = new JasperPHP;

            $database = \Config::get('database.connections.mysql');
            $output = public_path()  . '/report/journal';
            $ext = "pdf";

            $jasperPHP->process(
                public_path()   . "/report/journal.jasper",
                $output,
                array($ext),
                array("sucursal"=>Session::get('sucursal'),"empresa"=>Session::get('empresa'),"fecha_inicio"=>Session::get('fecha_inicio'),'fecha_fin'=>Session::get('fecha_fin')),

                $database,
                false,
                false
            )->execute();

            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename='.time().'journal.'.$ext);
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($output.'.'.$ext));
            flush();
            readfile($output.'.'.$ext);
            unlink($output.'.'.$ext); // deletes the temporary file
        }



    }

    public function libro_mayor()
    {
        if(Session::has('empresa')){
            $jasperPHP = new JasperPHP;

            $database = \Config::get('database.connections.mysql');
            $output = public_path()  . '/report/libro_mayor';
            $ext = "pdf";

            $jasperPHP->process(
                public_path()   . "/report/libro_mayor.jasper",
                $output,
                array($ext),
                array("sucursal"=>Session::get('sucursal'),"empresa"=>Session::get('empresa'),"fecha_inicio"=>Session::get('fecha_inicio'),'fecha_fin'=>Session::get('fecha_fin')),

                $database,
                false,
                false
            )->execute();

            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename='.time().'libro_mayor.'.$ext);
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($output.'.'.$ext));
            flush();
            readfile($output.'.'.$ext);
            unlink($output.'.'.$ext); // deletes the temporary file
        }



    }

    public function plan_cuenta()
    {

            $jasperPHP = new JasperPHP;

            $database = \Config::get('database.connections.mysql');
            $output = public_path()  . '/report/PlanCuenta';
            $ext = "pdf";

            $jasperPHP->process(
                public_path()   . "/report/PlanCuenta.jasper",
                $output,
                array($ext),
                array(),

                $database,
                false,
                false
            )->execute();

            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename='.time().'PlanCuenta.'.$ext);
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($output.'.'.$ext));
            flush();
            readfile($output.'.'.$ext);
            unlink($output.'.'.$ext); // deletes the temporary file




    }

    public function libro_iva_compras()
    {
        if(Session::has('empresa')){
            $jasperPHP = new JasperPHP;

            $database = \Config::get('database.connections.mysql');
            $output = public_path()  . '/report/libro_iva_compras';
            $ext = "pdf";

            $result= $jasperPHP->process(
                public_path()   . "/report/libro_iva_compras.jasper",
                $output,
                array($ext),
                array("sucursal"=>Session::get('sucursal'),"empresa"=>Session::get('empresa'),"fecha_inicio"=>Session::get('fecha_inicio'),'fecha_fin'=>Session::get('fecha_fin')),
                $database,
                false,
                false
            )->execute();
            //dd($result);

            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename='.time().'libro_iva_compras.'.$ext);
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($output.'.'.$ext));
            flush();
            readfile($output.'.'.$ext);
            unlink($output.'.'.$ext); // deletes the temporary file
        }


    }
    public function libro_iva_ventas()
    {
        if(Session::has('empresa')){
            $jasperPHP = new JasperPHP;
            $database = \Config::get('database.connections.mysql');
            $output = public_path()  . '/report/libro_iva_ventas';
            $ext = "pdf";
            $result= $jasperPHP->process(
                public_path()   . "/report/libro_iva_ventas.jasper",
                $output,
                array($ext),
                array("sucursal"=>Session::get('sucursal'),"empresa"=>Session::get('empresa'),"fecha_inicio"=>Session::get('fecha_inicio'),'fecha_fin'=>Session::get('fecha_fin')),
                $database,
                false,
                false
            )->execute();
            //dd($result);

            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename='.time().'libro_iva_ventas.'.$ext);
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($output.'.'.$ext));
            flush();
            readfile($output.'.'.$ext);
            unlink($output.'.'.$ext); // deletes the temporary file
        }
      }
      public function discover_fields(){
        $query = "select * from sales_invoice s inner join sales_invoice_detail as sid on s.id_sales_invoice = sid.id_sales_invoice";
        $discovery = new discovery();
        $table_columns = $discovery->discover_fields($query);
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
}

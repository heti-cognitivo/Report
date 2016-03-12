<?php

namespace App\Http\Controllers;



use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use JasperPHP\JasperPHP;
use App\Http\Controllers\Controller;
use DB;


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
      public function discover_fields($query){
        $discovery = new discovery();
        $table_columns = $discovery->discover_fields($query);
        return view ('discovery.fields',compact('table_columns'));
      }

}

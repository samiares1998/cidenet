<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleados;
class EmpleadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function empleados()
    {
        $empleados = Empleados::orderBy('id','DESC')->paginate(10);
        return view('admin.empleados',["empleados"=>$empleados]);
    }
    public function add(Request $request)
    {
        $e = new Empleados;
        $e->primer_apellido = $request->primer_apellido;
        $e->segundo_apellido = $request->segundo_apellido;
        $e->primer_nombre = $request->primer_nombre;
        $e->otros_nombres = $request->otros;
        $e->pais_empleo = $request->pais;
        $e->tipo_identificacion = $request->identificacion;
        $e->numero_identificacion = $request->documento;
        $e->correo_electronico = $request->correo;
        $e->fecha_ingreso = $request->ingreso;
        $e->area = $request->area;
        $e->estado = $request->estado;
        $e->save();
        return redirect()->route('empleados');
    }
    public function generar($nombre,$apellido,$pais)
    {
 
        try{
            if($pais=="Colombia"){
                $pais="@cidenet.com.co";
            }else{
                $pais="@cidenet.com.us";
            }
            
            $correo=$nombre.".".$apellido."".$pais;
            $empleados = Empleados::all();
            $var=0;
            foreach ($empleados as $e) {
                if($e->correo_electronico==$correo){
                    $var++;
                    $correo=$nombre.".".$apellido.".".$var."".$pais;
                }    
            }
          
           
            $data = [
                "status" => "200",
                "respuestas" => $correo,
              
            ];
            return response()->json($data);
        }catch(\Exception $e){
            $data = [
                "status" => "500",
                "respuestas" => $e,
              
            ];
            return response()->json($data);
        }
    }
    public function delete($id){
        try{
            $e= Empleados::destroy($id);
            $data = [
                "status" => "200",
                "respuestas" => $e,
              
            ];
            return response()->json($data);
        }catch(\Exception $e){
            $data = [
                "status" => "500",
                "respuestas" => $e,
              
            ];
            return response()->json($data);
        }
        }

        public function edit(Request $request,$id)
        {
           // dd($request);
            $e = Empleados::find($id);
            $e->primer_apellido = $request->primer_apellido;
            $e->segundo_apellido = $request->segundo_apellido;
            $e->primer_nombre = $request->primer_nombre;
            $e->otros_nombres = $request->otros;
            $e->pais_empleo = $request->pais;
            $e->tipo_identificacion = $request->identificacion;
            $e->numero_identificacion = $request->documento;
            $e->correo_electronico = $request->correo;
            $e->fecha_ingreso = $request->ingreso;
            $e->area = $request->area;
            $e->estado = $request->estado;
            $e->save();
            return redirect()->route('empleados');
        }

}

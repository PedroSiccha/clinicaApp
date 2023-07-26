<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Genero;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $rol = $user->roles->implode('name', ',');
        $empleado = DB::SELECT('SELECT u.email, CONCAT(e.nombre, " ", e.apellido) AS nombre, e.dni, e.telefono 
                                 FROM users u, empleados e WHERE u.empleados_id = e.id');

        return view('usuario.index', compact('empleado', 'rol'));
    }

    public function create()
    {
        $roles = Rol::all()->pluck('name', 'id');
        $genero = Genero::all()->pluck('nombre', 'id');
        $tipoUsuario = DB::SELECT('SELECT * FROM tipoempleados WHERE estado = "Activo"');
        return view('usuario.create', compact('roles', 'genero', 'tipoUsuario'));
    }

    public function store(Request $request)
    {
        $empleados = new Empleado();
        $empleados->nombre = $request->get('nombre');
        $empleados->apellido = $request->get('apellido');
        $empleados->dni = $request->get('dni');
        $empleados->telefono = $request->get('telefono');
        $empleados->direccion = $request->get('direccion');
        $empleados->generos_id = $request->get('generos_id');
        $empleados->tipoempleados_id = $request->get('roles_id');
        if ($empleados->save()) {
            $empleados_id = DB::SELECT('SELECT MAX(id) AS id FROM empleados');
            $user = new User();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = bcrypt($request->get('password'));
            $user->empleados_id = $empleados_id[0]->id;
            if ($user->save()) {
                return redirect('\usuario');
            }
        }else{
            return back();
        }
    }

    public function show($id)
    {
        $empleado = DB::SELECT('SELECT u.name AS usuario, u.email AS correo, u.password AS contraseña, e.nombre, e.apellido, e.dni, e.telefono, e.direccion, g.nombre AS genero, te.nombre AS tipoempleado
                                 FROM users u, empleados e, tipoempleados te, generos g
                                 WHERE u.empleados_id = e.id AND e.tipoempleados_id = te.id AND e.generos_id = g.id AND u.id = "'.$id.'"');

        $citas = DB::SELECT('SELECT c.fecexp AS fecha, c.motivo, p.nombre, p.apellido, p.dni, p.telefono, p.direccion, p.lugarnac, p.lugarproc, p.correo, p.fecnac, p.edad, a.nombre AS nomAco, a.apellido AS apeAco, a.dni AS dniAco, a.telefono AS telAco, a.correo AS correoAco, a.direccion AS dirAco, a.fecnac AS fecNacAco, a.edad AS edadAco
                              FROM citas c, pacientes p, acompañantes a 
                              WHERE c.pacientes_id = p.id AND c.acompañantes_id = a.id AND users_id = "'.$id.'"');
                              
        $cantCita = DB::SELECT('SELECT COUNT(*) AS cantCita FROM citas c WHERE c.users_id = "'.$id.'"');
        
        $cantTriaje = DB::SELECT('SELECT COUNT(*) AS cantTriaje FROM triaje WHERE users_id = "'.$id.'"');
        
        $cantConsulta = DB::SELECT('SELECT COUNT(c.id) AS cantConsulta FROM consultas c, citas ci WHERE c.citas_id = ci.id AND ci.users_id = "'.$id.'"');

        return view('usuario.perfil', compact('empleado', 'citas', 'cantCita', 'cantTriaje', 'cantConsulta'));
    }
}

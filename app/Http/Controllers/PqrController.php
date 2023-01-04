<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Auth;
use App\Models\Pqr;
use App\Models\Adjunto;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Facades\Redirect;
use App\Mail\NotificacionNuevoPqr;
use App\Mail\NotificacionNuevoPqrCliente;
class PqrController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    // Knowledge Base
    public function index()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Inicio"], ['link' => "javascript:void(0)", 'name' => "Pqr"], ['name' => "Sistema de PQRs del PAE"]];
        return view('/content/pqrs/index', ['breadcrumbs' => $breadcrumbs]);
    }

    public function pqr($componente)
    {   

        $fecha = Carbon::now();
        $breadcrumbs = [['link' => "/", 'name' => "Inicio"], ['link' => "javascript:void(0)", 'name' => "Pqr"], ['name' => "Crea un PQR"]];
        return view('/content/pqrs/crear', ['breadcrumbs' => $breadcrumbs, 'componente' => $componente, 'fecha' => $fecha]);
    }

    public function crearPqr(Request $request)
    {

        $pqr = new Pqr();

        $pqr->asunto  = $request->asunto;
        $pqr->mensaje = $request->mensaje;
        $pqr->colegio_id = $request->colegio_id;
        $pqr->componente = $request->componente;
        $pqr->user_id = Auth::user()->id;
        $pqr->save();
   

       if($request->file)
       {
        $image_path = $request->file('adjunto')->store('adjunto', 'public');

        $formato = request()->file('adjunto')->getClientOriginalExtension();

        $data = Adjunto::create([
            'nombre' => $image_path, 
            'formato' => $formato,
            'pqr_id' => $pqr->id,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);


        $pqrs = Pqr::find($pqr->id);
        $pqrs->adjunto_id = $data->id;
        $pqrs->save();

       }

        $mailData = [
            'title' => 'Nuevo PQR generado',
            'body' => $pqr->mensaje,
            'envia' => Auth::user()->name,
            'correo' => Auth::user()->email,
        ];
         
        Mail::to('jeortegaga@gmail.com')->send(new NotificacionNuevoPqr($mailData));


        $mailData = [
            'title' => 'Nuevo PQR generado',
            'body' => $pqr->mensaje,
            'envia' => Auth::user()->name,
            'correo' => Auth::user()->email,
        ];
         
        Mail::to(Auth::user()->email)->send(new NotificacionNuevoPqrCliente($mailData));    

        return redirect::to('/');
    }

    public function solicitudes()
    {
        $pqrs = Pqr::where('user_id', Auth::user()->id)
                        ->join('institucions', 'pqrs.colegio_id','=','institucions.id')
                        ->select('pqrs.id as id','pqrs.created_at as created_at', 'pqrs.asunto as asunto', 'pqrs.componente as componente', 'institucions.nombre as colegio')
                        ->get();

        $breadcrumbs = [['link' => "/", 'name' => "Inicio"], ['link' => "javascript:void(0)", 'name' => "Pqr"], ['name' => "Solicitudes realizadas"]];
        return view('/content/pqrs/listadosCliente', ['breadcrumbs' => $breadcrumbs, 'pqrs' => $pqrs]);
    }

}

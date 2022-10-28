<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Incidencia;
use App\Models\Jugador;
use Dompdf\Dompdf;

class Incidencias extends Controller{

    function __construct(){
        $db = \Config\Database::connect();
        $this->data = $db->query("SELECT i.incidence_id,i.id_player,p.name,i.card_type,i.incidence_date,i.suspension_date,i.description,p.photo
         FROM incidence i 
         INNER JOIN player p ON (p.player_id = i.id_player)
          ORDER BY 1 DESC;");
    }

    public function demoPDF(){
        $inc = new Incidencia();
        $query1 = $this->data;
        $datos = $query1->getResultArray();

        $viewhtml =view('reportes/reporteIncidencia');
        $dompdf = new Dompdf();
        $dompdf-> loadHTML($viewhtml);
        $dompdf->setPaper('legal','landscape');
        $dompdf->render();
        $dompdf->stream();
        return view('goles/listarGoles');
    }


    public function index(){
        $inc = new Incidencia();
        $query1 = $this->data;
        $datos['inci'] = $query1->getResultArray();
        // $datos['inci'] = $inc->orderBy('incidence_id','ASC')->findAll();
        $datos['cabecera'] = view('template/cabecera');
        $datos['footer'] = view('template/footer');
        return view('incidencias/listartIncidencias',$datos);
    }


    public function crearInci(){

        $jugador = new Jugador();
        $inc = new Incidencia();
        $datos['inci'] = $inc->orderBy('incidence_id','ASC')->findAll();
        $datos['jugadores'] = $jugador->orderBy('player_id','ASC')->findAll();
        $datos['cabecera'] = view('template/cabecera');
        $datos['footer'] = view('template/footer');
        return view('incidencias/crearIncidencia',$datos);
    }

    public function guardarInci(){
        $inc = new Incidencia();

        // $validacion = $this->validate([
        //     'nombreEquipo'=>'required|min_length[3]',
        //     'imagenUniforme'=>[
        //         'uploaded[imagenUniforme]',
        //         'mime_in[imagenUniforme,image/jpg,image/jpeg,image/png]',
        //         'max_size[imagenUniforme,1024]',
        //     ]
        // ]);

        // if(!$validacion){

        //    $session = session();
        //    $session->setFlashdata('mensaje','Revise los datos'); 
        //    return redirect()->back()->withInput();
        // }

            $datos=[
                'id_player'=>$this->request->getVar('idJugador'),
                'card_type'=>$this->request->getVar('tarjeta'),
                'incidence_date'=>$this->request->getVar('fechaInc'),
                'suspension_date'=>$this->request->getVar('fechaSus'),
                'description'=>$this->request->getVar('descripcion'),
                // 'uniform_team'=>$nuevoNombre
            ];

            if($datos['suspension_date'] ==""){
                $datos['suspension_date'] ="No suspendido";
            };

            $inc->insert($datos);
            return $this->response->redirect(site_url('/listartIncidencias'));

        
       print_r($datos);
       var_dump($datos);
       echo 'ingresado correctamente,'. $datos; 
    }

    public function borrarInci($id = null){
        $inc = new Incidencia();
        $datosInci=$inc->where('incidence_id',$id)->first();
        // $ruta=('../public/uploads/'. $datosInci['uniform_team']);
        // unlink($ruta);

        $inc->where('incidence_id',$id)->delete($id);

        return $this->response->redirect(site_url('/listartIncidencias'));
    }

    public function editarInci($id=null){
        $jugador = new Jugador();
        $inc = new Incidencia();
        
        $datos['inci']=$inc->where('incidence_id',$id)->first();
        $datos['jugadores']=$jugador->orderBy('player_id','ASC')->findAll();
        
        $datos['cabecera'] = view('template/cabecera');
        $datos['footer'] = view('template/footer');
        return view('incidencias/editarIncidencia',$datos);

    }


    public function actualizarInci(){
        $inc = new Incidencia();
        
        $datos=[
            'id_player'=>$this->request->getVar('idJugador'),
            'card_type'=>$this->request->getVar('tarjeta'),
            'incidence_date'=>$this->request->getVar('fechaInc'),
            'suspension_date'=>$this->request->getVar('fechaSus'),
            'description'=>$this->request->getVar('descripcion'),
            // 'uniform_team'=>$nuevoNombre
        ];

        if($datos['suspension_date'] ==""){
            $datos['suspension_date'] ="No suspendido";
        };

        $id=$this->request->getVar('idInc');
        $inc->update($id,$datos);

        // print_r($datos);
        //     var_dump($datos);
        //     echo 'ingresado correctamente,'. $datos;
        return $this->response->redirect(site_url('/listartIncidencias'));

        
         
     
    }



}
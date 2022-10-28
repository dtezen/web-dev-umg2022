<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Jugador;
use App\Models\Equipo;
use Dompdf\Dompdf;

class Jugadores extends Controller{

    function __construct(){
        $db = \Config\Database::connect();
        $this->data = $db->query("SELECT p.player_id,p.name,p.surname,p.address,p.telphone,p.photo,
                                  e.team_id,e.team_name AS team_name,p.born_date
                                FROM `player` p
                                INNER JOIN equipo e ON (e.team_id = p.team_id)
                                ORDER BY 1 ASC;");
    }

    public function demoPDF(){
        $jugador = new Jugador(); 
        $query1 = $this->data;
        $datos = $query1->getResultArray();
        $viewhtml =view('reportes/reporteJugador');
        $dompdf = new Dompdf();
        $dompdf-> loadHTML($viewhtml);
        $dompdf->setPaper('legal','landscape');
        $dompdf->render();
        $dompdf->stream();
        return view('jugadores/listarJugadores');
    }

    public function index(){
        $jugador = new Jugador();   
        $query1 = $this->data;
        $datos['jugadores'] = $query1->getResultArray();     
        // $datos['jugadores'] = $jugador->orderBy('player_id','ASC')->findAll();
        $datos['cabecera'] = view('template/cabecera');
        $datos['footer'] = view('template/footer');
        return view('jugadores/listarJugadores',$datos);
    }

    public function crearJugador(){
        $equipo = new Equipo();
        $datos['equipos'] = $equipo->orderBy('team_id','ASC')->findAll();
        $datos['cabecera'] = view('template/cabecera');
        $datos['footer'] = view('template/footer');
        return view('jugadores/crearJugador',$datos);
    }

    public function guardarJugador(){
        $jugador = new Jugador();

        $validacion = $this->validate([
            'nombreJugador'=>'required|min_length[3]',
            'apellidoJugador'=>'required|min_length[3]',
            'telefono'=>'required',
            'idEquipo'=>'required',
            'fechaNac'=>'required',
            'foto'=>[
                'uploaded[foto]',
                'mime_in[foto,image/jpg,image/jpeg,image/png]',
                'max_size[foto,1024]',
            ]
        ]);

        if(!$validacion){

           $session = session();
           $session->setFlashdata('mensaje','Nombre,Apellido,telefono,equipo y fecha son necesarios ,Revise los datos'); 
           return redirect()->back()->withInput();
        }

     

       if($imagenJugador=$this->request->getFile('foto')){
            $nuevoNombre = $imagenJugador->getRandomName();
            $imagenJugador->move('../public/uploads/',$nuevoNombre);
            $datos=[
                'name'=>$this->request->getVar('nombreJugador'),
                'surname'=>$this->request->getVar('apellidoJugador'),
                'address'=>$this->request->getVar('direccion'),
                'telphone'=>$this->request->getVar('telefono'),
                'born_date'=>$this->request->getVar('fechaNac'),
                'team_id'=>$this->request->getVar('idEquipo'),
                'photo'=>$nuevoNombre
            ];

            $jugador->insert($datos);
            return $this->response->redirect(site_url('/listarJugador'));
           
       }

       print_r($team_name);
       print_r($datos);
       var_dump($datos);
       echo 'ingresado correctamente,'. $datos; 
    }


    public function borrarJugador($id=null){
        $jugador = new Jugador();
        $datosJugador=$jugador->where('player_id',$id)->first();
        $ruta=('../public/uploads/'. $datosJugador['photo']);
        unlink($ruta);

        $jugador->where('player_id',$id)->delete($id);

        return $this->response->redirect(site_url('/listarJugador'));
    }

    public function editarJugador($id=null){
        $jugador = new Jugador();
        $equipo = new Equipo();
        $datos['equipos'] = $equipo->orderBy('team_id','ASC')->findAll();
        $datos['jugador']=$jugador->where('player_id',$id)->first();

        $datos['cabecera'] = view('template/cabecera');
        $datos['footer'] = view('template/footer');
        return view('jugadores/editarJugador',$datos);
    }


    public function actualizarJugador(){
        $jugador = new Jugador();
        
         $datos=[
                'name'=>$this->request->getVar('nombreJugador'),
                'surname'=>$this->request->getVar('apellidoJugador'),
                'address'=>$this->request->getVar('direccion'),
                'telphone'=>$this->request->getVar('telefono'),
                'born_date'=>$this->request->getVar('fechaNac'),
                'team_id'=>$this->request->getVar('idEquipo')
                
            ];
        $id=$this->request->getVar('idEditar');
        $jugador->update($id,$datos);

        $validacion = $this->validate([
            'foto'=>[
                'uploaded[foto]',
                'mime_in[foto,image/jpg,image/jpeg,image/png]',
                'max_size[foto,1024]',
            ]
        ]);

        if($validacion){
            if($foto=$this->request->getFile('foto')){

                $datosLibro = $jugador->where('player_id',$id)->first();

                $ruta=('../public/uploads/'. $datosJugador['photo']);
                // unlink($ruta);

                $nuevoNombre = $foto->getRandomName();
                $foto->move('../public/uploads/',$nuevoNombre);
                $datos=[
                    'photo'=>$nuevoNombre
                ];
    
                $jugador->update($id,$datos);
                // return $this->response->redirect(site_url('/listar'));
               
           }
        }

        return $this->response->redirect(site_url('/listarJugador'));

    
        // print_r($datos);
        // var_dump($datos);
        // echo 'ingresado correctamente,'. $datos; 
     
    }


}
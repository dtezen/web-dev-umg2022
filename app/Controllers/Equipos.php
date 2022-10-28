<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Equipo;
class Equipos extends Controller{
    



    public function index(){
        $equipo = new Equipo();
        
        $datos['equipos'] = $equipo->orderBy('team_id','ASC')->findAll();
        $datos['cabecera'] = view('template/cabecera');
        $datos['footer'] = view('template/footer');
        return view('equipos/listarEquipos',$datos);
       
        
    }

    public function crearEquipos(){
     
        $datos['cabecera'] = view('template/cabecera');
        $datos['footer'] = view('template/footer');
        return view('equipos/crearEquipo',$datos);
        
    }

    public function guardar(){
        $equipo = new Equipo();

        $validacion = $this->validate([
            'nombreEquipo'=>'required|min_length[3]',
            'nombreEntrenador'=>'required|min_length[3]',
            'entrenadorAux'=>'required|min_length[3]',
            'numJugadores'=>'required|min_length[1]',
            'imagenUniforme'=>[
                'uploaded[imagenUniforme]',
                'mime_in[imagenUniforme,image/jpg,image/jpeg,image/png]',
                'max_size[imagenUniforme,1024]',
            ]
        ]);

        if(!$validacion){

           $session = session();
           $session->setFlashdata('mensaje','Nombre,Entrenador,Entrnador Aux y Numero de juagdores son requeridos , favor revisar'); 
           return redirect()->back()->withInput();
        }

     

       if($imagenUniforme=$this->request->getFile('imagenUniforme')){
            $nuevoNombre = $imagenUniforme->getRandomName();
            $imagenUniforme->move('../public/uploads/',$nuevoNombre);
            $datos=[
                'team_name'=>$this->request->getVar('nombreEquipo'),
                'team_coach'=>$this->request->getVar('nombreEntrenador'),
                'address'=>$this->request->getVar('direccion'),
                'auxiliary_coach'=>$this->request->getVar('entrenadorAux'),
                'number_of_players'=>$this->request->getVar('numJugadores'),
                'uniform_team'=>$nuevoNombre
            ];

            $equipo->insert($datos);
            return $this->response->redirect(site_url('/listar'));
           
       }

       print_r($team_name);
       print_r($datos);
       var_dump($datos);
       echo 'ingresado correctamente,'. $datos; 
    }


    public function borrarEquipos($id = null){
        $equipo = new Equipo();
        $datosEquipo=$equipo->where('team_id',$id)->first();
        $ruta=('../public/uploads/'. $datosEquipo['uniform_team']);
        unlink($ruta);

        $equipo->where('team_id',$id)->delete($id);

        return $this->response->redirect(site_url('/listar'));
    }

    public function editarEquipos($id=null){

        $equipo = new Equipo();
        $datos['equipo']=$equipo->where('team_id',$id)->first();

        $datos['cabecera'] = view('template/cabecera');
        $datos['footer'] = view('template/footer');
        return view('equipos/editarEquipo',$datos);

    }

    public function actualizarEquipo(){
        
        $equipo = new Equipo();
        $datos=[
            'team_name'=>$this->request->getVar('nombreEquipo'),
            'team_coach'=>$this->request->getVar('nombreEntrenador'),
            'address'=>$this->request->getVar('direccion'),
            'auxiliary_coach'=>$this->request->getVar('entrenadorAux'),
            'number_of_players'=>$this->request->getVar('numJugadores'),
        ];
        $id=$this->request->getVar('id');
        $equipo->update($id,$datos);

        $validacion = $this->validate([
            'imagenUniforme'=>[
                'uploaded[imagenUniforme]',
                'mime_in[imagenUniforme,image/jpg,image/jpeg,image/png]',
                'max_size[imagenUniforme,1024]',
            ]
        ]);

        if($validacion){
            if($imagenUniforme=$this->request->getFile('imagenUniforme')){

                $datosLibro = $equipo->where('team_id',$id)->first();

                $ruta=('../public/uploads/'. $datosEquipo['uniform_team']);
                // unlink($ruta);

                $nuevoNombre = $imagenUniforme->getRandomName();
                $imagenUniforme->move('../public/uploads/',$nuevoNombre);
                $datos=[
                    'uniform_team'=>$nuevoNombre
                ];
    
                $equipo->update($id,$datos);
                // return $this->response->redirect(site_url('/listar'));
               
           }
        }

        return $this->response->redirect(site_url('/listar'));
    }

}
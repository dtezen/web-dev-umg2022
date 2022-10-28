<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Gol;
use App\Models\Jugador;
use Dompdf\Dompdf;

class Goles extends Controller{
   
    function __construct(){
        $db = \Config\Database::connect();
        $this->data = $db->query("SELECT g.id_goal,g.player_id,p.name,g.goals_number,g.date_goal,p.photo 
        FROM `goal_score` g
        INNER JOIN player p ON (p.player_id = g.player_id)
        ORDER BY goals_number DESC;");
        
    }

    public function demoPDF(){
        $gol = new Gol();
        $query1 = $this->data;
        $datos = $query1->getResultArray();

        $viewhtml =view('reportes/reportePrueba');
        $dompdf = new Dompdf();
        $dompdf-> loadHTML($viewhtml);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();
        $dompdf->stream();
        return view('goles/listarGoles');
    }


    public function index(){
        $gol = new Gol();
        $query1 = $this->data;
        $datos['goles'] = $query1->getResultArray();
        // $datos['goles'] = $gol->orderBy('id_goal','ASC')->findAll();
        $datos['cabecera'] = view('template/cabecera');
        $datos['footer'] = view('template/footer');
        return view('goles/listarGoles',$datos);
    }

    public function crearGol(){
        $jugador = new Jugador();
        $datos['jugadores'] = $jugador->orderBy('player_id','ASC')->findAll();
        $datos['cabecera'] = view('template/cabecera');
        $datos['footer'] = view('template/footer');
        return view('goles/crearGol',$datos);
    }

    public function guardarGol(){
        $gol = new Gol();

        $validacion = $this->validate([
            'cantGoles'=>'required|min_length[1]',
            'fechaNac'=>'required'
            // 'idJugador'=>'required',
            // 'imagenUniforme'=>[
            //     'uploaded[imagenUniforme]',
            //     'mime_in[imagenUniforme,image/jpg,image/jpeg,image/png]',
            //     'max_size[imagenUniforme,1024]',
            // ]
        ]);

        if(!$validacion){

           $session = session();
           $session->setFlashdata('La fecha es requerida y debe agregar almenos un gol'); 
           return redirect()->back()->withInput();
        }

            $datos=[
                'player_id'=>$this->request->getVar('idJugador'),
                'goals_number'=>$this->request->getVar('cantGoles'),
                'date_goal'=>$this->request->getVar('fechaNac')
                // 'uniform_team'=>$nuevoNombre
            ];

            $gol->insert($datos);
            return $this->response->redirect(site_url('/listarGoles'));
    }

    public function borrarGol($id = null){
        $gol = new Gol();
        $datosJugador=$gol->where('id_goal',$id)->first();
        // $ruta=('../public/uploads/'. $datosJugador['uniform_team']);
        // unlink($ruta);

        $gol->where('id_goal',$id)->delete($id);

        return $this->response->redirect(site_url('/listarGoles'));
    }

    public function editarGol($id=null){
        $jugador = new Jugador();
        $gol = new Gol();
        
        $datos['goles']=$gol->where('id_goal',$id)->first();
        $datos['jugadores']=$jugador->orderBy('player_id','ASC')->findAll();
        
        $datos['cabecera'] = view('template/cabecera');
        $datos['footer'] = view('template/footer');
        return view('goles/editarGol',$datos);

    }


    public function actualizarGol(){
        $gol = new Gol();
        
        $datos=[
            'player_id'=>$this->request->getVar('idJugador'),
            'goals_number'=>$this->request->getVar('cantGoles'),
            'date_goal'=>$this->request->getVar('fechaNac')
            
        ];
        $id=$this->request->getVar('idEditarGol');
        $gol->update($id,$datos);

        return $this->response->redirect(site_url('/listarGoles'));

        
            // print_r($datos);
            // var_dump($datos);
            // echo 'ingresado correctamente,'. $datos; 
     
    }

}
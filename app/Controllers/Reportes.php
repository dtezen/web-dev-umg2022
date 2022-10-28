<?php 
namespace App\Controllers;
// require FCPATH.'vendor/autoload.php';
use CodeIgniter\Controller;

class Reportes extends Controller{

     function index(){

        // $html=view('reportes/reportePrueba');
        // $this->m_pdf->pdf->WriteHTML($html);


        // $html = view('reportes/reportePrueba');
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>Hola mundo</h1>');
        $mpdf->Output();

    }

}
<?php 
namespace App\Models;

use CodeIgniter\Model;

class Equipo extends Model{
    protected $table      = 'equipo';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'team_id';
    protected $allowedFields = ['team_name','team_coach','address','category','incription_date','auxiliary_coach','uniform_team','number_of_players'];
    

    public function rowCountPagos($table){ 
        $query = 'SELECT * 
            FROM '.$table.' 
            ORDER BY 1 DESC';
        $resultados = $this->db->query($query);
        return $resultados->result();
        print_r($resultados);
    }
}
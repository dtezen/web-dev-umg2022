<?php 
namespace App\Models;

use CodeIgniter\Model;
class Incidencia extends Model{
    protected $table      = 'incidence';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'incidence_id';
    protected $allowedFields = ['id_player','card_type','incidence_date','suspension_date','description'];
}
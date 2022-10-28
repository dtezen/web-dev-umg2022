<?php 
namespace App\Models;

use CodeIgniter\Model;

class Gol extends Model{
    protected $table      = 'goal_score';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_goal';
    protected $allowedFields = ['player_id','goals_number','date_goal'];

}
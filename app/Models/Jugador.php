<?php 
namespace App\Models;

use CodeIgniter\Model;

class Jugador extends Model{
    protected $table      = 'player';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'player_id';
    protected $allowedFields = ['name','surname','address','address','telphone','photo','team_id','born_date'];

    

}
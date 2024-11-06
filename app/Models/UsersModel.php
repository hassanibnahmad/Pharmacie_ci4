<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    Protected $table = 'users';
    Protected $primaryKey = 'id';
    Protected $allowedFields = ['nom', 'email', 'mot_de_passe', 'role', 'cle_enregistrement'];// Les champs autorisés à être insérés dans la base de données
    
}
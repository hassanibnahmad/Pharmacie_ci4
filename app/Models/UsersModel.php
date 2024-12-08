<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    Protected $table = 'users';
    Protected $primaryKey = 'id';
    Protected $allowedFields = ['nom', 'email', 'mot_de_passe', 'role', 'cle_enregistrement', 
                                'reset_token', 'token_expiration','updated_at'];
    
}
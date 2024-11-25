<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    Protected $table = 'users';
    Protected $primaryKey = 'id';
    Protected $allowedFields = ['nom', 'email', 'mot_de_passe', 'role', 'cle_enregistrement', 
                                'reset_token', 'token_expiration','updated_at'];
    
    public function verifyEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function updated_at($id)
    {
        $this->set('updated_at', date('Y-m-d H:i:s')); // Set updated_at field to the current date and time
        $this->where('id', $id); // Find the user with the given id
        $this->update(); // Update the user
        if( $this->affectedRows() == 1 ) // If the user was updated successfully
        {
            return true;
        }else
        {
            return false;
        }
    } // updated_at method updates the updated_at field of the user with the given id to the current date and time
}
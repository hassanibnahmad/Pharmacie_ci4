<?php

namespace App\Models;

use CodeIgniter\Model;

class MedicamentsModel extends Model
{
    Protected $table = 'medicament';
    Protected $primaryKey = 'id';
    Protected $allowedFields = ['ref', 'prix', 'quantite', 'date', 'categorie', 'description'];
    
}
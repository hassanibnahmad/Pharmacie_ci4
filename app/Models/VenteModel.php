<?php
namespace App\Models;
use CodeIgniter\Model;

class VenteModel extends Model
{
    protected $table = 'ventes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['medicament_id', 'quantite', 'created_at', 'montant_total', 'prix_med', 'ref', 'email', 'user_id'];


public function getVentes($user_email) {
    $user = $this->db->table('users')
    ->where('email', $user_email)
    ->get()->getRow();    
    // get() retourne un objet unique, getRow() retourne un tableau associatif 

    // Récupérer toutes les ventes pour cet utilisateur, en utilisant l'ID de l'utilisateur
    $query = $this->db->table('ventes')
        ->select('ventes.id, ventes.quantite, ventes.created_at, ventes.montant_total, ventes.prix_med, ventes.email, ventes.user_id, medicament.ref, medicament.prix')
        ->where('ventes.user_id', $user->id) // Filtrer par user_id de l'utilisateur
        ->join('medicament', 'medicament.id = ventes.medicament_id') // Jointure avec la table medicament
        ->orderBy('ventes.id', 'DESC'); // Trier par date décroissante

    return $query->get()->getResultArray(); // Retourner les résultats sous forme de tableau
}

}
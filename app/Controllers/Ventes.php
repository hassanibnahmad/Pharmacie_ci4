<?php
namespace App\Controllers;

use App\Models\MedicamentsModel;
use App\Models\VenteModel;
use App\Models\UsersModel;
use Dompdf\Dompdf;
use Dompdf\Options;
use APP\Helpers\pdf_helper;
use Mpdf\Mpdf;


class Ventes extends BaseController {
    public function index() {
        $medicamentsModel = new MedicamentsModel();
        $medicaments = [
            'medicaments' => $medicamentsModel->findAll(),
        ];

        return view('ventes/createVente', $medicaments);
    }
 
    public function create_vente() {
        $medicamentsModel = new MedicamentsModel();
        $venteModel = new VenteModel();
        $usersModel = new UsersModel();
    
        $medicamentId = $this->request->getPost('medicament_id');
        $quantite = $this->request->getPost('quantite');
        $user_email = session()->get('email');
        $user_id = session()->get('id');
        
        if (!$user_email || !$user_id) {
            return redirect()->back()->with('error', 'Vous devez être connecté pour effectuer une vente');
        }

        $medicament = $medicamentsModel->find($medicamentId); 
        
        if ($medicament) {
            $prix_med = $medicament['prix'];
            if ($medicament['quantite'] < $quantite) {
                return redirect()->back()->with('error', 'La quantité de ce médicament est insuffisante');
            } else {
                $venteModel->save([
                    'medicament_id' => $medicamentId,
                    'ref' => $medicament['ref'],
                    'quantite' => $quantite,
                    'created_at' => date('Y-m-d'), // date vente 
                    'prix_med' => $prix_med, 
                    'montant_total' => $prix_med * $quantite,
                    'email' => $user_email, // email de l'utilisateur connecté 
                    'user_id' => $user_id, // id de l'utilisateur connecté
                ]);
                // Mettre à jour la quantité de médicament
                $medicamentsModel->update($medicamentId, [
                    'quantite' => $medicament['quantite'] - $quantite,
                ]);
            
                return redirect()->back()->with('success', 'Vente effectuée avec succès');
            }
        } else {
            return redirect()->back()->with('error', 'Médicament introuvable');
        }
    }
    
    public function list_ventes() {
        $venteModel = new VenteModel();
    
        $user_email = session()->get('email');
    
        if (!$user_email) {
            return redirect()->to('/dashboard');  
        }
    
        $ventes = $venteModel->getVentes($user_email);
    
        return view('ventes/listVentes', [
            'ventes' => $ventes,
        ]);
    }


public function telecharger_recue($id)
{
    $venteModel = new VenteModel();
    $ventes = $venteModel->where('id', $id)->findAll();

    $data = [
        'ventes' => $ventes,
    ];

    $htmlContent = view('ventes/recuePDF', $data);

    $dompdf = new Dompdf();
    
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true); // Active le support HTML5
    $options->set('isRemoteEnabled', true); // Permet le chargement des ressources distantes
    
    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($htmlContent);
    // $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    
    ob_end_clean(); // Supprimer les en-têtes précédents

    // Définir les en-têtes pour le téléchargement
    return $this->response
                ->setHeader('Content-Type', 'application/pdf')// type de fichier 
                ->setHeader('Content-Disposition', 'attachment; filename="recu_'.$id.'.pdf"')// nom du fichier
                ->setBody($dompdf->output());// contenu du fichier
}
}

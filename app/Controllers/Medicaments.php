<?php
namespace App\Controllers\Medicaments;
namespace App\Controllers;
use CodeIgniter\Controller;
// use App\Models\Medicament;

class Medicaments extends Controller
{
    public function index()
    {
        return view('Medicaments/Createmedicament');
        // return view('dashboard');
    }
    public function create()
    {
        // return view('Medicaments/medicaments');
        // return view('Medicaments/Createmedicament');
        $ref = $this->request->getPost('ref');
        $prix = $this->request->getPost('prix');
        $quantite = $this->request->getPost('quantite');
        $date = $this->request->getPost('date');
        $categorie = $this->request->getPost('categorie');
        $description = $this->request->getPost('description');
        $data = [
            'ref' => $ref,
            'prix' => $prix,
            'quantite' => $quantite,
            'date' => $date,
            'categorie' => $categorie,
            'description' => $description,
        ];
        // $model = new Medicament();
        // $model->save($data);
        // return redirect()->to('/medicaments');
        session()->setFlashdata('success', 'Medicament ajouté avec succès');
        session()->set($data);
        return redirect()->to('/dashboard');
        
    }
}

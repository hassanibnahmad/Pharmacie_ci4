<?php
namespace App\Controllers\Medicaments;
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\MedicamentsModel;
class Medicaments extends Controller
{
    public function index(){
        return view('Medicaments/createMedicament');
    }

    // create medicament
    public function create_med(){  
        // create object of medicament model
        $validation = \Config\Services::validation();
        $validation->setRules([
            'ref' => ['label' => 'Reference', 'rules' => 'required|max_length[255]'],
            'prix' => 'required|numeric',
            'quantite' => 'required|numeric',
            'date' => 'required|valid_date',
            'categorie' => 'required',
            'description' => 'required'
        ]);

        $data = [
            'ref' => $this->request->getVar('ref'),
            'prix' => $this->request->getVar('prix'),
            'quantite' => $this->request->getVar('quantite'),
            'date' => $this->request->getVar('date'),
            'categorie' => $this->request->getVar('categorie'),
            'description' => $this->request->getVar('description'),
        ];
        // the deference between getVar() and getPost() is that getVar() is more secure than getPost() because it will return null if the value is not found in the request and getPost() will return an empty string 
        if (!$this->validate($validation->getRules())) {
            return view('Medicaments/createMedicament', ['validation' => $this->validator]);
        }

        $medicament = new MedicamentsModel();
        $medicament->save($data);
        session()->setFlashdata('success', 'Medicament ajouté avec succès');
        // whene medicament added display the success message and stay in the same page
        return redirect()->to('/Medicaments');
    }
    
    // Liste des medicaments
    public function list_med(){
        $medicament = new MedicamentsModel();
        // get all medicaments and send them using session to the view
        $data = [
            // recuperer tous les medicaments en ordre decroissant selon l'id 
            'medicaments' => $medicament->orderBy('id', 'DESC')->findAll()
        ];
        return view('Medicaments/listMedicaments', $data);
    }

    // Edit medicament
    public function edit_med($id){
        $medicament = new MedicamentsModel();
        $data = [
            'medicament' => $medicament->find($id) // get all medicament by id
        ];
        return view('Medicaments/editMedicament', $data); 

    }
    // edit medicament
    public function update_med($id){
        $validation = \Config\Services::validation();
        $validation->setRules([
            'ref' => ['label' => 'Reference', 'rules' => 'required|max_length[255]'],
            'prix' => 'required|numeric',
            'quantite' => 'required|numeric',
            'date' => 'required|valid_date',
            'description' => 'required'
        ]);

        $medicament = new MedicamentsModel();
        if (!$this->validate($validation->getRules())) {
            return view('Medicaments/editMedicament', [
                'validation' => $this->validator,
                'medicament' => $medicament->find($id) // get all medicament by id
            ]);
        }
        $data = [
            'ref' => $this->request->getVar('ref'),
            'prix' => $this->request->getVar('prix'),
            'quantite' => $this->request->getVar('quantite'),
            'date' => $this->request->getVar('date'),
            'categorie' => $this->request->getVar('categorie'),
            'description' => $this->request->getVar('description'),
        ];

       
        $medicament->update($id, $data); // update() function take two parameters the first one is the id of the medicament and the second one is the data that will be updateds
        session()->setFlashdata('success', 'Medicament modifié avec succès');
        return redirect()->to('/Medicaments/list_med');
    }
    // deference edit and update is that edit is the form that will be displayed to the user to edit the medicament and update is the function that will update the medicament

    // delete medicament
    public function delete_med($id){
        $medicament = new MedicamentsModel();        
        $ref = $medicament->find($id);
        
        if ($ref !== null) {
            $medicament->delete($id);
            $success = "<" . $ref['ref'] . '> supprimé avec succès';
            session()->setFlashdata('success', $success);
        } else {
            session()->setFlashdata('error', 'Erreur: Medicament non trouvé.');
        }
        
        return redirect()->to('/Medicaments/list_med');
    }

    // medicament en rupture
    public function rupture(){
        $medicament = new MedicamentsModel();
        $rupture = $medicament->where('quantite', 0)->findAll();
        $data = [
            'rupture' => $rupture
        ];
        return view('Medicaments/ruptureMedicament', $data);
    }
}

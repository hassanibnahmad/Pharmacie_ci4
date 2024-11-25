<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;

class Register extends Controller
{
    public function index()
    {
        if($this->isLogged()) {
            return redirect()->to('/dashboard');
        } 

        return view('login/register');
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nom' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'cle_enregistrement' => 'required'
        ]);

        if (!$this->validate($validation->getRules())) {
            return view('login/register', ['validation' => $this->validator]);
        }

        // Vérifier la clé d'enregistrement
        $cle_enregistrement = $this->request->getPost('cle_enregistrement');
        $cle_valide = 'ABCD1234';  // Clé à vérifier, elle peut être définie dans un fichier de configuration

        if ($cle_enregistrement !== $cle_valide) {
            return redirect()->back()->with('error', 'Clé d\'enregistrement invalide.'); 
        }

        // Insérer les données de l'utilisateur
        $usersModel = new UsersModel();
        $usersModel->save([
            'nom' => $this->request->getPost('nom'),
            'email' => $this->request->getPost('email'),
            'mot_de_passe' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), //password_hash() permet de hacher le mot de passe pour des raisons de sécurité, PASSWORD_DEFAULT est un algorithme de hachage recommandé par PHP
            'role' => 'employe'
        ]);
        // La méthode save() permet d'insérer des données dans la base de données save() est une fonction de la classe Model save() 

        return redirect()->to('/login')->with('success', 'Inscription réussie !');
    }

    public function isLogged() : bool
    {
        return session()->has('isLoggedIn'); // return true if the user is logged in else return false
    }
}

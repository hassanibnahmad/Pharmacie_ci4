<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;

class Login extends Controller
{
    public function index()
    {
        return view('login/login');
    }

    public function login()
    {
        // Valide les données d'entrée
        $validation = \Config\Services::validation();
        $email = $this->request->getPost('email');
        $pass = $this->request->getPost('password');

        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ]);

        if (!$this->validate($validation->getRules())) {
            // Renvoie à la page de connexion avec des erreurs
            return view('login/login', [
                'validation' => $this->validator // validator contient les erreurs de validation de la page précédente (login) est une fonction de la classe Controller, controller est une classe parente de Login 
            ]);
        }

        $userModel = new UsersModel();
        $hashedPassword = $userModel->where('email', $email)->First()['mot_de_passe'];

        if (!password_verify($pass, $hashedPassword)) {
            return redirect()->back()->with('error', 'Email ou mot de passe incorrect.');

        }
        //password_verify() permet de vérifier si un mot de passe correspond à un hachage 
        // First() permet de récupérer le premier enregistrement de la base de données
        // Logique d'authentification (à implémenter)
        // Par exemple, vérifier les informations d'identification dans la base de données

        // Si authentifié, rediriger vers le tableau de bord
        return redirect()->to('/home');
    }
}

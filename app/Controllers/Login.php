<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;
use Config\Services;
class Login extends Controller
{
    public function index()
    {
        return view('login/login');
    }

    public function login()
    {
        helper(['form']);
        // Validate input data
        $validation = Services::validation();
        $email = $this->request->getPost('email');
        $pass = $this->request->getPost('password');

        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ]);

        if (!$this->validate($validation->getRules())) {
            // Return to login page with errors
            return view('login/login', [
                'validation' => $this->validator
            ]);
        }

        $userModel = new UsersModel();
        $hashedPassword = null;
        
        $user = $userModel->where('email', $email)->first();
        if ($user) {
            $hashedPassword = $user['mot_de_passe'];
        } 

        if ((!password_verify($pass, $hashedPassword)) ) {
            return redirect()->back()->with('error', 'Email ou mot de passe incorrect.'); 
        }

        $data = [
			'id' => $user['id'],
			'nom' => $user['nom'],
			'email' => $user['email'],
            'role' => $user['role'],
			'isLoggedIn' => true,
		];

        
		session()->set($data);

        // If authenticated, redirect to dashboard
        return redirect()->to('/dashboard');
    }
}

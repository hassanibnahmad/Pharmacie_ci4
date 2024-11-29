<?php
namespace App\Controllers; 
use App\Models\UsersModel; 
use CodeIgniter\Controller; 
use CodeIgniter\Email\Email;
use CodeIgniter\Config\Services;

class Login extends Controller
{
    public function index(){  
        return view('login/login');
    }

    public function login(){
        helper(['form']);// Load form helper used for validation
        $validation = Services::validation();
        $email = $this->request->getPost('email');
        $pass = $this->request->getPost('password');

        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ]);

        if (!$this->validate($validation->getRules())) {
            return view('login/login', [
                'validation' => $this->validator
            ]);
        }

        $userModel = new UsersModel();
        $hashedPassword = null;
        
        $user = $userModel->where('email', $email)->first();
        if ($user) {
            $hashedPassword = $user['mot_de_passe']; //  $user['mot_de_passe']; returns the hashed password from the database of the user with the given email
        } 

        if ((password_verify($pass, $hashedPassword)) ) {
            $session = session();
            $session->regenerate(); // Regenerate session id for security reasons it works by creating a new session file with the same data whene the user logs in 
            $session->set('isLoggedIn', true);
            $session->set('id', $user['id']);
            $session->set('nom', $user['nom']);
            $session->set('email', $user['email']);
            $session->set('role', $user['role']);
            return redirect()->to('/dashboard');

        }else{
            return redirect()->back()->with('error', 'Email ou mot de passe incorrect.');
        }
    }

    public function isLogged(){
        if(session()->has('isLoggedIn')){
            return true;
        }
        return false;
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }

    public function forgotPassword()
{
    $validation = \Config\Services::validation();

    $validation->setRules([
        'email' => 'required|valid_email',
        
    ]);
 
        if (!$validation->withRequest($this->request)->run()) {
            return view('login/forgotPassword', [
                'validation' => $validation,
            ]);
        }
    
    $email = $this->request->getPost('email');
    $userModel = new \App\Models\UsersModel();
    $user = $userModel->where('email', $email)->first();

    if ($user) {
        $token = bin2hex(random_bytes(50)); // Génère un token aléatoire
        $userModel->update($user['id'], [
            'reset_token' => $token,
            'token_expiration' => date('Y-m-d H:i:s', strtotime('+1 hour')) // Outputs: 2023-10-01 15:30:00 (if current time is 2023-10-01 14:30:00) +1h
        ]);

        $emailService = \Config\Services::email();
        $emailService->setTo($user['email']);
        $emailService->setSubject('Réinitialisation du mot de passe');
        $emailService->setMessage("Cliquez sur ce lien pour réinitialiser votre mot de passe : ".base_url('login/resetPassword/'.$token));

        if ($emailService->send()) {
            return redirect()->back()->with('success', 'Un email de réinitialisation du mot de passe a été envoyé, veuillez vérifier votre boîte de réception.');
        } else {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'envoi de l\'email.');
        }
    } else {
        return redirect()->back()->with('error', 'Aucun utilisateur trouvé avec cet email.');
    }
}

public function resetPassword($token)
{
    $validation = \Config\Services::validation();

    $validation->setRules([
        'new_password' => 'required|min_length[6]',
        'confirm_password' => 'required|matches[new_password]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        return view('login/resetPassword', [
            'token' => $token,
            'validation' => $validation,
        ]);
    }

    $userModel = new \App\Models\UsersModel();
    $user = $userModel->where('reset_token', $token)->first();

    if ($user && strtotime($user['token_expiration']) > time()) { 
        // time() returns the current time in seconds since the Unix Epoch
        $newPassword = password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT);
        $userModel->update($user['id'], [
            'mot_de_passe' => $newPassword,
            'reset_token' => null,
            'token_expiration' => null
        ]);

        return redirect()->to('login')->with('success', 'Mot de passe changé avec succès.');
    } else {
        return redirect()->to('login')->with('error', 'Token invalide ou expiré.');
    }
}
//la fonction resetPassword() vérifie si le token est valide et n'a pas expiré. 
// Si c'est le cas, elle met à jour le mot de passe de l'utilisateur avec le nouveau mot de passe
//  et supprime le token et l'expiration du token de la base de données. Sinon, elle renvoie un message d'erreur.

}
?>
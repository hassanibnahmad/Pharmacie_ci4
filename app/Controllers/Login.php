<?php
namespace App\Controllers; 
use App\Models\UsersModel; 
use CodeIgniter\Controller; 
use CodeIgniter\Email\Email;
use CodeIgniter\Config\Services;
class Login extends Controller
{
    public function index()
    {  
        if($this->isLogged()) {
            return redirect()->to('/dashboard');
        }
        return view('login/login');
    }

    public function login()
    {
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
        $email = $this->request->getPost('email');
        $validation->setRules(['email' => 'required|valid_email']);
        
        if ($validation->withRequest($this->request)->run()) {
            $userModel = new UsersModel();
            $user = $userModel->where('email', $email)->first();
            
            if (!empty($user)) {
                  // Mettre à jour la date de demande de réinitialisation du mot de passe ya3ni updated_at b current date and time
                // $userModel->set('updated_at', date('Y-m-d H:i:s'));
                // $userModel->where('id', $user['id']);
                // $userModel->update();

                $userModel->update($user['id'], ['updated_at' => date('Y-m-d H:i:s')]);
                // chno hiya lraya dyal updated_at? bach n3arfo wach l'utilisateur 3ando demande de réinitialisation ou non 
                // Envoyer l'email avec le lien de réinitialisation
                // Envoyer l'email avec le lien de réinitialisation
                $to = $email;
                $subject = "Réinitialisation du mot de passe";
                $message = "Bonjour ".$user['nom'].",<br><br>
                            Cliquez sur le lien ci-dessous pour réinitialiser votre mot de passe:
                            <a href='".base_url('login/resetPassword/'.$user['id'])."'>Réinitialiser le mot de passe</a><br><br>
                            Merci.";
                
                $emailService = \Config\Services::email();
                $emailService->setTo($to);
                $emailService->setFrom('votre-email@example.com', 'Votre Nom');
                $emailService->setSubject($subject);
                $emailService->setMessage($message);
                
                if ($emailService->send()) {
                    return redirect()->back()->with('success', 'Email envoyé avec succès.');
                } else {
                    return redirect()->back()->with('error', 'Erreur lors de l\'envoi de l\'email.');
                }
            } else {
                return redirect()->back()->with('error', 'Email non trouvé dans la base de données.');
            }
        } else {
            return view('login/forgotPassword', ['validation' => $this->validator]);
        }
    }
    
    // Fonction de réinitialisation du mot de passe
  
        public function resetPassword($userId) { 
            return view('login/resetPassword', ['userId' => $userId]); 
        } 
        // Fonction pour traiter le formulaire de réinitialisation du mot de passe 
        public function updatePassword() 
        { 
            $validation = \Config\Services::validation(); 
            $newPassword = $this->request->getPost('new_password'); 
            $confirmPassword = $this->request->getPost('confirm_password'); 
            $userId = $this->request->getPost('user_id');
             // Règles de validation 
            $validation->setRules([ 
                                    'new_password' => 'required|min_length[8]', 
                                    'confirm_password' => 'required|matches[new_password]', 
                                ]);
             if ($validation->withRequest($this->request)->run()) { 
                $userModel = new UsersModel();
                 // Mettre à jour le mot de passe
                 $userModel->update($userId, ['password' => password_hash($newPassword, PASSWORD_BCRYPT)]);
                 return redirect()->to('/login')->with('success', 'Mot de passe mis à jour avec succès.');
             } else { 
                return view('login/resetPassword', [ 'validation' => $this->validator, 'userId' => $userId ]); 
            } 

        }


    
}
 



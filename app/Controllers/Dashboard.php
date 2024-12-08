<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\MedicamentsModel;
use App\Models\VenteModel;
class Dashboard extends BaseController
{
    public function index()
    {
        session()->set('totalMedicaments', $this->total_med());
        session()->set('rupture', $this->en_rupture());
        session()->set('ventes_aujourdhui', $this->ventes_aujourdhui());
        return view('dashBoard');
        
    }

      // total medicaments
    public function total_med(){
        $medicament = new MedicamentsModel();
        $totalMedicaments = $medicament->countAll();
        return $totalMedicaments; // return the total number of medicaments for example 10, to display it in the dashboard view we use session()->get('totalMedicaments') 
    }

    // medicaments en rupture
    public function en_rupture(){
        $medicament = new MedicamentsModel();
        $rupture = $medicament->where('quantite', 0)->findAll(); // en sql : select * from medicaments where quantite = 0
        return count($rupture); // en sql : select count(*) from medicaments where quantite = 0
        
    } 

    //ventes aujourd'hui
    public function ventes_aujourdhui(){
        $ventes = new VenteModel();
        $user_email = session()->get('email');
        $aujourdhui = date('Y-m-d');
        // select * from ventes where date = date('Y-m-d-h-i-s') and email = session()->get('email')
        $ventes = $ventes->where('created_at', $aujourdhui)->where('email', $user_email)->findAll();
        return count($ventes); // en sql : select count(*) from ventes where date = date('Y-m-d-h-i-s') and email = session()->get('email')
    }

    public function isLogged()
    {
        return session()->get('isLoggedIn'); // return true if the user is logged in else return false
    }
    
}

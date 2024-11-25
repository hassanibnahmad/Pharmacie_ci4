<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\MedicamentsModel;
class Dashboard extends BaseController
{
    public function index()
    {
        session()->set('totalMedicaments', $this->total_med());
        return view('dashBoard');
        
    }

      // total medicaments
      public function total_med(){
        $medicament = new MedicamentsModel();
        $totalMedicaments = $medicament->countAll();
        return $totalMedicaments; // return the total number of medicaments for example 10, to display it in the dashboard view we use session()->get('totalMedicaments') 
    }

    public function isLogged()
    {
        return session()->get('isLoggedIn'); // return true if the user is logged in else return false
    }
    
}

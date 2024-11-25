<?php
namespace App\Filters;
use app\Filters\uthFilter;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // imken dirha mn filters ola mn controllers
        // Vérifier si l'utilisateur est connecté
        if (!session()->has('isLoggedIn')) { // lfar9 bin has() o get() howa has() tverifi wach kayn chi variable f session o get() katrad l valeur dyalha
            // Rediriger vers la page de login si non connecté
            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
?>
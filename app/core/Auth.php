<?php

class Auth
{
    
    public static function handleLogin($redirect = false)
    {
        Session::init();
        $logged = false;

        if (isset($_SESSION['loggedIn'])) {
            $logged = $_SESSION['loggedIn'];
        }
        
        if ($logged == false) {
            session_destroy();
            
            if ($redirect == true) {
                header('location: ' . URL . 'login');
                exit;
            }
        }
    }

    public static function logout() {
        Session::destroy();
        header('location: ' . URL . 'login');
        exit;
    }
    
}

?>
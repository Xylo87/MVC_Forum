<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register () {
        // if (isset($_POST["submit"])) {
            
        // $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // $mail = filter_input(INPUT_POST, "mail", FILTER_VALIDATE_EMAIL);
        // $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // $password2 = filter_input(INPUT_POST, "password2", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        //     if ($pseudo && $mail && $password && $password2) {}

        // }
    }    
    public function login () {
        // if (isset($_POST["submit"])) {
            
        // $mail = filter_input(INPUT_POST, "mail", FILTER_VALIDATE_EMAIL);
        // $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        //     if ($mail && $password) {}

        // }
    }    
    public function logout () {}
}
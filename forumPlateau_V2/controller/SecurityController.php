<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UtilisateurManager;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register () {
        $utilisateurManager = new UtilisateurManager();
        
        if (isset($_POST["submit"])) {
            
        $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $pass1 = filter_input(INPUT_POST, "pass1", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pass2 = filter_input(INPUT_POST, "pass2", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($pseudo && $email && $pass1 && $pass2) {

                // vérif si utilisateur existe déjà
                
                // REGEX
                if ($pass1 === $pass2) {
                    $utilisateurManager->add(
                        [
                            "pseudo" => $pseudo,
                            "email" => $email,
                            "password" => password_hash($pass1, PASSWORD_DEFAULT),
                            // "role" => "Membre",
                        ]
                    );
                    $this->redirectTo("security", "login");
                }
            }

        }
        return [
            "view" => VIEW_DIR."register.php",
            "meta_description" => "Register",
            // "data" => [ 
               
            // ]
        ];
    }    
    
    public function login () {
        if (isset($_POST["submit"])) {
            
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
            if ($email && $password) {
                // $hash = ->getPassword();
                // if (password_verify($password, $hash)) {
                //     $_SESSION["user"] = ;
                //     $this->redirectTo("");
                // }
            }

        }
        return [
            "view" => VIEW_DIR."login.php",
            "meta_description" => "Login",
            // "data" => [ 
               
            // ]
        ];
    }    
    
    public function logout () {
        unset($_SESSION["user"]);
        $this->redirectTo("");
    }
}
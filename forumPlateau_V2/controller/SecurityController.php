<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use App\Session;
use Model\Managers\UtilisateurManager;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register () {
        
        $utilisateurManager = new UtilisateurManager();
        
        if (isset($_POST["submit"])) {

            
        $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mail = filter_input(INPUT_POST, "mail", FILTER_VALIDATE_EMAIL);
        $pass1 = filter_input(INPUT_POST, "pass1", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pass2 = filter_input(INPUT_POST, "pass2", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($pseudo && $mail && $pass1 && $pass2) {
                
                // vérif si utilisateur existe déjà
                $user = $utilisateurManager->findUserByMail($mail);
                $user2 = $utilisateurManager->findUserByNickname($pseudo);

                // REGEX
                $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/";
                
                if ($user || $user2) {
                } else {
                    if ($pass1 === $pass2 && preg_match($regex, $pass2)) {
                        $utilisateurManager->add(
                            [
                                "pseudo" => $pseudo,
                                "mail" => $mail,
                                "password" => password_hash($pass1, PASSWORD_DEFAULT),
                            ]
                        );
                        $this->redirectTo("security", "login");
                    }
                }
            }
        }
        return [
            "view" => VIEW_DIR."register.php",
            "meta_description" => "Register",
        ]; 
        } 
        
        public function login () {
            
            $utilisateurManager = new UtilisateurManager();

            if (isset($_POST["submit"])) {
                
                $mail = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
                if ($mail && $password) {
                    $user = $utilisateurManager->findUserByMail($mail);

                    if ($user) {
                        $hash = $user->getPassword();
                        if (password_verify($password, $hash)) {
                            Session::setUser($user);
                            $this->redirectTo("home", "index");
                        }
                    }
                }
            }

            return [
                "view" => VIEW_DIR."login.php",
                "meta_description" => "Login",
            ];
        }    
        
        public function logout () {
            unset($_SESSION["user"]);
            $this->redirectTo("home", "index");
        }

        public function profile(){
        
            return [
                "view" => VIEW_DIR."profile.php",
                "meta_description" => "Profil utilisateur",
                // "data" => [ 
                    
                // ]
            ];
        }
    }

                
                

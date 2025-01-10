<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategorieManager;
use Model\Managers\SujetManager;
use Model\Managers\MessageManager;

class ForumController extends AbstractController implements ControllerInterface{

    public function index() {
        
        // créer une nouvelle instance de CategoryManager
        $categoryManager = new CategorieManager();
        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $categories = $categoryManager->findAll(["nom", "ASC"]);

        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        return [
            "view" => VIEW_DIR."forum/listCategories.php",
            "meta_description" => "Liste des catégories du forum",
            "data" => [
                "categories" => $categories
            ]
        ];
    }

    public function listTopicsByCategory($id) {

        $topicManager = new SujetManager();
        $categoryManager = new CategorieManager();
        $category = $categoryManager->findOneById($id);
        $topics = $topicManager->findTopicsByCategory($id);

        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "meta_description" => "Liste des topics par catégorie : ".$category,
            "data" => [
                "category" => $category,
                "topics" => $topics
            ]
        ];
    }

    // listMessageBySujet
    public function listMessagesBySujet($id) {

        $messageManager = new MessageManager();
        $topicManager = new SujetManager();
        $categoryManager = new CategorieManager();
        $topic = $topicManager->findOneById($id);
        $messages = $messageManager->findMessagesByTopic($id);
        $category = $categoryManager->findOneById($topic->getCategorie()->getId());

        return [
            "view" => VIEW_DIR."forum/listMessages.php",
            "meta_description" => "Liste des messages par sujet : ".$topic,
            "data" => [
                "topic" => $topic,
                "messages" => $messages,
                "category" => $category
            ]
        ];
    }

    public function addMessage(int $id) {
        $messageManager = new MessageManager();
        $message = filter_input(INPUT_POST, "post", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($message) {
            $messageManager->add(
                [
                    "texte" => $message,
                    "utilisateur_id" => Session::getUser()->getId(),
                    "sujet_id" => $id
                ]
            );

            $this->redirectTo("forum", "listMessagesBySujet", $id);
        }

    }

    public function addTopic(int $id) {
        $topicManager = new SujetManager();
        $topic = filter_input(INPUT_POST, "topic", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($topic) {
            $topicId = $topicManager->add(
                [
                    "titre" => $topic,
                    "utilisateur_id" => Session::getUser()->getId(),
                    "categorie_id" => $id
                ]
            );
        
        }
        
        $messageManager = new MessageManager();
        $message = filter_input(INPUT_POST, "post", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
        if($message) {
            $messageManager->add(
                [
                    "texte" => $message,
                    "utilisateur_id" => Session::getUser()->getId(),
                    "sujet_id" => $topicId
                ]
            );

            $this->redirectTo("forum", "listTopicsByCategory", $id);
        }
    }

    public function lock(int $id) {
        $topicManager = new SujetManager();
        $topicManager->lockSwitch($id);
        $this->redirectTo("forum", "listMessagesBySujet", $id);
    }

    public function unlock(int $id) {
        $topicManager = new SujetManager();
        $topicManager->unlockSwitch($id);
        $this->redirectTo("forum", "listMessagesBySujet", $id);
    }
}

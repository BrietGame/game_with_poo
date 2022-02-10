<?php
include_once 'Player.php';

class Game
{
    public $map;


    function __construct()
    {
        $this->map = array();
    }

    public function getMap()
    {
        return $this->map;
    }

    public function setMap($newMap)
    {
        $this->map = $newMap;
    }

    public function init()
    {
        // INSERTION DE LA MAP
        $this->map = [
            [1, 0, 0, 0, "K"],
            [0, 1, 1, 0, 1],
            ["S", 1, 0, 0, 0],
            [0, 0, 0, 1, "E"]
        ];
    }

    public function introduction()
    {
        $enterToContinue = "\n (tapez entrer pour continuer)";
        echo "- Hé, salut toi ! Que fais-tu par ici ?" . $enterToContinue;
        rtrim(fgets(STDIN));
        echo "- Je suis nouveau en ville et je ..." . $enterToContinue;
        rtrim(fgets(STDIN));
        $nom = '';
        while (empty($nom)) {
            echo "- Ohh, intéressant (murmure-t'il)... Euh très bien mais comment t'appeles-tu ?\n Message système | Veuilez entrer votre nom : ";
            $nom = rtrim(fgets(STDIN));
        }
        echo "- Enchanté " . $nom . ", je m'appelle Gilbert du Mont-Roti et je suis le doyen de ce village." . $enterToContinue;
        rtrim(fgets(STDIN));
        echo "- Ravi de faire ta..." . $enterToContinue;
        rtrim(fgets(STDIN));
        echo "- Bien bien, souhaites-tu venir avec moi dans ce labyrinthe ? Je te fais une visite guidée (rit intérieurement) \n Message système | Voulez-vous vraiment le suivre ? (oui ou non) : " . $enterToContinue;
        $response = rtrim(fgets(STDIN));
        $gilbertPresent = ''; // 1 Gilbert est avec Player | 2 Gilber n'est pas avec Player
        while (empty($gilbertPresent)) {
            switch ($response) {
                case 'oui' || 'Oui':
                    $gilbertPresent = 1;
                    echo "- Très bien, suis-moi donc ! Ahahaha " . $enterToContinue;
                    rtrim(fgets(STDIN));
                    break;
                case 'non' || 'None':
                    $gilbertPresent = 2;
                    echo "- D'accord, je te laisse tranquille. Peut-être qu'on se reverra ahahaahahaahaa" . $enterToContinue;
                    rtrim(fgets(STDIN));
                default:
                    echo "- Je n'ai pas compris. \n Message système | Voulez-vous vraiment le suivre ? (Oui ou Non) : " . $enterToContinue;
                    $response = rtrim(fgets(STDIN));
                    break;
            }
        }
        echo "\n \n \n |||||| BIENVENUE DANS 'Strange Laby' ||||||";
    }

    public function showMap()
    {
        // Copie de la map initiale pour le player
        echo "\n \nVoici la carte du labyrinthe que vous avez trouvé sur un panneau à moitié déchirée : \n";
        $mapPlayer = $this->getMap();
        for ($line = 0; $line < count($mapPlayer); $line++) {
            for ($cell = 0; $cell < count($mapPlayer[$line]); $cell++) {
                echo $mapPlayer[$line][$cell] . ' ';
            }
            echo "\n";
        }
    }

    public function playerChoice()
    {
        $this->choix = '';
        echo "\n Message système | Où voulez-vous allez ? (haut, bas, gauche, droit) : ";
        $choixDone = '';
        while (empty($choixDone)) {
            $this->choix = rtrim(fgets(STDIN));
            switch ($this->choix) {
                case 'haut':
                    $choixDone = 1;
                    // echo ">> Vous allez vers le haut \n";
                    break;
                case 'bas':
                    $choixDone = 1;
                    // echo ">> Vous allez vers le bas \n";
                    break;
                case 'gauche':
                    $choixDone = 1;
                    // echo ">> Vous allez vers la gauche \n";
                    break;
                case 'droite':
                    $choixDone = 1;
                    // echo ">> Vous allez vers la droite \n";
                    break;
                default:
                    # code...
                    break;
            }
        }
    }

    public function getChoix()
    {
        return $this->choix;
    }

    public function launch()
    {
        $this->introduction();
        $this->init();
        $this->showMap();
        $this->playerChoice();
    }
}

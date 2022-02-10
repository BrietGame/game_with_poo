<?php
include_once 'Game.php';

class Player extends Game
{
    public $items;

    function __construct()
    {
        $this->items = array();
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($newItems)
    {
        $this->items = $newItems;
    }

    public function checkDest($choix, $map, $line, $cell)
    {
        // Haut => $map[n+1][n]
        // Bas => $map[n-1][n]
        // Gauche => $map[n][n-1]
        // Droite => $map[n][n+1]
        // echo "Checkdest OK : " . $choix;

        $mur = "Vous vous dirigez droit vers un mur en bêton. Hélas, vous n'avez pas la tête assez dure pour le défoncer. RIP";
        $limite = "Vous avez atteint la limite de la carte.";


        if ($line >= 0 && $cell >= 0 && $line < count($map) && $cell < count($map[$line])) {
            // while ($map[$line][$cell] != 'E') {
            //     // Boucle infinie si je met le switch d'en dessous à l'intérieur :/
            // }
            switch ($choix) {
                case 'haut':
                    // Il monte d'une case
                    switch ($map[$line - 1][$cell]) {
                        case 0:
                            $line -= 1;
                            break;
                        case 'S':
                            $line -= 1;
                        case 1:
                            echo $mur;
                        case -1:
                            echo $limite;
                        default:
                            # code...
                            break;
                    }
                    break;
                case 'bas':
                    // Il descends d'une case
                    switch ($map[($line + 1)][$cell]) {
                        case 0:
                            $line += 1;
                            break;
                        case 'S':
                            $line += 1;
                        case 1:
                            echo $mur;
                        case -1:
                            echo $limite;
                        default:
                            # code...
                            break;
                    }
                    break;
                case 'gauche':
                    // Il va à gauche d'une case
                    switch ($map[$line][($cell - 1)]) {
                        case 0:
                            $cell -= 1;
                            break;
                        case 'S':
                            $cell -= 1;
                        case 1:
                            echo $mur;
                        case -1:
                            echo $limite;
                        default:
                            # code...
                            break;
                    }
                    break;
                case 'droite':
                    // Il va à droite d'une case
                    switch ($map[$line][($cell + 1)]) {
                        case 0:
                            $cell += 1;
                            break;
                        case 'S':
                            $cell += 1;
                        case 1:
                            echo $mur;
                        case -1:
                            echo $limite;
                        default:
                            # code...
                            break;
                    }
                    break;
                default:
                    echo "Si tu es arrivé ICI c'est que ça a crash";
                    break;
            }
            echo "\n LINE : " . $line;
            echo "\n CELL : " . $cell;
            echo "\n \n >> VOUS ETES A LA CASE : " . $map[$line][$cell];
        }
    }

    public function move()
    {
    }
}

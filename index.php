<?php
include_once 'Game.php';
include_once 'Player.php';

// Mode debug
function debug($tableau)
{
    echo '<pre style="height:200px;overflow-y: scroll;font-size: .7rem;padding: .6rem;font-family: Consolas, Monospace;background-color: #000;color:#fff;">MODE DEBUG ACTIVATED<br>';
    print_r($tableau);
    echo '</pre>';
}

$game = new Game();
$game->launch();
$player = new Player();
$choix = $game->getChoix();
$mapPlayer = $game->getMap();
$final = 0;
$line = 2;
$cell = 0;
// while ($final == 0) {
$player->checkDest(choix: $choix, map: $mapPlayer, line: $line, cell: $cell);
// }

// print_r($mapPlayer);

<?php
require_once ('insert_funcs.php');
require('Player.php');
              //might need to change this becase post names could be different
              $player = new Player($_POST['firstName'],$_POST['lastName'],
                      $_POST['position'],$_POST['height'],
                      $_POST['weight'],$_POST['team'],$_POST['age']);
              insert_player($player->fName(),
                      $player->lName(),
                      $player->position(),
                      $player->height(),
                      $player->weight(),
                      $player->team(),
                      $player->age());

require('Editor_tools.php');
?>


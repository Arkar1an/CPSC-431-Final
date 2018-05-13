<?php
require_once ('insert.php');
require('Game.php');
              
              $game = new Game($_POST['g_date'],$_POST['g_away'],
                      $_POST['g_home'],$_POST['g_awaypoints'],
                      $_POST['g_homepoints']);
              insert_game($game->date(),
                      $game->away(),
                      $game->home(),
                      $game->awaypts(),
                      $game->homepts());

require('Editor_tools.php');
?>
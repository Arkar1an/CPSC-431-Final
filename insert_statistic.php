<?php
require_once ('insert.php');
require('Statistic.php');
              
              $statistic = new Statistic($_POST['s_date'],$_POST['s_away'],
                      $_POST['s_home'],$_POST['s_player'],
                      $_POST['s_playingTimeMin'],$_POST['s_playingTimeSec'],$_POST['s_points'],
                      $_POST['s_assists'],$_POST['s_rebounds']);
              insert_statistic($statistic->date(),
                      $statistic->away(),
                      $statistic->home(),
                      $statistic->player(),
                      $statistic->min(),
                      $statistic->sec(),
                      $statistic->points(),
                      $statistic->assists(),
                      $statistic->rebounds());

require('Editor_tools.php');
?>
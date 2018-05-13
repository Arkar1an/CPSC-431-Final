<?php

require_once ('insert_funcs.php');
require('Team.php');
              
              $team = new Team($_POST['t_name'],$_POST['t_executive']);
              insert_team($team->name(),
                      $team->executive());

require('Editor_tools.php');
?>

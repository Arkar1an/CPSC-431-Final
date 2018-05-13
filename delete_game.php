<?php
require_once ('delete_funcs.php');
require_once('Game.php');
$g = $_POST['game'];
delete_game($g->date(),$g->away(),$g->home());
require ('delete_page.php');
?>
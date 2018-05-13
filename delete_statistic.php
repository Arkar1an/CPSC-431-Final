<?php
require_once ('delete_funcs.php');
require_once ('Statistic.php');
$s = $_POST['stat'];
delete_statistic($s->date(),$s->away(),$s->home(),$s->player());
require ('delete_page.php');
?>
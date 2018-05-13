<?php
require_once ('delete_funcs.php');
require_once ('Bench.php');
$b = $_POST['bench'];
delete_bench($b->injuryDate(),$b->player());
require ('delete_page.php');
?>

<?php
require_once ('delete_funcs.php');
delete_person($_POST['per_ID']);
require ('delete_page.php');
?>
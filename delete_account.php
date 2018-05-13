<?php
require_once ('delete_funcs.php');
delete_account($_POST['a_username']);
require ('delete_page.php');
?>

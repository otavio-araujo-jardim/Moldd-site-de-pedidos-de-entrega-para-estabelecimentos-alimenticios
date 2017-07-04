<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once 'lib/Aplicacao.php';

session_start();
$o_Application = new Aplicacao();
$o_Application->executarMetodoControle();
?>

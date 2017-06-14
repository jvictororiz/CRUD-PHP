<?php
session_start();
echo ($_SESSION['email']);
session_destroy();
header('Location: ../../view/paginas/index.php');
?>
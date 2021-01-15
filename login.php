<?php session_start();

require 'admin/config.php';
require 'functions.php';

if (isset($_SESSION['admin'])) {
    header('Location:' . LOCALPATH .'admin');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = clean_data($_POST['username']);
    $password = clean_data($_POST['password']);

    if ($username == $blog_admin['admin'] && $password == $blog_admin['pass']) {
        $_SESSION['admin'] = $blog_admin['admin']; 
        header('Location:'. LOCALPATH . '/admin');
    } else {
		echo 'LOS DATOS NO SON CORRECTOS';
	}
}

require 'views/login.view.php';

?>
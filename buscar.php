<?php
require 'admin/config.php';
require 'functions.php';

$connection = db_connection($db_config);

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])) {
    $busqueda = clean_data($_GET['busqueda']);

    $statement = $connection->prepare('SELECT * FROM articulos WHERE titulo LIKE :busqueda or texto LIKE :busqueda');
    $statement->execute(array(':busqueda'     =>      "%$busqueda%"));
    $result = $statement->fetchAll();

    if (empty($result)) {
        $titulo = "No se encontraron resultados";
    } else {
        $titulo = "Resultados de: $busqueda";
    }

} else {
    header('Location:'. LOCALPATH . '/index.php');
}

require 'views/buscar.view.php';

?>
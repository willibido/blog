<?php

require 'config.php';
require '../functions.php';

$connection = db_connection($db_config);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = clean_data($_POST['titulo']);
    $extracto = clean_data($_POST['extracto']);
    $texto = nl2br($_POST['texto']);
    $thumb = $_FILES['thumb']['tmp_name'];
    
    $thumbPath = '../' . $blog_config['imagefolder'] . $_FILES['thumb']['name'];

    move_uploaded_file($thumb, $thumbPath);

    $insert = $connection->prepare(
        'INSERT INTO articulos(titulo, extracto, texto, thumb)
        VALUES(:titulo, :extracto, :texto, :thumb)'
    );

    $insert->execute(array(
        ':titulo' => $titulo,
        ':extracto' => $extracto,
        ':texto' => $texto,
        ':thumb' => $_FILES['thumb']['name']
    ));

    header('Location:' . LOCALPATH . 'admin');
}

require '../views/nuevo.view.php';

?>
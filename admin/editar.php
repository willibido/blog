<?php session_start();

require '../functions.php';
require 'config.php';

session_checker();

$connection = db_connection($db_config);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # PROCESAMOS Y ENVIAMOS LA INFORMACION A LA DB
    $id = clean_data($_POST['id']);
    $titulo = clean_data($_POST['titulo']);
    $extracto = clean_data($_POST['extracto']);
    $texto = clean_data($_POST['texto']);
    $thumb_guardada = $_POST['thumb-guardada'];
    $thumb = $_FILES['thumb'];

    if (empty($thumb['name'])) {
        
        $thumb = $thumb_guardada;

    } else {

        $thumbPath = '../' . $blog_config['imagefolder'] . $_FILES['thumb']['name'];
        $thumb = $_FILES['thumb']['name'];

    }

    $update = $connection->prepare('UPDATE articulos SET titulo = :titulo, extracto = :extracto, texto = :texto, thumb = :thumb WHERE id = :id');
    $update->execute(array(
        ':titulo'   =>  $titulo,
        ':extracto' =>  $extracto,
        ':texto'    =>  $texto,
        ':thumb'    =>  $thumb,
        ':id'       =>  $id
    ));

    header('Location:' . LOCALPATH . "single.php?id=$id");

} else {
    # OBTENEMOS LOS DATOS DE LA DB Y LOS MONSTRAMOS EN PANTALLA

    $id = get_article_id($_GET['id']);

    if (!$id) {
        header('Location:' . LOCALPATH . 'admin');
    }

    $post = get_post_by_id($id, $connection);

    if (!$post) {
    
        header('Location:' . LOCALPATH . 'admin');
    
    } else {

        $post = $post[0];
    
    }

}

require '../views/editar.view.php';
?>
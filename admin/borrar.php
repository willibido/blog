<?php

require 'config.php';
require '../functions.php';

$connection = db_connection($db_config);

$id = get_article_id($_GET['id']);

if (!$id) {
    header('Location:' . LOCALPATH . 'admin');
} else {
    delete_post_by_id($id, $connection);
    header('Location:' . LOCALPATH . 'admin');
}

?>
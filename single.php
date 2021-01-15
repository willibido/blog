<?php

require 'admin/config.php';
require 'functions.php';

$connection = db_connection($db_config);

$article_id = get_article_id($_GET['id']);

if (empty($article_id)){
    header('Location: index.php');
}

$post = get_post_by_id($article_id, $connection);

if (!$post){
    header('Location: index.php');
}

$post = $post[0];

require 'views/single.view.php';

?>
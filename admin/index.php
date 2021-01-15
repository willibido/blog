<?php session_start();

require 'config.php';
require '../functions.php';

$connection = db_connection($db_config);

session_checker();

$posts = get_post($blog_config['post_by_page'], $connection);

require '../views/admin_index.view.php';

?>
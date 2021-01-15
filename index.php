<?php

require 'admin/config.php';
require 'functions.php';

$connection = db_connection($db_config);

$posts = get_post($blog_config['post_by_page'], $connection);

require 'views/index.view.php';

?>
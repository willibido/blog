<?php

require 'admin/config.php';

function db_connection($db_config){
    try {
        $connection = new PDO("mysql:host=localhost;dbname=".$db_config['db_name'], $db_config['adminuser'], $db_config['adminpass']);
        return $connection;
    } catch (PDOException $e) {
        header('Location:'. LOCALPATH . '/error.php');
        return false;
    }
}

function clean_data($inputData){
    $inputData = trim($inputData);
    $inputData = stripslashes($inputData);
    $inputData = htmlspecialchars($inputData);
    $inputData = filter_var($inputData, FILTER_SANITIZE_STRING);
    return $inputData;
}

function get_article_id($id){
    return (int)clean_data($id);
}

function get_post_by_id($id, $connection){
    $statement = $connection->query("SELECT * FROM articulos WHERE id = $id LIMIT 1");
    $statement = $statement->fetchAll();
    return ($statement) ? $statement : false;
}

function delete_post_by_id($id, $connection){
    $statement = $connection->prepare("DELETE FROM articulos WHERE id = :id");
    $statement->execute(array(':id' => $id));
}

function actual_page(){
    return isset($_GET['p']) ? (int)$_GET['p']: 1;
}

function pages_number($post_by_page, $connection){
    $statement = $connection->prepare('SELECT FOUND_ROWS() as total');
    $statement->execute();
    $total_post = $statement->fetch()['total'];
    
    $page_number = ceil($total_post / $post_by_page);
    return $page_number;
}

function get_post($post_by_page, $connection){
    $start_in = (actual_page() > 1) ? (actual_page() * $post_by_page - $post_by_page) : 0;

    $statement = $connection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos ORDER BY fecha DESC LIMIT $start_in, $post_by_page");
    $statement->execute();
    return $statement->fetchAll();
}

function dates_format($fecha){
    $timestamp = strtotime($fecha);
    $months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
    'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    $day = date('d', $timestamp);
    $month = date('m', $timestamp) - 1;
    $year = date('Y', $timestamp);

    $fecha = "$day de $months[$month] del $year";
    return $fecha;
}

function session_checker(){
    if (!isset($_SESSION['admin'])) {
        header('Location:' . LOCALPATH);
    }
}
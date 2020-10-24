<?php
require_once('config.php');
    if(isset($_GET['id'])):
        $id = $_GET['id'];
        $connect = $pdo->query("delete from orders where id = '$id'");
        header("location: {$_SERVER['HTTP_REFERER']}");
    endif;

?>
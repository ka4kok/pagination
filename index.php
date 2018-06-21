<?php

    require_once "DB.php";
    require_once "Pagination.php";

    $limit = 5;
    $db = new DB();
    $page = $_GET['page'];
    $db->connect();
    $allUsers_sql  = "SELECT * FROM `users`";
    $arr = $db->query($allUsers_sql);
    $allUsers = count($arr);
    $pagin = new Pagination();

    $countPage = $pagin->countPage($allUsers, $limit);

    if (!is_numeric($page) or $page < 1) {
        $page = 1;
    } elseif ($page > $countPage) {
        $page = $countPage;
    }

    $start = $pagin->getStart($page, $limit);

    $getUser  = "SELECT * FROM users LIMIT ". $start .", ". $limit ." ";
    $arrUser = $db->query($getUser);

    foreach ($arrUser as $user) {
        echo $user['id']. ' ' .$user['name']. ' '.'<br>';
    }

    echo '<br>';

    $pagin->makePagination($page, $countPage);












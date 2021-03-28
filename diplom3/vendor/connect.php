<?php

    $connect = mysqli_connect('localhost', 'mysql', 'mysql', 'diplom3');

    if (!$connect) {
        die('Error connect to DataBase');
    }
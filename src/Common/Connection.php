<?php

    $connection = new mysqli(
        '127.0.0.1',
        'root',
        'coderslab',
        'twitter2'
    );

    if (!$connection) {
        die("Connection failed: " . $connection->connect_error);
    }

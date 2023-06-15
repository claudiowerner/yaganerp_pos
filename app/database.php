<?php

    $connection = mysqli_connect(
        'localhost',
        'root',
        '',
        'sesiones'
    );

    if($connection)
    {
        echo "Database is connected";
    }


?>
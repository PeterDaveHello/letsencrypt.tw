<?php

call_user_func(function(){
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
    } else {
        header('Status: 403');
        return;
    }

    $token_file = rtrim(file_get_contents(__DIR__ . '/../token.txt'));

    if ($token_file !== $token) {
        header('Status: 403');
        return;
    }

    // TODO
});

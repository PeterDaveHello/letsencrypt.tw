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

    chdir(__DIR__ . '/..');
    system('/usr/bin/git pull -v > /tmp/letsencrypt.tw-git-update.log 2>&1');
});

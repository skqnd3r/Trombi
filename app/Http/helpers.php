<?php

function content($response) {
    $response =json_decode($response);
    return $response;
}

function getapi($url) {
    $cookie = "\"Cookie: authenticator=".$_COOKIE['auth']."\"";
    $request = "curl --header ".$cookie." ".$url;
    $response = shell_exec($request);
    return $response;
}
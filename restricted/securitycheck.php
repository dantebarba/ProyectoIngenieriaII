<?php

function adminCheck() {
    if (!isset($_COOKIE) or $_COOKIE['isAdmin'] == 0) {
        return false;
    }
    else { return true; }
}

function loginCheck() {
    if (!isset($_COOKIE) or $_COOKIE['username'] == '') {
        return false;
    }
    else {return true;} 
}




<?php

function adminCheck() {
    if (isset($_COOKIE) && $_COOKIE['isAdmin'] != 0) {
        return true;
    }
    else { return false; }
}

function loginCheck() {
    if (isset($_COOKIE) && $_COOKIE['username'] != '') {
        return true;
    }
    else {return false;} 
}




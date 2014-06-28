<?php

function adminCheck() {
    if (isset($_COOKIE['isAdmin']) && $_COOKIE['isAdmin'] != 0) {
        return true;
    }
    else { return false; }
}

function loginCheck() {
    if (isset($_COOKIE['username']) && $_COOKIE['username'] != '') {
        return true;
    }
    else {return false;} 
}




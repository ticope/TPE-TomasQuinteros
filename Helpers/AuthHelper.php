<?php


class AuthHelper
{

    function __construct()
    {
    }
    function checkLoggedIn()
    {
        if(session_status() != 2){
            session_start();
            if (!isset($_SESSION["user"])) {
                return false;
                die();
            } else {
                return true;
                die();
            }
        }else{
            if (!isset($_SESSION["user"])) {
                return false;
                die();
            } else {
                return true;
                die();
            }
        }
    }
}
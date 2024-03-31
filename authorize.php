<?php
require_once("functions.php");
//if(session_status() == 0)
session_start(); //pokud session nebeží, tak ho spustim
if(!isset($_SESSION["loguser"]["id"])){
    //zde řeším případ, že nikdo není přihlášený
    go("login.php");
}else {
    //todo ověření, zdali neuplynulo 10 minut od neaktivity
    if($_SESSION["loguser"]["time"] <= time()) {
        session_destroy();
        go("login.php");
    }else {
       $_SESSION["loguser"]["time"] = time()+600; //aktualizace casu po aktivite
    }
}
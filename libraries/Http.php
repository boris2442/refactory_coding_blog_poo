<?php
class Http
{
    public static function redirect($url): void
    {
        header('Location:'.$url);
        exit();
        //location: entete de la requete http

    }
}

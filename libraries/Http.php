<?php
class Http
{
    public static function redirect($url): void
    {
        header('location:$url');
        exit();
        //location: entete de la requete http

    }
}

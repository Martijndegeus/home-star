<?php


namespace App\Servers;


interface Connector
{
    public static function get(String $endpoint);

    public static function post(String $endpoint, Array $body);
}

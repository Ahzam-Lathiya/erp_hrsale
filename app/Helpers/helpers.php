<?php

if( ! \function_exists('pretty_print') ){
    function pretty_print(mixed $data)
    {
        echo '<pre>';
        \print_r($data);
        echo '</pre>';
    }
}

if( ! \function_exists('pretty_print_and_die') ){
    function pretty_print_and_die(mixed $data)
    {
        echo '<pre>';
        \print_r($data);
        echo '</pre>';
        exit;
    }
}

if( ! \function_exists('get_mass_of_sun')){
    function get_mass_of_sun() : string
    {
        return "1.98.0e30";
    }
}


if( ! \function_exists('get_mass_of_earth')){
    function get_mass_of_earth() : string
    {
        return "6.04e24";
    }
}

if( ! \function_exists('get_mass_of_moon')){
    function get_mass_of_moon() : string
    {
        return "7.34e22";
    }
}

?>
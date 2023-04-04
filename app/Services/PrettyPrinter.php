<?php

namespace App\Services;

class PrettyPrinter
{
    public function print(mixed $data)
    {
        echo '<pre>';
        \print_r($data);
        echo '</pre>';
    }

    public function print_and_die(mixed $data)
    {
        $this->print($data);
        exit;
    }

    // public static function __callStatic($name, $arguments)
    // {
    //     $obj = new Self();
    //     return $obj->$name($arguments);
    // }

    public function var_dump(mixed $data)
    {
        \var_dump($data);
    }
}

?>
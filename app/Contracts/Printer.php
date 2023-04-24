<?php

namespace App\Contracts;

Interface Printer
{
    public function print_and_die(mixed $data);
    public function var_dump(mixed $data);
    public function print(mixed $data);
}

?>
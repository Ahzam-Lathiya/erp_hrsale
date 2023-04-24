<?php

namespace App\Services;

use Carbon\Carbon;
use App\Contracts\SamplerSubService;

class Sampler
{
    public $val = 'BUTTER';
    public $time_stamp = '';
    public $sub_services = [];

    //public function __construct($val='', SamplerSubService ...$sub_services)
    public function __construct()
    {
        echo "Init Sampler" . '<br>';
        // $this->val = $val;
        // $this->sub_services = $sub_services;
        $this->time_stamp = Carbon::now();
    }

    public function use_ultra_service()
    {
        //return $this->val;
        return "Created On:" . $this->time_stamp . '<br>';
    }

}

?>
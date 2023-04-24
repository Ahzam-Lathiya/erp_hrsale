<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Services\Sampler;
use Illuminate\Support\Facades\App;
use App\Contracts\Printer;
//use App\Services\PrettyPrinter;

class LogicController extends Controller
{
    public $sample;

    public function __construct(Printer $printer)
    {
        //$sample = App::make(Sampler::class);
        //$this->sample = $sampler;
    }
    
    public function index()
    {
        //
        //dd($this->sample);

        //echo $this->sample->val . '<br>';
        //\print_r($this->sample->sub_services) . '<br>';

        //calling Class and its methods, 
        //the dependencies are resolved by the container
        //echo App::call([App::make(Sampler::class), 'use_ultra_service']);
        //echo App::call([new Sampler, 'use_ultra_service']);

//        echo App::call([App::make(Sampler::class), 'use_ultra_service']);
        //echo App::call([$this->sample, 'use_ultra_service']);
        //echo $this->size;
    }
}

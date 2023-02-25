<?php

namespace App\Models;

use Database\Factories\AssetsFactory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return AssetsFactory::new();
    }
}

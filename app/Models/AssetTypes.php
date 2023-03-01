<?php

namespace App\Models;

use Database\Factories\AssetTypesFactory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetTypes extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return AssetTypesFactory::new();
    }
}

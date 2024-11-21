<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    public function revenues()
    {
        return $this->hasMany(\App\Models\Revenue::class, 'utm_campaign', 'utm_campaign');
    }

}

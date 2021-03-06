<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasDateTimeFormatter;

    public function series()
    {
        return $this->hasMany('App\Models\Series');
    }

    public function activeStocks()
    {
        return $this->hasMany('App\Models\ActiveStock');
    }

    public function historicalPrices()
    {
        return $this->hasMany('App\Models\HistoricalPrice');
    }
}

<?php

namespace App\Models;

use App\Models\Types;
use App\Models\Grapes;
use App\Models\Ratings;
use App\Models\Regions;
use App\Models\Purchases;
use App\Models\BrowsingHistories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wines extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'region_id',
        'type_id',
        'grape_id',
        'year',
        'description',
        'price',
        'image'
    ];

    public function region()
    {
        return $this->belongsTo(Regions::class);
    }
    public function type()
    {
        return $this->belongsTo(Types::class);
    }

    public function grape()
    {
        return $this->belongsTo(Grapes::class);
    }
    
    public function purchases()
    {
        return $this->hasMany(Purchases::class);
    }

    public function ratings()
    {
        return $this->hasMany(Ratings::class);
    }

    public function browsingHistories()
    {
        return $this->hasMany(BrowsingHistories::class);
    }
}

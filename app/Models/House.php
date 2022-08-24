<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;

class House extends Model
{
    use HasFactory;
    use Notifiable;
    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'full_text_searches.name'  => 10,
            'full_text_searches.bedrooms'   => 10,
            'full_text_searches.bathrooms'   => 10,
            'full_text_searches.storeys'    => 10,
            'full_text_searches.garages'  => 10,
            'full_text_searches.price'   => 10,
            'full_text_searches.id'    => 10,
        ]
    ];

    protected $fillable = [
        'name',
        'bedrooms',
        'bathrooms',
        'storeys',
        'garages',
        'price'
    ];

    public function scopeName($query, $name)
    {
        if($name) {
            return $query->where('name', $name);
        }
        return $query;
    }

    public function scopeBedrooms($query, $bedrooms)
    {
        if($bedrooms) {
            return $query->where('bedrooms', $bedrooms);
        }
        return $query;
    }

    public function scopeBathrooms($query, $bathrooms)
    {
        if($bathrooms) {
            return $query->where('bathrooms', $bathrooms);
        }
        return $query;
    }

    public function scopeStoreys($query, $storeys)
    {
        if($storeys) {
            return $query->where('storeys', $storeys);
        }
        return $query;
    }

    public function scopeGarages($query, $garages)
    {
        if($garages) {
            return $query->where('storeys', $garages);
        }
        return $query;
    }

    public function scopePrice($query, $price)
    {
        if($price) {
            return $query->where('price', $price);
        }
        return $query;
    }
}

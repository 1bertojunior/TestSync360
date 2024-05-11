<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'street', 'neighborhood', 'city_id', 'number', 'postal_code', 'complement'
    ];

    public function getPostalCodeAttribute()
    {
        $postalCode = $this->attributes['postal_code'];

        return strlen($postalCode) === 8 ? substr($postalCode, 0, 5) . '-' . substr($postalCode, 5) : $postalCode;
    }

    public function getAddressAttribute()
    {
        $number = $this->number ?: 'S/N'; // Se não houver número, definir como "S/N"
        $complement = $this->complement ? ", {$this->complement}" : ''; // Se houver complemento, incluí-lo na string

        return "{$this->street}, {$number}{$complement}, {$this->neighborhood}, {$this->city->name}, {$this->city->state->abb}, {$this->postal_code}";
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}

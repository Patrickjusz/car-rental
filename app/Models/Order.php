<?php

namespace App\Models;

use App\Models\Car;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'car_id', 'city', 'email', 'date_from', 'date_to', 'ip', 'user_agent' 
    ];

    /**
     * Get the car
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}

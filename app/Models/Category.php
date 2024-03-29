<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $table = "categories";

    public function car_count(){
        return $this->hasMany(Car::class);
    }
}

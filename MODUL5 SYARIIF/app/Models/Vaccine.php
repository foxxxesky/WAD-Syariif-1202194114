<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $table = 'vaccines';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
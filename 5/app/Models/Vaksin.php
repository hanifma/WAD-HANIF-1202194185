<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaksin extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function pasien() {
        return $this->hasMany(Patient::class);
    }
}

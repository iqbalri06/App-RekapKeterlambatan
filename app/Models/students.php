<?php

namespace App\Models;

use App\Models\lates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class students extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis',
        'name',
        'rombel_id',
        'rayon_id'
    ];

    public function lates() {
        return $this->hasMany(lates::class);
    }

    public function rombel() {
        return $this->belongsTo(rombels::class);
    }

    public function rayon() {
        return $this->belongsTo(rayons::class);
    }
    
}

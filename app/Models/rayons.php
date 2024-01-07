<?php

namespace App\Models;

use App\Models\User;
use App\Models\students;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rayons extends Model
{
    use HasFactory;

    protected $fillable = [
        'rayon',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function student() {
        return $this->hasMany(students::class);
    }

};

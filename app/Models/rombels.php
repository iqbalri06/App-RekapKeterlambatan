<?php

namespace App\Models;

use App\Models\students;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rombels extends Model
{
    use HasFactory;

    protected $fillable = [
        'rombel'
    ];

    public function student() {
        return $this->hasOne(students::class);
    }
}


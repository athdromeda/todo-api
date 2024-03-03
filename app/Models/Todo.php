<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $table = "todo";
    protected $timestamp = false;
    protected $fillable = [
        'tugas',
        'deskripsi'
    ];
}

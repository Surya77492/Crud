<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    use HasFactory;
    protected $table = 'first_task';
    protected $fillable = [
        'title', 'description','completed'
    ];
}

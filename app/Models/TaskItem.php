<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TaskItem extends Model
{
    use HasFactory, Notifiable;


    protected $table = 'tasks';
    protected $fillable = [
        'listItem_id',
        'taskName',
        'description',
        'imgLink',
        'property',
        'deadline',
    ];
}

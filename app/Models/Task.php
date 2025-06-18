<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = ['project_id', 'status_id', 'title', 'description', 'points', 'completed_steps', 'total_steps'];
}

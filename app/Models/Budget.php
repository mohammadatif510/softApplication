<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'budgets';

    protected $fillable = ['project_id', 'total_budget', 'used_budget'];


    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = ['created_by', 'client_id', 'title', 'description', 'status', 'deadline'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function budget()
    {
        return $this->hasOne(Budget::class);
    }
}

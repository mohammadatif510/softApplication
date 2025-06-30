<?php

namespace App\Models;

use App\Helpers\DateHelper;
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

    public function getCreatedAgoAttribute()
    {
        return DateHelper::timeSinceCreated($this->created_at);
    }

    public function getDeadlineInfoAttribute()
    {
        return DateHelper::deadlineRemaining($this->deadline);
    }
}

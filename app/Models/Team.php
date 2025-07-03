<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Permission\Models\Role;

class Team extends Model
{
    protected $fillable = [
        'role_category_id',
        'role_id',
        'team_leader_id',
        'description',
        'project_id',
    ];

    public function members()
    {
        return $this->belongsToMany(User::class, 'team_user')
            ->withTimestamps();
    }

    public function roleCategories()
    {
        return $this->belongsTo(RoleCategory::class, 'role_category_id');
    }

    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function teamLeader()
    {
        return $this->belongsTo(User::class, 'team_leader_id');
    }

    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}

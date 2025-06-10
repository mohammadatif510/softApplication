<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Models\Role;

class RoleCategory extends Model
{
    protected $table = 'role_categories';

    protected $fillable = ['name'];


    /**
     * Get all of the roles for the RoleCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roles(): HasMany
    {
        return $this->hasMany(Role::class);
    }
}

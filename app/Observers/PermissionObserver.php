<?php

namespace App\Observers;

use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;

class PermissionObserver
{
    /**
     * Handle the Permission "created" event.
     */
    public function created(ModelsPermission $permission): void
    {
        $adminRole = Role::where('name', 'admin')->first();

        if ($adminRole) {
            $adminRole->givePermissionTo($permission);
        }
    }

    /**
     * Handle the Permission "updated" event.
     */
    public function updated(ModelsPermission $permission): void
    {
        //
    }

    /**
     * Handle the Permission "deleted" event.
     */
    public function deleted(ModelsPermission $permission): void
    {
        //
    }

    /**
     * Handle the Permission "restored" event.
     */
    public function restored(ModelsPermission $permission): void
    {
        //
    }

    /**
     * Handle the Permission "force deleted" event.
     */
    public function forceDeleted(ModelsPermission $permission): void
    {
        //
    }
}

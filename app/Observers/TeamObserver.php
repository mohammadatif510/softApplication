<?php

namespace App\Observers;

use App\Mail\TeamCreatedMail;
use App\Models\Team;
use Illuminate\Support\Facades\Mail;

class TeamObserver
{
    /**
     * Handle the Team "created" event.
     */
    public function created(Team $team): void
    {
        if ($team->teamLeader && $team->teamLeader->email) {
            Mail::to($team->teamLeader->email)->send(new TeamCreatedMail($team));
        }
    }

    /**
     * Handle the Team "updated" event.
     */
    public function updated(Team $team): void
    {
        //
    }

    /**
     * Handle the Team "deleted" event.
     */
    public function deleted(Team $team): void
    {
        //
    }

    /**
     * Handle the Team "restored" event.
     */
    public function restored(Team $team): void
    {
        //
    }

    /**
     * Handle the Team "force deleted" event.
     */
    public function forceDeleted(Team $team): void
    {
        //
    }
}

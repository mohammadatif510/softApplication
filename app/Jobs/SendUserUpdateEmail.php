<?php

namespace App\Jobs;

use App\Mail\UserUpdateMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendUserUpdateEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $user;
    public $password;

    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)->send(new UserUpdateMail($this->user, $this->password));
    }
}

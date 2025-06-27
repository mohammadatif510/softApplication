<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = [
        'name',
        'company_name',
        'email',
        'phone',
        'address',
        'country',
        'website',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}

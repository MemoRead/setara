<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function getRouteKeyName(): string
    {
        return 'name';
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function incoming_mails()
    {
        return $this->hasMany(IncomingMail::class);
    }
    
    public function outgoing_mails()
    {
        return $this->hasMany(OutgoingMail::class);
    }
}

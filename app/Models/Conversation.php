<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Conversation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $dates = ['last_message_at'];

    public function users()
    {
        return $this->belongsToMany(User::class,'conversation_users')
            ->withPivot('read_at')
            ->withTimestamps()
            ->latest();
    }
    public function others(): BelongsToMany
    {
        return $this->users()->where('user_id', '!=', auth()->id());
    }

    public function message()
    {
        return $this->hasMany(Message::class)->oldest();
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

}

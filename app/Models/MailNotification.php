<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MailNotification extends Model
{
    /** @use HasFactory<\Database\Factories\MailNotificationFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'status',
        'body',
        'published_at'
    ];

    protected function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

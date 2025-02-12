<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    /** @use HasFactory<\Database\Factories\EmailFactory> */
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'email',
        'user_id'
    ];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }
}

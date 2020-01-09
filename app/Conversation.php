<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'product_id', 'sender_id', 'recipient_id', 'message'
    ];
}

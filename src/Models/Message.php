<?php
namespace Pers0n4\XePlugin\Message\Models;

use Xpressengine\Database\Eloquent\DynamicModel;
use Xpressengine\User\Models\User;

class Message extends DynamicModel
{
    protected $table = 'messages';

    public $incrementing = false;

    protected $fillable = [
        'receiver_id',
        'sender_id',
        'title',
        'content',
        'is_readed',
        'created_at',
        'updated_at',
    ];

    public function sender()
    {
        return $this->hasOne(User::class, 'id', 'sender_id');
    }

    public function receiver()
    {
        return $this->hasOne(User::class, 'id', 'receiver_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atte extends Model
{
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    protected $table = 'login';

    protected $fillable = [
        'name',
        'users_id',
        'email',
        'password',
        'enter_time',
        'exit_time',
        'reststart_time',
        'restend_time',
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}

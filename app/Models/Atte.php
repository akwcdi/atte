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
        'user_id',
        'enter_time',
        'exit_time',
        'reststart_time',
        'restend_time',
    ];
    
    public function getID()
    {
        return $this->user_id;
    }

    public function getEnter(){
        return $this->enter_time;
    }

    public function getExit(){
        return $this->exit_time;
    }

    public function getReststart(){
        return $this->reststart_time;
    }

    public function getRestend(){
        return $this->restend_time;
    }
}

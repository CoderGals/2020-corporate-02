<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function user(){
    	return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function parentTask(){
    	return $this->belongsTo(self::class, 'parent_id');
    }

    public function subTasks(){
    	return $this->hasMany(self::class, 'parent_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = ['title', 'description', 'start_time', 'end_time', 'user_id'];



    public  function students(){

        return   $this->belongsTo('App\Models\student','user_id','id');   
    }

}

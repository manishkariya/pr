<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;



class department extends Model
{
    use HasFactory,Notifiable,SoftDeletes;

    protected $fillable = [ "departmentname" ];

    protected $table="department";
    protected $primaryKey = 'depart_id';
}

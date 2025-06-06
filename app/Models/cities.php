<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;



class cities extends Model
{
    use HasFactory,Notifiable,SoftDeletes;

    protected $fillable=["country_id","stateid","cityname"];
    protected $table ="cities";
    protected $primaryKey = 'cityid';

}

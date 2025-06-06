<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;



class countries extends Model
{
    use HasFactory,Notifiable,SoftDeletes;
    protected $fillable = [ 'country_name','status' ];

    protected $table="countries";

    protected $primaryKey = 'cid';


}

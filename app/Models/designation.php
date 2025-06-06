<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class designation extends Model
{
    use HasFactory,Notifiable,SoftDeletes;

    protected $fillable = ["department_id", "designationname" ];
    protected $dates = ['deleted_at'];

    protected $table="designation";
    protected $primaryKey = 'desig_id';


}

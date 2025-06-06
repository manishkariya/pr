<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class employee extends Model
{
    use HasFactory,Notifiable,SoftDeletes;

    protected $fillable = ["E_number", "firstname", "middlename", "lastname","birthdate", "age","department","designation","country","state","city"];

    protected $dates = ['deleted_at'];
    protected $table="employee";



}

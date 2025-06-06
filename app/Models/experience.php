<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class experience extends Model
{
    use HasFactory,Notifiable,SoftDeletes;

    protected $fillable = [ "empid", "totalexperience", "role","company_name", "start_date","end_date" ];

    protected $dates = ['deleted_at'];
    protected $table="experience";
}

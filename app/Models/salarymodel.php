<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;



class salarymodel extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = ["employee_id", "basic","hra","specialallows","overtime","totalsalary"];

    protected $table="salary";
}

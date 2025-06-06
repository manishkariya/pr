<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;




class statemodel extends Model
{
    use HasFactory,Notifiable,SoftDeletes;

    protected $fillable=["countryid","statename","status"];
    protected $table ="states";

    protected $primaryKey = 'state_id';

    public function country()
{
    return $this->belongsTo(countries::class, 'countryid', 'cid');
}


}

<?php

namespace Ikodota\Yeoman\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'Settings';
    //public $timestamps = false;
    protected $fillable = ['key','value','type'];

}
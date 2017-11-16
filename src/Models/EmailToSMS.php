<?php

namespace Dealaxer\GammuE2S\Models;

use Illuminate\Database\Eloquent\Model;

class EmailToSMS extends Model
{
    protected $table = 'email2sms';
   
	protected $fillable = [
		'mode','url','port','username','password','onlyemail',
    ];
}

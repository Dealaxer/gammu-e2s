<?php

namespace Dealaxer\GammuE2S\Models;

use Illuminate\Database\Eloquent\Model;

class Phones extends Model
{
   protected $table = 'phones';
   
   protected $fillable = [
        'ID','UpdatedInDB','InsertIntoDB','TimeOut','Send','Receive','IMEI','IMSI','NetCode','NetName','Client','Battery','Signal','Sent','Received',
    ];
}

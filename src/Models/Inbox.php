<?php

namespace Dealaxer\GammuE2S\Models;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
   protected $table = 'inbox';
   
   protected $fillable = [
        'UpdatedInDB','ReceivingDateTime','Text','SenderNumber','Coding','UDH','SMSCNumber','Class','TextDecoded','ID','RecipientID','Processed','Status',
    ];
}

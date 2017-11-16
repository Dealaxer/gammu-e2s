<?php

namespace Dealaxer\GammuE2S\Models;

use Illuminate\Database\Eloquent\Model;

class Outbox extends Model
{
    protected $table = 'outbox';
   
	protected $fillable = [
		'UpdatedInDB','InsertIntoDB','SendingDateTime','SendBefore','SendAfter','Text','DestinationNumber','Coding','UDH','Class','TextDecoded','ID','MultiPart','RelativeValidity','SenderID','SendingTimeOut','DeliveryRepor','CreatorID','Retries','Priority','Status','StatusCode',
    ];
}

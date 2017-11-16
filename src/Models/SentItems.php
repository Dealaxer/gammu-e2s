<?php

namespace Dealaxer\GammuE2S\Models;

use Illuminate\Database\Eloquent\Model;

class SentItems extends Model
{
    protected $table = 'sentitems';
   
	protected $fillable = [
		'UpdatedInDB','InsertIntoDB','SendingDateTime','DeliveryDateTime','Text','DestinationNumber','Coding','UDH','SMSCNumber','Class','TextDecoded','ID','SenderID','SequencePosition','Status','StatusError','TPMR','RelativeValidity','CreatorID','StatusCode',
    ];
}

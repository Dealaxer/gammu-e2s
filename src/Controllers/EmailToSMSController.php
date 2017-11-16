<?php

namespace Dealaxer\GammuE2S\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Lang;
use App\User;
use Dealaxer\GammuE2S\Models\EmailToSMS;
use Dealaxer\GammuE2S\Models\Outbox;


class EmailToSMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$e2s = EmailToSMS::find(1);
        return view('gammu-e2s::email2sms',['e2s'=>$e2s]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function enable(Request $request)
    {
		$e2s = EmailToSMS::find(1);
		
		if ($e2s) {
			if($request->mode == "yes") {
				$e2s->mode = 1;
				$message = Lang::get('lang-e2s::routes.enabmode2s');
			} else {
				$e2s->mode = 0;
				$message = Lang::get('lang-e2s::routes.dismode2s');
			}
			$e2s->save();
			return redirect()->back()->with('success', $message);
		} else {
			$e2s = new EmailToSMS();
			$e2s->mode = 1;
			$e2s->save();
			return redirect()->back()->with('success', Lang::get('lang-e2s::routes.enabmode2s'));
		}
    }
	 
	public function save(Request $request)
    {
		$e2s = EmailToSMS::find(1);
		$e2s->url = $request->url;
		$e2s->port = $request->port;
		$e2s->username = $request->username;
		$e2s->password = $request->password;
		$e2s->save();
		return redirect()->back()->with('success', Lang::get('lang-e2s::routes.ysucsavedata'));
    } 
	 
	public function execute(Request $request)
    {
		$email2sms = EmailToSMS::find(1);
		if ($email2sms->mode == 1) {
			
			$sort = 'DESC'; // or ASC
			$limit = 1000;
			$offset = 0;
			
			$result = array();
			
			$imap = imap_open('{'.$email2sms->url.':'.$email2sms->port.'/ssl/novalidate-cert}INBOX', $email2sms->username, $email2sms->password);
			
			if ($email2sms->onlyemail == 1 && !$email2sms->email == NULL) {
				$read = imap_search($imap, 'ALL UNSEEN FROM '.$email2sms->email);
			} else {
				$read = imap_search($imap, 'ALL UNSEEN');
			}
			
			if (!is_array($read) && !isset($read[0])) {
				echo "Yes 0 mails";
				exit(); 
			}
			
			if ($imap) { 
				$result['status'] = 'success';
				$result['email']  = $email2sms->username;
				
				if($sort == 'DESC'){
					rsort($read);
				}
				
				$num = count($read);
				
				$result['count'] = $num;
				
				$stop = $limit + $offset;
				
				if($stop > $num){
					$stop = $num;
				}	

				for ($i = $offset; $i < $stop; $i++) {
					
					$overview   = imap_fetch_overview($imap, $read[$i], 0);
					$message    = imap_body($imap, $read[$i], 0);
					$header     = imap_headerinfo($imap, $read[$i], 0);
					$mail       = $header->from[0]->mailbox . '@' . $header->from[0]->host;
					//$image = '';
					
					$message = preg_replace('/--(.*)/i', '', $message);
					$message = preg_replace('/X\-(.*)/i', '', $message);
					$message = preg_replace('/Content\-ID\:/i', '', $message);
					
					$msg = '';     
					
					if (preg_match('/Content-Type/', $message)) {
						$message = strip_tags($message);
						$content = explode('Content-Type: ', $message);
						foreach ($content as $c) {
							$c = preg_replace('/text\/(.*)UTF\-8/', '', $c);
							$c = preg_replace('/text\/(.*)\;/', '', $c);
							$c = preg_replace('/charset\=(.*)/', '', $c);
							$c = preg_replace('/Content\-Transfer\-Encoding\:(.*)/i', '', $c);
							$msg = htmlspecialchars_decode(base64_decode($c));
						}
					} else {
						$msg = $message;
					}
					
					$msg = preg_replace('/text\/(.*)UTF\-8/', '', $msg);
					$msg = preg_replace('/text\/(.*)\;/', '', $msg);
					$msg = preg_replace('/charset\=(.*)/', '', $msg);
					$msg = preg_replace('/Content\-Transfer\-Encoding\:(.*)/i', '', $msg);
					
					$result['inbox'][] = array(
						'id' => $read[$i],
						'subject' => iconv_mime_decode(strip_tags($overview[0]->subject)),
						'from' => $overview[0]->from,
						'email' => $mail,
						'date' => $overview[0]->date,
						'message' => $msg
						//'image' => $image
					);
					
					$result['pagination'] = array(
						'sort' => $sort,
						'limit' => $limit,
						'offset' => array(
							'back' => ($offset == 0 ? null : $offset - $limit),
							'next' => ($offset < $num ? $offset + $limit : null)
						)
					);
					
				}
				
				imap_close($imap);				
			} else {
				$result['status'] = 'error';
			}
			
			foreach ($result['inbox'] as $mail) {
				if(preg_match('/^\(?\+?([0-9]{1,4})\)?[-\. ]?(\d{3})[-\. ]?([0-9]{7})$/', $mail['subject'])) {
					$obox = new Outbox();
					$obox->timestamps = false;
					$obox->DestinationNumber = $mail['subject'];
					$obox->TextDecoded = $mail['message'];
					$obox->CreatorID = "Gammu-E2S 1.0.0";
					$obox->Coding = "Unicode_No_Compression";
					$obox->save();
					
					echo "SMS sent!";
				}
			}
		} else {
			echo "Mode is Disabled";
		}
    }
	
	public function enableoneemail(Request $request)
    {
		$e2s = EmailToSMS::find(1);
		
		if ($e2s) {
			if($request->mode2 == "yes") {
				$e2s->onlyemail = 1;
				$message = Lang::get('lang-e2s::routes.enabmodrecmail');
			} else {
				$e2s->onlyemail = 0;
				$message = Lang::get('lang-e2s::routes.dismodrecmail');
			}
			$e2s->save();
			return redirect()->back()->with('success2', $message);
		} else {
			$e2s = new EmailToSMS();
			$e2s->onlyemail = 1;
			$e2s->save();
			return redirect()->back()->with('success2', Lang::get('lang-e2s::routes.enabmodrecmail'));
		}
    }
	
	public function saveoneemail(Request $request)
    {
		$e2s = EmailToSMS::find(1);
		$e2s->email = $request->email;
		$e2s->save();
		return redirect()->back()->with('success2', Lang::get('lang-e2s::routes.ysucsavedata'));
    }
	
	public function cron()
    {
        return view('gammu-e2s::cron');
    }
	
    public function create(Request $request)
    {
		//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

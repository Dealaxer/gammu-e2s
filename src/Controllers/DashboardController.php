<?php

namespace Dealaxer\GammuE2S\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Lang;
use App\User;
use Dealaxer\GammuE2S\Models\Inbox;
use Dealaxer\GammuE2S\Models\Outbox;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$GammuDBVer = DB::table('gammu')->select('Version')->first();
		
		$laravel = app(); 
		$LaraVer = $laravel::VERSION;
		
		preg_match('/\[(.+)\]/', shell_exec("gammu --version"), $GVer);
		$GammuVer = str_replace("Gammu version ","",$GVer[1]);
		
		$countIn = DB::select("SELECT * FROM inbox WHERE YEAR(`UpdatedInDB`) = YEAR(NOW()) AND WEEK(`UpdatedInDB`, 1) = WEEK(NOW(), 1) AND Class NOT IN (127)");
		$countSi = DB::select("SELECT * FROM sentitems WHERE YEAR(`UpdatedInDB`) = YEAR(NOW()) AND WEEK(`UpdatedInDB`, 1) = WEEK(NOW(), 1) AND Class NOT IN (127)");
		
		sort($countIn);
		sort($countSi);
		
		$weekDI = array();
		$weekSI = array();
		
		foreach($countIn as $cnt_in) {
			$weekDI[] = date("w",strtotime(date_create($cnt_in->UpdatedInDB)->Format('Y-m-d')));
		}
		foreach($countSi as $cnt_si) {
			$weekSI[] = date("w",strtotime(date_create($cnt_si->UpdatedInDB)->Format('Y-m-d')));
		}
		
		$inbox_wd = array_count_values($weekDI);
		$sent_wd = array_count_values($weekSI);

        return view('gammu-e2s::dashboard',['GDBV' => $GammuDBVer, 'LV' => $LaraVer, 'GV' => $GammuVer, 'sent_wd' => $sent_wd, 'inbox_wd' => $inbox_wd]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$smstype = $request->get('smstype');
		$sendto = $request->get('sendto');
		$messagesms = $request->get('messagesms');
		
		if ($smstype == "1") {
			$obox = new Outbox();
			$obox->timestamps = false;
			$obox->DestinationNumber = $sendto;
			$obox->TextDecoded = $messagesms;
			$obox->CreatorID = "Compose SMS - Gammu-E2S 1.0.0";
			$obox->Coding = "Unicode_No_Compression";
			$obox->save();
			$text = Lang::get('lang-e2s::routes.messucsent');
		} else {
			
			shell_exec("gammu-smsd-inject USSD '$sendto'");
			
			$tables = DB::select("SHOW TABLE STATUS LIKE 'inbox'");
			foreach($tables as $table)
			{
				  $next = $table->Auto_increment; //check last sms USSD
			}
	
			while (true) { 
				$result2 = Inbox::where('Class','=', '127')->orderBy('ID','DESC')->limit(1)->first();
				if(!$result2 == NULL){				
					if($result2->ID == $next){
						break;
					}
					
				}
			}
			
			$text = $result2->TextDecoded;
		}

        return response()->json(['success' => true, 'text' => $text]);
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

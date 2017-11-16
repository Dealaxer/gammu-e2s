<?php

namespace Dealaxer\GammuE2S\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Lang;
use Dealaxer\GammuE2S\Models\Inbox;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//$all_in = Inbox::all();
		$all_in = Inbox::whereNotIn('Class', [127])->get();
        return view('gammu-e2s::inbox',['allsms' => $all_in]);
    }
	
	public function remove(Request $request,$id)
    {
		DB::table('inbox')->where('ID', $id)->delete();
		return response()->json(['success' => true, 'tr'=>'tr_'.$id]);
    } 
	
	public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table('inbox')->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>Lang::get('lang-e2s::routes.smsdelsucc')]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

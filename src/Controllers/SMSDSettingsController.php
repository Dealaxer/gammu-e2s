<?php

namespace Dealaxer\GammuE2S\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Lang;

class SMSDSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('gammu-e2s::smsd-settings');
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
    public function update(Request $request)
    {
        if (substr(sprintf('%o', fileperms('/etc/gammu-smsdrc')), -3) == 777) {
			
			$settings = $request->input('smsdsettings');
			
			file_put_contents('/etc/gammu-smsdrc', $settings);

			return redirect()->back()->with('success', Lang::get('lang-e2s::routes.settsavedsucc'));
		} else {
			$settings = $request->input('smsdsettings');
			return redirect()->back()->with('danger', Lang::get('lang-e2s::routes.settnotsaved'));
		}
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
	
	public function destroylogs()
    {
		if (substr(sprintf('%o', fileperms('/var/log/gammu-smsd')), -3) == 777) {
			file_put_contents('/var/log/gammu-smsd', '');
			return redirect()->back()->with('success', Lang::get('lang-e2s::routes.ysuccclearlog'));
		} else {
			return redirect()->back()->with('danger', Lang::get('lang-e2s::routes.notclearperm'));
		}
    }
}

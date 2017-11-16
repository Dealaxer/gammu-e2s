<?php

namespace Dealaxer\GammuE2S\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Lang;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$users = User::all();
        return view('gammu-e2s::users',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function edit(Request $request,$id)
    {
		$user = User::where('id','=',$id)->first();
		echo '<div class="form-group remove-border"><label class="col-sm-3 control-label">'.Lang::get('lang-e2s::routes.yn3').':</label>
				<div class="col-sm-8"><input type="text" class="form-control" id="" name="name" placeholder="'.Lang::get('lang-e2s::routes.yn3').'..." value="'. $user->name .'" required></div>
			</div>
			<div class="form-group"><label class="col-sm-3 control-label">'.Lang::get('lang-e2s::routes.em3').':</label>
				<div class="col-sm-8"><input type="email" class="form-control" id="" name="email" placeholder="'.Lang::get('lang-e2s::routes.em3').'..." value="'. $user->email .'"></div>
			</div>';		
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
        $user = User::find($id);
		$user->name = $request->name;
		$user->email = $request->email;
		$user->save();
		return redirect()->back()->with('success', Lang::get('lang-e2s::routes.succhageacc'). $user->email .'!');
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

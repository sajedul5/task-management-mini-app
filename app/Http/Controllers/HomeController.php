<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;
use App\Office;
use App\Life;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $data['allData'] = Home::where('user_id',$id)->get();
        // $data['homeTask'] = Home::where('user_id',$id)->count();
        // $data['officeTask'] = Office::where('status','0')->count();
        // $data['lifeTask'] = Life::where('status','0')->count();
        return view('home' ,$data);
    }


    public function store(Request $request)
    {
      $this->validate($request,[
      'addTask' => 'required'
    ]);

    $data = new Home();
    $data->user_id = Auth::user()->id;
    $data->status = '0';
    $data->name = $request->addTask;
    $data->save();
    return redirect()->route('home')->with('success','Home Task added ');
    }


    public function update(Request $request, $id)
    {
      //dd('okkk');
      $data = Home::find($id);
      $data->status = '1';
      $data->save();
      return redirect()->route('home')->with('success','Home task completed');

    }

    public function delete($id)
    {
      $user = Home::find($id);
      $user->delete();
      return redirect()->route('home')->with('success','Data deleted successfully!');
    }


}

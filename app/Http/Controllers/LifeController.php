<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Life;
use App\Home;
use App\Office;
use Auth;
class LifeController extends Controller
{
  public function view()
  {
    $id = Auth::user()->id;
    $data['allData'] = Life::where('user_id',$id)->get();
    return view('life', $data);
  }


public function store(Request $request)
{
  $this->validate($request,[
  'addTask' => 'required'
]);

$data = new Life();
$data->user_id = Auth::user()->id;
$data->status = '0';
$data->name = $request->addTask;
$data->save();
return redirect()->route('todo.life.task.view')->with('success','Life Task added ');
}


public function update(Request $request, $id)
{
  //dd('okkk');
  $data = Life::find($id);
  $data->status = '1';
  $data->save();
  return redirect()->route('todo.life.task.view')->with('success','Life task completed');

}

public function delete($id)
{
  $user = Life::find($id);
  $user->delete();
  return redirect()->route('todo.life.task.view')->with('success','Data deleted successfully!');
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Office;
use App\Home;
use App\Life;
use Auth;
class OfficeController extends Controller
{
    public function view()
    {
      $id = Auth::user()->id;
      $data['allData'] = Office::where('user_id',$id)->get();
      return view('office', $data);
    }


  public function store(Request $request)
  {
    $this->validate($request,[
    'addTask' => 'required'
  ]);

  $data = new Office();
  $data->user_id = Auth::user()->id;
  $data->status = '0';
  $data->name = $request->addTask;
  $data->save();
  return redirect()->route('todo.office.task.view')->with('success','Office Task added ');
  }


  public function update(Request $request, $id)
  {
    //dd('okkk');
    $data = Office::find($id);
    $data->status = '1';
    $data->save();
    return redirect()->route('todo.office.task.view')->with('success','Office task completed');

  }

  public function delete($id)
  {
    $user = Office::find($id);
    $user->delete();
    return redirect()->route('todo.office.task.view')->with('success','Data deleted successfully!');
  }
}

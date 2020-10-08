@extends('layouts.app')

@section('content')
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-12" >
                <div class="row justify-content-center wrapper" id="register-box" >
                    <div class="col-lg-10 my-auto">
                      <div class="card-group myShadow">
                        <div class="card justify-content-center rounded-left bg-info p-4">
                          <h3 class="text-center font-weight-blod text-white">Task Management</h3>

                          <hr class="my-3 bg-light myHr">
                          <div class="list-group">

                            <a href="{{route('home')}}" class="list-group-item list-group-item-action seleted"><i class="far fa-star"></i> Home Task </a>
                            <a href="{{route('todo.office.task.view')}}" class="list-group-item list-group-item-action"><i class="far fa-star"></i> Office Task </a>
                            <a href="{{route('todo.life.task.view')}}" class="list-group-item list-group-item-action"><i class="far fa-star"></i> My Life Task </span></a>

                          </div>

                        </div>
                        <div class="card rounded-right p-4" style="flex-grow:1.4;">
                          <h1 class="text-center font-weight-blod text-info">Home Task</h1>
                          <a href="#" class=" btn btn-info" data-toggle="modal" data-target="#add-task"><i class="fa fa-plus text-light"></i> Add Task</a>
                          <hr class="my-3">
                          <div class="">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                  <tr>
                                    <th>SL.</th>
                                    <th>Date</th>
                                    <th>Task Name</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($allData as $key => $value)
                                  <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $value->created_at->format('d/m/Y')}}</td>
                                    <td>
                                      @if($value->status=='0')
                                      <strong class="text-dark ">{{$value->name}}</strong>
                                      @elseif($value->status=='1')
                                      <strong class="text-success text-decoration" style="text-decoration-line: line-through;">{{$value->name}}</strong>
                                      @endif
                                    </td>
                                    <td>
                                      <a href="{{route('todo.home.task.update',$value->id)}}" title="Edit" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
                                      <a href="{{route('todo.home.task.delete',$value->id)}}" title="Delete" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
          </div>
      </div>

    <!-- Modal -->
    <div class="modal fade" id="add-task" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title text-info" id="exampleModalLabel">Add Home Task</h3>
          </div>
          <div class="modal-body">
            <form class="" action="{{route('todo.home.task.store')}}" method="post">
                @csrf
                <div class="form-row">
                  <div class="col-md-9">
                    <input type="text" name="addTask" placeholder="Add Home Task" class="form-control">
                    <span class="text-danger">{{($errors->has('addTask'))?($errors->first('addTask')):''}}</span>
                  </div>
                  <div class="col-md-3">
                    <input type="submit"  value="Add Task" class="btn btn-info">
                  </div>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
@endsection

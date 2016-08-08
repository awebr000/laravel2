<!-- resources/views/tasks.blade.php -->

@extends('layout.app')

@section('content')

<div class="panel-body">
  <!-- Display Validation Errors -->
        @include('common.errors')

  <div class="form-horizontal">
    {{Form::open(['url' => 'task']);}}
    <!-- task name -->
  <div class="form-group">
    <label for="task" class="col-sm-3 control-label">Task</label>

    <div class="col-sm-6">
      <input type="tex" name="name" id="task-name" class="form-control">
    </div>
  </div>

  <!-- task button -->
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
      <button type="submit" class="btn btn-default">
        <i class="fa fa-plus"></i>Add Task</button>
      </div>
    </div>
  {{Form::close();}}
  </div>
</div>

<!-- show current task -->

@if (count($tasks) > 0)
  <div class="panel panel-default">
    <div class="panel-heading">
      Current Tasks
    </div>

    <div class="panel-body">
      <table class="table table-striped task-table">
          <!-- Headings -->
          <thead>
            <th>Task</th>
            <th>&nbsp;</th>
          </thead>
          <!-- Table Body -->
          <tbody>
            @foreach ($tasks as $task)
                <tr>
                  <td class="table-text">
                    <div>{{ $task->name }}</div>
                  </td>


                  <td>
                        {{Form::open(['url' => "/task/{$task->id}"]);}}


                          <button type="submit" class="btn btn-danger">
                              <i class="fa fa-btn fa-trash"></i>Delete
                          </button>
                        {{Form::close();}}
                  </td>
                </tr>
              @endforeach
            </tbody>
            </table>
        </div>
    </div>
@endif
@stop

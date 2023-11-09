<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Daily Tasks</title>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="container">
        <div class="text-center">
              <h1>My Daily Tasks</h1>
              <br/><br/>
               <div class="row">
                   <div class="col-md-12">
                      @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>

                      @endforeach


                       <form method="post" action="/saveTask">
                        {{csrf_field()}}
                                <input type="text" name="task" class="form-control" placeholder="Please Enter your task here">
                                <br/>
                                <input type="hidden" name="isCompleted" class="form-control" placeholder="Please Enter your task here">
                                <br/>
                                <br/>
                                <button type="submit" class="btn btn-primary"  name="save" value="save">Save</button>
                                <button type="submit" class="btn btn-warning" name="clear" value="clear">Clear</button>
                                <br/><br/>
                      </form>
                        <table class="table table-dark">
                            <th>Id</th>
                            <th>Task</th>
                            <th>IsCompleted</th>
                            <th>Action</th>
                            <th>Delete Task</th>
                            <th>Update Task</th>
                            @foreach($Tasks as $task)
                            <tr>
                                <td>{{$task->id}}</td>
                                <td>{{$task->task}}</td>
                                <td>
                                 @if($task->isCompleted)    
                                  <button class="btn btn-success">Completed</button>
                                 @else
                                  <button class="btn btn-warning">Not Completed</button>
                                 @endif
                                </td>
                                <td>
                                    @if($task->isCompleted)
                                    <a href="/markasnotcompleted/{{$task->id}}" class="btn btn-primary">Mark As Not Completed</a>
                                    @else
                                    <a href="/markascompleted/{{$task->id}}" class="btn btn-warning">Mark As Completed</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="/deleteTask/{{$task->id}}" class="btn btn-danger">Delete</a>
                                </td>
                                <td>
                                    <a href="/getTask/{{$task->id}}" class="btn btn-success">Update</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                   </div>
               </div>
        </div>
    </div>
</body>
</html>
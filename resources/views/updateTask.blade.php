<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Update Task</title>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">Updating Tasks</h1>
        @foreach($Task as $tasks)
        <form method="post" action="/updateTask">
         {{csrf_field()}}
         <input type="hidden" name="id" class="form-control" value="{{$tasks->id}}">
         <br/>
         <input type="text" name="task" class="form-control" value="{{$tasks->task}}">
         <br/>
         <input type="hidden" name="isCompleted" class="form-control" value="{{$tasks->isCompleted}}">
          <br/>
          <br/>
          <button type="submit" class="btn btn-primary"  name="save" value="save">Update</button>
          <br/><br/>
        </form>
     @endforeach
   </div>
</body>
</html>
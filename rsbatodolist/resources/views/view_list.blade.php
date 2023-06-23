<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <title>Todo App</title>

        <!-- Fonts -->

        <!-- Styles -->
        <style>
            table{
                background: white!important;
                border: 1px solid;
            }
        </style>


    </head>

    <body class="antialiased">

        
        <div class="container d-flex align-items-center justify-content-center vh-100">
            <div class="text-center w-50">
              <table class="table">
                <tr>                
                  <td>Id</td>
                  <td>To do</td>
                  <td>Created At</td>
                  <td>Status</td>
                  <td>Action</td>
                </tr>
          
                @foreach($todo_arr as $td)
                <tr>
                  <td>{{$td->id}}</td>
                  <td>{{$td->todo_item}}</td>
                  <td>{{$td->created_at}}</td>
                  <td>{{$td->status}}</td>
                  <td><a href="delete/{{$td->id}}">Delete</a> | <a href="edit/{{$td->id}}">Edit</a></td>
                </tr>
                @endforeach
              </table>
          
              <a href="create"><button type="button" class="btn btn-success">Create</button></a>
            </div>
          </div>

          
          
    
    </body>
</html>

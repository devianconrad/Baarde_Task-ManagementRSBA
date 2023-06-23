<?php if (Auth::check()) {
  
  $userName = Auth::user()->name;
 
} else {
  
  return redirect()->route('login'); 
} ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Baarde_Task Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <script>
      if (window.history.replaceState) {
        if (window.location.href.indexOf('/') > -1) {
          window.history.replaceState(null, null, window.location.href);
        }
      }
    </script>
    

    
<style>
    * {
  font-family: 'Roboto', sans-serif;
  font-weight: 500;
}

 body{
 background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 7%, rgba(24,13,3,1) 22%, rgba(3,94,112,1) 100%);
    }

      .mt-5{
        margin-top: 13.45% !important;
      }
   
    </style>
  </head>
  <body>
    <div class="tableContainer d-flex align-items-center justify-content-center mt-5">
      <div class="col-lg-4">
          <div class="card" style="border-radius: 2rem;">
            <div class="card-header d-flex justify-content-between">
              <h3 class="card-title m-3">Task Management</h3>
            
              <div class="d-flex align-items-center">
                <h5 class="m-3"> Welcome, {{ Auth::user()->name }}</h5>
            
                <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" style="border-radius: 2rem;" type="submit">Logout</button>
                </form>
              </div>
            </div>
            
      <div class="card-body" style="max-height: 300px; overflow-y: auto;">
      <div class="text-center w-100" > 
        <table class="table">
          <tr>                
          
            <td>Item</td>
            <td>Created At</td>
            <td>Status</td>
            <td>Action</td>
          </tr>
    
          @foreach($todo_arr as $td)
          <tr>
          
            <td>{{ Str::limit($td->todo_item, 40) }}</td>
            <td>{{$td->created_at}}</td>
            <td>{{$td->status}}</td>
            <td><a href="edit/{{$td->id}}"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg"><path d="M880 836H144c-17.7 0-32 14.3-32 32v36c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-36c0-17.7-14.3-32-32-32zm-622.3-84c2 0 4-.2 6-.5L431.9 722c2-.4 3.9-1.3 5.3-2.8l423.9-423.9a9.96 9.96 0 0 0 0-14.1L694.9 114.9c-1.9-1.9-4.4-2.9-7.1-2.9s-5.2 1-7.1 2.9L256.8 538.8c-1.5 1.5-2.4 3.3-2.8 5.3l-29.5 168.2a33.5 33.5 0 0 0 9.4 29.8c6.6 6.4 14.9 9.9 23.8 9.9z"></path></svg></a> | <a href="delete/{{$td->id}}"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M17 4h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5V2h10v2zM9 9v8h2V9H9zm4 0v8h2V9h-2z"></path></g></svg></a></td>
          </tr>
          @endforeach
        </table>
    
        
      </div>
    </div>
    <hr class="mx-5">
    <div class="text-center w-100 mb-5 mt-1">
    <a href="create"><button  style="background-color:#035e70; border-radius: 2rem;" type="button" class="btn btn-secondary btn-rounded w-25">Create</button></a>
  </div>
  </div>
</div>
</div>


  </body>
</html>





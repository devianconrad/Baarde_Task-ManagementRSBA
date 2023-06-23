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
<style>
    * {
  font-family: 'Roboto', sans-serif;
  font-weight: 500;
}

 body{
 background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 7%, rgba(24,13,3,1) 22%, rgba(3,94,112,1) 100%);
    }
</style>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-6">
              <div class="card shadow-2-strong" style="border-radius: 2rem;">
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

                <h3 class="mb-2 text-center m-5 mb-5">Create</h3>

                @if(Session::has('error'))
                <div class="alert alert-danger w-75 text-center align-items-center justify-content-center mx-auto" role="alert">
                    {{ Session::get('error') }}
                </div>
                @endif
                

                <div class="card-body p-5 d-flex justify-content-center align-items-center">

                  
                  
                  <div class="text-center w-100">
                  <table class="table">
                    <tr>
                      <td>To-do Item</td>
                      <td>Action</td>
                    </tr>
                
                    <tr>
                    
                  
                    <form action="save_new_list">
                    @csrf
                    <td><input class="form-control me-3" type="text" name="todo_item" placeholder="Enter New List" minlength="5" maxlength="50" required></td>
                    <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="status" value="TO-DO">
                    
                      
                     
                    </div>
                
                <td>
                  <div class="d-flex justify-content-center align-items-center">
                      <button type="submit" value="Save" style="background-color:#035d6f" class="btn btn-success me-1">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1.3em" width="1.3em" xmlns="http://www.w3.org/2000/svg">
                          <g>
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path d="M4 3h14l2.707 2.707a1 1 0 0 1 .293.707V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm3 1v5h9V4H7zm-1 8v7h12v-7H6zm7-7h2v3h-2V5z"></path>
                          </g>
                        </svg>
                      </button>
                    </form>
                
                    <a href="../home" class="btn btn-danger">
                      <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1.3em" width="1.3em" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z"></path>
                      </svg>
                    </a>
                  </div>
                </td>
                

                    </tr>
                  </div>
                </div>
                
                  
      
             
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <script>

        function togglePasswordVisibility() {
          const passwordInput = document.getElementById('typePasswordX-2');
          const showPasswordCheckbox = document.getElementById('showPassword');
      
          if (showPasswordCheckbox.checked) {
            passwordInput.type = 'text';
          } else {
            passwordInput.type = 'password';
          }
        }
      </script>
      
</body>
</html>

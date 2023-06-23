<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="cache-control" content="private, max-age=0, no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
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
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong" style="border-radius: 2rem;">
                <div class="card-header">
                    <h1 class="card-title m-3" >Task Management</h1>
                </div>
                <div class="card-body p-5">
      
                  <h3 class="mb-5 text-center">Login</h3>

                  @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @elseif(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
      
                 
      
                  <div>
                  <form action="{{ route('login') }}" method="POST">
                  @csrf
                  <div class="form-outline mb-4">
                    <input name="email" type="email" id="typeEmailX-2" class="form-control form-control-lg" required/>
                    <label class="form-label" for="typeEmailX-2">Email</label>
                  </div>
      
                  <div class="form-outline mb-4">
                    <input name="password" type="password" id="typePasswordX-2" class="form-control form-control-lg" required />
                    <label class="form-label" for="typePasswordX-2">Password</label>
                    <div class="form-check mt-2">
                      <input class="form-check-input" type="checkbox" id="showPassword" onclick="togglePasswordVisibility()" />
                      <label class="form-check-label" for="showPassword">Show Password</label>
                    </div>
                    
                  </div>
                  <hr class="my-4">
                    <button class="btn btn-primary btn-lg btn-block w-100" style="background-color:#035e70;" type="submit">Login</button>

                    
                  </form>

                  <form action="{{ route('register') }}">
                    @csrf
                    <div class="text-center">
                    <button class="btn btn-primary btn-sm btn-block mt-1 w-25" style="background-color:#035e70;" type="submit">Register</button>
                    </div>
                  </form>

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
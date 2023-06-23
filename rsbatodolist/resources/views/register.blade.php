<!DOCTYPE html>
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
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 2rem;">
                        <div class="card-header">
                            <h1 class="card-title m-3">Task Management</h1>
                        </div>
                        <div class="card-body p-5">
                            <h3 class="mb-5 text-center">Register</h3>
                            @if(Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <form action="{{ route('register') }}" method="POST" onsubmit="return validatePasswordConfirmation()">
                                @csrf

                                @if ($errors->has('name'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ $errors->first('name') }}
                                    </div>
                                @elseif ($errors->has('email'))
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif

                                    <div class="form-outline mb-4">
                                    <input type="text" name="name" id="name" class="form-control form-control-lg" required/>
                                    <label class="form-label" for="typeEmailX-2">Username</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="email" name="email" id="email" class="form-control form-control-lg" required/>
                                    <label class="form-label" for="typeEmailX-2">Email Address</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <span style="font-size: 10px; color: red;">Apply: 1 uppercase, 1 lowercase, 1 digit, 1 symbol, no more than 2 duplicating letter/number</span>
                                    <input name="password" type="password" id="typePasswordX-2" class="form-control form-control-lg" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*])(?!.*([A-Za-z\d!@#$%^&*])\1\1)[A-Za-z\d!@#$%^&*]{7,}$" required/>
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                </div>
                                
                                <div class="form-outline mb-4">
                                    <input name="password_confirmation" type="password" id="password_confirmation" class="form-control form-control-lg" required />
                                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                                </div>

                                <p id="password-confirmation-message" style="color: red;"></p>
                                                               

                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="showPassword" onclick="togglePasswordVisibility()"/>
                                    <label class="form-check-label" for="showPassword">Show Password</label>
                                </div>
                                <hr class="my-4">
                                <button class="btn btn-primary btn-lg btn-block w-100" style="background-color:#035e70;" type="submit">Register</button>
                            </form>
                            <form action="{{ route('login') }}">
                                @csrf
                                <div class="text-center">
                                    <button class="btn btn-primary btn-sm btn-block mt-1 w-25" style="background-color:#035e70;" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>

        function togglePasswordVisibility() {
          const passwordInput = document.getElementById('typePasswordX-2');
          const passwordInputConfirm = document.getElementById('password_confirmation');
          const showPasswordCheckbox = document.getElementById('showPassword');
      
          if (showPasswordCheckbox.checked) {
            passwordInput.type = 'text';
            passwordInputConfirm.type = 'text';
          } else {
            passwordInputConfirm.type = 'password';
            passwordInput.type = 'password';
          }
        }

        function validatePasswordConfirmation() {
        var passwordInput = document.getElementById('typePasswordX-2');
        var confirmPasswordInput = document.getElementById('password_confirmation');
        var messageElement = document.getElementById('password-confirmation-message');

        if (passwordInput.value !== confirmPasswordInput.value) {
            messageElement.innerText = 'Password and Confirm Password must match';
            return false;
        } else {
            messageElement.innerText = '';
            return true;
        }
    }


      </script>
      
</body>
</html>

<!-- filepath: /f:/xampp/prj-laravel/prj/resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="backend/css/styles.css" rel="stylesheet" />
    <link href="backend/css/custom.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="bg-color">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="text" name="email" placeholder="name@example.com" />
                                            @if ($errors->has('email'))
                                                <span class="text-danger">*{{
                                                 $errors->first('email') }}</span>
                                                
                                            @endif
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3 password-container">
                                            <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" />
                                            @if ($errors->has('password'))
                                                <span class="text-danger">*{{
                                                 $errors->first('password') }}</span>
                                            @endif
                                            <label for="inputPassword">Password</label>
                                            <i class="fas fa-eye toggle-password" onclick="togglePassword()"></i>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="password.html">Forgot Password?</a>
                                            <button class="btn btn-primary" type="submit" href="{{route('home')}}">Đăng Nhập</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="backend/js/scripts.js"></script>
    
</body>
</html>
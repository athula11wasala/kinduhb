<!DOCTYPE html>
<html>

    <head>
        <title>SAS Login Page</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="{{url('js/bootstrap.min.js')}}" ></script>
        <script src="{{url('js/jquery.min.js')}}" ></script>
    </head>
    <!--Coded with love by Mutiullah Samim-->
    <body>
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="user_card" style="height:424px">
                    <div class="d-flex justify-content-center">
                        <div class="brand_logo_container">

                            <img src= "{{url('image/sas.png')}}"  class="brand_logo" alt="Logo">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center form_container">
                        <form method="post" action="{{"login"}}">
                            {{ csrf_field() }}
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="uname" class="form-control input_user" value="" placeholder="username">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control input_pass" value="" placeholder="password">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mt-3 login_container">
                                <input type="submit" value="Login" name="button" class="btn login_btn">
                            </div>
                        </form>
                    </div>
                    <br>
                    @if (session('message'))
                    <span class="alert alert-danger">{{ session('message') }}</span>
                    @endif
                    
                </div>
            </div>
        </div>
    </body>
</html>

<link rel="stylesheet" href="{{ asset('css/login.css') }}" >
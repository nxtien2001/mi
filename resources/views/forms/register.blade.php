<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng kí</title>
    <link rel="stylesheet" href="{{asset('backend/css/login.css')}}">
    <link rel="stylesheet" href="{{asset('backend/js/show-hide.js')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Clean Login Form Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />

    <!-- css files -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- /css files -->

    <!-- online fonts -->
    <link href="//fonts.googleapis.com/css?family=Sirin+Stencil" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- online fonts -->

<body>
    <div class="container demo-1">
        <div class="content">
            <div id="large-header" class="large-header">
                <h1 style="font-size: 25px;">Welcome to Miichisoft</h1>
                <div class="main-agileits">
                    <!--form-stars-here-->
                    <div class="form-w3-agile">
                        <h2>Register Now</h2>
                        <form action="{{route('postRegister')}}" method="post">
                            @csrf
                            <div class="form-sub-w3">
                                <input type="text" value="{{old('name')}}" name="name" placeholder="Name " />
                                <div class="icon-w3">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-sub-w3">
                                <input type="text" name="email" value="{{old('email')}}" placeholder="Email " />
                                <div class="icon-w3">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-sub-w3">
                                <input type="password" id="password" name="password" placeholder="Password" />
                                <div class="icon-w3">
                                    <i class="fa fa-unlock-alt" aria-hidden="true" id="eye" onclick="toggle()"></i>
                                </div>
                                @error('password')
                                <div class=" alert alert-danger">{{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-sub-w3">
                                <input type="password" id="password" name="password_confirmation" placeholder="Password confirmation" />
                                <div class="icon-w3">
                                    <i class="fa fa-unlock-alt" aria-hidden="true" id="eye" onclick="toggle()"></i>
                                </div>
                                @error('password_confirmation')
                                <div class=" alert alert-danger">{{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="submit-w3l">
                                <input type="submit" value="Register">
                            </div>
                        </form>
                        <div class="social w3layouts">
                            <div class="heading">
                                <h5>Or Login with</h5>
                                <div class="clear"></div>
                            </div>
                            <div class="icons">
                                <a href="{{route('login.facebook')}}"><i class="fab fa-facebook-square"></i></a>
                                <a href="{{route('login.google')}}"><i class="fab fa-google-plus-square"></i></a>
                                <a href="{{route('login.github')}}"><i class="fab fa-github-square"></i></a>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <!--//form-ends-here-->
                </div><!-- copyright -->
                <div class="copyright w3-agile">
                    <p> © 2001 Nguyễn Xuân Tiến</p>
                </div>
                <!-- //copyright -->
            </div>
        </div>
    </div>

</body>
<script>
    var state = false;

    function toggle() {
        if (state) {
            document.getElementById("password").setAttribute("type", "password");
            document.getElementById("eye").style.color = "black";
            state = false;
        } else {
            document.getElementById("password").setAttribute("type", "text");
            document.getElementById("eye").style.color = "#5887ef";
            state = true;
        }
    }
</script>

</html>
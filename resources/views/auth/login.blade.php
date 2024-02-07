@extends('layouts.app')

@section('content')

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <section class="sign-in">
                            <div class="container">
                                <div class="signin-content">
                                    <div class="signin-image">
                                        <figure><img src="images/signin-image.jpg" alt="sign up image"></figure>
                                        <a href="#" class="signup-image-link">Create an account</a>
                                    </div>

                                    <div class="signin-form">
                                        <h2 class="form-title">Log in</h2>
                                        <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                                            @csrf
                                            <div class="form-group">
                                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                                <input type="password" name="password" id="password" placeholder="Password"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" name="remember" id="remember" class="agree-term" />
                                                <label for="remember" class="label-agree-term"><span><span></span></span>Remember me</label>
                                            </div>
                                            <div class="form-group form-button">
                                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                                            </div>
                                        </form>
                                        <div class="social-login">
                                            <span class="social-label">Or log in with</span>
                                            <ul class="socials">
                                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        
@endsection

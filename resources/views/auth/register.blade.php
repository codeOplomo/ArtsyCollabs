@extends('layouts.app')

@section('content')

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Sign up') }}</div>

                    <div class="card-body">
                        <section class="signup">
                            <div class="container">
                                <div class="signup-content">
                                    <div class="signup-form">
                                        <form method="POST" action="{{ route('register') }}" class="register-form" id="register-form">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                                <input type="password" name="password" id="password" placeholder="Password"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="password_confirmation"><i class="zmdi zmdi-lock-outline"></i></label>
                                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                                            </div>
                                            <div class="form-group form-button">
                                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="signup-image">
                                        <figure><img src="images/signup-image.jpg" alt="sign up image"></figure>
                                        <a href="#" class="signup-image-link">I am already a member</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        
@endsection

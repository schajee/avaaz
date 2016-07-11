@extends('layouts.main')

@section ('content')
<section>
    <div class="container">
        <div class="page-header">
            <h1>Log in / Sign up</h1>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <ul class="nav nav-pills nav-stacked" role="tablist">
                    <li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="pill">Log in</a></li>
                    <li role="presentation"><a href="#signup" aria-controls="signup" role="tab" data-toggle="pill">Sign up</a></li>
                    <li role="presentation"><a href="#forgot" aria-controls="forgot" role="tab" data-toggle="pill">Forgot?</a></li>
                </ul>
            </div>
            <div class="col-sm-10">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="login">
                        @if (isset($status))
                        <div class="alert alert-danger" role="alert">{{$status}}</div>
                        @endif
                        <form method="post" action="/auth/login" class="auth-form">
                            <p>
                                <a href="/login/facebook" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-facebook"></i> Facebook</a>
                                <a href="/login/google" class="btn btn-danger"><i class="fa fa-fw fa-lg fa-google-plus"></i> Google</a>
                            </p>

                            <div class="panel">
                                <div class="panel-body">
                                    <h4>Or login using email or phone&hellip;</h4>
                                    <div class="form-group @if($errors->has('identity')) has-error @endif">
                                        <input type="text" name="identity" id="identity" class="form-control" maxlength="100" placeholder="Email or phone" value="{{old('identity')}}" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control" maxlength="100" placeholder="Password" required>
                                    </div>
                                    {!! csrf_field() !!}
                                    <button type="submit" class="btn btn-success">Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="signup">
                        <form method="post" action="/auth/signup" class="auth-form">
                            <p>
                                <a href="/login/facebook" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-facebook"></i> Facebook</a>
                                <a href="/login/google" class="btn btn-danger"><i class="fa fa-fw fa-lg fa-google-plus"></i> Google</a>
                            </p>

                            <div class="panel">
                                <div class="panel-body">
                                    <h4>Or sign up using email or phone&hellip;</h4>
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" maxlength="100" placeholder="Full name" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="identity" id="identity" class="form-control" maxlength="100" placeholder="Email or phone" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control" maxlength="100" placeholder="Password" required>
                                    </div>
                                    {!! csrf_field() !!}
                                    <button type="submit" class="btn btn-success">Sign up</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="forgot">
                        <form method="post" action="/auth/forgot" class="auth-form">
                            <div class="panel">
                                <div class="panel-body">
                                    <h4>Reset password&hellip;</h4>
                                    <div class="form-group">
                                        <input type="text" name="identity" id="identity" class="form-control" maxlength="100" placeholder="Email or phone" required>
                                    </div>
                                    {!! csrf_field() !!}
                                    <button type="submit" class="btn btn-success">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
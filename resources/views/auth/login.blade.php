<form method="post" action="/auth/signin" id="modal-form">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Sign in to continue...</h4>
    </div>

    <div class="modal-body">

        <a href="/login/facebook" class="btn btn-block btn-primary"><i class="fa fa-fw fa-lg fa-facebook"></i> Facebook</a>
        <a href="/login/google" class="btn btn-block btn-danger"><i class="fa fa-fw fa-lg fa-google-plus"></i> Google</a>
        
        <hr class="or-hr" />
        <div class="or-txt">or</div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-lg fa-at"></i></span>
                <input type="text" name="identity" id="identity" class="form-control" maxlength="100" placeholder="Email or phone" required autofocus>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-lg fa-lock"></i></span>
                <input type="password" name="password" id="password" class="form-control" maxlength="100" placeholder="Password" required>
            </div>
        </div>

        {!! csrf_field() !!}
        <button type="submit" class="btn btn-block btn-success">Sign in</button>
        
    </div>

</form> 


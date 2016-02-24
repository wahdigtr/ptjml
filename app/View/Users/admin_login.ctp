    <div class="login-box">
      <div class="login-logo">
        <a href="<?=Router::url('/admin',true);?>">PT<b>JML</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <?=$this->Session->flash();?>
        <p class="login-box-msg">Sign in to start your session</p>
        <?=$this->Form->create('User', ['role' => 'form']);?>
          <div class="form-group has-feedback">                   
            <?=$this->Form->input('username', ['class' => 'form-control', 'placeholder' => 'Username', 'label' => false, 'div' => false]);?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <?=$this->Form->input('password', ['class' => 'form-control', 'placeholder' => 'Password', 'type' => 'password', 'label' => false, 'div' => false]);?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
                <?=$this->Form->submit('Log In', ['class' => 'btn btn-primary submit']);?>
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
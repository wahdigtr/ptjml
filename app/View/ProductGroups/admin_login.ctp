    <div id="wrapper">
        <div id="login" class="animate form">
            <section class="login_content">
                <?=$this->Form->create('ProductGroup', ['role' => 'form']);?>
                    <h1>Login Form</h1>
                    <div>
                        <?=$this->Form->input('username', ['class' => 'form-control', 'placeholder' => 'Username', 'label' => false, 'div' => false]);?>
                    </div>
                    <div>
                        <?=$this->Form->input('password', ['class' => 'form-control', 'placeholder' => 'Password', 'type' => 'password', 'label' => false, 'div' => false]);?>
                    </div>
                    <div>
                    <?=$this->Form->submit('Log In', ['class' => 'btn btn-primary submit']);?>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">

                        <div class="clearfix"></div>
                        <br />
                        <div>
                            <h1><i class="fa fa-plane" style="font-size: 26px;"></i> TripOnline</h1>

                            <p>©2015 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
                <!-- form -->
            </section>
            <!-- content -->
        </div>
    </div>
<div class = "form-signin">
    <?php
    $attributes = array('name' => 'login_form', 'id' => 'login_form');
    echo form_open('login/process_login', $attributes);
    form_close();
    ?>

    <p class = "form-signin-heading">Silahkan Login</p><br />
    <input type = "text" name="username" class = "form-control" placeholder = "Username" required autofocus>
    <br />
    <input type = "password" name="password" class = "form-control" placeholder = "Password" required>
    <br />
    <button type = "submit" name = "submit" class = "btn btn-lg btn-primary btn-block" >Sign in</button>

</div>
<link rel="stylesheet" href="../style/login.css">

<form class="form-login" action="index.php?action=login&act=login_action" method="post">
  <div class="imgcontainer">
    <img src="./image/login.png" alt="Avatar" class="avatar">
    <h1>LOGIN</h1>
  </div>
  <div class="container">
    <label for="uname"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <label>
      <input type="checkbox" unchecked="unchecked" name="remember"> Remember me
    </label> <br>
    <label class="psw"> <p>Forgot <a href="#">password?</a></p> </label>
    
    <p> Don't Have account <a href="index.php?action=home&act=signup">Register</a></p>
    
    <button type="submit">Login</button>
</div>
</form>

<form class="form-login" action="admin/index.php?action=loginadmin&act=login_admin" method="post">
  <div class="imgcontainer">
    <img src="../image/login.png" alt="Avatar" class="avatar">
    <h1>LOGIN ADMIN</h1>
  </div>
  <div class="container">
    <label for="uname"><b>Admin Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Your Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <span class="psw">Forgot <a href="#">password?</a></span>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" unchecked="unchecked" name="remember"> Remember me
    </label>
</div>

  <div class="container" style="background-color:#f1f1f1">
    <a class="btn cancelbtn" href="index.php?action=home&act=signup" >Create Account</a>
  </div>
</form>
<style>
.input2{
    float: left;
    padding: 0px;
    margin: 0px;
    
}
/* Full-width inputs */
input[type=email], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
    width: 100%;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the avatar image inside this container */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

/* Avatar image */
.avatar {
  border-radius: 50%;
}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* The "Forgot password" text */
span.psw {
  float: left;
  padding-top: 16px;
}
.form-login{
  min-height: 72vh;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
    display: block;
    float: none;
  }
  .cancelbtn {
    width: 100%;
  }
}
</style>
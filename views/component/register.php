<link rel="stylesheet" href="../style/register.css">

<form action="index.php?action=register&act=register_action" method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p style="color: red;">Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>User Name</b></label>
    <input type="text" placeholder="Enter Name" name="user_name" required>
    
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="email"><b>Phone</b></label>
    <input type="text" placeholder="Enter Phone" name="phone" required>

    <label for="email"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <label for="psw-repeat"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="passrepeat" required>

    <label>
      <input type="checkbox" unchecked="unchecked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
    <p>Have account <a href="index.php?action=home&act=login">Login</a></p>
    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" name="signup" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form> 

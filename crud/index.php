<?php
        include "config/config.php";//for connecting to database
?>
<?php
      if((isset($_POST['submit'])))
        {    //getting the form value through POST method
        
          $fullname=$_POST['fullname'];
          $email=$_POST['email'];
          $username=$_POST['username'];
          $password= md5($_POST['psw']); //md5 method for sending password securely or encoded.
        
 

         $query = "INSERT INTO users(fullname,username,email,password) VALUES('$fullname','$username','$email','$password')";
         $fire = mysqli_query($con,$query);

         if($fire) echo "data submitted success";
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
        body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336; 

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>
        <form action= "<?php $_SERVER['PHP_SELF']?>" method="POST" style="border:1px solid #ccc"> 
            <div class="container">
                <h1>Sign Up</h1>
             <p>Please fill in this form to create an account.</p>
                <hr>
                 <label for="fullname"><b>Fullname</b></label>
                 <input type="text" placeholder="Fullname" name="fullname" id="fullname">

                 <label for="email"><b>Email</b></label>
                 <input type="text" placeholder="Enter Email" name="email">

                 <label for="username"><b>Username</b></label>
                 <input type="text" placeholder="Username" name="username" id="username">

                 <label for="psw"><b>Password</b></label>
                  <input type="password" placeholder="Enter Password" name="psw" id="psw">

                 <label for="psw-repeat"><b>Repeat Password</b></label>
                 <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat">
    
                 <label>
                 <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                 </label>
    
                    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                    <div class="clearfix">
                    <button type="button" class="cancelbtn">Cancel</button>
                    <button type="submit" name="submit" id="submit" class="signupbtn">Sign Up</button>
                    </div>
            </div>
         </form>
                <div>
                <h3>User Data</h3>
                <!--show user data here -->
                <table>
                <tr>
                <th>fullname</th>
                <th>email</th>
                <th>username</th>
                </tr>
                
    <?php
                $query = "SELECT * FROM users";
                $fire = mysqli_query($con,$query);
                if(mysqli_num_rows($fire)>0){
                    while($user=mysqli_fetch_assoc($fire)){ ?>

                    <tr>
                    <td> <?php echo $user['fullname']; ?> </td>
                    <td> <?php echo $user['email']; ?> </td>
                    <td> <?php echo $user['username']; ?> </td>
                    <td>
                    <a  classs="btn btn-sm btn-danger" href="<?php $_SERVER['SELF']">Delete</a> </td>                   
                    </tr>
                    <?php
                        
                    }
                }
                
    ?>
    
</body>
</html>

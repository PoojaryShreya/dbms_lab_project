<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <title>Study Material For Engineering Student
            
        </title>
    </head>
    <body>
    <h1><font color="#29b10e"> Study Material for Engineering Students </font> </h1>
 <?php
 include 'config.php';
 if(isset($_POST['submit']))
 {   
     $email= mysqli_real_escape_string($conn,$_POST['email']);
     $username= mysqli_real_escape_string($conn, $_POST['username']);
     $password= mysqli_real_escape_string($conn,$_POST['password']);
     $cpassword= mysqli_real_escape_string($conn,$_POST['cpassword']);

     $pass=password_hash($password,PASSWORD_BCRYPT);
     $cpass=password_hash($cpassword,PASSWORD_BCRYPT);

     $emailquery="select * from ad_register where email='$email' ";
     $query= mysqli_query($conn,$emailquery);
     $emailcount= mysqli_num_rows($query);
     if($emailcount>0)
     {
         echo  "email already exists";
     }
     $usernamequery="select * from ad_register where username='$username'";
     $userquery= mysqli_query($conn,$usernamequery);
     $usernamecount= mysqli_num_rows($userquery);
     if($usernamecount>0)
     {
         echo "username already taken";
     }
     else
     {
        if($password==$cpassword)
        {
             $insertquery="insert into ad_register(email,username,password,cpassword)
             values('$email','$username','$pass','$cpass')";
             $iquery=mysqli_query($conn,$insertquery);
             
             if($iquery)
             {
                 ?>
                 <script>
                     alert("Insertion Successful");
                     </script>
                     <?php
             }
             else
             {
                 ?>
                 <script>
                     alert("i=Insertion not successful");
                     </script>
                     <?php
             }
         }
         else
         {
             ?>
             <script>
                 alert("Password unmatch");
                 </script>
                 <?php
         }

     }
 }
 ?>      <div class="registration-page">
            <div class="form" >
                <p><font size="+4" color="#29b10e" font-style="oblique">Sign Up</font></p>
                <form class="register-form" action="dash.php"method="POST">
                    <input type="email" name="email" placeholder="EMAIL ID"  required/>
                    <input type="text" name="username" placeholder="USERNAME"  required/>
                    <input type="password" name="password" placeholder="PASSWORD"  required/>
                    <input type="password" name="cpassword" placeholder="CONFIRM PASSWORD"  required/>
                    <button type="submit" class="button" name='submit' >Register</button>
                </form>
            </div>
        </div>      
    </body>
</html>

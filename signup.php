<?php
session_start();

    include("connection.php");
    include("function.php");

   
    if($_SERVER['REQUEST_METHOD'] == "POST")

    {
        //soething was posted

        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric ($user_name))
         {
            //save to data base
            $user_id = random_num(20);
            $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";


            mysqli_query($con, $query);

            header("Location: login.php");
            die;


         }   
         else
         {
            echo "Please enter some valid information";
         }


    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>

    <style>
        #box {
            background-color: grey;
            margin: auto;
            width: 300px;
            height: 300px;
            text-align: center;
        }
        
        .text_input {
            height: 20px;
            width: 80%; 
        }

  


    </style>
</head>

<body>
<br><br>
    <div id="box">
    
        <form method="post">
            <div style="font-size: 30px; padding-top: 10px ; text-align: left; margin-left: 10%;" > Signup </div><br>
            
                Username <br>
             <input class="text_input" type="text"  name="user_name"><br><br>
                Password <br>
             <input class="text_input"  type="password" name="password"><br><br>

            <input type="submit" value="Signup"><br><br>
                Already have a account?
            <a href="login.php">Click to Login</a>




        </form>




    </div>

</body>

</html>
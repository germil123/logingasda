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
        //read from data base
      
        $query = "select * from users where user_name = '$user_name' limit 1";


        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
    
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password)
                {

                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }

        echo "Wrong Username or Password";


     }   
     else
     {
        echo "Wrong Username or Password";
     }


}




?>

<!DOCTYPE html>
<html>
<head>
    <title>LOG IN</title>

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
            <div style="font-size: 30px; padding-top: 10px ; text-align: left; margin-left: 10%;" > Login </div><br>
            
                Username <br>
             <input class="text_input" type="text"  name="user_name"><br><br>
                Password <br>
             <input class="text_input"  type="password" name="password"><br><br>

            <input type="submit" value="Login"><br><br>

            <a href="signup.php">Click to Signup</a>




        </form>




    </div>

</body>

</html>
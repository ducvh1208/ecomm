<?php
	include_once 'function.admin.php';
	$admin = new Admin();

	if (isset($_REQUEST['submit'])) {
        extract($_REQUEST);
	    $login = $admin->login($username, $password);
        
        if($login) 
        {
            header("location:home.php");
            setcookie("success", "Logged in successfully!", time()+1, "/","", 0);
        }
        else{
            return false;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
        <title> Login Admin </title>
        <script type="text/javascript" language="javascript">

                function check_login() {
                    if(login.username.value == "" || login.password.value == ""){
                        document.getElementById("warning").innerHTML = "Bạn chưa nhập user name hoặc password!";
                        return false;
                    }
                
                    else{
                        $username = login.username.value;
                        $password = login.password.value;
                    }
                }

        </script>
    </head>
    <body>
        
        <form action="" method="post" name="login" class="mt-5">
            <div class="container" style="width: 500px">
                <div class="text-center">
                    <h2 class="text-danger"> Admin.ecommage.local </h2>
                    <h3> login </h3><br>
                </div>  
                <div id="warning"class="text-danger"></div>
                <div class="form-group">
                    <label> Username : </label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter User name">
                </div>
                <div class="form-group">
                    <label> Password : </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                </div>
                <div class="text-center">
                    <input onclick="return(check_login());" type="submit" name="submit" class="btn btn-success" value="Login" />
                    <a href="register.php">
                        <input type="button" class="btn btn-primary" value="Register">
                    </a>
                </div>  
            </div>          
        </form>
        
    </body>
</html>
    


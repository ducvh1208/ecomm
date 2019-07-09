<?php
	include_once 'function.user.php';
    $user = new User();
    
	if (isset($_REQUEST['login'])) {
        extract($_REQUEST);
        $login = $user->check_login($username, $password);
        if($login){
            header("location:home.php");
            setcookie("success", "Logged in successfully!", time()+1, "/","", 0);
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
        <title> Login </title>
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
                <?php
                if(isset($_COOKIE["success"])){
                ?>
                    <div class="alert alert-success">
                        <strong><?php echo $_COOKIE["success"]; ?></strong> 
                    </div>
                <?php 
                } 
                ?>
                <h3 class="text-center"> login </h3><br>
                <span id="warning"class="text-danger"></span>
                <div class="form-group">
                    <label> Username : </label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter User name">
                </div>
                <div class="form-group">
                    <label> Password : </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                </div>
                <div class="text-center">
                    <input onclick="return(check_login());" type="submit" name="login" class="btn btn-success" value="Login" />
                    <a href="register.php">
                        <input type="button" class="btn btn-primary" value="Register">
                    </a>
                </div>
            </div>          
        </form>
        
    </body>
</html>
    


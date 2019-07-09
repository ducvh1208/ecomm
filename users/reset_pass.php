<?php
    include_once 'function.user.php';
    $user = new User();

	if (isset($_REQUEST['submit'])) {
        extract($_REQUEST);
	    $change = $user->reset_password($username, $password, $newPassword);
        
        if($change) 
        {
            header("location:home.php");
            setcookie("success", "You have successfully changed your password!", time()+1, "/","", 0);
        }
        else{
            setcookie("error", "You have unsuccessfully changed your password!", time()+1, "/","", 0);
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
        <title> Reset password </title>
        <script type="text/javascript" language="javascript">

            function check_password(){
                if(reset.username.value == ""reset.password.value == "" || reset.newPassword.value == "" || reset.confirm.value == ""){
                    document.getElementById("warning").innerHTML = "You have not entered all fields";
                    return false;
                }
                else if(reset.oldPassword.value.length < 6){
                    document.getElementById("warning").innerHTML = "Password must be longer than 6 characters";
                    return false;
                }
                else if(reset.newPassword.value !== reset.confirm.value){
                    document.getElementById("warning").innerHTML = "wrong password confirmation section";
                    return false;
                }
                else{
                    $username = reset.username.value;
                    $password = reset.password.value;
                    $newPassword = reset.newPassword.value;
                }
            }

        </script>
    </head>
    <body>
    <div class="container" style="width: 500px">
        <form action="" method="post" name="reset" class="mt-5">
            <h3 class="text-center"> Reset Password </h3><br>
            <?php
                if(isset($_COOKIE["error"])){
                ?>
                    <div id="error" class="alert alert-danger">
                        <strong><?php echo $_COOKIE["danger"]; ?></strong> 
                    </div>
                <?php 
                } 
                ?>
            <span id="warning"class="text-danger"></span>
            <span id="success"class="text-succsess"></span>
            <div class="form-group">
                <label> Username : </label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter the username">
            </div>
            <div class="form-group">
                <label> Password : </label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter the password">
            </div>
            <div class="form-group">
                <label> New password : </label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Enter your new Password">
            </div>
            <div class="form-group">
                <label> Confirm password : </label>
                <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Enter your new password again">
            </div>
            <div class="text-center">
                <input type="submit" onclick="return(check_password());" name="submit" class="btn btn-success" value="Save" />
            </div>      
        </form>
    </div>   
    </body>
</html>
    


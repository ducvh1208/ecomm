<?php
    include_once "function.user.php";

    $user = new User();

    $id = $_SESSION['id'];

    if (!$user->get_session()){
        header("location:login.php");
    }

    if (isset($_POST['logout'])){
        $user->user_logout();
    }
    if (isset($_REQUEST['duc'])){
        extract($_REQUEST);
        header("location:reset_pass.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
        <title> Home </title>
    </head>

    <body>
        <div class="container" style="width:500px">
            <form action="" method="POST" class="mt-5">
                <?php
                if(isset($_COOKIE["success"])){
                ?>
                    <div id="success" class="alert alert-success">
                        <strong><?php echo $_COOKIE["success"]; ?></strong> 
                    </div>
                <?php 
                } 
                ?>
                <div>
                    <h3>"Hello <span class="text-info"><?= $user->get_name($id)?></span><br>
                    you are the <span class="text-info"><?= $user->get_id($id)?></span>-st users in this system<br> 
                    your job is <span class="text-info"><?= $user->get_job($id)?></span><br> 
                    you will be logout after {countdown 10seconds}".
                    </h3>
                    <span class="text-center text-success" id="timeOut"></span>
                </div>
                <div class="text-center">
                    <input type="submit" name="logout" id="logout" class="btn btn-danger" value="Logout">
                    <input type="submit" class="btn btn-info" name="duc" value="Reset Password">
                </div>
            </form>
        </div>
 
        <script>
            let timeOut = 10;
            function timelogout(){
                timeOut--;
                document.getElementById('timeOut').innerHTML = timeOut;
                setTimeout('timelogout()',1000);
                if (timeOut === 0){
                    <?php
                    session_destroy()
                    ?>
                    window.location.replace('login.php');
                }
            }
            timelogout();

        </script>
    </body>

</html>


<?php
    include_once "function.admin.php";
    $admin = new Admin();
    if (!$admin->get_session()){
        header("location:login.php");
    }

    if (isset($_POST['logout'])){
        $logout = $admin->admin_logout();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
        <title> Admin.commage.local </title>
    </head>

    <body>
        <div class="container" style="width:500px">
            <form action="" method="POST" class="mt-5">
                <div class="text-center"> 
                    <?php
                    if(isset($_COOKIE["success"])){
                    ?>
                        <div id="success" class="alert alert-success">
                            <strong><?php echo $_COOKIE["success"]; ?></strong> 
                        </div>
                    <?php 
                    } 
                    ?>
                    <h3 class="text-danger"> Now you can change the information and password here </h3><br>
                    <div>
                        <input type="submit" class="btn btn-danger" id="logout" name="logout" value="Logout">
                        <a href="change_info.php">
                            <input type="button" class="btn btn-primary" name="changeInfo" value="Change information">
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </body>

</html>

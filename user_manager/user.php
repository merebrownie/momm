<?php

/* 
 * by meredith browne
 */

?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="css/momm.css">
    </head>
    <body>
        <?php include_once '../view/header.php'; ?>
        <section class="container-fluid">
            <div class="row">
                <div class="container">
                    <h1>User Settings</h1>
                    <form>
                        <h3>Name: <?php echo $user['name']; ?></h3>                      
                        <br>                    
                        <h3>Email Address: <?php echo $user['email']; ?></h3>
                        <br>                    
                        <h3>Password: <?php echo $user['password']; ?></h3>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <h1>Change Password</h1>
                    <div>
                        <form action="index.php" method="post" class="form-horizontal">
                            <input type="hidden" name="action" value="change_password">
                            <label class="control-label">New Password: </label>
                            <input type="password" name="password" class="form-control">
                            <br>
                            <label class="control-label">Re-enter New Password: </label>
                            <input type="password" name="passwordcopy" class="form-control">
                            <br>
                            <input type="submit" value="Submit" class="btn btn-default">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php include_once '../view/footer.php'; ?>
    </body>
</html>

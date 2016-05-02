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
        <?php include '../view/header.php' ;?>
        <section class="container-fluid">
            <div class="row">
                <div class="container">
                    <h2>Login</h2>
                    <form action="index.php" method="post" class="form-horizontal">
                        <input type="hidden" name="action" value="login_user">
                        <label class="control-label">Email: </label>
                        <input type="email" name="email" class="form-control">
                        <br>
                        <label class="control-label">Password: </label>
                        <input type="password" name="password" class="form-control">
                        <br>
                        <input type="submit" value="Login" class="btn btn-default">
                    </form>
                    <h3><a href="register.php">Registration</a></h3>
                </div>
            </div>
        </section>
        <?php include_once '../view/footer.php'; ?>
    </body>
</html>

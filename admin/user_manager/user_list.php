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
        <link href="../../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="../../css/momm.css">
    </head>
    <body id="main">
        <?php include '../view/header.php';?>
        <section class="container-fluid">
            <div class="row">
                <div class="container">
                    <h1>Users</h1>
                    <table class="table table-hover table-responsive table-striped">
                        <th>#</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                        <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo $user['userID']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><a href="index.php?action=view_user_from_id&userID=<?php echo $user['userID']; ?>">View</a></td>
                            <td>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="action" value="delete_user_from_id">
                                    <input type="hidden" name="userID" value="<?php echo $user['userID']; ?>">
                                    <input type="submit" value="Delete" class="btn btn-danger pull-right">
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    
                </div>
            </div>
            <div class="container">
                <?php include 'add_user.php'; ?>
            </div>
            <div 
        </section>
        <?php        include_once '../../view/footer.php'; ?>
    </body>
</html>
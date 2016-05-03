<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
    <body>
        <?php include '../../view/header.php';?>
        <section id="container-fluid">
            <div id="row">
                <div class="container">
                    <h1>Users</h1>
                    <table class="table table-hover table-striped table-responsive">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><a href="index.php?action=view_user_from_id&userID=<?php echo $user['userID']; ?>"><?php echo $user['userID']; ?></a></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['password']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    
                </div>
            </div>
        </section>
        <?php        include_once '../../view/footer.php'; ?>
    </body>
</html>
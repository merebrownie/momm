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
        <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="../css/momm.css">
    </head>
    <body>
        <?php include '../view/header.php';?>
        <section id="container-fluid">
            <div id="row">
                <div class="container">
                    <h1>New Playlist</h1>
                    <div>
                        <form action="index.php" method="post">
                            <input type="hidden" name="action" value="add_playlist" class="form-horizontal">
                            <input type="hidden" name="userID" value="<?php echo $user['userID']; ?>">
                            <label class="control-label">Playlist Name: </label>
                            <input type="text" name="name" class="form-control">
                            <br>
                            <label class="control-label">Category: </label>
                            <input type="text" name="category" class="form-control">
                            <br>
                            <input type="submit" name="Submit" class="btn btn-default">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
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
                    <h1>Add Song to <?php echo $playlist['name']; ?></h1>
                    <div>
                        <!--<h2></h2>-->
                        <div>
                            <form action="index.php" method="post" class="form-horizontal">
                                <input type="hidden" name="action" value="add_playlistsong">
                                <input type="hidden" name="playlistID" value="<?php echo $playlist['playlistID']; ?>">
                                <select name="songID" class="form-control">
                                    <?php foreach ($songs as $song) : ?>
                                    <option value="<?php echo $song['songID']; ?>"><?php echo $song['title']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <input type="submit" value="Submit" class="btn btn-default">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
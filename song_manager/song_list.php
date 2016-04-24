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
                    <h1>Songs</h1>
                    <h3><a href="song_add.php">New Song</a></h3>
                    <table>
                        <tr>
                            <th>Title</th>
                            <th>Artist</th>
                            <th>Genre</th>
                        </tr>
                        <?php foreach ($songs as $song) : ?>
                        <tr>
                            <td><?php echo $song['title']; ?></td>
                            <td><?php echo $song['artist']; ?></td>
                            <td><?php echo $song['genre']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    
                </div>
            </div>
        </section>
    </body>
</html>
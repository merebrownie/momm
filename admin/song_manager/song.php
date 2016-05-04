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
        <section class="container-fluid">
            <div class="row">
                <div class="container">
                    <h1><?php echo $song['title']; ?></h1>
                    <h2>Artist: <a href="index.php?action=view_songs_by_artist&artist=<?php echo $song['artist']; ?>"><?php echo $song['artist']; ?></a></h2>
                    <h3>Genre: <a href="index.php?action=view_songs_by_genre&genre=<?php echo $song['genre']; ?>"><?php echo $song['genre']; ?></a></h3>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <?php include 'song_add_to_playlist_form.php'; ?>
                </div>
            </div>
        </section>
        <?php include_once '../../view/footer.php'; ?>
    </body>
</html>
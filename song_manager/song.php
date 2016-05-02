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
                    <h1><?php echo $song['title']; ?></h1>
                    <h2>Artist: <?php echo $song['artist']; ?></h2>
                    <h3>Genre: <?php echo $song['genre']; ?></h3>
                    <br>
                    <h3>Add Song to Playlist</h3>
                    <div>
                        <form action="../playlistsong_manager/index.php" method="post" class="form-horizontal">
                            <input type="hidden" name="action" value="add_playlistsong">
                            <input type="hidden" name="songID" value="<?php echo $song['songID']; ?>">
                            <select name="playlistID" class="form-control">
                                <?php foreach ($playlists as $playlist) : ?>
                                <?php echo $playlist['playlistID']; ?>
                                <option value="<?php $playlist['playlistID']; ?>"><?php $playlist['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <br>
                            <input type="submit" value="Submit" class="btn btn-default">
                        </form>
                    </div>
                    <h3></h3>
                </div>
            </div>
        </section>
        <?php        include_once '../view/footer.php'; ?>
    </body>
</html>
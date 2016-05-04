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
        <?php include_once '../view/header.php';?>
        <section id="container-fluid">
            <div id="row">
                <div class="container">
                    <h1>Songs</h1>
                    <table class="table table-hover table-striped table-responsive">
                        <tr>
                            <th>Title</th>
                            <th>Artist</th>
                            <th>Genre</th>
                            <th></th>
                        </tr>
                        <?php foreach ($songs as $song) : ?>
                        <tr>
                            <td><a href="index.php?action=view_song&songID=<?php echo $song['songID']; ?>"><?php echo $song['title']; ?></a></td>
                            <td><a href="index.php?action=view_songs_by_artist&artist=<?php echo $song['artist']; ?>"><?php echo $song['artist']; ?></a></td>
                            <td><a href="index.php?action=view_songs_by_genre&genre=<?php echo $song['genre']; ?>"><?php echo $song['genre']; ?></a></td>
                            <td><a href="../song_manager/index.php?action=delete_song&songID=<?php echo $song['songID']; ?>">Delete</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    
                </div>
            </div>
        </section>
        <?php include_once '../../view/footer.php'; ?>
    </body>
</html>
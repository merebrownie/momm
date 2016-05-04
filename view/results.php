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
        <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="css/momm.css">
    </head>
    <body>
        <?php include 'header.php';?>
        <section class="container-fluid">
            <div class="row">
                <div class="container">
                    <h3>Search Results <label class="label label-default label-success"><?php echo $search; ?></label></h3>
                    <h4>Songs</h4>
                    <table class="table table-responsive table-hover table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Artist</th>
                            <th>Genre</th>
                        </tr>
                        <?php foreach ($songs as $song) : ?>
                        <tr>
                            <td><a href="song_manager/index.php?action=view_song&songID=<?php echo $song['songID']; ?>"><?php echo $song['title']; ?></a></td>
                            <td><a href="song_manager/index.php?action=view_songs_by_artist&artist=<?php echo $song['artist']; ?>"><?php echo $song['artist']; ?></a></td>
                            <td><a href="song_manager/index.php?action=view_songs_by_genre&genre=<?php echo $song['genre']; ?>"><?php echo $song['genre']; ?></a></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <h4>Playlists</h4>
                    <table class="table table-responsive table-hover table-striped">
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <!--<th>Owner</th>-->
                        </tr>
                        <?php foreach ($playlists as $playlist) : ?>
                        <tr>
                            <td><a href="playlistsong_manager/index.php?action=show_playlistsongs&playlistID=<?php echo $playlist['playlistID']; ?>"><?php echo $playlist['name']; ?></a></td>
                            <td><a href="playlist_manager/index.php?action=view_playlists_by_category&category=<?php echo $playlist['category']; ?>"><?php echo $playlist['category']; ?></a></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </section>
        <?php include 'footer.php';?>
    </body>
</html>

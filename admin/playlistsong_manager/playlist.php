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
                    <h1><?php echo $playlist['name']; ?> Songs</h1>
                    <h2>Category: <?php echo $playlist['category']; ?></h2>
                    <h4>Songs</h4>
                    <div>
                        <table class="table table-hover table-striped table-responsive">
                            <tr>
                                <th>Title</th>
                                <th>Artist</th>
                                <th>Genre</th>
                                <th></th>
                            </tr>
                            <?php foreach ($songs as $song) : ?>
                                <?php foreach ($playlistsongs as $playlistsong) : ?>
                                    <?php if ($song['songID'] == $playlistsong['songID']) : ?>
                                        <tr>
                                            <td><a href="../song_manager/index.php?action=view_song&songID=<?php echo $song['songID']; ?>"><?php echo $song['title']; ?></a></td>
                                            <td><a href="../song_manager/index.php?action=view_songs_by_artist&artist=<?php echo $song['artist']; ?>"><?php echo $song['artist']; ?></a></td>
                                            <td><a href="../song_manager/index.php?action=view_songs_by_genre&genre=<?php echo $song['genre']; ?>"><?php echo $song['genre']; ?></a></td>
                                            <td><a href="../playlistsong_manager/index.php?action=delete_playlistsong&playlistID=<?php echo $playlistsong['playlistID']; ?>&songID=<?php echo $playlistsong['songID']; ?>">Delete Song</a></td>
                                        </tr>
                                    <?php endif; ?>    
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                            
                        </table>   
                    </div>
                    <div>
                    </div>
                    <h4><a href="../playlist_manager/index.php?action=show_add_playlist_form">New Playlist</a></h4>
                    <h4><a href="../song_manager/index.php?action=show_add_song_form">New Song</a></h4>
                </div>
                <?php                include_once '../../view/footer.php'; ?>
            </div>
        </section>
    </body>
</html>

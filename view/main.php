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
        <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="css/momm.css">
    </head>
    <body>
        <?php include_once 'view/header.php'; ?>
        <section class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>Announcements</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-8">                        
                    <h3>News Feed</h3>
                    <ul class="list-group">
                        <?php foreach ($events as $event) : ?>
                        <li class="list-group-item"> <?php echo $event['timestamp']; ?> <?php echo $event['message']; ?>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                                                
                </div>
                <div class="col-md-4 col-sm-4">
                    <h3>Control Panel</h3>
                    <div class="list-group">
                        <h4 class="list-group-item"><a href="/momm/playlist_manager/index.php?action=show_playlists">Playlist Manager</a></h2>
                        <h4 class="list-group-item"><a href="/momm/song_manager/index.php?action=list_songs">Song Manager</a></h2>
                    </div>
                    <h3>Popular Songs</h3>
                    <ol class="list-group">
                        <?php foreach ($popular_songs as $popular_song) : ?>
                            <?php foreach ($songs as $song) : ?>
                                <?php if ($song['songID'] == $popular_song['songID']) : ?>
                                    <li class="list-group-item">
                                        <a href="song_manager/index.php?action=view_song&songID=<?php echo $song['songID']; ?>"><h4 class="list-group-item-heading"><?php echo $song['title']; ?></h4></a>
                                        <a href="song_manager/index.php?action=view_songs_by_artist&artist=<?php echo $song['artist']; ?>"><p class="list-group-item-text"><?php echo $song['artist']; ?></p></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </ol>
                    <h3>New Playlists</h3>
                    <ol class="list-group">
                        <?php foreach ($new_playlists as $new_playlist) : ?>
                        <li class="list-group-item">
                            <a href="playlistsong_manager/index.php?action=show_playlistsongs&playlistID=<?php echo $new_playlist['playlistID']; ?>"><h4 class="list-group-item-heading"><?php echo $new_playlist['name']; ?></h4></a>
                            <a href="playlist_manager/index.php?action=view_playlists_by_category&category=<?php echo $new_playlist['category']; ?>"><p class="list-group-item-text"><?php echo $new_playlist['category']; ?></p></a>
                        </li>
                        <?php endforeach; ?>
                    </ol>
                    <h3>New Songs</h3>
                    <ol class="list-group">
                        <?php foreach ($new_songs as $new_song) : ?>
                        <li class="list-group-item">
                            <a href="song_manager/index.php?action=view_song&songID=<?php echo $new_song['songID']; ?>"><h4 class="list-group-item-heading"><?php echo $new_song['title']; ?></h4></a>
                            <a href="song_manager/index.php?action=view_songs_by_artist&artist=<?php echo $new_song['artist']; ?>"><p class="list-group-item-text"><?php echo $new_song['artist']; ?></p></a>
                        </li>
                        <?php endforeach; ?>
                    </ol>
                </div>
            </div>
        </section>
        <?php include_once 'view/footer.php'; ?>
    </body>
</html>


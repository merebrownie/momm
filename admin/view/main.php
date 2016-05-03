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
        <?php include_once 'header.php'; ?>
        <section class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-sm-8">                        
                    <h3>News Feed</h3>
                    <ul class="list-group">
                        <?php foreach ($events as $event) : ?>
                        <li class="list-group-item">                            <?php echo $event['timestamp']; ?> <?php echo $event['message']; ?>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                                                
                </div>
                <div class="col-md-4 col-sm-4">
                    <h3>Popular Songs</h3>
                    <ol class="list-group">
                        <?php foreach ($popular_songs as $popular_song) : ?>
                            <?php foreach ($songs as $song) : ?>
                                <?php if ($song['songID'] == $popular_song['songID']) : ?>
                                    <li class="list-group-item">
                                        <h4 class="list-group-item-heading"><?php echo $song['title']; ?></h4>
                                        <p class="list-group-item-text"><?php echo $song['artist']; ?></p>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </ol>
                    <h3>Admin Panel</h3>
                    <div class="list-group">
                        <h4><a class="list-group-item" href="/momm/admin/playlist_manager/index.php?action=show_playlists">Playlist Manager</a></h4>
                        <h4><a class="list-group-item" href="/momm/admin/song_manager/index.php?action=list_songs">Song Manager</a></h4>
                        <h4><a class="list-group-item" href="/momm/admin/user_manager/index.php?action=list_users">User Manager</a></h4>
                    </div>
                    
                    
                </div>
            </div>
        </section>
        <?php include_once 'view/footer.php'; ?>
    </body>
</html>


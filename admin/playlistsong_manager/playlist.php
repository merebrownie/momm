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
        <link href="../../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="../../css/momm.css">
    </head>
    <body>
        <?php include '../view/header.php';?>
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
                                            <td>
                                                <form action="index.php" method="post">
                                                    <input type="hidden" name="action" value="delete_playlistsong">
                                                    <input type="hidden" name="playlistID" value="<?php echo $playlistsong['playlistID']; ?>">
                                                    <input type="hidden" name="songID" value="<?php echo $playlistsong['songID']; ?>">
                                                    <input type="submit" value="Delete" class="btn btn-danger pull-right">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endif; ?>    
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                            
                        </table>   
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="container">
                    <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#new_playlist">New Playlist</button>
                    <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#new_song">New Song</button>
                    <div id="new_playlist" class="collapse">
                        <h1>New Playlist</h1>
                        <div>
                            <form action="../playlist_manager/index.php" method="post">
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
                    <div id="new_song" class="collapse">
                        <h1>New Song</h1>
                        <div>
                            <form action="../song_manager/index.php" method="post" class="form-horizontal">
                                <input type="hidden" name="action" value="add_song_from_playlist">
                                    <label class="control-label">Title: </label>
                                    <input type="text" name="title" class="form-control">
                                    <br>
                                    <label class="control-label">Artist: </label>
                                    <input type="text" name="artist" class="form-control">
                                    <br>
                                    <label class="control-label">Genre: </label>
                                    <input type="text" name="genre" class="form-control">
                                    <br>
                                    <input type="submit" name="Submit" class="btn btn-default">
                            </form>
                        </div>
                        <h1>Last.fm Top 50 Tracks</h1>
                        <table class="table table-hover table-striped table-responsive">
                            <tr>
                                <th>Title</th>
                                <th>Artist</th>
                                <th>Genre</th>
                                <th></th>
                            </tr>
                            <?php foreach ($xml->tracks[0]->children() as $song) : ?>
                            <tr>
                            <form action="../song_manager/index.php" method="post">
                                <input type="hidden" name="action" value="add_song_from_playlist"> 
                                <input type="hidden" name="title" value="<?php echo $song->name; ?>">
                                <input type="hidden" name="artist" value="<?php echo $song->artist->name; ?>">
                                <input type="hidden" name="playlistID" value="<?php echo $playlist['playlistID']; ?>">
                                <td><?php echo $song->name; ?></td>
                                <td><?php echo $song->artist->name; ?></td>
                                <td><input type="text" name="genre" class="form-control"></td>
                                <td><input type="submit" value="Add" class="btn btn-default pull-right"></td>
                            </form>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <?php include 'playlistsong_add.php'; ?>
                </div>
            </div>
        </section>
        <?php include_once '../../view/footer.php'; ?>
    </body>
</html>

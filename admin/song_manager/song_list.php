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
    <body id="main">
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
                            <td>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="action" value="delete_song">
                                    <input type="hidden" name="songID" value="<?php echo $song['songID']; ?>">
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                                <!--<a href="index.php?action=delete_song&songID=<?php echo $song['songID']; ?>">Delete</a>-->
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <?php include 'top_songs.php'; ?>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <?php include 'song_add.php'; ?>
                </div>
            </div>
        </section>
        <?php include_once '../../view/footer.php'; ?>
    </body>
</html>
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
        <link rel="stylesheet" href="../../css/momm.css">
        <link href="../../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body class="main">
        <?php include '../view/header.php';?>
        <section id="container-fluid">
            <div id="row">
                <div class="container">
                    <h1>Playlists</h1>
                    <table class="table table-striped">
                        <?php foreach ($playlists as $playlist) : ?>
                        <tr>
                            <td><h3><a href="../playlistsong_manager/index.php?action=show_playlistsongs&playlistID=<?php echo $playlist['playlistID']; ?>"><?php echo $playlist['name']; ?></a></h3></td>
                            <td><a href="../playlist_manager/index.php?action=delete_playlist&playlistID=<?php echo $playlist['playlistID']; ?>">Delete</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <?php include 'playlist_add.php'; ?>
                </div>
            </div>
        </section>
        <?php include_once '../../view/footer.php'; ?>
    </body>
</html>
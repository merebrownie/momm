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
        <?php include_once 'view/header.php'; ?>
        <section class="container-fluid">
            <div class="row">
                <div class="container">
                    <h1>Admin Panel</h1>
                    <h2><a href="/momm/admin/playlist_manager/index.php?action=show_playlists">Playlist Manager</a></h2>
                    <h2><a href="/momm/admin/song_manager/index.php?action=list_songs">Song Manager</a></h2>
                    <h2><a href="/momm/admin/user_manager/index.php?action=list_users">User Manager</a></h2>
                </div>
            </div>
        </section>
        <?php include_once 'view/footer.php'; ?>
    </body>
</html>


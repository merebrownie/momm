<?php 
session_start(); 
$path = $_SERVER['DOCUMENT_ROOT'] . '/momm/';
if (!isset($_SESSION['userID'])) {
    header('Location:user_manager/index.php') ;
} else {
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
                    <h1>Feed</h1>
                    <h2><a href="/momm/playlist_manager/index.php?action=show_playlists">Playlist Manager</a></h2>
                    <h2><a href="/momm/song_manager/index.php?action=list_songs">Song Manager</a></h2>
                </div>
            </div>
        </section>
        <?php include_once 'view/footer.php'; ?>
    </body>
</html>
<?php } ?>

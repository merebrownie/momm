<?php

/*
 * by meredith browne
 */

?>

<!DOCTYPE html>
<?php $path = $_SERVER['DOCUMENT_ROOT'] . '/momm/'; ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>M.O.M.M | Master of My Music</title>
        <link href="../../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/momm.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>-->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <!--brand & toggle for mobile display-->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" 
                            data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">M.O.M.M.</a>    
                </div>
            
                <!--nav links, forms, & other content for toggling-->
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="/momm/admin/index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search" action="/momm/admin/index.php" method="post">
                        <div class="form-group">
                            <input type="hidden" name="action" value="search">
                            <input type="text" class="form-control" name="search" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/momm/admin/playlist_manager/">Playlist Manager</a></li>
                                <li><a href="/momm/admin/song_manager/">Song Manager</a></li>
                                <li><a href="/momm/admin/user_manager/">User Manager</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/momm/admin/user_manager/index.php?action=view_user">Account Settings</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/momm/user_manager/index.php?action=logout_user">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </body>
</html>

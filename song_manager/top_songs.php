<?php

/* 
 * by meredith browne
 */

?>

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
        <input type="hidden" name="action" value="add_song"> 
        <input type="hidden" name="title" value="<?php echo $song->name; ?>">
        <input type="hidden" name="artist" value="<?php echo $song->artist->name; ?>">
        <td><?php echo $song->name; ?></td>
        <td><?php echo $song->artist->name; ?></td>
        <td><input type="text" name="genre" class="form-control" required=""></td>
        <td><input type="submit" value="Add" class="btn btn-default"></td>
    </form>
    </tr>
    <?php endforeach; ?>
</table>
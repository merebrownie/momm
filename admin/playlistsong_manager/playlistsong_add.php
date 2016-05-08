<?php

/*
 * by meredith browne
 */

?>

<h3>Add Song to <?php echo $playlist['name']; ?></h3>
<form action="../playlistsong_manager/index.php" method="post" class="form-horizontal">
    <input type="hidden" name="action" value="add_playlistsong">
    <input type="hidden" name="playlistID" value="<?php echo $playlist['playlistID']; ?>">
    <select name="songID" class="form-control">
            <?php foreach ($songs as $song) : ?>
            <option value="<?php echo $song['songID']; ?>"><?php echo $song['title']; ?></option>
            <?php endforeach; ?>
    </select>
    <br>
    <input type="submit" value="Submit" class="btn btn-default">
</form>
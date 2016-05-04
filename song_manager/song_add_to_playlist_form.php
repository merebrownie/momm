
        <h3>Add Song to Playlist</h3>
        <form action="index.php" method="post" class="form-horizontal">
            <input type="hidden" name="action" value="add_song_to_playlist">
            <input type="hidden" name="songID" value="<?php echo $song['songID']; ?>">
            <select name="playlistID" class="form-control">
                <?php foreach ($playlists as $playlist) : ?>
                    <?php echo $playlist['playlistID']; ?>
                    <option value="<?php echo $playlist['playlistID']; ?>"><?php echo $playlist['name']; ?></option>
                    <?php endforeach; ?>
            </select>
            <br>
            <input type="submit" value="Submit" class="btn btn-default">
        </form>
    
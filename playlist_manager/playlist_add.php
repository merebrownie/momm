<h1>New Playlist</h1>
<div>
    <form action="index.php" method="post">
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
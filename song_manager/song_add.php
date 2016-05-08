<?php

/* 
 * by meredith browne
 */

?>

<h1>New Song</h1>
    <div>
        <form action="index.php" method="post" class="form-horizontal">
            <input type="hidden" name="action" value="add_song">
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

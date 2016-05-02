<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<table class="table">
    <?php foreach ($songs as $song) : ?>
    <tr>
        <td><a href="index.php?action=view_song&songID=<?php echo $song['songID']; ?>"><?php echo $song['title']; ?></a></td>
        <td><a href="index.php?action=view_songs_by_artist&artist=<?php echo $song['artist']; ?>"><?php echo $song['artist']; ?></a></td>
        <td><a href="index.php?action=view_songs_by_genre&genre=<?php echo $song['genre']; ?>"><?php echo $song['genre']; ?></a></td>
    </tr>
    <?php    endforeach; ?>
</table>

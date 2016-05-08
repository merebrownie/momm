<?php

/*
 * by meredith browne
 */

?>

<h2>Add User</h2>
<div>
    <form action="index.php" method="post" class="form-horizontal">
        <input type="hidden" name="action" value="register_user">
        <label class="control-label">Name: </label>
        <input type="text" name="name" class="form-control">
        <br>
        <label class="control-label">Email: </label>
        <input type="email" name="email" class="form-control">
        <br>
        <label class="control-label">Password: </label>
        <input type="password" name="password" class="form-control">
        <br>
        <label class="control-label">Re-enter Password: </label>
        <input type="password" name="passwordcopy" class="form-control">
        <br>
        <input type="submit" value="Submit" class="btn btn-default">
    </form>
</div>

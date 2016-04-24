<?php include('../view/header.php'); ?>
<section class="container-fluid">
    <div class="row">
        <div class="container">
            <h2>Register</h2>
            <div>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="register_user">
                    <label>Name: </label>
                    <input type="text" name="name">
                    <br>
                    <label>Email: </label>
                    <input type="email" name="email">
                    <br>
                    <label>Password: </label>
                    <input type="password" name="password">
                    <br>
                    <label>Re-enter Password: </label>
                    <input type="password" name="passwordcopy">
                    <br>
                    <input type="submit" value="Register" class="btn btn-default">
                </form>
            </div>
        </div>
    </div>
</section>

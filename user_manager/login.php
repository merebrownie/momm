<?php include '../view/header.php'; ?>
<section class="container-fluid">
    
    <div class="row">
        <div class="container">
            <h2>Login</h2>
            <form action="index.php" method="post">
		<input type="hidden" name="action" value="user_login">
		<label>Email: </label>
		<input type="email" name="email">
		<br>
		<label>Password: </label>
		<input type="password" name="password">
		<br>
                <input type="submit" value="Login" class="btn btn-default">
            </form>	
	</div>
    </div>
</section>

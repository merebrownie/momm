<?php include '../view/header.php'; ?>
<main>
    <h2>Login</h2>
	<div>
		<form action="index.php" method="post">
			<input type="hidden" name="action" value="user_login">
			<label>Email: </label>
			<input type="email" name="email">
			<br>
			<label>Password: </label>
			<input type="password" name="password">
			<br>
			<input type="submit" value="Login">
		</form>	
	</div>
    
</main>
<?php include '../view/footer.php'; ?>
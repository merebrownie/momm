<header class="row">
    <?php include '../view/header.php'; ?>
</header>
<div id="error">
    <h1>Database Error</h1>
    <p>There was an error connecting to the database.</p>
    <p>Error message: <?php echo $error_message; ?></p>
</div>
<?php include '../view/home.php'; ?>
<?php include '../view/about.php'; ?>
<?php include '../view/projects.php'; ?>
<?php include '../view/contact.php'; ?>

<footer class="row">
    <?php include '../view/footer.php'; ?>
</footer>


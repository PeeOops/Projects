
<?php require 'partials/header.php' ?>

<?php require 'partials/nav.php'?>

<?php require 'partials/banner.php'?>


<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php if($_SESSION['user'] ?? false) : ?>
        <p>Welcome <?= $_SESSION['user']['email'] ?></p>
        <?php else : ?>
        <p>Home</p>
        <?php endif; ?>
    </div>
</main>

<?php require 'partials/footer.php' ?>
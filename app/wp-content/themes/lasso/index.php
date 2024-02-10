<!DOCTYPE html>
<html lang="en">


<head>
    <title>Lasso</title>
    <?php wp_head(); ?>
</head>

<body>

    <header class="lasso-header">
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div class="lasso-header__spacer"></div>
    <div class="lasso-main">
        <div class="lasso-section">
            <?php if (is_active_sidebar('lasso-carousel-section')) : ?>
                <?php dynamic_sidebar('lasso-carousel-section'); ?>
            <?php endif; ?>
        </div>
    </div>
    <footer class="lasso-footer">
        <p>&copy; 2021 Lasso</p>
    </footer>
    <?php wp_footer(); ?>
</body>

</html>
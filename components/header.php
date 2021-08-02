<div class="site-header">
    <h1>Tutorial CMS</h1>
    <?php
    if (isset($_SESSION['login_user'])) {
        //we are checking here if the user is logged in
        //if yes, we print out the name and these links
        echo "<div class=\"header-login-box\">";
            echo "<h3>Hi, $login_session!</h3>";
            echo "<a class=\"pngbutton user-custom-hue user-custom-hue-hover\" href=\"newArticle.php\">New article</a>";
            echo "<a class=\"pngbutton user-custom-hue user-custom-hue-hover\" href=\"index.php\">Homepage</a>";
            echo "<a class=\"pngbutton user-custom-hue user-custom-hue-hover\" href=\"logout.php\">Logout</a>";
        echo "</div>";
    } else {
        //if not, show the login button
        echo "<div class=\"header-login-box\">";
            echo "<a class=\"pngbutton user-custom-hue user-custom-hue-hover\" href=\"login.php\">Login</a>";
        echo "</div>";
    }
    ?>
</div>
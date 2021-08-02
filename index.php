<?php
require('system/session.php');

//we load here the article from the db
$sql_articles = "SELECT id, title, summary, published, author FROM cms_articles ORDER BY id";
$result_articles = $conn->query($sql_articles);

?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <title>Tutorial CMS</title>
        <link rel="stylesheet" href="/styles/main.css">
        <meta charset="UTF-8">
    </head>
    <body>
        <?php include('components/header.php'); ?>
        
        <?php
        if ($result_articles->num_rows > 0) {
            //we are checking if there are any articles available
            while($row_articles = $result_articles->fetch_assoc()) {
                //with the while loop we print out this div several times, with the articles data
                echo "<div class=\"article-container\">";
                    echo "<h2>".$row_articles["title"]."</h2>";
                    echo "<p>".$row_articles["published"]." :: ".$row_articles["author"]."</p>";
                    echo "<p>".$row_articles["summary"]."</p>";
                    echo "<a href=\"article.php?id=".$row_articles["id"]."\">Olvasd tovább</a>";
                echo "</div>";
            }
        } else {
            //if not, print out this text
            echo "No articles found, create one!";
        }
        ?>
    </body>
</html>
<?php
$conn->close();
?>
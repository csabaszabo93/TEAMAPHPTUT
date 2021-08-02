<?php
//we will include the session.php to every php file
require('system/session.php');

//with htmlspecialchars we can get data from link, example:
//article.php?id=something
//and we get "something" in a variable
$get_link = htmlspecialchars($_GET["id"]);

//we are loading the article by the ID from the link
$sql = "SELECT * FROM cms_articles WHERE id=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("i", $get_link );
$stmt->execute();
$result = $stmt->get_result();
$row_article = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $row_article["title"]; ?></title>
        <link rel="stylesheet" href="/styles/main.css">
        <meta charset="UTF-8">
    </head>
    <body>
    <div class="main-container">
        <?php include('components/header.php'); ?>
        <div class="article-container">
            <?php
            //with the echo command we print out the article's data to the page
            ?>
            <h2><?php echo $row_article["title"]; ?></h2>
            <p><?php echo $row_article["published"]; ?> :: <?php echo $row_article["author"]; ?></p>
            <p><?php echo $row_article["content"]; ?></p>
        </div>
    </div>
    </body>
</html>
<?php
$conn->close();
?>
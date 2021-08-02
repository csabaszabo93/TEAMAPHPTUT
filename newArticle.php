<?php
require('system/session.php');

//if the user is not logged in, return to the homepage
if(!isset($_SESSION['login_user'])) {
    header("Location: /");
}

//this function is used when the article was submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    //we are getting here the values from the form and also limit them
    $form_title = $_POST['title'];
    if (mb_strlen($form_title) > 101) {
        //if not, leave a funny message when submitted
        $form_title = "I'm trying to hax the frontend";
    }
    $form_summary = $_POST['summary'];
    if (mb_strlen($form_summary) > 251) {
        $form_summary = "I'm not successful at being a hacker:(";
    }
    $form_content = $_POST['content'];
    $form_published = date("Y-m-d H:i:s");

    //put all these things in the db
    $stmt = $conn->prepare("INSERT INTO cms_articles (title, summary, published, content, author) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $form_title, $form_summary, $form_published, $form_content, $login_session);

    //if everything is alright, return to the articles
    if ($stmt->execute() === TRUE) {
        header("Location: /");
    } else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>New article</title>
        <link rel="stylesheet" href="/styles/main.css">
        <meta charset="UTF-8">
    </head>
    <body>
    <div class="main-container">
        <?php include('components/header.php'); ?>
        <form class="article-edit-form" autocomplete="off" action="newArticle.php" method="post" enctype="multipart/form-data">
            <p>Cím</p>
            <input maxlength="100" placeholder="Lorem ipsum dolor sit amet" type="text" name="title"/>
            <p>Summary</p>
            <textarea maxlength="250" placeholder="Here write the summary" type="text" name="summary" id="summary"></textarea>
            <p>Content</p>
            <textarea name="content"></textarea>
            <br>
            <button type="submit">Create</button>
        </form>
    </div>
    </body>
</html>
<?php
require('system/session.php');
$error = "";

//if the user is logged in, return to the homepage
if(isset($_SESSION['login_user'])){
    header("location: /");
}

//when the submit button pressed, this function is called
//in PHP the POST method is the default
if($_SERVER["REQUEST_METHOD"] == "POST") {
    //getting the password and username from the form
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    //here we are getting the password from the entered user
    $sql = "SELECT id, password FROM cms_users WHERE username=?";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    //if the password is correct, load the user to the session
    //NOTE: WE NEVER STORE PASSWORD RAW IN DB, THIS IS JUST AN EXAMPLE!!!
    if ($password == $row["password"]) {
        //if it's correct, we load the user to the session
        $_SESSION['login_user'] = $username;
        //then return to the homepage
        header("Location: ./");
    } else {
        //if not, throw error
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="/styles/main.css">
        <meta charset="UTF-8">
    </head>
    <body>
        <?php include('components/header.php'); ?>
        <form class="login-container" action="" method="post">
            <?php echo $error; ?>
            <p>Username</p>
            <input placeholder="tutorialuser" type="text" name="username" />
            <p>Password</p>
            <input placeholder="123" type="password" name="password" />
            <button type="submit">Login</button>
        </form>
    </body>
</html>
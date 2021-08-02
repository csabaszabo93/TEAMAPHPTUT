<?php
//include the connection.php only here
include('connection.php');
session_start();

/* Logged in datas */
if(isset($_SESSION['login_user'])) {
    //here we are getting the user's data to show when it logged in
    $user_check = $_SESSION['login_user'];

    $login_sql = mysqli_query($conn,"select * from cms_users where username = '$user_check' ");
    $row = mysqli_fetch_array($login_sql,MYSQLI_ASSOC);

    $login_session = $row['username'];
    $login_session_id = $row['id'];
}
?>
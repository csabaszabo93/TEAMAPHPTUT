<?php
//this is a simple command to destroy the session and logout the user
   session_start();

   if(session_destroy()) {
      header("Location: ./");
   }
?>
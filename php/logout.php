<?php
session_start();
session_unset();   // saare session variables hatao
session_destroy(); // pura session khatam karo
header("Location: ../index-2.php"); // logout hone ke baad home page par bhej do
exit();
?>

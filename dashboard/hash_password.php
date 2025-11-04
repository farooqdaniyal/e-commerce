<?php
// Run this ONCE to get hashed password
$password = "farooqronaldo1234567890";
$hashed = password_hash($password, PASSWORD_DEFAULT);

echo "<h2>Hashed Password:</h2>";
echo "<p style='word-wrap: break-word;'>" . $hashed . "</p>";
echo "<hr>";
echo "<h3>Copy this and use in SQL INSERT:</h3>";
echo "<textarea style='width:100%; height:100px;'>" . $hashed . "</textarea>";
?>
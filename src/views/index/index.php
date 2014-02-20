<?php 
if(is_connected()) {
?>

hey buddy! <br />

<a href="/logout/">Log out</a>

<?php 
}

else {
?>

<a href="/connection/">Log In</a> <br />
<a href="/register/">Register</a> <br />

<?php 
}
?>
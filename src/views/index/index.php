<?php 
if(is_connected()) {
?>

hey buddy!

<?php 
}

else {
?>

<a href="/connection/">Log In</a> <br />
<a href="/register/">Register</a> <br />

<?php 
}
?>
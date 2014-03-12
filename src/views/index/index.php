<?php 
if(is_connected()) {
?>

hey buddy! <br />

<a href="<?= WEBSITE_URL ?>logout/">Log out</a>

<?php 
}

else {
?>

<a href="<?= WEBSITE_URL ?>connection/">Log In</a> <br />
<a href="<?= WEBSITE_URL ?>register/">Register</a> <br />

<?php 
}
?>
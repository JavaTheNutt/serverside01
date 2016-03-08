<?php
require '../inc/access.inc.php';
require '../inc/init.inc.php';
require '../inc/head.inc.php';
//todo fix issue where redirect to index sets a querystring and disables login functionality for that page
/*var_dump($_SERVER['REQUEST_URI']);*/
?>
	<p>This is the home page</p>
<?php
require '../inc/scripts.inc.php';
require '../inc/foot.inc.php';

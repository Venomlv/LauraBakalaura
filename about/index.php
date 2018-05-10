<!DOCTYPE html>
<html lang="lv">
<?php
	require_once($_SERVER["DOCUMENT_ROOT"].'/head.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/db.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/dictionary.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/Rozes.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/header.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/language.php');
?>

<body class="maxSize">
	<div id="aboutoverlay" class="maxSize"></div>
	<div id="lending" class="maxSize">
		<div id="aboutme" class="mt30pct">
			<?php echo $aboutme; ?>
		</div>
	</div>
</body>

</html>
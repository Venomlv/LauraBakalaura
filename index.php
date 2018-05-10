<!DOCTYPE html>
<html lang="lv">
<?php
	$_SERVER["DOCUMENT_ROOT"] = dirname(__FILE__);
	require_once('head.php');
	require_once('db.php'); 
	require_once('dictionary.php'); 
	require_once('Rozes.php'); 
	require_once('header.php');
	require_once('language.php');
?>

<body class="maxSize">
	<div id="overlay" class="maxSize"></div>
	<div id="lending" class="maxSize">
		<div id="title">
			<?php echo $betterflowers; ?>
		</div>
		<a href="/catalog">
			<button type="button" class="btn btn-primary btn-lg btn-abs">
				<?php echo $next; ?>
			</button>
		</a>
	</div>
</body>

</html>
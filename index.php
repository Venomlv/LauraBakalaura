<!DOCTYPE html>
<html lang="lv">
<?php
	$_SERVER["DOCUMENT_ROOT"] = dirname(__FILE__);
	require_once('head.php');
	require_once('db.php'); 
	require_once('dictionary.php'); 
	require_once('Rozes.php'); 
?>

<body class="maxSize">
	<div id="overlay" class="maxSize"></div>
	<div id="lending" class="maxSize">
		<div class="language">
		<?php echo isset($_GET['lang'])&&$_GET['lang'] == "ru" ? "<a href=\"/?lang=lv\">LV</a>" :  "<a href=\"/?lang=ru\">RU</a>"; ?>
		<?php $currentlang = isset($_GET['lang'])&&$_GET['lang'] == "ru" ? "?lang=ru" : ""; ?>
		</div>
		<div id="title">
			<?php echo $betterflowers; ?>
		</div>
		<div id="menu">
			<a href="<?php echo $href2.''.$currentlang; ?>"><?php echo $about; ?></a>
			<a href="<?php echo $href3.''.$currentlang; ?>"><?php echo $newrozes; ?></a>
			<a href="<?php echo $href1.''.$currentlang; ?>"><?php echo $catalog; ?></a>
			<a href="<?php echo $href4.''.$currentlang; ?>"><?php echo $contacts; ?></a>
			<a href="<?php echo $href5.''.$currentlang; ?>"><i class="fas fa-user-plus"></i></a>
		</div>
		<a href="<?php echo $href1; ?>"><button><?php echo $next; ?></button></a>
	</div>
</body>

</html>
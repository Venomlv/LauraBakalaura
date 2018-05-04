<!DOCTYPE html>
<html lang="lv">
<?php
	require_once($_SERVER["DOCUMENT_ROOT"].'/head.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/db.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/dictionary.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/Rozes.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/Order.php'); 
?>

<?php
	if(isset($_POST['theid']))
	{
		Order::DoneOrder($_POST['theid'],$_SESSION['user']);
	}
?>

<body class="maxSize">
	<div id="overlay" class="maxSize"></div>
	<div id="lending" class="maxSize">
		<div class="language">
		<?php echo isset($_GET['lang'])&&$_GET['lang'] == "ru" ? "<a href=\"/catalog/?lang=lv\">LV</a>" :  "<a href=\"/catalog/?lang=ru\">RU</a>"; ?>
		<?php $currentlang = isset($_GET['lang'])&&$_GET['lang'] == "ru" ? "?lang=ru" : ""; ?>
		<?php $inside = isset($_GET['lang'])&&$_GET['lang'] == "ru" ? "&lang=ru" : "&lang=lv"; ?>
		</div>
		<div id="menu">
			<a href="<?php echo $href2.''.$currentlang; ?>"><?php echo $about; ?></a>
			<a href="<?php echo $href3.''.$currentlang; ?>"><?php echo $newrozes; ?></a>
			<a class="active" href="<?php echo $href1.''.$currentlang; ?>"><?php echo $catalog; ?></a>
			<a href="<?php echo $href4.''.$currentlang; ?>"><?php echo $contacts; ?></a>
			<?php if(!isset($_SESSION['user'])):?>
				<a href="<?php echo $href5.''.$currentlang; ?>"><i class="fas fa-user-plus"></i></a>
			<?php else: ?>
				<a href="<?php echo $href6.''.$currentlang; ?>"><i class="fas fa-shopping-cart"></i></a>
			<?php endif; ?>
		</div>
		<div id="mainInside">
			<?php $roze = Rozes::getCertainRoze($_GET['id']); ?>
			<?php if($roze != NULL): ?>
			<div class="rozeTop"><?php echo isset($_GET['lang'])&&$_GET['lang'] == 'ru' ? $roze['rnameru'] : $roze['rnamelv']; ?></div>
			<div class="rozeThum"><img src="/img/rozes/<?php echo $roze['rimage']; ?>"></div>
			<div class="rozeInfo">
				<?php echo isset($_GET['lang'])&&$_GET['lang'] == 'ru' ? $roze['describeru'] : $roze['describelv']; ?>
				<div class="wide"><?php echo $vel; echo isset($_GET['lang'])&&$_GET['lang'] == 'ru' ? $roze['rtextru'] : $roze['rtextlv']; ?></div>
				<div class="cost"><?php echo $cost; echo $roze['rprice'].' €'; ?></div>
				<div class="cost">
					<?php if(isset($_SESSION['user']) && !Order::isOrdered($roze['rid'],$_SESSION['user'])): ?>
						<button class="order-button" id="do-order" data-id="<?php echo $roze['rid']; ?>"><?php echo $zakaz; ?></button>
					<?php endif; ?>
				</div>
			</div>
			<?php else: ?>
				<div class="rozeTop"><?php echo $kludaName; ?></div>
				<div class="rozeInfo centered-text maxSize"><?php echo $roseEmpty; ?></div>
			<?php endif; ?>
		</div>
		<div class="enf noselect good" style="top:10px;" hidden><?php echo $zakazdone; ?></div>
	</div>
</body>

</html>
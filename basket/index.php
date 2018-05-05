<!DOCTYPE html>
<html lang="lv">
<?php
	require_once($_SERVER["DOCUMENT_ROOT"].'/head.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/db.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/dictionary.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/Rozes.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/Order.php'); 	
?>

<?
	if(isset($_POST['progress'])
	{
		echo 'kiskis';
	}		
	
	if(isset($_POST['theid']))
	{
		echo 'kiskis';
		Order::DeleteItem($_POST['theid'], $_SESSION['user']);
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
			<a href="<?php echo $href7.''.$currentlang; ?>"><?php echo $popular; ?></a>
			<a class="active" href="<?php echo $href1.''.$currentlang; ?>"><?php echo $catalog; ?></a>
			<a href="<?php echo $href4.''.$currentlang; ?>"><?php echo $contacts; ?></a>
			<?php if(!isset($_SESSION['user'])):?>
				<a href="<?php echo $href5.''.$currentlang; ?>"><i class="fas fa-user-plus"></i></a>
			<?php else: ?>
				<a href="<?php echo $href6.''.$currentlang; ?>"><i class="fas fa-shopping-cart"></i></a>
			<?php endif; ?>
		</div>
		<div id="snow">
			<?php $catg = Rozes::getCategories(); foreach($catg as $ct): ?>
			<a <?php if(isset($_GET['cat']) && $ct['cid'] == $_GET['cat']) echo 'class="active"'; ?> href="/catalog/?cat=<?php echo $ct['cid'].''.$inside; ?>"><?php echo $ct['cname']; ?></a>
			<?php endforeach; ?>
		</div>
		<div id="mainBlock">
			<div id="mainInside" class="basket-list">
				<?php 
					$orderlist = array(); 
					$orderlist = Order::GetBasket($_SESSION['user']); 
					foreach($orderlist as $order): ?>
					<div class="item-order">
						<div class="item-title">
							<a href="/view/?id=<?php echo $order['rid']; ?>">
								<?php echo isset($_GET['lang'])&&$_GET['lang'] == 'ru' ? $order['rnameru'] : $order['rnamelv']; ?>
							</a>
						</div>
						<div class="item-price">
							<?php echo $order['rprice'].' €'; ?>
						</div>
						<div class="item-delete" id="delete-item" data-id="<?php echo $order['rid']; ?>">
							<i class="fas fa-trash-alt"></i>
						</div>
					</div>
				<?php endforeach; ?>
				<button class="order-button n-button" id="do-progress"><?php echo $zakaz; ?></button>
			</div>
		</div>
	</div>
</body>

</html>
<!DOCTYPE html>
<html lang="lv">
<?php
	require_once($_SERVER["DOCUMENT_ROOT"].'/head.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/db.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/dictionary.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/Rozes.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/Order.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/User.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/header.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/language.php');  	
?>

<?php
	if(isset($_POST['progress']))
	{
		$email = User::GetEmail($_SESSION['user']);
		$tovar = array(); 
		$tovar = Order::GetBasket($_SESSION['user']);
		mail($email, 'Tovar', $tovar);
		Order::ClearBasket($_SESSION['user']);
	}		
	
	if(isset($_POST['theid']))
	{
		Order::DeleteItem($_POST['theid'], $_SESSION['user']);
	}
?>

<body class="maxSize">
	<div id="overlay" class="maxSize"></div>
	<div id="lending" class="maxSize">
	
		<div id="snow">
			<?php $catg = Rozes::getCategories(); foreach($catg as $ct): ?>
			<a <?php if(isset($_GET['cat']) && $ct['cid'] == $_GET['cat']) echo 'class="active"'; ?> href="/catalog/?cat=<?php echo $ct['cid'].''.$inside; ?>"><?php echo $ct['cname']; ?></a>
			<?php endforeach; ?>
		</div>
		
		<div class="row justify-content-center rozes-view">
			<div class="col-6">
				<?php $orderlist = array(); 
				      $orderlist = Order::GetBasket($_SESSION['user']); 
					  if(Order::GetOrdersCount($_SESSION['user']) > 0): ?>
				<div class="card">
					<div class="card-header">
						<?php echo $groza; ?>
					</div>
					<div class="card-body">
						<?php foreach($orderlist as $order): ?>
							<a href="/view/?id=<?php echo $order['rid']; 
							if($currentlang) echo '&'.$currentlang;?>" class="td">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page">
										<?php echo isset($_GET['lang'])&&$_GET['lang'] == 'ru' ? $order['rnameru'] : $order['rnamelv']; ?>
									</li>
									<li class="breadcrumb-item active" aria-current="page">
										<?php echo $order['rprice'].'€'; ?>
									</li>
									<div class="item-delete" id="delete-item" data-id="<?php echo $order['rid']; ?>">
										<i class="fas fa-trash-alt"></i>
									</div>
								</ol>
							</nav>
							</a>
						<?php endforeach;?>
					<button type="button" class="btn btn-success" id="do-progress">
						<?php echo $zakaz; ?>
					</button>
					</div>
				</div>
				<?php else: ?>
				<div class="card">
					<div class="card-header">
						<?php echo $kludaName; ?>
					</div>
					<div class="card-body">
						<?php echo $grozakluda; ?>			
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</body>

</html>
<!DOCTYPE html>
<html lang="lv">
<?php
	require_once($_SERVER["DOCUMENT_ROOT"].'/head.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/db.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/dictionary.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/Rozes.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/Order.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/User.php');
?>

<?php
	//Если было нажание на кнопку "Закать", JS скрипт обрабатывает и отправляем запрос, здесь же мы проверяем
	//существует ли пост запрос, если да, то выполняем определённую функцию
	if(isset($_POST['progress'])) //это если человек отправил заказ на почту
	{
		$email = User::GetEmail($_SESSION['user']);
		$tovar = array(); //создаётся массив
		$tovar = Order::GetBasket($_SESSION['user']);
		mail($email, 'Tovar', $tovar); //функция php для отправки на почту
		Order::ClearBasket($_SESSION['user']); //очищаем список заказов
	}		
	
	if(isset($_POST['theid'])) //Это функция удаляет один заказ только
	{
		Order::DeleteItem($_POST['theid'], $_SESSION['user']);
	}
?>

<body class="maxSize">
	<div id="overlay" class="maxSize"></div>
	<div id="lending" class="maxSize">
	
		<!--Здесь выводит менюшка и язык, для того, чтобы они не плыли вниз с розами вместе-->
		<div id="tk-menu">
			<?php require_once($_SERVER["DOCUMENT_ROOT"].'/header.php');
				require_once($_SERVER["DOCUMENT_ROOT"].'/language.php'); ?>
		</div>
	
		<div id="snow">
			<?php $catg = Rozes::getCategories(); foreach($catg as $ct): ?>
			<!--Если категория в которой мы сейчас равна названию категории в списке, то её название жирным шрифтом как активное-->
				<a <?php if(isset($_GET['cat']) && $ct['cid'] == $_GET['cat']) echo 'class="active"'; ?> href="/catalog/?cat=<?php echo $ct['cid']; if ($currentlang) echo '&'.$currentlang; ?>"><?php echo $ct['cname']; ?></a>
			<?php endforeach; ?>
		</div>
		
		<div class="row justify-content-center rozes-view">
			<div class="col-6">
			<!--Здесь он получает содержимое корзины пользователя-->
				<?php $orderlist = array(); 
				      $orderlist = Order::GetBasket($_SESSION['user']); 
					  //проверяет количество заказов у пользователя, если их больше 0 выводится один код
					  if(Order::GetOrdersCount($_SESSION['user']) > 0): ?>
				<div class="card">
					<div class="card-header">
						<?php echo $groza; ?>
					</div>
					<div class="card-body">
					<!--Здесь он выводит все заказы, которые есть-->
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
				<!--Если заказов нет, то выводит сообщения об ошибке-->
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
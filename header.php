<div id="menu">
	<a href="<?php echo '/about'.$currentlang; ?>"><?php echo $about; ?></a>
	<a href="<?php echo '/newrozes'.$currentlang; ?>"><?php echo $newrozes; ?></a>
	<a href="<?php echo '/popular'.$currentlang; ?>"><?php echo $popular; ?></a>
	<a href="<?php echo '/catalog'.$currentlang; ?>"><?php echo $catalog; ?></a>
	<a href="<?php echo '/contact'.$currentlang; ?>"><?php echo $contacts; ?></a>
	<!--Если пользователь вошёл на сайт-->
	<?php if(!isset($_SESSION['user'])):?> 
		<a href="<?php echo '/login'.$currentlang; ?>"><i class="fas fa-user-plus"></i></a>
	<?php else: ?>
		<a href="<?php echo '/basket'.$currentlang; ?>"><i class="fas fa-shopping-cart"></i></a>
	<?php endif; ?>
</div>
<div id="menu">
	<a href="<?php echo $href2.''.$currentlang; ?>"><?php echo $about; ?></a>
	<a href="<?php echo $href3.''.$currentlang; ?>"><?php echo $newrozes; ?></a>
	<a href="<?php echo $href7.''.$currentlang; ?>"><?php echo $popular; ?></a>
	<a href="<?php echo $href1.''.$currentlang; ?>"><?php echo $catalog; ?></a>
	<a href="<?php echo $href4.''.$currentlang; ?>"><?php echo $contacts; ?></a>
	<?php if(!isset($_SESSION['user'])):?>
		<a href="<?php echo $href5.''.$currentlang; ?>"><i class="fas fa-user-plus"></i></a>
	<?php else: ?>
		<a href="<?php echo $href6.''.$currentlang; ?>"><i class="fas fa-shopping-cart"></i></a>
	<?php endif; ?>
</div>
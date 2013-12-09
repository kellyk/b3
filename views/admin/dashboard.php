<?php include_once('views/global/header.php'); ?>
<div>
<ul class="nav nav-list">
	<li><a href="<?php echo SITE_ROOT; ?>admin/catalog">Manage Catalog</a></li>
	<li><a href="<?php echo SITE_ROOT; ?>admin/orders">Place Orders</a></li>
	<li><a href="<?php echo SITE_ROOT; ?>admin/reports">Generate Reports</a></li>
	<li><a href="<?php echo SITE_ROOT; ?>admin/profile/<?php echo $_SESSION['username']; ?>">Update Admin Profile</a></li>
	<li><a href="<?php echo SITE_ROOT; ?>admin/logout">Logout Admim</a></li>
</ul>


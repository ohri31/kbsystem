<?php if(isset($_SESSION['user'])){ ?>
	<li><a href="create.php">Create</a></li>
	<li><a href="csv.php">Download CSV</a></li>
	<li><a href="pdf.php">Download PDF</a></li>
	<li><a href="logout.php">Logout</a></li>
<?php }else{ ?> 
	<li><a href="liftoff.php">Lift off?</a></li>
	<li><a href="pricing.php">Pricing</a></li>
	<li><a href="search.php">Search</a></li>
<?php } ?>
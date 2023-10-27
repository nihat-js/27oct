<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

</head>
<body>
<!-- <?php isset($positions) ?>	 -->
<?php echo $title ?>
<div id="container">
	<form action="">

		<div class="form-group">
			<h3> Name </h3>
			<input type="text" name="name">
		</div>

		<div class="form-group">
			<h3> Surname </h3>

			<input type="text" name="surname">
		</div>

		<div class="form-group">
			<h3> Start Date </h3>
			<input type="date" name="startDate">
		</div>

		<div class="form-group">
			<!-- <select class="" name=""> -->
				<?php foreach ($variable as $key => $value): ?>
					<p> $value   </p>
				<?php endforeach; ?>
			<!-- </select> -->
		</div>

		<div class="form-group">
			<h3> Salary </h3>
			<input type="date" name="salary">
		</div>

		<button> Submitt </button>

	</form>

</div>
</div>

</body>
</html>

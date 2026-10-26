<div class="app-topbar">
	<a class="app-brand" href="<?php echo ($_SESSION["role"] == 'admin') ? 'exam.php' : 'view_exam.php'; ?>">
		<span class="app-brand-gem"><i class="fa-solid fa-graduation-cap"></i></span>
		Online Exam System
	</a>

	<nav class="app-nav">
		<ul>
			<?php if(isset($_SESSION["role"]) && $_SESSION["role"] == 'admin') { ?>
				<li id="exam"><a href="exam.php"><i class="fa-solid fa-layer-group"></i> Exams</a></li>
				<li id="user"><a href="user.php"><i class="fa-solid fa-users"></i> Users</a></li>
			<?php } ?>
			<?php if(isset($_SESSION["role"]) && $_SESSION["role"] == 'user') { ?>
				<li id="enroll_exam"><a href="enroll_exam.php"><i class="fa-solid fa-circle-plus"></i> Enrol Exam</a></li>
				<li id="view_exam"><a href="view_exam.php"><i class="fa-solid fa-file-lines"></i> My Exam</a></li>
			<?php } ?>
		</ul>
	</nav>

	<div class="app-user">
		<span class="app-user-info">
			<span class="u-name"><?php echo !empty($_SESSION["name"]) ? ucfirst($_SESSION["name"]) : 'Guest'; ?></span>
			<span class="u-role"><?php echo !empty($_SESSION["role"]) ? ucfirst($_SESSION["role"]) : ''; ?></span>
		</span>
		<a href="logout.php" class="btn btn-sm" title="Logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
	</div>
</div>

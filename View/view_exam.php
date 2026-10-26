<?php
include_once '../Models/Database.php';
include_once '../Controllers/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if(!$user->loggedIn()) {
	header("Location: index.html");
}
include('../inc/header.php');
?>
<title>My Exams — Online Exam System</title>
<script src="../Assets/js/jquery.dataTables.min.js"></script>
<script src="../Assets/js/user_exam.js"></script>
<script src="../Assets/js/general.js"></script>
<?php include('../inc/container.php');?>
	<h2>Online Exam System</h2>
	<?php include('top_menus.php'); ?>

	<h4>Exam List</h4>
	<table id="userExamListing">
		<thead>
			<tr>
				<th>Id</th>
				<th>Exam Title</th>
				<th>Duration</th>
				<th>Total Question</th>
				<th>R/Q Mark</th>
				<th>W/Q Mark</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
	</table>
<?php include('../inc/footer.php');?>

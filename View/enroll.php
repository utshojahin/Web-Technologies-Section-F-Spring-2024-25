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
<title>Enrolled Users — Online Exam System</title>
<script src="../Assets/js/jquery.dataTables.min.js"></script>
<script src="../Assets/js/enroll.js"></script>
<script src="../Assets/js/general.js"></script>
<?php include('../inc/container.php');?>
	<h2>Online Exam System</h2>
	<?php include('top_menus.php'); ?>

	<h4>Enrolled Users</h4>
	<div class="table-toolbar">
		<a href="exam.php" class="btn btn-default"><i class="fa-solid fa-arrow-left"></i> Back to Exams</a>
	</div>

	<table id="examEnrollListing" data-exam-id="<?php echo $_GET['exam_id']; ?>">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Gender</th>
				<th>Mobile</th>
				<th>Result</th>
			</tr>
		</thead>
	</table>

	<div id="userDetails" class="modal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">User Details</h4>
					<button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
				</div>
				<div class="modal-body">
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Email</th>
								<th>Gender</th>
								<th>Mobile</th>
								<th>Address</th>
								<th>Created</th>
							</tr>
						</thead>
						<tbody id="userList">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<?php include('../inc/footer.php');?>

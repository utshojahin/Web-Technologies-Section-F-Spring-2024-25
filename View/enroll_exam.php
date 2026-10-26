<?php
include_once '../Models/Database.php';
include_once '../Controllers/User.php';
include_once '../Controllers/Exam.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$exam = new Exam($db);

if(!$user->loggedIn()) {
	header("Location: index.html");
}
include('../inc/header.php');
?>
<title>Enroll to Exam — Online Exam System</title>
<script src="../Assets/js/jquery.dataTables.min.js"></script>
<script src="../Assets/js/user_exam.js"></script>
<script src="../Assets/js/general.js"></script>
<?php include('../inc/container.php');?>
	<h2>Online Exam System</h2>
	<?php include('top_menus.php'); ?>

	<h4>Enroll To Exam</h4>
	<div class="card">
		<div class="card-header">Choose an Exam</div>
		<div class="card-body">
			<div class="form-group">
				<label for="exam_list">Exam</label>
				<select name="exam_list" id="exam_list">
					<option value="">Select Exam</option>
					<?php echo $exam->getExamList(); ?>
				</select>
			</div>
			<div id="exam_details"></div>
		</div>
	</div>
<?php include('../inc/footer.php');?>

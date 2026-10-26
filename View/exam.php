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
<title>Exams — Online Exam System</title>
<script src="../Assets/js/jquery.dataTables.min.js"></script>
<script src="../Assets/js/exam.js"></script>
<script src="../Assets/js/general.js"></script>
<?php include('../inc/container.php');?>
	<h2>Online Exam System</h2>
	<?php include('top_menus.php'); ?>

	<h4>Exams</h4>
	<div class="table-toolbar">
		<button type="button" id="addExam" class="btn btn-primary" title="Add Exam"><i class="fa-solid fa-plus"></i> Add Exam</button>
	</div>

	<table id="examListing">
		<thead>
			<tr>
				<th>Id</th>
				<th>Exam Title</th>
				<th>Duration (Minute)</th>
				<th>Total Question</th>
				<th>R/Q Mark</th>
				<th>W/Q Mark</th>
				<th>Status</th>
				<th>Questions</th>
				<th>Enroll Users</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
	</table>

	<div id="examModal" class="modal">
		<div class="modal-dialog">
			<form method="post" id="examForm">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add Exam</h4>
						<button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="exam_title">Exam Title</label>
							<input type="text" id="exam_title" name="exam_title" placeholder="Exam title" required>
						</div>

						<div class="form-group">
							<label for="exam_duration">Duration</label>
							<select name="exam_duration" id="exam_duration">
								<option value="">Select</option>
								<option value="1">1 Minute</option>
								<option value="2">2 Minute</option>
								<option value="3">3 Minute</option>
								<option value="4">4 Minute</option>
								<option value="5">5 Minute</option>
								<option value="30">30 Minute</option>
								<option value="60">1 Hour</option>
								<option value="120">2 Hour</option>
								<option value="180">3 Hour</option>
							</select>
						</div>

						<div class="form-group">
							<label for="total_question">Total Question</label>
							<select name="total_question" id="total_question">
								<option value="">Select</option>
								<option value="1">1 Question</option>
								<option value="2">2 Question</option>
								<option value="3">3 Question</option>
								<option value="4">4 Question</option>
								<option value="5">5 Question</option>
								<option value="10">10 Question</option>
								<option value="25">25 Question</option>
								<option value="50">50 Question</option>
								<option value="100">100 Question</option>
								<option value="200">200 Question</option>
								<option value="300">300 Question</option>
							</select>
						</div>

						<div class="form-group">
							<label for="marks_right_answer">Marks For Right Answer</label>
							<select name="marks_right_answer" id="marks_right_answer">
								<option value="">Select</option>
								<option value="1">+1 Mark</option>
								<option value="2">+2 Mark</option>
								<option value="3">+3 Mark</option>
								<option value="4">+4 Mark</option>
								<option value="5">+5 Mark</option>
							</select>
						</div>

						<div class="form-group">
							<label for="marks_wrong_answer">Marks For Wrong Answer</label>
							<select name="marks_wrong_answer" id="marks_wrong_answer">
								<option value="">Select</option>
								<option value="1">-1 Mark</option>
								<option value="1.25">-1.25 Mark</option>
								<option value="1.50">-1.50 Mark</option>
								<option value="2">-2 Mark</option>
							</select>
						</div>

						<div class="form-group">
							<label for="status">Status</label>
							<select name="status" id="status">
								<option value="">Select</option>
								<option value="Created">Created</option>
								<option value="Pending">Pending</option>
								<option value="Started">Started</option>
								<option value="Completed">Completed</option>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id" id="id" />
						<input type="hidden" name="action" id="action" value="" />
						<button type="button" class="btn" data-dismiss="modal">Close</button>
						<input type="submit" name="save" id="save" value="Save" />
					</div>
				</div>
			</form>
		</div>
	</div>
 <?php include('../inc/footer.php');?>

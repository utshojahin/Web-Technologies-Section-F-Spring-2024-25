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
<title>Questions — Online Exam System</title>
<script src="../Assets/js/jquery.dataTables.min.js"></script>
<script src="../Assets/js/questions.js"></script>
<script src="../Assets/js/general.js"></script>
<?php include('../inc/container.php');?>
	<h2>Online Exam System</h2>
	<?php include('top_menus.php'); ?>

	<h4>Questions</h4>
	<div class="table-toolbar">
		<button type="button" id="addQuestions" class="btn btn-primary" title="Add Question"><i class="fa-solid fa-plus"></i> Add Question</button>
	</div>

	<table id="questionsListing" data-exam-id="<?php echo $_GET['exam_id']; ?>">
		<thead>
			<tr>
				<th>Id</th>
				<th>Question</th>
				<th>Right Option</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
	</table>

	<div id="questionsModal" class="modal">
		<div class="modal-dialog">
			<form method="post" id="questionsForm">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add Question</h4>
						<button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="question_title">Question Title <span class="text-danger">*</span></label>
							<input type="text" name="question_title" id="question_title" autocomplete="off" required />
						</div>

						<div class="form-group">
							<label for="option_title_1">Option 1 <span class="text-danger">*</span></label>
							<input type="text" name="option_title_1" id="option_title_1" autocomplete="off" required />
						</div>

						<div class="form-group">
							<label for="option_title_2">Option 2 <span class="text-danger">*</span></label>
							<input type="text" name="option_title_2" id="option_title_2" autocomplete="off" required />
						</div>

						<div class="form-group">
							<label for="option_title_3">Option 3 <span class="text-danger">*</span></label>
							<input type="text" name="option_title_3" id="option_title_3" autocomplete="off" required />
						</div>

						<div class="form-group">
							<label for="option_title_4">Option 4 <span class="text-danger">*</span></label>
							<input type="text" name="option_title_4" id="option_title_4" autocomplete="off" required />
						</div>

						<div class="form-group">
							<label for="answer_option">Answer <span class="text-danger">*</span></label>
							<select name="answer_option" id="answer_option" required>
								<option value="">Select</option>
								<option value="1">1 Option</option>
								<option value="2">2 Option</option>
								<option value="3">3 Option</option>
								<option value="4">4 Option</option>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id" id="id" />
						<input type="hidden" name="exam_id" id="exam_id" />
						<input type="hidden" name="action" id="action" value="" />
						<button type="button" class="btn" data-dismiss="modal">Close</button>
						<input type="submit" name="save" id="save" value="Save" />
					</div>
				</div>
			</form>
		</div>
	</div>
<?php include('../inc/footer.php');?>

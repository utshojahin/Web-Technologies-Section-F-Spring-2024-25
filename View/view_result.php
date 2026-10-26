<?php
include_once '../Models/Database.php';
include_once '../Controllers/User.php';
include_once '../Controllers/Exam.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);


if(!$user->loggedIn()) {
	header("Location: index.html");
}

$exam = new Exam($db);
if(!empty($_GET['exam_id'])) {
	$exam->exam_id = $_GET['exam_id'];		
}

include('../inc/header.php');
?>
<title>Exam Result — Online Exam System</title>
<script src="../Assets/js/jquery.dataTables.min.js"></script>
<script src="../Assets/js/user_exam.js"></script>
<script src="../Assets/js/general.js"></script>
<?php include('../inc/container.php');?>
	<h2>Online Exam System</h2>
	<?php include('top_menus.php'); ?>

<?php
$examResult =  $exam->getExamResults();		
?>
	<h4>Online Exam Result</h4>
	<div class="card">
		<div class="card-header">Result Sheet</div>
		<div class="card-body">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th>Question</th>
						<th>Option 1</th>
						<th>Option 2</th>
						<th>Option 3</th>
						<th>Option 4</th>
						<th>Your Answer</th>
						<th>Answer</th>
						<th>Result</th>
						<th>Marks</th>
					</tr>
				</thead>
				<tbody>
					<?php					
					foreach($examResult as $results) {						
						$examResults  = $exam->getQuestopnOptions($results["question_id"]);						
						$userAnswer = '';
						$orignalAnswer = '';
						$questionResult = '';
						if($results['marks'] == '0'){
							$questionResult = '<span class="badge badge-dark">Not Attend</span>';
						}
						if($results['marks'] > '0')	{
							$questionResult = '<span class="badge badge-success">Right</span>';
						}
						if($results['marks'] < '0')	{
							$questionResult = '<span class="badge badge-danger">Wrong</span>';
						}
						echo '
						<tr>
							<td>'.$results['question'].'</td>';

						foreach($examResults as $questionOption){
							echo '<td>'.$questionOption["title"].'</td>';
							if($questionOption["option"] == $results['user_answer_option']) {
								$userAnswer = $questionOption['title'];
							}
							if($questionOption['option'] == $results['answer']){
								$orignalAnswer = $questionOption['title'];
							}
						}
						echo '
						<td>'.$userAnswer.'</td>
						<td>'.$orignalAnswer.'</td>
						<td>'.$questionResult.'</td>
						<td>'.$results["marks"].'</td>
					</tr>';
					}
					$marksResult = $exam->getExamTotalMarks();
					foreach($marksResult as $marks){
					?>
					<tr>
						<td colspan="8" align="right"><b>Total Marks</b></td>
						<td align="right"><b><?php echo $marks["mark"]; ?></b></td>
					</tr>
					<?php	
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
<?php include('../inc/footer.php');?>

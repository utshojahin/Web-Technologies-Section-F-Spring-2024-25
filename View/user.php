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
<title>Users — Online Exam System</title>
<script src="../Assets/js/jquery.dataTables.min.js"></script>
<script src="../Assets/js/user.js"></script>
<script src="../Assets/js/general.js"></script>
<?php include('../inc/container.php');?>
	<h2>Online Exam System</h2>
	<?php include('top_menus.php'); ?>

	<h4>Users</h4>
	<div class="table-toolbar">
		<button type="button" name="add" id="addUser" class="btn btn-primary" title="Add User"><i class="fa-solid fa-plus"></i> Add New</button>
	</div>

	<table id="userListing">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Gender</th>
				<th>Mobile</th>
				<th>Role</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
	</table>

	<div id="userModal" class="modal">
		<div class="modal-dialog">
			<form method="post" id="userForm">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add User</h4>
						<button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName">First Name*</label>
									<input type="text" id="firstName" name="firstName" placeholder="First name" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="lastName">Last Name*</label>
									<input type="text" id="lastName" name="lastName" placeholder="Last name" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="email">Email*</label>
									<input type="email" id="email" name="email" placeholder="Email" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="mobile">Mobile*</label>
									<input type="text" id="mobile" name="mobile" placeholder="Mobile" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="address">Address*</label>
									<textarea id="address" name="address" placeholder="Address" required></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="role">Role</label>
									<select id="role" name="role">
										<option value="admin">Admin</option>
										<option value="user">User</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="gender">Gender</label>
									<select id="gender" name="gender">
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="newPassword">New Password</label>
									<input type="password" id="newPassword" name="newPassword" placeholder="Password">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="userId" id="userId" />
						<input type="hidden" name="action" id="action" value="" />
						<button type="button" class="btn" data-dismiss="modal">Close</button>
						<input type="submit" name="save" id="save" value="Save" />
					</div>
				</div>
			</form>
		</div>
	</div>

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

<?php 
include_once '../Models/Database.php';
include_once '../Controllers/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if($user->loggedIn()) {	
	if(!empty($_SESSION["role"]) && $_SESSION["role"] == 'admin') {
		header("Location: exam.php");	
	} else if (!empty($_SESSION["role"]) && $_SESSION["role"] == 'user'){
		header("Location: view_exam.php");	
	}
}

$loginMessage = '';
if(!empty($_POST["login"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["loginType"]) && $_POST["loginType"]) {	
	$user->email = $_POST["email"];
	$user->password = $_POST["password"];	
	$user->loginType = $_POST["loginType"];
	if($user->login()) {
		if($_SESSION["role"] == 'admin') {
			header("Location: exam.php");	
		} else if ($_SESSION["role"] == 'user'){
			header("Location: view_exam.php");	
		}		
	} else {
		$loginMessage = 'Invalid login! Please try again.';
	}
} else if (empty($_POST["login"]) || empty($_POST["email"]) || empty($_POST["password"])|| empty($_POST["loginType"])){
	$loginMessage = 'Enter email, password and select user type to login.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#06070a">
	<title>Login — Online Exam System</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="../Assets/CSS/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
	<div class="auth-shell">
		<div class="auth-card">
			<div class="auth-visual">
				<img src="https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=Elegant%20dark%203d%20render%20of%20a%20modern%20online%20examination%20room%20with%20floating%20holographic%20quiz%20panels%2C%20glossy%20black%20surfaces%2C%20warm%20gold%20accents%2C%20cinematic%20depth%20of%20field%2C%20premium%20high%20detail&image_size=portrait_4_3" alt="Exam platform">
				<div class="auth-visual-copy">
					<h3>Welcome back</h3>
					<p>Sign in to manage exams or continue your assessment.</p>
				</div>
			</div>

			<div class="auth-form">
				<a class="auth-brand" href="index.html">QuizMaster</a>
				<h2>Sign In</h2>
				<p class="auth-sub">Access your online exam dashboard.</p>

				<?php if ($loginMessage != '') { ?>
					<div class="auth-alert is-error" id="login-alert"><?php echo htmlspecialchars($loginMessage); ?></div>
				<?php } ?>

				<form id="loginform" role="form" method="POST" action="">
					<div class="form-group">
						<label for="email">Email Address</label>
						<input type="email" id="email" name="email" value="<?php if(!empty($_POST["email"])) { echo htmlspecialchars($_POST["email"]); } ?>" placeholder="you@example.com" required>
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" id="password" name="password" placeholder="••••••••" required>
					</div>

					<div class="form-group">
						<label>User Type</label>
						<div class="role-toggle">
							<label><input type="radio" name="loginType" value="admin" required><i class="fa-solid fa-user-shield"></i> Administrator</label>
							<label><input type="radio" name="loginType" value="user"><i class="fa-solid fa-user-graduate"></i> User</label>
						</div>
					</div>

					<div class="form-group">
						<input type="submit" name="login" value="Login">
					</div>
				</form>

				<p class="auth-alt">Don't have an account? <a href="register.php">Register</a></p>
			</div>
		</div>
	</div>
</body>
</html>

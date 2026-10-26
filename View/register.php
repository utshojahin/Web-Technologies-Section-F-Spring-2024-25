<?php
include_once '../Models/Database.php';
include_once '../Controllers/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$message = '';
$messageType = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $created = date('Y-m-d H:i:s');

    $query = "INSERT INTO online_exam_user (first_name, last_name, gender, email, password, mobile, address, created, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('sssssssss', $firstName, $lastName, $gender, $email, $password, $mobile, $address, $created, $role);

    if($stmt->execute()) {
        $message = 'Registration successful. You can now sign in.';
        $messageType = 'is-success';
    } else {
        $message = 'Error: ' . $stmt->error;
        $messageType = 'is-error';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#06070a">
    <title>Register — Online Exam System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../Assets/CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="auth-shell">
        <div class="auth-card">
            <div class="auth-visual">
                <img src="https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=Dark%20luxury%20illustration%20of%20a%20student%20achieving%20success%20with%20floating%20gold%20trophy%20and%20certificate%20elements%2C%20glossy%20black%20background%2C%20warm%20golden%20accents%2C%20premium%203d%20render%2C%20high%20detail&image_size=portrait_4_3" alt="Join QuizMaster">
                <div class="auth-visual-copy">
                    <h3>Join QuizMaster</h3>
                    <p>Create your account and start taking exams in minutes.</p>
                </div>
            </div>

            <div class="auth-form">
                <a class="auth-brand" href="index.html">QuizMaster</a>
                <h2>Create Account</h2>
                <p class="auth-sub">Fill in the details below to get started.</p>

                <?php if ($message != '') { ?>
                    <div class="auth-alert <?php echo $messageType; ?>"><?php echo htmlspecialchars($message); ?></div>
                <?php } ?>

                <form method="post" action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" id="first_name" name="first_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="last_name" name="last_name" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="you@example.com" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input type="text" id="mobile" name="mobile" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" required>
                    </div>

                    <div class="form-group">
                        <label for="role">Register As</label>
                        <select id="role" name="role" required>
                            <option value="user">User</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit">Create Account</button>
                    </div>
                </form>

                <p class="auth-alt">Already have an account? <a href="login.php">Sign in</a></p>
            </div>
        </div>
    </div>
</body>
</html>

<?php
session_start();
require_once("./system/db.php");

function generateCaptcha($length) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $captcha = '';
    for ($i = 0; $i < $length; $i++) {
        $captcha .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $captcha;
}

if (!isset($_SESSION['captcha']) || isset($_POST['regenerate_captcha'])) {
    $_SESSION['captcha'] = generateCaptcha(6);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $captchaInput = $_POST['captcha'];
    $userType = $_POST['usertype'];

    if ($_SESSION['captcha'] == $captchaInput) {
        try {
            $stmt = $db->prepare("SELECT * FROM users WHERE email = ? AND role = ?");
            
            $data = [$email, $userType];
            $stmt->execute($data);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {

                if (password_verify($password, $row['password'])) {
                    $_SESSION['valid'] = $row['email'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['user_id'] = $row['id'];
                    if ($userType === 'Admin') {
                        $_SESSION['role'] = $userType;
                        header("Location: ./admin/home_admin.php");
                        exit();
                    } else {
                        $_SESSION['role'] = $userType;
                        header("Location: ./index.php");
                        exit();
                    }
                } else {
                    $pesan =  "<div class='messagewrong'><p>Password salah</p></div><br>";
                }
            } else {
                $pesan = "<div class='messagewrong'><p>Mohon isi dengan benar</p></div><br>";
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            die();
            
        }
    } else {
        $pesan = "<div class='messagewrong'><p>CAPTCHA salah</p></div><br>";

    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="front.css">
    <script src="password.js"></script>
    <title>DeLouvre | Login</title>
    <link rel="stylesheet" href="./boxicons-2.1.4/css/boxicons.min.css">
</head>
<body>
    <h1>DeLouvre</h1>
    <h2>c'est bon de te revoir</h2>
        <div class="box form-box">
        <?php
            if(isset($pesan)){
                echo $pesan;}
        ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email"></label>
                    <input type="text" name="email" id="email" placeholder="Email" autocomplete="off" required><i class="bx bx-envelope icon"></i>
                </div>

                <div class="field input">
                    <label for="password"></label>
                    <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required>
                    <i class="bx bxs-low-vision icon" id="eye-toggle" onclick="togglePasswordVisibility()"></i>
                </div>

                <div class="field input">
                    <label for="usertype">User Type:</label>
                    <select name="usertype" required>
                        <option value="Customer">Customer</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>

                <div class="field input">
                    <label class="captcha" for="captcha">CAPTCHA: <?php echo $_SESSION['captcha']; ?></label>
                    <input type="text" name="captcha" id="captcha" placeholder="Enter CAPTCHA" autocomplete="off" required>
                </div>

                <div class="submits">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>

                <div class="links">
                    Don't have an account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


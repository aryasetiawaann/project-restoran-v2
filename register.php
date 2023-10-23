<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="front.css">
    <script src="password.js"></script>
    <title>Restoran IF330 - DeLouvre | Register</title>
    <link rel="stylesheet" href="./boxicons-2.1.4/css/boxicons.min.css">
</head>
<body>
        <a href="./index.php" style="text-decoration:none;color:unset">
            <h1>DeLouvre</h1>
        </a>
        <h2>c'est bon de te revoir</h2>
        <div class="box form-box">
<?php 
        
require_once("./system/db.php");

if(isset($_POST['submit'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $birthdate = date('Y-m-d', strtotime($birthdate));
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $gender = $_POST['gender'];
    
    $verify_query = $db->prepare("SELECT email FROM users WHERE email= ?");
    $verify = [$email];
    $verify_query->execute($verify);

    if ($verify_query->rowCount() != 0) {
        echo "<div class='message'>
                  <p>This email is used, Try another One Please!</p>
              </div> <br>";
        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
    } else {
        $sql = "INSERT INTO users (fname, lname, username, email, tgl_lahir, password, gender) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $data = [$firstName, $lastName, $username, $email, $birthdate, $password, $gender];
        $stmt = $db->prepare($sql);
        

        $stmt->execute($data) or die("Error Occurred");
        echo "<div class='message'>
                  <p>Registration successfully!</p>
              </div> <br>";
        echo "<a href='login.php'><button class='btn'>Login Now</button>";
    }


         }else{
         
        ?>

            <header>Sign Up</header>
            <form action="" method="post">

            <div class="field input">
                <label for="firstName"></label>
                <input type="text" name="firstName" id="firstName" placeholder="First Name" autocomplete="off" required>
            </div>
                <div class="field input">
                    <label for="lastName"></label>
                    <input type="text" name="lastName" id="lastName" placeholder="Last Name" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="username"></label>
                    <input type="text" name="username" id="username" placeholder="Username" autocomplete="off" required><i class="bx bx-user icon"></i>
                </div>

                <div class="field input">
                    <label for="email"></label>
                    <input type="text" name="email" id="email" placeholder="Email" autocomplete="off" required><i class="bx bx-envelope icon"></i>
                </div>

                <div class="field input">
                    <label for="birthdate"></label>
                    <input type="date" name="birthdate" id="birthdate" placeholder="Birth Date" autocomplete="off" required><i class="bx bxs-calendar-alt     icon" ></i>
                </div>
                <div class="field input">
                    <label for="password"></label>
                    <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required>
                    <i class="bx bxs-low-vision icon" id="eye-toggle" onclick="togglePasswordVisibility()"></i>
                </div>
                <div class="field input">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" required>
                        <option value="Laki-laki">Male</option>
                        <option value="Perempuan">Female</option>
                    </select>
                </div>
                <div class="submits">
                    
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="login.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>
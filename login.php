<?php include('server.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Registration</title>
</head>
<body>

    <section>
        <div class="container">
            <div class="user signinBx">
                <div class="imgBx"><img src="im1.jpg"></div>
                <div class="formBx">
                    <form>
                    <?php include('errors.php') ?>
                        <h3>Sign In</h3>
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="password" name="password_1" placeholder="Password" required>
                        <input type="submit" name="login_user" value="Login">
                        <p class="signup">Don't have an account ? <a href="#" onclick="toggleForm();">Sign Up.</a></p>
                    </form>
                </div>
            </div>
            
            <div class="user signupBx">
                <div class="formBx">
                    <form action="server.php" method="POST">
                        <h3>Create an account</h3>
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="password" name="password_1" placeholder="Create Password" required>
                        <input type="password" name="password_2" placeholder="Confirm Password" required>
                        <input type="submit" name="reg_user" value="Sign Up">
                        <p class="signup">Already have an account ? <a href="#" onclick="toggleForm();">Sign in.</a></p>
                    </form>
                </div>
                <div class="imgBx"><img src="im2.jpg"></div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
    function toggleForm(){
        var container = document.querySelector('.container');
        container.classList.toggle('active') 
    }
    </script>

</body>
</html>
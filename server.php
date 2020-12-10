<?php

//starts server on load
session_start();

//initializing variables
$username = "";
$email = "";
$password = "";

//error message
$errors = array();

//connecting to db
$db = mysqli_connect('localhost','root','','register') or die("Could not connect to database");

//Register user
$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

//form validation
if (empty($username)) array_push($errors, "Username is required");
if (empty($email)) array_push($errors, "Email is required");
if (empty($password_1)) array_push($errors, "Password is required");
if ($password_1 != $password_2) array_push($errors, "Password do not match");

//check db for existing user with same username
$user_check_query = "SELECT * FROM 'users' WHERE username = '$username' or email = '$email' LIMIT 1";

//To fetch all the username down below
$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if($user) 
{
    if($user['username'] === $username){array_push($errors, "Username already exists");}
    if($user['email'] === $email){array_push($errors, "This email id already has a registered username");}
}

//Register the user if no error
if(count($errors) == 0)
{
    $password = md5($password_1); //this will encrypt the password
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    //running query on dbs
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";

    header('location: index.php');
}

//Login User
if(isset($_POST['login_user']))
{
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password_1']);

    if(empty($username))
    {
        array_push($errors, "Username is required");
    }
    if(empty($password))
    {
        array_push($errors, "Password is required");
    }

    if(count($errors) == 0)
    {
        $password = md5($password);

        $query = "SELECT * FROM user WHERE username= '$username' AND password= '$password' ";
        $resultS = mysqli_query($db, $query);

        if(mysqli_num_rows($results))
        {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Logged in successfully";
            header('location: index.php');
        }  
        else
        {
            array_push($errors, "Wrong username/password combination. Please try agian.");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <?php

    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        


        $errors = array();
        if(empty($email) OR empty($password)){
            array_push($errors, "Email or password is empty");
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($errors, "Invalid email");
        }
        if(strlen($password) < 8){
            array_push($errors, "Password must be at least 8 characters");
        }

        // if(count($errors)>0){
        //     foreach($errors as $error){
        //         echo $error;
        //     }
        // }else{
            include 'config/database.php';
            if ($stmt = mysqli_prepare($conn, $query = "INSERT INTO users (email, password) VALUES (?,?)")) {

                mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
            
                mysqli_stmt_execute($stmt) or die('Error when inserting:'.mysqli_error($conn));
             }else{
            die('Error when preparing '.mysqli_error($conn));
            }
            
            

        }

    

    ?>
    <form action="register.php" method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" value="Register" name="submit">Register</button>
    </form>
</body>

</html>
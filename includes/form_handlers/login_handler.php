<?php

if(isset($_POST['login_button'])) {  

    $email = mysqli_real_escape_string($con, $_POST['log_email']);  
    $password = mysqli_real_escape_string($con, $_POST['log_password']);  

    $query = "SELECT * FROM users WHERE email = '$email'";  
    $result = mysqli_query($con, $query);  
    
    if(mysqli_num_rows($result) > 0) {  
    
    	while($row = mysqli_fetch_array($result)) {  
            
            if(password_verify($password, $row['password'])){ 
				
				$username = $row['username'];
                //return true;  
                $_SESSION['username'] = $username;  
                echo "YES";
                //var_dump($_SESSION['username']);
                header("Location: index.php");
                exit(); 
            }
            else {  
            	//return false;
            	array_push($error_array, "Неверный адрес электронной почты или пароль<br>");
            }  
        }  
    }   
}

?>



<?php
session_start();

        include '../files/confi.php';
            if(isset($_POST['member_email']) && isset($_POST['member_pass'])){
                $email=mysqli_real_escape_string($conn , $_POST['member_email']);
                $password=md5(sha1(mysqli_real_escape_string($conn , $_POST['member_pass'])));

                if (!empty($email) && !empty($password)) {

                    $checkemail="SELECT * FROM users WHERE email= '$email'  AND password= '$password' ";
                $runquery =mysqli_query($conn ,$checkemail);
                if (mysqli_num_rows($runquery) > 0) {
                    $rowforcheckmail=mysqli_fetch_assoc($runquery);
                    $_SESSION['user_name'] =  $rowforcheckmail['name'] ;  
                    $_SESSION['user_email'] =  $rowforcheckmail['email'] ;    
                    $_SESSION['user_password'] =  $rowforcheckmail['password'] ; 
                    echo "<p class='alert-success p-3'>Login Successfull</p>";
                    echo "<script>
				        window.location.href='dashboard.php';
				        </script>";
                     }else{
                        echo "<p class='alert-danger p-3'>Your Email Or Password wrong</p>";
                     }
                }else{
                    echo "<p class='alert-danger p-3'>Please Fill All Field</p>";
                }

                

            }
            ?>
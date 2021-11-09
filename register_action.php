<?php
        include '../files/confi.php';
            if(isset($_POST['member_email']) && isset($_POST['member_pass']) && isset($_POST['member_name']) ){
                $email=mysqli_real_escape_string($conn , $_POST['member_email']);
                $name=mysqli_real_escape_string($conn , $_POST['member_name']);
                $password=md5(sha1(mysqli_real_escape_string($conn ,$_POST['member_pass'])));

                if (!empty($email) && !empty($password) && !empty($name) ) {
                    $sqlforcheckemail="SELECT * FROM users WHERE email='$email' " ;
                    $runforcheckemail=mysqli_query($conn ,$sqlforcheckemail );
                    if (mysqli_num_rows($runforcheckemail) > 0) {
                        echo "<p class='alert-danger p-3'>This email alredy exist.</p>";
                    }else {

                    $vkey=md5(date('d-m-yh:i:m'));
                    $sqlforregister="INSERT INTO  users(name,email,password,vkey) VALUES('$name','$email','$password','$vkey') ";
                    $runforregister=mysqli_query($conn , $sqlforregister);
                    if ($runforregister == true) {
                        echo "<p class='alert-success p-3'>Registrattion Successfull . Check Your Spam or inbox</p>";
                    }else{
                       echo "<p class='alert-danger p-3'>Your Email Or Password wrong</p>";
                    }
                }
                }else{
                    echo "<p class='alert-danger p-3'>Please Fill All Field</p>";
                }


            }
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--link bootstrap css cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- link fontawsome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="../css/style.css">

    <title>Document</title>
</head>
<body>
    <div class="register">
        <form id="regform" onsubmit="return false">
            <h3 class="text-center">Register Your Account</h3>

            <label for="name" class="mb-2">Full Name:</label>
            <input type="text" id="regname" name="name" placeholder="Type Your Full Name" class="form-control mb-2">
            <div id="reg_name_error_sms" class="text-danger"></div>

            <label for="email" class="mb-2">Email:</label>
            <input type="email" id="regemail" class="form-control mb-2" placeholder="Type Your Email">
            <div id="reg_email_error_sms" class="text-danger"></div>


            <label for="password" class="mb-2">Password:</label>
            <input type="password"  id="regpass" class="form-control mb-2" placeholder="Type Your Password"> 
            <div id="reg_pass_error_sms" class="text-danger"></div>

            <label for="cpassword" class="mb-2">Confrim Password:</label>
            <input type="password" id="cpassword" class="form-control mb-2" placeholder="Retype Password"> 
            <div id="reg_cpass_error_sms" class="text-danger"></div>


            <input type="submit" class="form-control btn btn-primary" id="register" value="Register">

            <a href="login.php" class="text-center d-block m-2">Already Have An Account</a>
        </form>
        <div class="reg_wrrongsms"></div>
    </div>

    <!--- link bootstrap js cdn -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<!-- link jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    //register form code start
         
          $("#reg_email_error_sms").hide();
            $("#reg_pass_error_sms").hide();
            $("#reg_name_error_sms").hide();
            $("#reg_cpass_error_sms").hide();

           var reg_error_name = false;
            var  reg_error_email = false;
            var  reg_error_pass = false;
            var  reg_error_cpass = false;

          $("#regname").keyup(function(){
            checkname();
          });

          $("#regemail").keyup(function(){
              checkregemail();
            });
          $("#regpass").keyup(function(){
            checkregpass();
            });
            $("#cpassword").keyup(function(){
              checkregcpass();
            });
            

            

            function checkname(){
      var pattern=/^[a-zA-Z\s]+$/;
      var name= $("#regname").val();

      if (pattern.test(String(name).toLowerCase()) && name !== '') {
        $("#reg_name_error_sms").hide();
        $("#regname").css("border-bottom","2px solid #34F458");
      }else{
            $("#reg_name_error_sms").html("Allow Charecters");
            $("#reg_name_error_sms").show();
            $("#regname").css("border-bottom","2px solid #F90A0A");
            reg_error_name = true;
      }
    }

          function checkregemail(){
      var pattern=/^[a-z0-9](\.?[a-z0-9]){5,}@gmail\.com$/i;
      var email= $("#regemail").val();

      if (pattern.test(String(email).toLowerCase()) && email !== '') {
        $("#reg_email_error_sms").hide();
        $("#regemail").css("border-bottom","2px solid #34F458");
      }else{
            $("#reg_email_error_sms").html("Only Allow Gmail");
            $("#reg_email_error_sms").show();
            $("#regemail").css("border-bottom","2px solid #F90A0A");
             reg_error_email = true;
      }
    }

    function checkregpass() {
            var pass= $("#regpass").val().length;
            if (pass < 8) {
               $("#reg_pass_error_sms").html("Atleast 8 Characters");
               $("#reg_pass_error_sms").show();
               $("#regpass").css("border-bottom","2px solid #F90A0A");
               reg_error_pass = true;
            } else {
               $("#reg_pass_error_sms").hide();
               $("#regpass").css("border-bottom","2px solid #34F458");
            }
         }

         function checkregcpass() {
            var pass= $("#regpass").val();
            var cpass= $("#cpassword").val();

            if (pass == cpass && cpass !== '') {
              $("#reg_cpass_error_sms").hide();
               $("#cpassword").css("border-bottom","2px solid #34F458");
            } else {
              $("#reg_cpass_error_sms").html("Password Dose not Match");
               $("#reg_cpass_error_sms").show();
               $("#cpassword").css("border-bottom","2px solid #F90A0A");
               reg_error_cpass = true;
            }
         }


         $("#regform").submit(function(){

               var email1= $("#regemail").val();
               var pass1= $("#regpass").val();
               var name= $("#regname").val();
               var cpass= $("#cpassword").val();

               
            reg_error_name = false;
            reg_error_email = false;
            reg_error_pass = false;
            reg_error_cpass = false;
            
            checkregemail();
            checkregpass();
            checkname();
            checkregcpass();

            if ( reg_error_email === false && reg_error_pass === false && reg_error_name === false && reg_error_cpass === false) {
               $.ajax({
                url:"register_action.php",
                method:"POST",
                data: {member_email:email1,member_pass:pass1,member_name:name},
                cache: false,
                beforeSend: function(){
                  $("#register").val("Connecting....");
                          },
                success: function(getdata){
                   $(".reg_wrrongsms").html(getdata);
                   $(".reg_wrrongsms").show();
                    function hideMsg(){
                   $(".reg_wrrongsms").fadeOut();
                    }
                setTimeout(hideMsg ,4000);
                   $("#register").val("Registeration");
                }
                 });

               return true;
            } 
            else {
               alert("Please Fill the form Correctly");
               return false;
              }

         });
</script>
</body>
</html>
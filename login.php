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
    <div class="container">
        <div class="row">
            <div class="col_lg col_sm col_md">

  
    <div class="register">
        <form class="login_form" onsubmit="return false">
            <h3 class="text-center">Login Your Account</h3>
            <label for="email" class="mb-2">Email:</label>
            <input type="email" id="logemail" class="form-control mb-2" placeholder="Type Your Email">
            <div id="log_email_error_sms" class="text-danger"></div>

            <label for="password" class="mb-2">Password:</label>
            <input type="password" id="logpass" class="form-control mb-2" placeholder="Type Your Password"> 
            <div id="log_pass_error_sms" class="text-danger"></div>

            <input type="submit" id="login" class="form-control btn btn-primary mt-2" value="Login">
            <a href="register.php" class="text-center d-block m-2">Create  An Account</a>
        </form>
        <div class="wrrongsms"></div>
    </div>
    </div>
        </div>
    </div>

    <!--- link bootstrap js cdn -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<!-- link jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
        //login page coding start
        $("#log_email_error_sms").hide();
     $("#log_pass_error_sms").hide();


     var  error_email = false;
      var  error_pass = false;


    $("#logemail").keyup(function(){
      checkemail();
    });
    $("#logpass").keyup(function(){
      checkpass();
    });


    function checkemail(){
      var pattern=/^[a-z0-9](\.?[a-z0-9]){5,}@gmail\.com$/i;
      var email= $("#logemail").val();

      if (pattern.test(String(email).toLowerCase()) && email !== '') {
        $("#log_email_error_sms").hide();
        $("#logemail").css("border-bottom","2px solid #34F458");
      }else{
            $("#log_email_error_sms").html("Only Allow Gmail");
            $("#log_email_error_sms").show();
            $("#logemail").css("border-bottom","2px solid #F90A0A");
             error_email = true;
      }
    }


    function checkpass() {
            var pass= $("#logpass").val().length;
            if (pass < 8) {
               $("#log_pass_error_sms").html("Atleast 8 Characters");
               $("#log_pass_error_sms").show();
               $(".mgclass").show();
               $("#logpass").css("border-bottom","2px solid #F90A0A");
               error_pass = true;
            } else {
               $("#log_pass_error_sms").hide();
               $(".mgclass").hide();
               $("#logpass").css("border-bottom","2px solid #34F458");
            }
         }


            $(".login_form").submit(function() {

               var email1= $("#logemail").val();
               var pass1= $("#logpass").val();

            error_email = false;
            error_pass = false;
            
            checkemail();
            checkpass();

            if ( error_email === false && error_pass === false ) {

               $.ajax({
                url:"login_action.php",
                method:"POST",
                data: {member_email:email1,member_pass:pass1},
                cache: false,
                beforeSend: function(){
                  $("#login").val("Connecting....");
                          },
                success: function(getdata){
                   $(".wrrongsms").html(getdata);
                   $(".wrrongsms").show();
                   function hideMsg(){
                   $(".wrrongsms").fadeOut();
                    }
                setTimeout(hideMsg ,4000);

                   $("#login").val("Log in");
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

<?php
    // error_reporting(0);
    include('config.php');
    ?>
     <?php
     $phoneErr="";
    if(isset($_POST['submit'])){
    
    $email_db=$_POST['email'];

    $phone=$_POST['phone'];
    $pass=$_POST['password'];
    $repass=$_POST['re_password'];
    
    $city=$_POST['city'];
    $state=$_POST['state'];
    if ($pass==$repass)
      {
        
      
    	$check=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM form WHERE email='$email_db'"));
        $check1=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM form WHERE phone='$phone'"));
    	if($check>0) {
    		echo "<script>alert('Email Already present!...');</script>";
    	}else if ($check1>0) 
    	{
         if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['phone']))
    {
      $phoneErr = 'Invalid Number!';
    }
 
        
      }
      else{
  
		 
        $sql = "INSERT INTO form(email,phone,password,city,state) VALUES('$email_db','$phone','$pass','$city','$state')";

        
 
        if (mysqli_query($conn,$sql)){
        	echo "<script>alert('Data Inserted Successfully!...');</script>";
        }
        else{
        	echo "<script>alert('Data Not Inserted!...');</script>";
        }
      } 
}else{
	echo "<script>alert('Wrong Password!...');</script>";

}
}
    ?>



<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Task</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

<link rel="stylesheet" href="style.css">
</head>
<body>
      <div class="main">
      <section class="signup">

      <div class="container">
            <div class="signup-content">
                  <form method="POST" id="signup-form" class="signup-form" >
                  <h2 class="form-title">Create account</h2>
                  
                  <div class="form-group">
                        <label> <h6>Enter Email :</h6></label>
                        <input type="email" class="form-input" name="email" id="email" placeholder="Your Email" required="" />
                  </div>

                  <div class="form-group">
                        <label> <h6>Enter Phone No. :</h6></label>
                        <input type="Phone" class="form-input" name="phone" id="Phone" placeholder="Your Phone" required />
                        <?php echo $phoneErr; ?>
                  </div>

                  <div class="form-group">
                        <label> <h6>Enter Password :</h6></label>
                        <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                  </div>
                  <div class="form-group">
                        <label> <h6>Re-Enter Password :</h6></label>
                        <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password" />
                  </div>
                  <div class="form-group">
                        <label> <h6>Select City :</h6></label>
                        <select class="form-control" name="city">
                              <option> Noida</option>
                              <option> Ranchi</option>
                              <option> Patna</option>
                              <option> Bangalore</option>
                        </select>
                  </div>
                  <div class="form-group">
                        <label> <h6>Select State :</h6></label>
                        <select class="form-control" name="state">
                              <option> jharkhand</option>
                              <option> Karnataka</option>
                              <option> Bihar</option>
                              <option> UP</option>
                        </select>
                  </div>
                  <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up" />
                  </div>
                  
                  </form>
            </div>
      </div>
      </section>
      </div>

   
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>
</html>
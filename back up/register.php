
<?php include "includes/header.php"; ?>
<?php include "admin/functions.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/db.php"; ?>
<?php 


if(isset($_POST['submit'])) {

    $username = trim($_POST['username']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    $error = false;


    if(strlen($username) < 4){
        
        $error = true;
        echo 'Username needs to be longer';


    }

     if($username ==''){
        $error = true;
        echo 'Username cannot be empty';


    }


     if(username_exists($username)){
        $error = true;
        echo 'Username already exists, pick another another';


    }



    if($email ==''){
        $error = true;
        echo 'Email cannot be empty';


    }


     if(email_exists($email)){
        $error = true;
        echo 'Email already exists, <a href="index.php">Please login</a>';


    }


    if($password == '') {

        $error = true;
        echo 'Password cannot be empty';

    }
    
    if($firstname == ''){
        $error = true;
        echo 'First name cannot be empty';
    }
    
    if($lastname ==''){
        $error = true;
        echo 'Last name cannot be empty';
    }
        if($error == true){


        register_user($username, $email, $password);

        login_user($username, $password);
        }


    

} 

?>


<div class="container-fluid">
    <section class="container">
        
        <div class="jumbotron" style="background-image:url('https://image.freepik.com/free-vector/decorative-geometric-colorful-abstract-background-vector-set_293-914.jpg'); color:white;">
            <h1>Join QUIZME Today!!!</h1>
            <p>Be a part of Riveratam's largest aggregate of prospective geniuses.</p>
        </div>

		<div class="container-page">				
			<div class="col-md-6">
				<h3 class="dark-grey">Registration</h3>
				<form role="form" action="register.php" method="post" novalidate="novalidate">
				<div class="form-group col-lg-12">
					<label>Username</label>
					<input type="username" name="username" class="form-control" id="" value="">
				</div>
                
                <div class="form-group col-lg-6">
					<label>First Name</label>
					<input type="text" name="firstname" class="form-control" id="" value="">
				</div>
                
                <div class="form-group col-lg-6">
					<label>Last Name</label>
					<input type="text" name="lastname" class="form-control" id="" value="">
				</div>
				
				<div class="form-group col-lg-6">
					<label>Password</label>
					<input type="password" name="password" class="form-control" id="" value="">
				</div>
                
								
				<div class="form-group col-lg-6">
					<label>Email Address</label>
					<input type="text" name="email" class="form-control" id="" value="">
				</div>
				

    
							
			
			</div>
		
			<div class="col-md-6">
				<h3 class="dark-grey">Terms and Conditions</h3>
				<p>
					By clicking on "Register" you agree to The Company's' Terms and Conditions
				</p>
				<p>
					While rare, prices are subject to change based on exchange rate fluctuations - 
					should such a fluctuation happen, we may request an additional payment. You have the option to request a full refund or to pay the new price. (Paragraph 13.5.8)
				</p>
				<p>
					Should there be an error in the description or pricing of a product, we will provide you with a full refund (Paragraph 13.5.6)
				</p>
				<p>
					Acceptance of an order by us is dependent on our suppliers ability to provide the product. (Paragraph 13.5.6)
				</p>
				
				<input type="submit" value="Submit" name="submit" class="btn btn-primary">
			</div>
            </form>
		</div>
	</section>
</div>
<?php include "includes/footer.php"; ?>
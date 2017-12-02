 <?php

if ($_GET['error'] == 1) {
   $error = "Usuario o clave Incorrecta";

}else{
   $error = "";
}
?>
<!DOCTYPE html>
<html>
<head>
   <title></title>
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
   <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
   <div class="container">
      <div class="wrapper">
         <div class="col-lg-12">
            <form class="form-signin" action = "../class/cls_gestor.php" method = "post">       
               <h2 class="form-signin-heading">Please login</h2>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
               <input type="text" class="form-control" name="user_id" placeholder="Username" required="" autofocus="" />
               <input type="password" class="form-control" name="user_pass" placeholder="Password" required=""/>    
               <input type="text"  class="form-control" name="gestor" hidden value="0" required>  
               <label class="checkbox">
                 <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
               </label> 
               <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                  <div class="etc-login-form">
                  <p>forgot your password? <a href="#">click here</a></p>
                  <p>new user? <a href="user_form.php">create new account</a></p>
               </div>  
             </form>
         </div>       
     </div>
   </div>
   <script type="text/javascript" src ="../bootstrap/js/bootstrap.js"></script>
</body>
</html>
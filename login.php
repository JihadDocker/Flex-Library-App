<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Flex Library Application">
    <meta name="author" content="Jii Saaduddin">
    <link rel="shortcut icon" href="/images/favicon.ico">

    <title>Flex Flex Library Application by Jii Saaduddin</title>
    

   <!-- @JihadDocker : Loading Bootstrap :  -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

   <!-- @JihadDocker : Loading Flat UI :  -->
    <link href="css/flat-ui.css" rel="stylesheet">

   

   <!-- @JihadDocker : HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. :  -->
   <!-- @JihadDocker : [if lt IE 9]> 
      // <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>-->
   <!-- @JihadDocker : <![endif] :  -->
  </head>
  <body>

    <div class="container">
      <?php 
        if(isset($_POST['submit'])){
          include "connect_nimo.php";
          //$con=mysqli_connect("127.0.0.1","root","1324","library2");
          $aid=$_POST['aid'];
          $password=$_POST['password'];
          $result = mysqli_query($con,"SELECT * FROM admin WHERE aid='$aid' AND password='$password';");
          if($row = mysqli_fetch_array($result)) 
          {
            session_start();
            $_SESSION['aid'] = $aid;
            $_SESSION['admin_name']= $row['aname'];
            echo "<script language=javascript>alert('Login Succeed !');window.location='main.php'</script>";
          }
          else 
          { 
            echo "<script language=javascript>alert('Wrong User ID / Password !');window.location='login.php'</script>";
          }
          mysqli_close($con);
        }
      ?>
      <p/> <p/>
      <div class="login" >
       <div class="login-screen" >
 

        <form class="login-form" role="form" action="login.php" method="post">
          <div class="control-group">
            <input type="text" placeholder="Enter Your ID" class="form-control" name="aid" requi#365896 autofocus/>
            </label>
          </div>

          <div class="control-group">
            <input type="password" placeholder="Password" class="form-control" name="password" requi#365896/>
          </div>

          <button class="btn btn-primary btn-large btn-block" type="submit" name="submit">Login</button>
          <a class="login-link" href="#">Lost your password?</a>
        </form>
      </div>
     </div>   
    </div>
   <!-- @JihadDocker : /.container :  -->
    
   <!-- @JihadDocker : page footer :  -->
    <?php include "footer.php"; ?>

   <!-- @JihadDocker : Load JS here for greater good =============================-->
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/bootstrap-switch.js"></script>
    <script src="js/flatui-checkbox.js"></script>
    <script src="js/flatui-radio.js"></script>
    <script src="js/jquery.tagsinput.js"></script>
    <script src="js/jquery.placeholder.js"></script>
  </body>
</html>
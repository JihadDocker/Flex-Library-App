<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Flex Library Application">
    <meta name="author" content="Jii Saaduddin">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Flex Flex Library Application by Jii Saaduddin</title>
    
   <!-- @JihadDocker : Loading Bootstrap :  -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

   <!-- @JihadDocker : Loading Flat UI :  -->
    <link href="css/flat-ui.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.ico">
  </head>

<body>

   <!-- @JihadDocker : Wrap all page content here :  -->
    <div id="wrap">

     <!-- @JihadDocker : Fixed navbar :  -->
      <?php include 'navbar.php'; ?>

     <!-- @JihadDocker : Begin page content :  -->
      <div class="container">
        <div class="col-sm-12 page-header" align="left">
          <h2 class="demo-headline" style="color:#365896">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin &nbsp; Info</h2>
        </div>
        <?php 
          // session_start();
          include "connect_nimo.php";
          //$con = mysqli_connect('127.0.0.1','root','1324','library2');
          $aid = $_SESSION['aid'];
          $sql = "SELECT * FROM admin WHERE aid = '$aid';";
          $arr = mysqli_query($con,$sql);
          if($arr)
          {
            $row = mysqli_fetch_row($arr);
          }
        ?>

        <form class="form-horizontal" id='former'>
          <div class="form-group" >
            <label class="col-sm-2 control-label">admin ID</label>
            <div class="col-sm-4">
              <p class="form-control-static"><?php echo $row[0];?></p>
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-4">
              <p class="form-control-static"><?php echo $row[1];?></p>
            </div>
          </div>
           
          <div class="form-group" >
            <label class="col-sm-2 control-label">Administrator</label>
            <div class="col-sm-4">
              <p class="form-control-static"><?php echo $row[2];?></p>
            </div>
          </div>
          <div class="form-group" >
            <label class="col-sm-2 control-label">Telephone</label>
            <div class="col-sm-4">
              <p class="form-control-static"><?php echo $row[2];?></p>
            </div>
          </div>

        </form>


      </div>
    </div>

   <!-- @JihadDocker : page footer :  -->
    <?php include "footer.php"; ?>

   <!-- @JihadDocker : Bootstrap core JavaScript
    ================================================== :  -->
   <!-- @JihadDocker : Placed at the end of the document so the pages load faster :  -->
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
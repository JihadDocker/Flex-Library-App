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
   <!-- @JihadDocker : Fixed navbar :  -->
    <?php include "navbar.php" ?>    
    <div class="container">
        <div class="col-sm-12 page-header" align="left">

          <h2 class="demo-headline" style="color:#365896">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add &nbsp;One &nbsp;Single &nbsp;Book</h2>
        </div>
    </div>
       <!-- @JihadDocker : accessing database :  -->
    <div class="container">
        <?php
            if(isset($_POST['submit']))
            {
              include "connect_nimo.php";
              //$con=mysqli_connect("127.0.0.1","root","1324","library2");
              $bid=$_POST["bid"];
              $category=$_POST["category"];
              $bname=$_POST["bname"];
              $publisher=$_POST["publisher"];
              $year=$_POST["year"];
              $author=$_POST["author"];
              $price=$_POST["price"];
              $total=$_POST["total"];
              // 判断这种书图书馆之前是否已经有了
              $sql0="SELECT FROM book WHERE bid LIKE '%$bid%';";
              $arr0=mysqli_query($con,$sql0);
              if (mysqli_affected_rows($con)>0)
              {
                $sql1="UPDATE book SET stock=stock+$total WHERE bid LIKE '%$bid%';";
                $arr1=mysqli_query($con,$sql1);
                $sql1="UPDATE book SET total=total+$total WHERE bid LIKE '%$bid%';";
                $arr1=mysqli_query($con,$sql1);
                echo "Book".$bid." already exists. Stock changed!";
              }
              else if (!($arr0))
              {
                $sql = "INSERT INTO book VALUES ('$bid','$category','$bname','$publisher',$year,'$author',$price,$total,$total,now()-now());";
                $arr=mysqli_query($con,$sql);
                echo mysqli_errno($con)." ".mysqli_error($con);
                if ($arr) echo "Add book ".$bid." succeed!";
                else echo "Add book ".$bid." failed! Try again.";
              }
              echo "<script>alert('Add book finished.');window.location='add_one.php'</script>";
            }
        ?>

        <form class="form-horizontal" action="add_one.php" method="POST">

          <div class="form-group" >
           <!-- @JihadDocker : <label for="OldPassword">Old password</label> :  -->
            <label class="col-sm-3 lead" align='right'> &nbsp;</label>
            <div class="col-sm-5" align='left'>
               <input type="text" class="form-control" name="bid" placeholder="Input book ID here"></input>
            </div>  
          </div>
          <div class="form-group" >
           <!-- @JihadDocker : <label for="OldPassword">Old password</label> :  -->
            <label class="col-sm-3 lead" align='right'>Category</label>
            <div class="col-sm-5" align='left'>
               <input type="text" class="form-control" name="category" placeholder="Input category here"></input>
            </div>  
          </div>
          <div class="form-group" >
           <!-- @JihadDocker : <label for="OldPassword">Old password</label> :  -->
            <label class="col-sm-3 lead" align='right'> &nbsp;</label>
            <div class="col-sm-5" align='left'>
               <input type="text" class="form-control" name="bname" placeholder="Input book name here"></input>
            </div>  
          </div>
          <div class="form-group" >
           <!-- @JihadDocker : <label for="OldPassword">Old password</label> :  -->
            <label class="col-sm-3 lead" align='right'>Publisher</label>
            <div class="col-sm-5" align='left'>
               <input type="text" class="form-control" name="publisher" placeholder="Input publisher here"></input>
            </div>  
          </div>
          <div class="form-group" >
           <!-- @JihadDocker : <label for="OldPassword">Old password</label> :  -->
            <label class="col-sm-3 lead" align='right'>Year</label>
            <div class="col-sm-5" align='left'>
               <input type="text" class="form-control" name="year" placeholder="Input year here"></input>
            </div>  
          </div>
          <div class="form-group" >
           <!-- @JihadDocker : <label for="OldPassword">Old password</label> :  -->
            <label class="col-sm-3 lead" align='right'>Author</label>
            <div class="col-sm-5" align='left'>
               <input type="text" class="form-control" name="author" placeholder="Input author here"></input>
            </div>  
          </div>

          <div class="form-group" >
           <!-- @JihadDocker : <label for="OldPassword">Old password</label> :  -->
            <label class="col-sm-3 lead" align='right'>Price</label>
            <div class="col-sm-5" align='left'>
               <input type="text" class="form-control" name="price" placeholder="Input price here"></input>
            </div>  
          </div>
          <div class="form-group" >
           <!-- @JihadDocker : <label for="OldPassword">Old password</label> :  -->
            <label class="col-sm-3 lead" align='right'>Amount</label>
            <div class="col-sm-5" align='left'>
               <input type="text" class="form-control" name="total" placeholder="Input amount here"></input>
            </div>  
          </div>
          <div class="col-sm-8" align='right'>
            <button type="submit" class="btn btn-primary btn-wide" name="submit" value="submit">Submit</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="reset" class="btn btn-default btn-wide" name="reset" value="reset">Reset</button>
            &nbsp;&nbsp;&nbsp;&nbsp;
          </div>
            
        </form>

    </div> 
   <!-- @JihadDocker : page footer-->
    <br/><?php include "footer.php"; ?>

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
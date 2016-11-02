<?php
  session_start();
  require('connectdb.php');
  $Email = "";
?>

<?php
    include("header.php");

    $found_user = "";
        $id = 1;
        if(isset($_GET["id"])){
            $id =  $_GET["id"];
           // echo "YES Found ID";
        }
         if(isset($_POST["id"])){
            $id = $_POST["id"];
         }
 ?>

<div class="container" style="float:centre;">
    <div class="row" style="float:centre;">
        <div class="col-md-6 col-md-offset-3" style="float:centre;">
            <div class="panel panel-default" style="float:centre;">
                <div class="panel-heading"> <strong class="">Login</strong>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="logintest.php">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Email" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="user_password" id="user_password" placeholder="Password" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    <label class="">
                                        <input type="checkbox" class="">Remember me</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success btn-sm" name="submit" id="submit" value="submit">Sign in</button>
                                <button type="reset" class="btn btn-default btn-sm">Reset</button>
                            </div>
                            <div style="text-align:center;">
                                <br>
                                <br>
                                <br>
                                <h4><span style = "color:blue;" ><?php echo $found_user; ?></span> </h4>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">Not Registered? <a href="Register_Here.php" class="">Register here</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
        
        if(isset($_POST["submit"])){
            require('connectdb.php');
            $user_email = $_POST["user_email"];
            $user_password = $_POST["user_password"];
            $found_user = "";
            //echo "Email: ".$user_email." password: ".$user_password;
            $sql = "SELECT * FROM blog_registration WHERE email = '$user_email' AND password = '$user_password' ";
            $result = mysqli_query($cnctdb, $sql);
            $total = mysqli_num_rows($result);

            //$url = "Editorial_Home.php?Email=".$user_email."&id=".$id;
            if($result && $total!=0 ){
                  $_SESSION['email'] = $user_email;
                  //header("Location: $url");
                  //die();
                  //exit();
            }else{
                $found_user =  "User name or password is not correct";
            }
        }
?>

<?php
  include("footer.php");
?>
<!--THIS PAGE IS FOR SHOWING A SPECIFIC ALGORITHM WITH THE COMMENT LIST-->
<?php
  session_start();
  require('connectdb.php');
  $Email = "";
?>

<?php
  include("header.php");
?>


  <?php
  require('connectdb.php');
  $id = 0;
  $sql = "SELECT * FROM algorithms ORDER BY algo_id DESC LIMIT 1";
  $result1 = mysqli_query($cnctdb, $sql);
  $row = mysqli_fetch_row($result1);
  $last_id = $row[0];

  //$id is the algo id no which user selected:
  if(isset($_GET["id"])){
    $id=$_GET["id"];
  }else{
    $id = $last_id;
  }

  $sql = "SELECT * FROM algorithms WHERE algo_id = '$id'";
  $result = mysqli_query($cnctdb, $sql);
  $row = mysqli_fetch_row($result);

  //When a algorithm is being seen by an user then increament view no:
  $cur_viewers = $row[10]+1;
  $sql  = "UPDATE algorithms SET View='$cur_viewers'
                              WHERE algo_id = '$id'";
  $rs = mysqli_query($cnctdb, $sql);
  ?>

                  <?php
                  $user_name = "";
                  $Email = "";
                  //If any user comment on a article then update it into database from here:
                  if(isset($_POST["submit1"])){
                          if(isset($_GET["id"])){
                            $id=$_GET["id"];
                          }
                          if(isset($_GET["Email"])){
                            $Email =  $_GET["Email"];
                          }
                          //Update this part with the original log in page:

                          $sql = "SELECT * FROM blog_registration WHERE email = '$Email'";
                          $result = mysqli_query($cnctdb, $sql);
                          $row1 = mysqli_fetch_row($result);
                          $user_name = $row1[2];
                          $user_id = $row1[3];
                          $comment = $_POST["comment"];
                          $comment_date = "".date("Y/m/d")." ".date("h:i:sa");

                          //echo $user_name." ".$user_id." ".$id." ".$comment." ".$comment_date;

                          $sql =  "INSERT INTO comments_article(user_name,user_id,article_id,comment,comment_date) VALUES('$user_name',
                                  '$user_id','$id','$comment','$comment_date')";
                          $result1 = mysqli_query($cnctdb, $sql);
                          if(!$result1){
                            print_r($cnctdb->error);
                          }else{
                              //header("Location: Editorial_Home.php?Email=".$Email."&id=".$id);
                          }
                    }
                    
                    //When user want to delete his comment update that in database:
                    if(isset($_POST["comment_delete"])){
                          //echo "Comment Delete Start\n";
                          $comment_id = $_GET["comment_id"];
                          $sql9 = "DELETE FROM comments_article WHERE comment_id = '$comment_id'";
                          $result9 = mysqli_query($cnctdb, $sql9);
                          //header("Location: Editorial_Home.php?");
                          if(!$result1){
                           print_r($cnctdb->error);
                          }else{
                            //header("Location: Editorial_Home.php?");
                            //echo "DELETD Successfully\n";
                          }
                    }
                    ?>

<div>

  <div class="editorial_home_test">
  <?php
        //The top part that handle two types of operation that depend on log in:
        //If any user is not logged in then show log in button and register.
        //If any user is logged in then show log out and edit button.
        if(isset($_SESSION['email'])){
            $Email = $_SESSION['email'];
            $sql = "SELECT * FROM blog_registration WHERE email = '$Email'";
            $result = mysqli_query($cnctdb, $sql);
            $row1 = mysqli_fetch_row($result);
            $logged_in_author = $row1[2];
            //echo "Session Start Successfully\n";
    ?>
            <div class="editorial_top_test block center">
                <a style="color:#000033;" href="logout.php" class="btn btn-info" role="button">Log Out <?php echo $logged_in_author ?> </a>
                <a style="color:#000033;" href="Write_post.php" class="btn btn-info" role="button">Write New Post</a>
            
                     <?php 
                            $sql = "SELECT * FROM blog_registration WHERE email = '$Email'";
                            $result = mysqli_query($cnctdb, $sql);
                            $row1 = mysqli_fetch_row($result);
                            $logged_in_author = $row1[2];

                            $sql1 = "SELECT * FROM algorithms WHERE algo_id = '$id'";
                            $result1 = mysqli_query($cnctdb, $sql1);
                            $row = mysqli_fetch_row($result1);
                            $blog_author = $row[1];

                            //We will show edit button if the current user and the author of the article are same:
                            if (strcmp($logged_in_author, $blog_author) == 0) {
                                ?>
                                <a style="color:#000033;" href="Edit_Post.php?id=<?php echo $id; ?>" class="btn btn-info" role="button">Edit_Post</a>

                      <?php } ?>
            </div>

            <?php
        }else{ 
            ?>

            <div class="editorial_top_test block center">
                <a style="color:#000033;width:130px;" href="logintest.php?id=<?php echo $id; ?>" class="btn btn-info" role="button">Log In</a>
                <a style="color:#000033;width:130px;" href="Register_Here.php?id=<?php echo $id; ?>" class="btn btn-info" role="button">Register</a>
            </div>
        <?php } ?>
    <div class="editorial_left_test">
          <h2>Editorial List</h2>
          <div class="container">
                <div class="list-group" style="width:440px;">
                  <?php
                    //This part shows all the recent algorithm list in left side:
                    $cnt = 1;
                    while (true){
                          if($cnt == 15 || $last_id == 0) break;
                          $sql = "SELECT * FROM algorithms WHERE algo_id = $last_id";
                          $result5 = mysqli_query($cnctdb, $sql);
                          $total = mysqli_num_rows($result5);
                          if($result5 && $total!=0){
                            $row1 = mysqli_fetch_row($result5);
                  ?>
                    <div>
                      <a href="Editorial_Home.php?id=<?php echo "".$row1[0]; ?>&Email=<?php echo $Email ?>" class="list-group-item" style="width:430px;float:left;"> <h4><?php $res = "".$row1[3]."\n"; echo $res; ?> </h4> <h5><?php $res = "".$row1[1]." - ".$row1[2]; echo $res; ?> </h5></a>
                    </div>
                    <?php
                          $cnt++;
                        }
                        $last_id--;
                    }?>
                </div>
          </div>
    </div>
    <div class="editorial_right_test">
          <div class="editorial_writing_test">
            <div class= "writing_header_test">
            <!--This part show the article of the algorithm-->
              <h1><?php $res = "".$row[3]."\n"; echo $res; ?> </h1>
              <h3 style="color: #000066;text-align:center;"><?php $res = "".$row[1]." - ".$row[2]; echo $res; ?> </h3>
            </div>

            <div class= "writing_document_test">
              <pre>
                <?php 
                      $res = "".$row[6]."\n\n"; echo $res;
                      $res = "".$row[5]."\n\n"; echo $res;
                      $res = "".$row[7]."\n\n"; echo $res;
                 ?>
              </pre>
            </div>
          </div>

            <div class="editorial_comment_test">
              <h2 style="color: #000066;text-align:center;">Comments</h2>
                  <?php 
                      //This part show all the comments for the current article:
                      require('connectdb.php');
                      //echo "Current ID: ".$id;
                      $sql = "SELECT * FROM comments_article WHERE article_id = $id";
                      $result7 = mysqli_query($cnctdb, $sql);
                      $cnt = 0;
                      while($row2 = mysqli_fetch_row($result7)){
                        if(!$row2) continue;
                        //$cnt = $cnt + 1;
                        ?>
                            <div>
                              <div class="single_comment_top">
                                <div class="single_comment_left">
                                <h5 style="padding:5px;"><?php $res = "".$row2[0]." - ".$row2[5]; echo $res; ?> </h5>
                                </div>
                                <?php 
                                //This part is for showing DELETE buttom for the specific user:
                                if(isset($_SESSION['email'])){
                                    $comment_author = $row2[0];
                                    if (strcmp($logged_in_author, $comment_author) == 0) {
                                ?>

                                      <div class="single_comment_right" class="container">
                                          <form role="form" method="POST" action="Editorial_Home.php?comment_id=<?php echo $row2[4]; ?>&id=<?php echo $id; ?>">
                                            <button type="submit" class="btn btn-default" name="comment_delete" style="text-align:center;">DELETE</button>
                                          </form>
                                      </div>
                                <?php 
                                    }
                                } ?>

                              </div>
                              <div>
                                 <pre>
                                  <?php $res = "".$row2[3]."\n"; echo $res; ?>
                                 </pre>
                              </div>
                                
                            </div>

                        <?php }
                        //This part is for a new comment in the article.
                        //Update this after log in page update:

                         if(isset($_SESSION['email'])){
                              $Email = $_SESSION['email'];
                    ?>

                                <div class="container" style="width:800px;">
                                  <div class="row">
                                    <div class="col-lg-8">
                                       <form role="form" method="POST" action="Editorial_Home.php?id=<?php echo $id; ?>&Email=<?php echo $Email; ?>">
                                      <div class="form-group" style="width:775px;float:left;text-align:left;">
                                        <label for="comment"></label>
                                        <input type="text" class="form-control" name="comment" id="comment" placeholder="Enter Your Comment">
                                      </div>
                                      <button type="submit" class="btn btn-default" name="submit1" id="submit1" value="submit1" style="float:left;text-align:center;">Enter</button>
                                    </form>
                                    </div>
                                  </div>
                                </div>
                                <br>
                                <br>
                                <br>

                    <?php }  ?>
            </div>
    </div>
  </div>
</div>

<?php
  include("footer.php");
  ?>
<!--THIS PAGE THE HOME PAGE OF BLOG AND TUTORIAL SECTION-->
<?php
  session_start();
  require('connectdb.php');
  $Email = "";
?>

<?php
  include("header.php");
?>

  <?php
  $id = 0;
  $sql = "SELECT * FROM algorithms ORDER BY algo_id DESC LIMIT 15";
  $result1 = mysqli_query($cnctdb, $sql);
  ?>

<div>

  <div class="editorial_home_test">
  <!--THIS PART SHOWS THE RECENT ALGORITHM LIST-->
    <div class="editorial_left_test_home" style="width:900px;color:#ADADEB;">
          <h2 style="color:#00005C; font-family:Georgia;">Recent Algorithms</h2>
          <div class="container" style="width:880px;">
                <div class="list-group" style="width:880px;color:#ADADEB;">

                  <div class="result_list" style="text-align:center;">
                        <br>

                          <?php
                            while($row1 = mysqli_fetch_row($result1)){
                              $msg1 = $row1[4];
                              $msg2 = $row1[1]." on ".$row1[2];
                            ?>

                                <div style="text-align:center;float:center;">
                                  <a href="Editorial_Home.php?id=<?php echo $row1[0]; ?>" class="list-group-item list-group-item-success"> <?php echo $row1[3]; ?> </a>
                                  <h4 style="color:green;"><?php echo $msg1; ?></h4>
                                  <h4 style="color:green;"><?php echo $msg2; ?></h4>
                                </div>
                                <br>

                          <?php
                            }
                            ?>

                    </div>
                </div>
          </div>
    </div>
    <!--THIS PART SHOWS THE MOST POPULAR ALGORITHM LIST ORDER BY NO OF VIEWERS-->
    <div class="editorial_right_test_home" style="width:420px;color:#ADADEB;">
          <h2 style="color:#00005C; font-family:Georgia;">Popular Post</h2>
          <div class="container" style="width:400px;">
                <div class="list-group" style="width:400px;color:#ADADEB;">

                  <?php
                    $sql = "SELECT * FROM algorithms ORDER BY View DESC LIMIT 15";
                    $result1 = mysqli_query($cnctdb, $sql);
                    while($row1 = mysqli_fetch_row($result1)){

                  ?>
                    <div>
                      <a href="Editorial_Home.php?id=<?php echo "".$row1[0]; ?>&Email=<?php echo $Email ?>" class="list-group-item" style="width:390px;float:left;color:#3333AD;"> <h5><?php $res = "".$row1[3]."\n"; echo $res; ?> </h5> </a>
                    </div>
                    <?php
                     }
                    ?>
                </div>
          </div>
          <br>
          <br>
          <!--THIS PART SHOWS THE RECENT COMMENTS IN ANY ARTICLE BY THE USERS-->
          <h2 style="color:#00005C; font-family:Georgia;">Recent Comments</h2>
          <div class="container" style="width:400px;">
                <div class="list-group" style="width:400px;color:#ADADEB;">

                  <?php
                    $sql = "SELECT * FROM comments_article ORDER BY comment_id DESC LIMIT 8";
                    $result1 = mysqli_query($cnctdb, $sql);
                    while($row = mysqli_fetch_row($result1)){
                          $sql = "SELECT * FROM algorithms WHERE algo_id = '$row[2]'";
                          $result = mysqli_query($cnctdb, $sql);
                          $row1 = mysqli_fetch_row($result)
                  ?>
                    <div>
                      <a href="Editorial_Home.php?id=<?php echo "".$row1[0]; ?>&Email=<?php echo $Email ?>" class="list-group-item" style="width:390px;float:left;"> <h5><?php $res = "".$row1[3]."\n"; echo $res; ?> </h5> </a>
                      <br>
                      <br>
                      <h5><?php echo $row[0]." wrote : ".$row[3]; ?> </h5>
                    </div>
                    <?php
                     }
                    ?>
                </div>
          </div>

          <br>
          <br>
          <!--THIS PART IS FOR SHOWING THE MOST DISCUSSED TOPIC IN THIS WEBSITE-->
          <h2 style="color:#00005C; font-family:Georgia;">Tags</h2>
          <div class="container" style="width:400px;">
            <div class="list-group" style="width:400px;color:#ADADEB;">
              <div class="result_list">
                <a href="Algorithm_Page.php?category=Graph" class="list-group-item list-group-item-success">Graph</a>
                <a href="Algorithm_Page.php?category=Dynamic Programming" class="list-group-item list-group-item-info">DP</a>
                <a href="Algorithm_Page.php?category=Mathematics" class="list-group-item list-group-item-success">Mathematics</a>
                <a href="Algorithm_Page.php?category=Bit Magic" class="list-group-item list-group-item-info">Bit</a>
                <a href="Algorithm_Page.php?category=Data Structure" class="list-group-item list-group-item-success">Data Structure</a>
                <a href="Algorithm_Page.php?category=Sorting" class="list-group-item list-group-item-info">Sorting</a>
              </div>
            </div>
          </div>
    </div>

  </div>

  
</div>

<?php
  include("footer.php");
  ?>
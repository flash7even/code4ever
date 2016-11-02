<!--THIS PAGE SHOWS THE CATEGORY LIST WITH SOME ALGORITHM LIST FROM THE SELECTED CATEGORY -->
<?php
  session_start();
  require('connectdb.php');
  $Email = "";
?>

<?php
  include("header.php");
?>

<div class="container showresult">
          <?php
          //This part will show all the algorithms from database from the selected category:
            $category = "Java";
            if(isset($_GET["category"])){
                $category=$_GET["category"];
            }

              require('connectdb.php');
              $sql = "SELECT * FROM algorithms WHERE category = '$category' ORDER BY algo_id DESC";
              $result = mysqli_query($cnctdb, $sql);
              $total_match = mysqli_num_rows($result);
              if($total_match != 0){

              ?>
                    <div class="result_list" style="text-align:center;">
                        <h3 class="Result_header">Algorithm List from Category <?php echo $category; ?> </h3>
                        <br>

                    <?php
                      while($row1 = mysqli_fetch_row($result)){
                        $msg1 = $row1[4];
                        $msg2 = $row1[1]." on ".$row1[2];
                      ?>

                          <div style="text-align:center;float:center;">
                            <a href="Editorial_Home.php?id=<?php echo $row1[0]; ?>" class="list-group-item list-group-item-success"> <?php echo $row1[3]; ?> </a>
                            <h4><?php echo $msg1; ?></h4>
                            <h4><?php echo $msg2; ?></h4>
                          </div>
                          <br>

                    <?php
                      }
                      ?>

                    </div>

                <?php
                 }
                 ?>

    </div>

     <!--CATEGORY LIST OF IMPORTANT ARTICLES -->

<div class="container result_international">
  <h2 class="Result_header">Some Basic Techniques for Starting Programming Contest</h2>
  <div class="international_result_list">
    <div class="result_list">
      <a href="Algorithm_Page_basic.php?category=Beginners" class="list-group-item list-group-item-success">Beginners Tutorial</a>
      <a href="Algorithm_Page_basic.php?category=Java" class="list-group-item list-group-item-info">Java Learning</a>
      <a href="Algorithm_Page_basic.php?category=CPP" class="list-group-item list-group-item-success">Basic CPP Learning</a>
      <a href="Algorithm_Page_basic.php?category=STL" class="list-group-item list-group-item-info">STL Template for Contest</a>
      <a href="Algorithm_Page_basic.php?category=Input Output" class="list-group-item list-group-item-success">Input Output Technique</a>
      <a href="Algorithm_Page_basic.php?category=Experience" class="list-group-item list-group-item-info">Experience from Seniors</a>
    </div>
  </div>

</div>

    <?php

    ?>

<?php
  include("footer.php");
?>
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
            $category = "Sorting";
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

                    <?php } ?>
                    </div>
                <?php } ?>

    </div>

    <!--CATEGORY LIST OF IMPORTANT ALGORITHMS -->

<div class="container result_international">
  <h2 class="Result_header">Algorithm Categories</h2>
  <div class="international_result_list">
    <div class="result_list">
      <a href="Algorithm_Page.php?category=Graph" class="list-group-item list-group-item-success">Graph</a>
      <a href="Algorithm_Page.php?category=Dynamic Programming" class="list-group-item list-group-item-info">Dynamic Programming</a>
      <a href="Algorithm_Page.php?category=Number Theory" class="list-group-item list-group-item-success">Number Theory</a>
      <a href="Algorithm_Page.php?category=Mathematics" class="list-group-item list-group-item-info">Mathematics</a>
      <a href="Algorithm_Page.php?category=Bit Magic" class="list-group-item list-group-item-success">Bit Magic</a>
      <a href="Algorithm_Page.php?category=Data Structure" class="list-group-item list-group-item-info">Data Structure</a>
      <a href="Algorithm_Page.php?category=Greedy Algorithm" class="list-group-item list-group-item-success">Greedy Algorithm</a>
      <a href="Algorithm_Page.php?category=String Processing" class="list-group-item list-group-item-info">String Processing</a>
      <a href="Algorithm_Page.php?category=Beginners Tutorial" class="list-group-item list-group-item-success">Beginners Tutorial</a>
      <a href="Algorithm_Page.php?category=Sorting" class="list-group-item list-group-item-info">Sorting</a>
      <a href="Algorithm_Page.php?category=Backtracking" class="list-group-item list-group-item-info">Backtracking</a>
    </div>
  </div>

</div>
    <?php ?>
    
<?php
  include("footer.php");
?>
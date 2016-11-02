<!--THIS PAGE IS FOR EDITING/DELETING THE SELECTED ALGORITHM FROM Editorial_Home.php -->
<?php
  session_start();
  require('connectdb.php');
  $Email = "";
?>

          <?php 
              $author = "Tarango Khan";
              if(isset($_GET["author"])){
                $author=$_GET["author"];
              }

              $sql = "SELECT * FROM algorithms WHERE author = '$author' ORDER BY algo_id DESC LIMIT 1";
              $result1 = mysqli_query($cnctdb, $sql);
              $row = mysqli_fetch_row($result1);
              $id = $row[0];

              //Taking the id of which algorithm user edited:
              if(isset($_GET["id"])){
                $id=$_GET["id"];
                $sql = "SELECT * FROM algorithms WHERE algo_id = '$id'";
                $result = mysqli_query($cnctdb, $sql);
                $row = mysqli_fetch_row($result);
              }

              if(isset($_SESSION['email'])){
                 $Email = $_SESSION['email'];
              }
              $url = "Editorial_Home.php?Email=".$Email."&id=".$id;

              //If user clicked the DELETE buttong to DELETE his previously written algorithm:
              if(isset($_POST["delete_post"])){
                    $sql = "DELETE FROM algorithms WHERE algo_id = '$id'";
                    $result1 = mysqli_query($cnctdb, $sql);
                    //header("Location: Editorial_Home.php?");
                     $sql = "SELECT * FROM algorithms WHERE author = '$author' ORDER BY algo_id DESC LIMIT 1";
                    $result1 = mysqli_query($cnctdb, $sql);
                    $row = mysqli_fetch_row($result1);
                    $last_id = $row[0];
                    $url = "Editorial_Home.php?Email=".$Email."&id=".$last_id;
                    if(!$result1){
                     print_r($cnctdb->error);
                    }else{
                      header("Location: $url");
                      //echo "DELETD Successfully\n";
                    }
              }
            
          ?>

          <?php
          //If user clicked the update buttong to edit the algorithm with specific information:
          if(isset($_POST["update_post"])){
                $title = $_POST["title"];
                $author = $_POST["author"];
                $short_note = $_POST["short_note"];
                $category = $_POST["category"];
                $tags = $_POST["tags"];
                $description = mysql_real_escape_string( $_POST["description"]);
                $code = mysql_real_escape_string( $_POST["code"]);
                $analysis = mysql_real_escape_string( $_POST["analysis"]);
                $date = "".date("Y-m-d");

                $sql  = "UPDATE algorithms SET author='$author', date='$date', title='$title', 
                        short_note='$short_note', code='$code', description='$description', analysis='$analysis', 
                        category='$category', tags='$tags' WHERE algo_id = '$id'";

                $result1 = mysqli_query($cnctdb, $sql);
                
                if(!$result1){
                 print_r($cnctdb->error);
                }else{
                    header("Location: $url");
                }
          }
          ?>

    <?php
      include("header.php");
    ?>
          <div class="container" style=
            "padding:5px;
            border: 5px solid;
            background-color:#E6E6FA;
            width:1150px;
            text-align:center;
            border-color: #F8F8FC;">
            <h2 style="color:#00005C;">Edit Your Algorithm</h2>
          </div>
          </br>
          <!--THIS IS A FORM WITH SOME TEXT BOX TO EDIT OF A SELECTED ALGORITHM -->
          <div class="container">
            <form role="form" method="POST" action="Edit_post.php?id=<?php echo $id; ?>&author=<?php echo $row[1]; ?>" style="background-color:#E6E6FA;padding:10px;">
              <div class="form-group">
                <label for="comment">Title:</label>
                <input type="text" class="form-control" name="title" id="title" value="<?php echo $row[3]; ?>">
              </div>
              <div class="form-group">
                <label for="comment">Author:</label>
                <input type="text" class="form-control" name="author" id="author" value="<?php echo $row[1]; ?>">
              </div>
              <div class="form-group">
                <label for="comment">Short Note:</label>
                <input type="text" class="form-control" name="short_note" id="short_note" value="<?php echo $row[4]; ?>">
              </div>
              <div class="form-group">
                <label for="region">Select a Category:</label>
                  <select class="form-control" name="category" id="category" value="<?php echo $row[8]; ?>">
                    <option>Graph</option>
                    <option>Dynamic Programming</option>
                    <option>Data Structure</option>
                    <option>Bit Magic</option>
                    <option>Mathematics</option>
                    <option>Beginners</option>
                    <option>CPP</option>
                    <option>Java</option>
                    <option>Input Output</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="comment">Tags:</label>
                <input type="text" class="form-control" name="tags" id="tags" value="<?php echo $row[9]; ?>">
              </div>
              <div class="form-group">
                <label for="comment">Description:</label>
                <textarea class="form-control" name="description" id="description"rows="25"><?php echo $row[6]; ?></textarea>
              </div>
              <div class="form-group">
                <label for="comment">Algorithm Implementation:</label>
                <textarea class="form-control" name="code" id="code" rows="25"><?php echo $row[5]; ?></textarea>
              </div>
              <div class="form-group">
                <label for="comment">Complexity Analysis:</label>
                <textarea class="form-control" name="analysis" id="analysis" rows="25"><?php echo $row[7]; ?></textarea>
              </div>
              <button type="submit" class="btn btn-default" name="update_post" style="text-align:center;">UPDATE</button>
              <button type="submit" class="btn btn-default" name="delete_post" style="text-align:center;">DELETE</button>
            </form>
          </div>

<?php
  include("footer.php");
?>
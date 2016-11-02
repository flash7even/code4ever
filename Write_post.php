<!--WHEN ANY USER WANT TO WRITE A NEW ALGORITHM OR POST-->
<?php
  session_start();
  require('connectdb.php');
  $Email = "";
?>

<?php
  require('connectdb.php');
  //If user wrote a new algorithm in the form then update that to database here:
  //After that the page will be redirected to Editorial_Home.php that will show the written algorithm.
  if(isset($_POST["post1"])){
        $title = $_POST["title"];
        $author = $_POST["author"];
        $short_note = $_POST["short_note"];
        $category = $_POST["category"];
        $tags = $_POST["tags"];
        $description = mysql_real_escape_string( $_POST["description"]);
        $code = mysql_real_escape_string( $_POST["code"]);
        $analysis = mysql_real_escape_string( $_POST["analysis"]);
        $date = "".date("Y-m-d");

        $sql =  "INSERT INTO algorithms (author,date,title,short_note,code,description,analysis,category,tags) VALUES('$author','$date','$title',
          '$short_note','$code','$description','$analysis','$category','$tags')";
        $result1 = mysqli_query($cnctdb, $sql);

          $sql = "SELECT * FROM algorithms ORDER BY algo_id DESC LIMIT 1";
          $result1 = mysqli_query($cnctdb, $sql);
          $row = mysqli_fetch_row($result1);
          $last_id = $row[0];
          $Email = "";
          if(isset($_SESSION['email'])){
            $Email = $_SESSION['email'];
          }
          $url = "Editorial_Home.php?Email=".$Email."&id=".$last_id;
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
  <h2 style="color:#00005C;">Write a New Algorithm Here!</h2>
</div>
</br>
<!--THIS IS A FORM WITH SOME TEXT BOX TO WRITE A NEW ALGORITHM -->
<div class="container">
  <form role="form" method="POST" action="Write_post.php" style="background-color:#E6E6FA;padding:10px;">
    <div class="form-group">
      <label for="comment">Title:</label>
      <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
    </div>
    <div class="form-group">
      <label for="comment">Author:</label>
      <input type="text" class="form-control" name="author" id="author" placeholder="Enter Author's Name">
    </div>
    <div class="form-group">
      <label for="comment">Short Note:</label>
      <input type="text" class="form-control" name="short_note" id="short_note" placeholder="Enter a Short Note">
    </div>
    <div class="form-group">
      <label for="region">Select a Category:</label>
        <select class="form-control" name="category" id="category">
          <option>Graph</option>
          <option>Dynamic Programming</option>
          <option>Data Structure</option>
          <option>Greedy</option>
          <option>Experience</option>
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
      <input type="text" class="form-control" name="tags" id="tags" placeholder="Tags">
    </div>
    <div class="form-group">
      <label for="comment">Description:</label>
      <textarea class="form-control" name="description" id="description" placeholder="Write a Description" rows="25"></textarea>
    </div>
    <div class="form-group">
      <label for="comment">Algorithm Implementation:</label>
      <textarea class="form-control" name="code" id="code" placeholder="Write Your Code" rows="25"></textarea>
    </div>
    <div class="form-group">
      <label for="comment">Complexity Analysis:</label>
      <textarea class="form-control" name="analysis" id="analysis" placeholder="Describe Complexity Analysis" rows="25"></textarea>
    </div>
    <button type="submit" class="btn btn-default" name="post1" style="text-align:center;padding:5px;">POST</button>
  </form>
</div>

<?php
  include("footer.php");
?>
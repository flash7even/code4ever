  <!DOCTYPE html>
  <html lang="en">
  <head>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <title>Coding is Life</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="canvasjs.min.js"> </script>
    <link rel="stylesheet" type="text/css" href="style_cricket.css">
  </head>
  <body bgcolor="#E6FFFF">
  <nav class="navbar navbar">
    <div class="container-fluid" style="background-color:black;font-size: 22px;font-style: oblique;font-family:calibri;">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="tutorial_home.php">HOME</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav" style="">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Algorithm<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="Algorithm_Page.php?category=Graph">Graph</a></li>
              <li><a href="Algorithm_Page.php?category=Data Structure">Tree</a></li>
              <li><a href="Algorithm_Page.php?">Brute Force</a></li>
              <li><a href="Algorithm_Page.php?category=Dynamic Programming">DP</a></li>
              <li><a href="Algorithm_Page.php?category=Greedy">Greedy</a></li>
              <li><a href="Algorithm_Page.php?">Advanced</a></li>
              <li><a href="Algorithm_Page.php?">String Processing</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Data Structure <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="Algorithm_Page.php?category=Data Structure">Tree</a></li>
              <li><a href="Algorithm_Page.php?category=Data Structure">Segment tree</a></li>
              <li><a href="Algorithm_Page.php?category=Data Structure">Heap</a></li>
              <li><a href="Algorithm_Page.php?category=Data Structure">Queue</a></li>
              <li><a href="Algorithm_Page.php?category=Data Structure">Suffix Tree</a></li>
            </ul>
          </li>
          
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Graph Theory<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="Algorithm_Page.php?category=Graph">BFS</a></li>
              <li><a href="Algorithm_Page.php?category=Graph">DFS</a></li>
              <li><a href="Algorithm_Page.php?category=Graph">Minimum Spanning Tree</a></li>
              <li><a href="Algorithm_Page.php?category=Graph">Shortest Paths</a></li>
              <li><a href="Algorithm_Page.php?category=Graph">TSP</a></li>
            </ul>
          </li>
          <li><a href="Algorithm_Page_basic.php?category=Beginners">Beginners Tutorial</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">C++<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="Algorithm_Page.php?category=CPP">Basic I/O</a></li>
              <li><a href="Algorithm_Page.php?category=CPP">Loop</a></li>
              <li><a href="Algorithm_Page.php?category=CPP">Condition</a></li>
              <li><a href="Algorithm_Page.php?category=CPP">Recursion</a></li>
              <li><a href="Algorithm_Page.php?category=CPP">Function</a></li>
              <li><a href="Algorithm_Page.php?category=CPP">Object Class</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Java<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="Algorithm_Page.php?category=Java">Basic I/O</a></li>
              <li><a href="Algorithm_Page.php?category=Java">Loop</a></li>
              <li><a href="Algorithm_Page.php?category=Java">Condition</a></li>
              <li><a href="Algorithm_Page.php?category=Java">Recursion</a></li>
              <li><a href="Algorithm_Page.php?category=Java">Function</a></li>
              <li><a href="Algorithm_Page.php?category=Java">Object Class</a></li>
            </ul>
          </li>
          <li><a href="Algorithm_Page.php?category=Bit Magic">Bit Magic</a></li>
          <li><a href="Algorithm_Page_basic.php?category=Input Output">Basic I/O</a></li>
          <?php
              if(isset($_SESSION['email'])){
          ?>
                <li><a href="Write_Post.php?">Write Post</a></li>
          <?php
              }
          ?>
        </ul>
      </div>
      </nav>
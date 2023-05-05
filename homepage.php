<?php
include_once('db.php');
include_once('html.php');
include_once('html_utility.php');

//用session傳遞student_id
session_start();
$student_id = $_SESSION["student_id"];

//select student data
$sql = "select student_id,name,grade,department,total_credits from student where student_id = \"$student_id\""; 
$result = mysqli_query($conn, $sql) or die('MySQL query error : select total_creedits ');	
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>
<style> 
  
  a{
    text-decoration: none;
  }
  .card {
    transition: all 0.3s ease;
    display: inline-block;
    cursor: pointer;
    justify-content: center; /* 水平置中 */
    align-items: center; /* 垂直置中 */
    text-align: center;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 50px 70px 30px 150px;
    
    box-shadow: 0 0 5px rgba(0,0,0,0.6);
  }
  .card:hover{
    background-color: #f5f5f5;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 5);
  }
  .card-group a{
    text-decoration: none;
    color: inherit;
  }
 
</style>
<head>
<title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
  <nav class="navbar navbar-expand-sm" >
    <div class="container-fluid">
      <a class="navbar-brand" href="homepage.php">選課系統</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="d-flex" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li>
            <a class="nav-link"> <?php print $row['name'] . "歡迎" ; ?> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="selectpage.php">選課頁面</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="selectedpage.php">已選課程</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="week.php">我的課表</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="index.php">登出</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="card-group"> 
    <a href="selectpage.php"> 
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">選課頁面</h4>      
        </div> 
      </div>
    </a>  
    <a href="selectedpage.php">
      <div class="card">  
        <div class="card-body">
          <h4 class="card-title">已選課程</h4>
        </div>
      </div>
    </a> 
    <a href="week.php">
      <div class="card">  
        <div class="card-body">
          <h4 class="card-title">我的課表</h4>      
        </div>
      </div>
    </a>
  </div>

  <ul>
    <li><a href="selectpage.php">選課頁面(顯示可選課程)</a></li>
    <li><a href="selectedpage.php">已選課程(顯示此學生已選課程)</a></li>
    <li><a href="week.php">我的課表</a></li>
    <li><a href="allcourse.php">所有課程</a></li>
    <li><a href="homepage.php">學生資料</a></li>
  </ul>

  <br>
  <hr>
  <br>

  <div>
    <p> Student's infomation : </p>
    <p> <?php print 'student_id: ' . $row['student_id']; ?> </p>
    <p> <?php print " name: " . $row['name']; ?> </p>
    <p> <?php print " grade: "  . $row['grade']; ?> </p>
    <p> <?php print " department: " . $row['department']; ?> </p>
    <p> <?php print " total_credits: " . $row['total_credits']; ?> </p>
  </div>


</body>
</html>

<?php
$conn->close();
?>
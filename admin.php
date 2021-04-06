<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="assets/css/styles.css">

        <title>Sidebar menu responsive</title>
    </head>
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>

            <div class="header__img">
                <img src="assets/img/admin.jfif" alt="Admin">
            </div>
        </header>

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <div class="nav__list">
                    <a href="#" class="nav__link active tablink" onclick="openCity('admin', this, 'blue')" id="defaultOpen">
                        <i class='bx bx-layer nav__logo-icon'></i>
                        <span class="nav__logo-name">Admin Page</span>
                    </a>

                    
                        <a href="#" class="nav__link tablink" onclick="openCity('booked_room', this, 'blue')">
                        <i class='bx bx-grid-alt nav__icon' ></i>
                            <span class="nav__name">Booked room</span>
                        </a>

                        <a href="#" class="nav__link tablink" onclick="openCity('Tokyo', this, 'blue')">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Users</span>
                        </a>
                        
                        <!-- <a href="#" class="nav__link">
                            <i class='bx bx-message-square-detail nav__icon' ></i>
                            <span class="nav__name">Messages</span>
                        </a>

                        <a href="#" class="nav__link">
                            <i class='bx bx-bookmark nav__icon' ></i>
                            <span class="nav__name">Favorites</span>
                        </a>

                        <a href="#" class="nav__link">
                            <i class='bx bx-folder nav__icon' ></i>
                            <span class="nav__name">Data</span>
                        </a>

                        <a href="#" class="nav__link">
                            <i class='bx bx-bar-chart-alt-2 nav__icon' ></i>
                            <span class="nav__name">Analytics</span>
                        </a> -->
                    </div>
                </div>

                <a href="#" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>

        
<div id="admin" class="tabcontent">
    <h1>Welcome To Admin Page</h1>
  </div>
  
  <div id="booked_room" class="tabcontent">
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel-mangement-system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "CALL showing_booked_room_info_to_admin()";
$result = $conn->query($sql);       
      
?>
  
<br>  
<table class="table table-striped table-dark table-bordered">
          <thead class="thead-dark"><tr>
                <th>Room No</th>
                <th>Check-in-date</th>
                <th>Check-out-date</th>
                <th>Customer ID</th>
                
                
            </tr></thead>
            
            <tbody>
            <?php while ($r = $result->fetch_array()): ?>
                <tr>
                  <th scope="row"><?php echo $r['room_no'] ?></th>
                    <td><?php echo $r['check_in'] ?></td>
                    <td><?php echo $r['check_out'] ?></td>
                    <td><?php echo $r['customer_id'] ?></td>
                    
                   
                </tr>
            <?php endwhile; 
			$conn->close(); ?>
            </tbody>
        </table>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div>
    <span>Room NO:</span>
    <input type="text" name="room_no" id="">
    </div>
    <div>
    <span>Check-out-date:</span>
    <input type="text" name="check_out" id="">            
    </div>
  <button type="submit" class="btn btn-primary"  value="submit" name="delete" >Submit</button>
  </form>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "hotel-mangement-system";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  if(isset($_POST['delete'])){
  $room_no = $_POST['room_no'];
  $check_out = $_POST['check_out'];
  echo gettype($check_out);
  echo $check_out;
  $sql = "CALL delete_room_from_admin($room_no,'$check_out')";
  $query_run=mysqli_query($conn,$sql);

  if($query_run){
      echo '<script> alert("Data Saved"); </script>';   
      
  }
  else{
    
      echo '<script> alert("Data Not Saved"); </script>';
     
  }
}
$conn->close();   
  

  ?>


    </div>

    
  
  <div id="Tokyo" class="tabcontent">
    <h1>Tokyo</h1>
    <p>Tokyo is the capital of Japan.</p>
  </div>
  
        <!--===== MAIN JS =====-->
        <script src="assets/js/main.js"></script>
        <script>
            function openCity(cityName,elmnt,color) {
              var i, tabcontent, tablinks;
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
              }
              tablinks = document.getElementsByClassName("tablink");
              for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
              }
              document.getElementById(cityName).style.display = "block";
              elmnt.style.backgroundColor = color;
            
            }
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
            </script>
    </body>
</html>
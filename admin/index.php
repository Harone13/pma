<?php
session_start();
ob_start();



  include 'header.php';
  include 'connect.php';

  if (isset($_SESSION['user_id'])) {
    
    header('location: dashboard.php'); 
    exit();
  }


  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $name = $_POST['name'];
    $pass = sha1($_POST['pass']);

    $stmt = $conn->prepare("SELECT * FROM admin_users 
                            WHERE username = ? AND password = ?"); 

    $stmt->execute(array($name, $_POST['pass']));
    $row = $stmt->fetch();

    if ($stmt->rowCount() > 0) {
        ?>
        <p style=color:#78e299>
      <?php
  
          // echo "Welcome " . $row['id'];
          echo "Welcome " . $row['username'] . '<br>';
          echo "You are login successfuly";
      
      ?>
        </p>
      <?php
            $_SESSION['username'] = $name; // Register session name
            $_SESSION['user_id'] = $row['id']; // Register session ID     
            header('location: dashboard.php'); 
            exit();

    } else {
        echo  '<p style=color:#ea0538>
        Name Or password Not valid </p>';
    }

}
?>




   <div class="col-lg-6">
   <div class="bg-white text-center rounded p-5">
    <h1 class="mb-4">Admin Log</h1>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
       
            <div class="col-12 col-sm-6">
                <input name=name   type="text" class="form-control bg-light border-0" placeholder="Your Name" style="height: 55px;">
            </div>
            <br>

            <div class="col-12 col-sm-6">
                    <input name="pass"   type="password" class="form-control bg-light border-0 datetimepicker-input" 
                    placeholder="Password"  style="height: 55px;">
            </div>
            <br>

            <div class="col-12 col-sm-6">
                <button class="btn btn-primary w-100 py-3" type="submit">Login</button>
            </div>
        </div>
    </form>
   </div>
   </div>

<?php
  
 include 'footer.php';
 ob_end_flush();
?>
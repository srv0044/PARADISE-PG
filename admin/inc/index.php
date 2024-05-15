<?php
  require("essentials.php");
  require("db_config.php");

  session_start();
  if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)){
    redirect('admin_dashboard.php');
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login Panel</title>
  
  <?php
    require("links.php");
  ?>
</head>
<body> 

  <div class="login-form">
    <h2>ADMIN LOGIN</h2>
    <form method="POST">
      <div class="input-field">
        <i class="fas fa-user"></i>
        <input required type="text" placeholder="Admin Name" name="admin_name">        
      </div>

      <div class="input-field">
        <i class="fas fa-lock"></i>
        <input required type="password" placeholder="Password" name="admin_pass">        
      </div>

      <button type="submit" name="Login">LOGIN</button>
    </form>
  </div>

  <?php
    if(isset($_POST['Login']))
    {
      $frm_data = filteration($_POST);
      
      $query = "SELECT * FROM `admin_cred` WHERE `admin_name`=? AND `admin_pass`=?";
      $values = [$frm_data['admin_name'], $frm_data['admin_pass']];
      $datatypes = "ss";

      $res = select($query, $values, "ss");
      if($res->num_rows==1){
        $row = mysqli_fetch_assoc($res);
        $_SESSION['adminLogin'] = true;
        $_SESSION['adminId'] = $row['sr_no'];
        redirect('admin_dashboard.php');
      }
      else{
       alert('error','Login failed - Invalid Creds');
      }
    }

  ?>

  
  <?php
    require("scripts.php");
  ?>
</body>
</html>

<?php

    


function insert()
{
  if(isset($_POST['ins']))
    {    
        $status = true;
        
        // name validation
        if (empty($_POST['name'])) {
          $nameErr = "Please enter your name";
          $status = false;
        }
        else{
          $name=$_POST['name'];
        }
        

        // email validation
        if (empty($_POST['email'])) {
          $emailErr = "Please enter your email";
          $status = false;
        }
        else{
          $email=$_POST['email'];
        }
        
        if($status == true) 
        {
          global $wpdb;
          $table_name = $wpdb->prefix . 'student';

          $wpdb->insert(
              $table_name,
              array(
                  'name' => $name,
                  'email' => $email
              )
          );

          ?>

          <meta http-equiv="refresh" content="1; url=http://localhost/wordpress/wp-admin/admin.php?page=Listing" />
          <?php
          exit;
        }
    }
    ?>
<h2>Insert Student</h2>
<table>
  <thead>
    <tr>
      <th></th>
      <th></th>
    </tr>
  </thead>
  
  <tbody>
    <form name="frm" method="post">
      <tr>
          <td>Name:</td>
          <td><input type="text" name="name" value="<?php if(!empty($_POST['name'])) { echo $_POST['name']; } ?>">
            <?php if(!empty($nameErr)) { echo "<span style='color:red;'>".$nameErr."</span>";
            } ?></td>
      </tr>
      <tr>
          <td>Email:</td>
          <td><input type="text" name="email" value="<?php if(!empty($_POST['email'])) { echo $_POST['email']; } ?>"><?php if(!empty($emailErr)) { echo "<span style='color:red;'>".$emailErr."</span>";} ?></td>
          
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="Insert" name="ins"></td>
      </tr>
    </form>
  </tbody>
</table>

<?php
}
?>
<?php

function update(){

    $i=$_GET['id'];
    global $wpdb;
    $table_name = $wpdb->prefix . 'student';
    $student = $wpdb->get_results("SELECT * from $table_name where user_id=$i");
    echo $student[0]->id;
    ?>
    <h2>Update Student Data</h2>
    <table>
        <thead>
        <tr>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <form name="frm" action="" method="post">
            <tr>
                <!-- <td>User Id:</td> -->
                <td><input type="hidden" name="id" value="<?= $student[0]->user_id; ?>"></td>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" value="<?= $student[0]->name; ?>"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" name="email" value="<?= $student[0]->email; ?>"></td>
            </tr>
            
            <tr>
                <td></td>
                <td><input type="submit" value="Update" name="upd"></td>
            </tr>
        </form>
        </tbody>
    </table>
    <?php

}

if(isset($_POST['upd']))
{
    global $wpdb;
    $table_name=$wpdb->prefix.'student';
    
    $id = $_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    // echo $id;die;
    $wpdb->update(
        $table_name,
        array(
            'name'=>$name,
            'email'=>$email
        ),
        array(
            'user_id'=>$id
        )
    );
    // $url=admin_url('admin.php?page=Employee_List');
    header("location:http://localhost/wordpress/wp-admin/admin.php?page=Listing");
}
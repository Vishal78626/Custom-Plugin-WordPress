<?php

function delete(){
    if(isset($_GET['id'])){
        global $wpdb;
        $table_name=$wpdb->prefix.'student';
        $i=$_GET['id'];
        $wpdb->delete(
            $table_name,
            array('user_id'=>$i)
        );
    }
    ?>
    <meta http-equiv="refresh" content="0; url=http://localhost/wordpress/wp-admin/admin.php?page=Listing" />
    <?php
}
?>
<?php

function listing() 
{
    ?>
    <style>
        table {
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid black;
            padding: 20px;
            text-align: center;
        }
    </style>
    <div class="wrap">
        <h2>Student List</h2>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>  
                <th width="150px" colspan="2">Actions</th>
                
            </tr>
            </thead>
            <tbody>
                <?php
                
                global $wpdb;
                $table_name = $wpdb->prefix . 'student';
                $Students = $wpdb->get_results("SELECT * from $table_name");
                foreach ($Students as $student) {
                
                ?>
                <tr>
                    <td><?= $student->user_id; ?></td>
                    <td><?= $student->name; ?></td>
                    <td><?= $student->email; ?></td>

                    <td><a href="<?php echo admin_url('admin.php?page=Update&id=' . $student->user_id); ?>">Update</a> </td>
                    <td><a onclick="return confirm('Are you sure?')" href="<?php 
                    echo admin_url('admin.php?page=Delete&id=' . $student->user_id); ?>
                    "> Delete</a></td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
    <?php
}


<?php 
 $list_table = new User_list_Table();
$id= $list_table->get_last_id();
?>

<div class="wrap">
    <h2><?php _e( 'User', 'wedevs' ); ?> <a href="<?php echo admin_url( 'admin.php?page=userslist&action=new&id='.$id.'' ); ?>" class="add-new-h2"><?php _e( 'Add New', 'wedevs' ); ?></a></h2>



    <form method="post">
        <input type="hidden" name="page" value="ttest_list_table">

        <?php
        $list_table = new User_list_Table();
        $list_table->prepare_items();
        // $list_table->search_box( 'search', 'search_id' );
        $list_table->display();
        ?>
    </form>
</div>


<?php 
    include 'db.php';

    $id = (int) $_GET['id'];
    $insert = "delete from tasks where id = '$id' ";    
    $deleted = $db->query($insert);

    if ( $deleted ) {
        header('location: index.php');
    }
    

?>
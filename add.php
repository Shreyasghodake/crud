<?php 
    include 'db.php';

    if ( isset($_POST['send']) ) {
        $name = htmlspecialchars( $_POST['task']);
        
        echo $name;
        
        $insert = "insert into tasks (name) valuEs('$name')";    
        $inserted = $db->query($insert);

        if ( $inserted ) {
            header('location: index.php');
        }
    }

?>
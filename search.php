<?php
include 'db.php';

if (isset($_POST['search'])) {

    $name = htmlspecialchars($_POST['search']);
    $sql = "select * from tasks where name like '%$name%'";

    $rows = $db->query($sql);
    // var_dump($rows);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD APP</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row" style="margin-top: 70px;">
            <center>
                <h1>Todo List</h1>
            </center>
            <div class="col-md-10 col-md-offset-1">

                <button type="button" class="btn btn-success" data-target="#myModal" data-toggle="modal">Add Task</button>
                <button type="button" class="btn btn-default pull-right" onclick="print()">print</button>
                <hr><br>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="add.php">
                                    <div class="form-group">
                                        <label>Task Name</label>
                                        <input type="text" require name="task" class="form-control">
                                    </div>
                                    <input type="submit" name="send" value="add task" class="btn btn-success">
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12s text-center">
                    <form action="search.php" method="POST" class="form-group">
                        <input type="text" placeholder="Search" name="search" class="form-control">
                    </form>
                </div>
                <?php if (mysqli_num_rows($rows) <= 0) : ?>
                    <h2 class="text-danger text-center">No Result Found</h2>
                    <a href="index.php" class="btn btn-warning">back</a>
                <?php else : ?>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Task</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $i = 0;
                                while ($row = $rows->fetch_assoc()) :
                                ?>
                                    <th scope="row"><?php echo ++$i; ?></th>
                                    <td class="col-md-10"><?php echo $row['name']; ?></td>
                                    <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a></td>
                                    <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                        <?php
                                endwhile;
                        ?>
                        </tbody>

                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>
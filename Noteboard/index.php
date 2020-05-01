<?php
    include_once("../authentication/SessionMngt.class.php");
    include_once("../db/db_connect.php");

    if(!SessionMngt::checkLoginState($dbh)){
        header("location:../frontend/login.php");
       // exit();
    }


    $id = $_SESSION['user_id'];

    $query = "SELECT * FROM notes Where id_users = :id";
    $stmt = $dbh->prepare($query);
    $stmt->execute(array(':id' => $id));

    $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Noteboard</title>
        <link href="../css/style.css" rel="stylesheet">
        <link href="css/stylesheet.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/script.js" ></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php require "../bootstrap/bootstap_temp.php"; ?>
    </head>
<body>
    <nav class="navbar navbar-light bg-light">
            <a href="/" class="navbar-brand">Noteboard</a>
            <a href="../authentication/logout.php"><button class="btn btn-link my-2 my-sm-0" type="submit">Logout</button></a>
    </nav>
    <div class="card" id="komplett">
    <div class="card-header">
        <?php echo "Willkommen " . $_SESSION['username'] . " auf der Noteboardapplikation!"; ?>
    </div>
    <div class="card-body">
    <button type="button" class="btn btn-primary" id="toggleNoteEntry" >Toggle Entry</button>
    <div id="EntryForm" class="card">
        <form action="src/create-record.php" method="post">
            <textarea class="form-control" name="text" id="NoteText" rows="3" class="card-text"></textarea>
            <button class="btn btn-info" type="submit">Add</button>
        </form>
    </div>
    </div>

    <?php
        foreach( (array) $rows as $row):
            
    ?>
    <div class="card-body" id="text-box">
        <p><?php echo $row['text']; ?></p>
        <form action="src/delete-record.php" method="post" > <button class="btn btn-light"  type="submit" name="noteid" value="<?php echo $row['id']; ?>">Delete</button> </form>
    </div>
    
        <?php endforeach; ?>
    </div>
    
        

    
</body>
</html>
<?php require ('model/database.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php 
    
    $query = 'SELECT * from makes';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    
    ?>

<h2> Test </h2><br>
                <section>
                
                <?php foreach ($results as $result) : ?>
                
                <tr>
                    <td><?php echo $result['Make']; ?></td><br>
                    <td><?php echo $result['make_id']; ?></td><br>
                </tr>

                <?php endforeach; ?>
                </section>
    
</body>
</html>
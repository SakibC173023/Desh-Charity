<?php
include_once 'login/Includes/dbh_connect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <meta charset="UTF-8">
    <link href="#" rel="stylesheet"type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body class="container-fluid">
    <h3>All Donate Request</h3>
    
    <main>
        <section>
            <div class="row">
                <div class="col-8 m-auto">
                <table border="1" style="margin-top: 10px">
                <tr>
                    <th>ID</th>
                    <th>Donor Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Donation Type</th>	
                    <th>Comments</th>	
                    <th>Image</th>	
                    <th>Status</th>	
                </tr>
                    <?php
                        $sql = "SELECT * FROM donation";
                        $stmt = connect()->query($sql);
                        while($row = $stmt->fetch())
                    {
                    ?>
                <tr>
                    <td><?php echo $row['donateID'] ?></td>
                    <td><?php echo $row['donorName'] ?></td>
                    <td><?php echo $row['donorEmail'] ?></td>
                    <td><?php echo $row['donorAddress'] ?></td>
                    <td><?php echo $row['donorPhone'] ?></td>
                    <td><?php echo $row['donationType'] ?></td>
                    <td><?php echo $row['comments'] ?></td>
                    <td><?php echo "<img src='{$row['image']}' width='100%' height='100%'>" ?></td>
                    <td class="text-center">
                        <a class="btn btn-success mb-2" role="button" type="submit" href="edit_data.php?id=<?php echo $row['donateID'] ?>">Approve</a>
                        <a class="btn btn-danger" role="button" type="submit"  href="delete_data.php?id=<?php echo $row['donateID'] ?>">Reject</a>
                    </td>
                </tr>
                    <?php
                }
                    if (isset($_GET['error']) == 'userTaken')
                    {
                        echo "Username is Already Taken";
                    }
                    elseif (isset($_GET['value']) == 'success')
                    {
                        echo "Data inserted successfully";
                    }
                ?>
            </table>
                </div>
            </div>
        </section>
    </main>

</body>
</html>
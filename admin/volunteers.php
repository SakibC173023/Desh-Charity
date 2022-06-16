<?php
include_once '../login/dbh_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/e627d5dbde.js" crossorigin="anonymous"></script>
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="../assets/css/style-starter.css">
    <style>
        main{
            margin-bottom: 150px;
        }
    </style>
</head>

<body>
    <!-- header -->
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top mb-5">
        <div class="container-fluid">
        <a class="navbar-brand h3 fw-bold ps-lg-5 d-flex align-items-center" href="../index.php">
            <a class="navbar-brand h3 fw-bold" href="../index.php"><i
                    class="fas fa-hand-holding-heart  fs-1" style="color: red"></i> Desh Charity</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 pe-5 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin.php">Admin Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container-fluid mt-5 pt-5">
        <section>
            <div class="row gap-3">
                <div class="col-8 mx-auto shadow-lg rounded p-3">
                <h2>Volunteers</h2>
                    <table class="table table-primary">
                        <tr class="text-center table-active">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Location</th>	
                        </tr>
                        <?php
                            $sql = "SELECT * FROM volunteers";
                            $stmt = connect()->query($sql);
                            while($row = $stmt->fetch())
                        {
                        ?>
                        <tr class="text-center shadow-sm rounded">
                            <td class="table-primary"><?php echo $row['Name'] ?></td>
                            <td class="table-secondary"><?php echo $row['Email'] ?></td>
                            <td class="table-danger"><?php echo $row['Phone'] ?></td>
                            <td class="table-success"><?php echo $row['Street'] ?></td>
                        </tr>
                        <?php
                    
                        }
                        ?>
                    </table>
                </div>
            </div>
        </section>
    </main>

</body>
</html>
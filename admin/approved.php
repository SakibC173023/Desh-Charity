<?php
    include_once '../login/Includes/dbh_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Approved Donation Request</title>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- font-awesome -->
        <script src="https://kit.fontawesome.com/e627d5dbde.js" crossorigin="anonymous"></script>
        <!-- Template CSS Style link -->
        <link rel="stylesheet" href="../assets/css/style-starter.css">
        <style>
            main{
                margin-bottom: 350px;
            }
        </style>
    </head>

    <body>
        <!-- header -->
        <header class="">
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <div class="container-fluid">
                <a class="navbar-brand h3 fw-bold ps-lg-5 d-flex align-items-center" href="../index.php">
                    <a class="navbar-brand h3 fw-bold" href="index.php"><i
                            class="fas fa-hand-holding-heart  fs-1" style="color: red"></i> Desh Charity</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 pe-5 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active text-warning" aria-current="page" href="../index.php">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="container-fluid">
            <h3 class="mt-5 pt-5">Approved Request</h3>
                <section>
                    <div class="row">
                        <div class="col-8 m-auto">
                        <table class="table">
                            <tr class="text-center">
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                            </tr>
                                <?php
                                    $sql = "SELECT * FROM approved_donation";
                                    $stmt = connect()->query($sql);
                                    while($row = $stmt->fetch())
                                {
                                ?>
                            <tr class="text-center">
                                <td><?php echo $row['Name'] ?></td>
                                <td><?php echo $row['Phone'] ?></td>
                                <td><?php echo $row['Address'] ?></td>
                                <td class="d-flex justify-content-center align-items-center p-2">
                                    <?php echo $row['Status'] ?>
                                    <a class="btn btn-success ms-1" role="button" type="submit" href="approve-reject-validation.php?id=<?php echo $row['donateID'] ?>&status=approved">Update Status</a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                        </div>
                    </div>
                </section>
        </main>

<?php
include_once '../footer.php';


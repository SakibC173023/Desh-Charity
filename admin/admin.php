<?php
include_once '../login/Includes/dbh_connect.php';
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
        <h3 class="mt-5 pt-5">All Donation Requests</h3>
            <section>
                <div class="row gap-5">
                    
                    <!-- Donation Request Part -->
                    <div class="col-8">
                        <table class="table table-dark">
                            <tr class="text-center table-active">
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
                                $reqCount = 0;
                                while($row = $stmt->fetch())
                            {
                                $reqCount++;
                            ?>
                            <tr class="text-center shadow-sm rounded">
                                <td class="table-primary"><?php echo $row['donorName'] ?></td>
                                <td class="table-secondary"><?php echo $row['donorEmail'] ?></td>
                                <td class="table-primary"><?php echo $row['donorAddress'] ?></td>
                                <td class="table-danger"><?php echo $row['donorPhone'] ?></td>
                                <td class="table-success"><?php echo $row['donationType'] ?></td>
                                <td class="table-info"><?php echo $row['comments'] ?></td>
                                <td class="table-light"><?php echo "<img src='../{$row['image']}' width='120' height='120'>" ?></td>
                                <td class="text-center table-light">
                                    <a class="btn btn-success mb-2" role="button" type="submit" href="approve-reject-validation.php?id=<?php echo $row['donateID'] ?>&status=approved">Approve</a>
                                    
                                    <a class="btn btn-danger" role="button" type="submit" href="approve-reject-validation.php?id=<?php echo $row['donateID'] ?>&status=rejected">Reject</a>
                                </td>
                            </tr>
                            <?php
                          
                            }
                            ?>
                        </table>
                    </div>

                    <!-- Summary Part -->
                    <div class="col-3">
                        <h2>Summary</h2>
                        <table class="table table-dark table-striped">
                            <tr>
                                <th>Requests</th>
                                <th>Approved</th>
                                <th>Rejected</th>      
                            </tr>
                            <tr class="table-active">
                            <?php
                                $sql = "SELECT * FROM approved_donation";
                                $stmt = connect()->query($sql);
                                $approvedCount = 0;
                                while($row = $stmt->fetch()){
                                    $approvedCount++;
                                }
                            ?>
                                <td><?php echo $reqCount ?></td>
                                <td><?php echo $approvedCount ?></td>
                                <td><?php echo $approvedCount ?></td>
                            </tr>
                        </table>
                    </div>

                    <!-- Approved Request Part -->
                    <div class="col-5 m-auto">
                        <h2>Approved Logs</h2>
                        <table class="table table-dark table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>   
                                <th>Status</th>   
                            </tr>
                            <tr class="table-active">
                            <?php
                                $sql = "SELECT * FROM approved_donation";
                                $stmt2 = connect()->query($sql);
                                while($row = $stmt2->fetch())
                                {
                            ?>
                                <td><?php echo $row['Name'] ?></td>
                                <td><?php echo $row['Phone'] ?></td>
                                <td><?php echo $row['Address'] ?></td>
                                <td><?php echo $row['Status'] ?></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>

                    <!-- Rejected Request Part -->
                    <div class="col-5 m-auto">
                        <h2>Rejected Logs</h2>
                        <table class="table table-dark table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>   
                                <th>Status</th>   
                            </tr>
                            <tr class="table-active">
                            <?php
                                $sql = "SELECT * FROM approved_donation";
                                $stmt2 = connect()->query($sql);
                                while($row = $stmt2->fetch())
                                {
                            ?>
                                <td><?php echo $row['Name'] ?></td>
                                <td><?php echo $row['Phone'] ?></td>
                                <td><?php echo $row['Address'] ?></td>
                                <td><?php echo $row['Status'] ?></td>
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
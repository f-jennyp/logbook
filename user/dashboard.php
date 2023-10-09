<?php
include('../connection.php');


$queryTotal = "SELECT COUNT(*) AS totalRecords FROM attendance";
$resultTotal = mysqli_query($conn, $queryTotal);
$rowTotal = mysqli_fetch_assoc($resultTotal);
$totalRecords = $rowTotal['totalRecords'];


$queryFemale = "SELECT COUNT(*) AS femaleRecords FROM attendance WHERE `gender` = 'female'";
$resultFemale = mysqli_query($conn, $queryFemale);
$rowFemale = mysqli_fetch_assoc($resultFemale);
$femaleRecords = $rowFemale['femaleRecords'];

$queryMale = "SELECT COUNT(*) AS maleRecords FROM attendance WHERE `gender` = 'male'";
$resultMale = mysqli_query($conn, $queryMale);
$rowMale = mysqli_fetch_assoc($resultMale);
$maleRecords = $rowMale['maleRecords'];
?>

<h1 class="page-header">Dashboard</h1>
<div class="row placeholders">
    <a href="index.php?page=display_record" class="col-xs-5 col-sm-3 placeholder">
        <img src="../images/members.png" width="150" height="150" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Visitors</h4>
        <span class="text-muted"><?php echo $totalRecords; ?></span>
    </a>

    <a href="#" class="col-xs-5 col-sm-3 placeholder">
        <img src="../images/female.png" width="150" height="150" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Female</h4>
        <span class="text-muted"><?php echo $femaleRecords; ?></span>
    </a>

    <a href="#" class="col-xs-5 col-sm-3 placeholder">
        <img src="../images/male.png" width="150" height="150" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Male</h4>
        <span class="text-muted"><?php echo $maleRecords; ?></span>
    </a>
</div>

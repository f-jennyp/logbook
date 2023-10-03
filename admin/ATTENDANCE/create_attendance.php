<?php
if (isset($_POST['save'])) {

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $date = $_POST['date'];
    $age = intval($_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    if (empty($fname) || empty($lname)) {
        $err = "<font color='red'>Fill in all the required fields</font>";
    } else {
        // Combine first name and last name
        $name = $fname . ' ' . $lname;

        $sql = mysqli_query($conn, "SELECT * FROM attendance WHERE name='$name' AND date='$date'");
        $r = mysqli_num_rows($sql);
        if ($r == 0) {
            mysqli_query($conn, "INSERT INTO attendance VALUES('', now(), '$name', '$age', '$gender')");
            $err = "<script>alert('Attendance recorded successfully!')</script>";
        } else {
            $err = "<div class='alert alert-danger'>This visitor has already been recorded today</div>";
        }
    }
}
?>

<h2 class="text-center">Attendance for <?php echo date('m/d/Y'); ?></h2>
<form method="post">

    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <?php echo @$err; ?>
        </div>
    </div>



    <div class="row" style="margin-top:10px">
        <div class="col-sm-4">First Name</div>
        <div class="col-sm-5">
            <input type="text" placeholder="First Name" name="fname" class="form-control" required />
        </div>
    </div>

    <div class="row" style="margin-top:10px">
        <div class="col-sm-4">Last Name</div>
        <div class="col-sm-5">
            <input type="text" placeholder="Last Name" name="lname" class="form-control" required />
        </div>
    </div>

    <div class="row" style="margin-top:10px">
        <div class="col-sm-4">Date</div>
        <div class="col-sm-5">
            <input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly />
        </div>
    </div>

    <div class="row" style="margin-top:10px">
        <div class="col-sm-4">age</div>
        <div class="col-sm-5">
            <input type="number" name="age" class="form-control" required />
        </div>
    </div>

    <div class="row" style="margin-top:10px">
        <div class="col-sm-4">Gender</div>
        <div class="col-sm-5">
            <select name="gender" class="form-control" required>
                <option value="" disabled selected>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
    </div>


    <div class="row" style="margin-top:10px">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">


            <input type="submit" value="Submit" name="save" class="btn btn-success" />
            <input type="reset" class="btn btn-danger" />
        </div>
        <div class="col-sm-4"></div>
    </div>
</form>
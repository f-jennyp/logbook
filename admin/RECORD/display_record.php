<?php
$q = mysqli_query($conn, "select * from attendance");

?>


<h2>Record</h2>

<table class="table table-bordered table-hover table-striped">
    <tr>
        <form method="post" action="index.php?page=search_record">
            <td colspan="4">
                <input type="text" placeholder="Search" name="searchRecord" class="form-control" required />
            </td>
            <td colspan="2">
                <input type="submit" value="Search" name="sub" class="btn btn-warning" />
            </td>
        </form>
    </tr>
    <tr>
        <td colspan="6">

            <a href="index.php?page=create_attendance">
                <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span> Attendance</button>
            </a>

            <a title="Print Records" href="RECORD/print_record.php?">
                <button class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-print"></span> Print</button>
            </a>

        </td>
    </tr>
    <Tr class="active">
        <th>NO</th>
        <th><?php
            $currentSort = isset($_GET['sort']) ? $_GET['sort'] : '';
            $currentOrder = isset($_GET['order']) ? $_GET['order'] : '';

            if ($currentSort == 'date' && $currentOrder == 'asc') {
                echo "<a href=\"?page=display_record&sort=date&order=desc\">DATE ▼</a>";
            } else {
                echo "<a href=\"?page=display_record&sort=date&order=asc\">DATE ▲</a>";
            }
            ?></th>
        <th>NAME</th>
        <th>AGE</th>
        <th>GENDER</th>

    </Tr>
    <?php
    error_reporting(1);
    $rec_limit = 10;

    $sql = "SELECT count(id) FROM attendance ";
    $retval = mysqli_query($conn, $sql);

    if (!$retval) {
        die('Could not get data: ' . mysqli_error($conn));
    }
    $row = mysqli_fetch_array($retval, MYSQLI_NUM);
    $rec_count = $row[0];

    if (isset($_GET['pagi'])) {
        $pagi = $_GET['pagi'] + 1;
        $offset = $rec_limit * $pagi;
    } else {
        $pagi = 0;
        $offset = 0;
    }


    $left_rec = $rec_count - ($pagi * $rec_limit);

    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'date';
    $order = isset($_GET['order']) ? $_GET['order'] : 'asc';

    $sql = "SELECT * FROM attendance ORDER BY $sort $order LIMIT $offset, $rec_limit";

    $retval = mysqli_query($conn, $sql);

    if (!$retval) {
        die('Could not get data: ' . mysqli_error($conn));
    }
    $inc = 1;
    while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {

        echo "<Tr>";
        echo "<td>" . $inc . "</td>";
        echo "<td>" . date('m/d/Y', strtotime($row['date'])) . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "</Tr>";
        $inc++;
    }


    echo "<tr><td colspan='6'>";
    if ($pagi > 0) {
        $last = $pagi - 2;
        echo "<a href = \"index.php?page=display_record&pagi=$last\">Last 10 Records</a> | ";
        echo "<a href = \"index.php?page=display_record&pagi=$pagi\">Next 10 Records</a>";
    } else if ($pagi == 0) {
        echo "<a href = \"index.php?page=display_record&pagi=$pagi\">Next 10 Records</a>";
    } else if ($left_rec < $rec_limit) {
        $last = $pagi - 2;
        echo "<a href = \"index.php?page=display_record&pagi=$last\">Last 10 Records</a>";
    }
    echo "</td></tr>";
    ?>

</table>
<?php ?>
<?php
include('../connection.php');

$search = $_POST['searchRecord'];
$searchDate = date('Y-m-d', strtotime($search));

$q = mysqli_query($conn, "SELECT * FROM attendance WHERE name LIKE '%$search%' OR date = '$searchDate' OR age = '$search' OR gender = '$search'");
$rr = mysqli_num_rows($q);
if (!$rr) {
    echo "<div class='alert alert-danger'><h2>No Result Found!</h2></div>";
} else {
    ?>

    <h2 align="center">Search Results</h2>
    <table class="table table-bordered">

        <tr>
            <td colspan="16">
                <a href="index.php?page=display_record"><button class="btn btn-success btn-sm"><span
                            class="glyphicon glyphicon-chevron-left"></span> Back</button></a>

                <!-- <a title="Print Records" href="admin/RECORD/print_search_results.php" target="_blank">
                    <button class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-print"></span> Print</button>
                </a> -->
            </td>
        </tr>
        <Tr class="active">
            <th>NO</th>
            <th>DATE</th>
            <th>TIME</th>
            <th>NAME</th>
            <th>AGE</th>
            <th>GENDER</th>
        </Tr>
        <?php


        $i = 1;
        while ($row = mysqli_fetch_assoc($q)) {

            echo "<Tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "</Tr>";
            $i++;
        }
        ?>

    </table>
<?php } ?>
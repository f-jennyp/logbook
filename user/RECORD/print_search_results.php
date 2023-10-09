<?php
include('connection.php');

if (isset($_POST['searchRecord'])) {
    $search = $_POST['searchRecord'];
    $searchDate = date('Y-m-d', strtotime($search));
    $q = mysqli_query($conn, "SELECT * FROM attendance WHERE name LIKE '%$search%' OR date = '$searchDate' OR age = '$search' OR gender = '$search'");
    $rr = mysqli_num_rows($q);

    if ($rr === 0) {
        echo "<div class='alert alert-danger'><h2>No Result Found!</h2></div>";
    } else {
        ?>
        <h2 align="center">Printable Search Results</h2>
        <table class="table table-bordered">
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
                echo "<td>" . date('m/d/Y', strtotime($row['date'])) . "</td>";
                echo "<td>" . $row['time'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "</Tr>";
                $i++;
            }
            ?>
        </table>
        <?php
    }
} else {
    echo "<div class='alert alert-danger'><h2>No Search Criteria Provided!</h2></div>";
}
?>
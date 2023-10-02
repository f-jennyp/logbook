<?php
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
            <td colspan="16"><a href="index.php?page=display_record">Go Back</a></td>
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


        $i = 1;
        while ($row = mysqli_fetch_assoc($q)) {

            echo "<Tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . date('m/d/Y', strtotime($row['date'])) . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "</Tr>";
            $i++;
        }
        ?>

    </table>
<?php } ?>
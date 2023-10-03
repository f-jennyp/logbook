<?php
include('../../connection.php');
$q = mysqli_query($conn, "SELECT * FROM attendance");
    if (!$q) {
        echo "Query Error: " . mysqli_error($conn);
        die();
    }

?>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <style>
        /* Add table styles */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .print-button {
            text-align: center;
            margin-top: 20px;
        }
    </style>
    <table class="table table-bordered">
        <tr height="30" class="info">
            <th colspan="18" align="center">
                <center>Visitors Attendance Logbook</center>
            </th>
        </tr>
        <Tr class="active">
            <th>NO</th>
            <th>DATE</th>
            <th>NAME</th>
            <th>AGE</th>
            <th>GENDER</th>
        </Tr>
        <?php


        $i = 1;
        while ($row = mysqli_fetch_assoc($q)) {

            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . date('m/d/Y', strtotime($row['date'])) . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "</tr>";

            $i++;
        }
        ?>


    </table>

    <script>
        function printpage() {
            var printButton = document.getElementById("printpagebutton");
            printButton.style.visibility = 'hidden';
            window.print();
            printButton.style.visibility = 'visible';
        }
    </script>

    <div class="print-button">
        <button id="printpagebutton" class="btn btn-primary" onClick="printpage()">
            <span class="glyphicon glyphicon-print"></span> &nbsp;Print
        </button>
    </div>

<?php

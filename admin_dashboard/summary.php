<!DOCTYPE html>
<html>
<head>
    <title>SUMMARY</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <?php include("includes/navbar.php")?>
    <?php include("includes/header.php")?>
    
    <div id="wrapper" class="container m-3">
    <div id="content">
        <h2>Welcome to the Summary Page</h2>
        
        <p>
            This lets you to view the total summary of the parking slots.
            You will be able to sort the summary by day, week and month.
            For this there is a drop down menu to sort the summary.
            <br>
        </p>
        <p>
            The summary of the parking slots
            <br>
            <?php
                //Connection to the local server and selecting database
                $con=mysqli_connect("localhost", "root", "", "smartpark");
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                //Query to get the details of the cars which is already parked
                $result=mysqli_query($con,"select * from parking_details");
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                    echo "<table class='m-2 slotsTable'><tr><th>ID</th><th>Rego</th><th>Entry Time</th><th>Exit Time</th><th>Slot No</th><th>Date</th></tr>";
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row["id"]. "</td><td>".$row["rego_plate"]. "</td><td>" . date( "h:m", strtotime($row["entry_time"])) . 
                                "</td><td>".date( "h:m", strtotime($row["exit_time"])) ."</td>";
                        echo "<td>".$row["slot_no"]."</td><td>".$row["date"]."</td></tr>";
                    } 
                    echo "</table>";
                }
                else {
                    echo "0 results";
                }
                mysqli_close($con);
            ?>
        </p>
    </div>
    </div>
    
        
        <?php include("includes/footer-area.php")?>
</body>
</html>
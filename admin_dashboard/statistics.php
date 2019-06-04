<?php
    $con= mysqli_connect("localhost", "root", "", "smartpark");
    $result=mysqli_query($con,"select * from parking_details");
    if(!$result){
        echo"Connection failed";
        
    }
    if ($result){
        //var_dump($result);
        $count= array();
        for($i=0;$i<24;$i++){
            $count[$i]=0;
        }
        foreach ($result as $value){ 
            $date = strtotime($value['entry_time']);
            //echo "<br>";
            //echo date('H',$date);
            $hour=date('H',$date);
            if ($hour>=0 && $hour<1){
                $count[0]++;
            }
            elseif ($hour>=1 && $hour<2) {
                $count[1]++;
            }
            elseif ($hour>=2 && $hour<3) {
                $count[2]++;
            }
            elseif ($hour>=3 && $hour<4) {
                $count[3]++;
            }
            elseif ($hour>=4 && $hour<5) {
                $count[4]++;
            }
            elseif ($hour>=5 && $hour<6) {
                $count[5]++;
            }
            elseif ($hour>=6 && $hour<7) {
                $count[6]++;
            }
            elseif ($hour>=7 && $hour<8) {
                $count[7]++;
            }
            elseif ($hour>=8 && $hour<9) {
                $count[8]++;
            }
            elseif ($hour>=9 && $hour<10) {
                $count[9]++;
            }
            elseif ($hour>=10 && $hour<11) {
                $count[10]++;
            }
            elseif ($hour>=11 && $hour<12) {
                $count[11]++;
            }
            elseif ($hour>=12 && $hour<13) {
                $count[12]++;
            }
            elseif ($hour>=13 && $hour<14) {
                $count[13]++;
            }
            elseif ($hour>=14 && $hour<15) {
                $count[14]++;
            }
            elseif ($hour>=15 && $hour<16) {
                $count[15]++;
            }
            elseif ($hour>=16 && $hour<17) {
                $count[16]++;
            }
            elseif ($hour>=17 && $hour<18) {
                $count[17]++;
            }
            elseif ($hour>=18 && $hour<19) {
                $count[18]++;
            }
            elseif ($hour>=19 && $hour<20) {
                $count[19]++;
            }
            elseif ($hour>=20 && $hour<21) {
                $count[20]++;
            }
            elseif ($hour>=21 && $hour<22) {
                $count[21]++;
            }
            elseif ($hour>=22 && $hour<23) {
                $count[22]++;
            }
            elseif ($hour>=23 && $hour<24) {
                $count[23]++;
            }
        }
            var_dump($count);
            
        
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>STATISTICS</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Percentage'],
          ["00:00 Hrs ", <?php echo $count[0]?>],
          ["01:00 Hrs ", <?php echo $count[1]?>],
          ["02:00 Hrs ", <?php echo $count[2]?>],
          ["03:00 Hrs ", <?php echo $count[3]?>],
          ["04:00 Hrs ", <?php echo $count[4]?>],
          ["05:00 Hrs ", <?php echo $count[5]?>],
          ["06:00 Hrs ", <?php echo $count[6]?>],
          ["07:00 Hrs ", <?php echo $count[7]?>],
          ["08:00 Hrs ", <?php echo $count[8]?>],
          ["09:00 Hrs ", <?php echo $count[9]?>],
          ["10:00 Hrs ", <?php echo $count[10]?>],
          ["11:00 Hrs ", <?php echo $count[11]?>],
          ["12:00 Hrs ", <?php echo $count[12]?>],
          ["13:00 Hrs ", <?php echo $count[13]?>],
          ["14:00 Hrs ", <?php echo $count[14]?>],
          ["15:00 Hrs ", <?php echo $count[15]?>],
          ["16:00 Hrs ", <?php echo $count[16]?>],
          ["17:00 Hrs ", <?php echo $count[17]?>],
          ["18:00 Hrs ", <?php echo $count[18]?>],
          ["19:00 Hrs ", <?php echo $count[19]?>],
          ["20:00 Hrs ", <?php echo $count[20]?>],
          ["21:00 Hrs ", <?php echo $count[21]?>],
          ["22:00 Hrs ", <?php echo $count[22]?>],
          ["23:00 Hrs ", <?php echo $count[23]?>],
          ['Other', 3]
        ]);

        var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: 'Chess opening moves',
            subtitle: 'popularity by percentage' },
          axes: {
            x: {
              0: { side: 'top', label: 'White to move'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
</head>

<body>
    <?php include("includes/navbar.php")?>
    <?php include("includes/header.php")?>
    <div id="wrapper">
    <div id="content">This is the content area
       <div id="top_x_div" style="width: 1000px; height: 600px;"></div> 
    </div>
    </div>
    <?php include("includes/footer-area.php")?>
    
</body>
</html>
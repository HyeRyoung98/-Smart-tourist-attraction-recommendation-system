<!DOCTYPE html> 
<head> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
  <title>seasons</title> 
  <style>
    .mytitle {
      background-color : skyblue;
      color : white ;
      text-align : center;
      padding : 10px;
      margin-bottom : 20px;
    }

    table {
      border-top: 1px solid #444444;
      border-collapse: collapse;
      border-color:skyblue;
      }

    th, td {
      border-bottom: 1px solid #444444;
      border-color : skyblue;
      padding: 30px;
      color : gray;
    }
  </style>
</head>


<body>
  <div class = "mytitle">
    <h1>
      <?php
      echo $_GET['name'];
      ?>
    </h1>
  </div>

  <?php

    function A($s)
    {
      print '<table>';
      while ($row = mysqli_fetch_assoc($s)) {
        print '<tr>';
        foreach ($row as $item) {
          print '<td>'.($item?htmlentities($item):'&nbsp;').'</td>';
        }
        print '</tr>';
      }
      print '</table>';
    }

    $c = mysqli_connect('211.247.98.249','cf','colorfit','tour') or die("connection failed");
    mysqli_set_charset($c, "utf8");

    $query = "select attraction.name, inf.address, inf.inform, inf.tel, attraction.category, attraction.stat
    from attraction, inf 
    where attraction.name = '".$_GET['name']."' 
    and attraction.num = inf.num "; 

    $s = mysqli_query($c, $query);
    A($s);

    mysqli_close($c);

  ?>
</body>

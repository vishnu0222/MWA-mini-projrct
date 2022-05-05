<?php
if(isset($_POST['search']))
{
   $valueToSearch = $_POST['valueToSearch'];
    
    $query = "SELECT * FROM `medical` WHERE CONCAT (`institute_id`, `name`, `tlr`, `rpc`, `go`, `oi`, `perception`, `city`, `state`, `rank`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
}
 else {
    $query = "SELECT * FROM `medical`";
    $search_result = filterTable($query);
}


function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "hackathon");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>
<!DOCTYPE html>
<html>
  <style>
form{
    text-align: right;
          }
table {
    margin: 30px auto;
    padding: 10px;
    background: rgba(0, 0, 0, 0.1);
    width:100%;
    border-style: solid;
    border-color:  #8665f7;
    display: table;
    width: 80%;
    margin: 10px auto;
    font-family: sans-serif;
    background: transparent;
    padding: 12px 16px;
    color: #555;
    font-size: 13px;
    box-shadow: 0 1px 4px 0px rgba(0,0,50,0.3);
    background-color: #fff;

    
}

th {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 1em;
   padding: 10px;
    text-align: center;
    border-collapse: separate;
    border: 1px solid #000;
    border-right: 1px solid #d6d4d4;
    vertical-align: middle;
    background: #8665f7;
    box-shadow:0 1px 4px 0px rgba(0,0,50,0.3);
    color: #fff;
    font-weight: 600;
}

td {
    font-family: Arial, Helvetica, sans-serif;
    font-size: .9em;
    border: 1px solid #DDD;
    font-size: 11px;
    display: table-cell;
    width: 20%;
    text-align: center;
    padding: 8px 0;
    border-right: 1px solid #d6d4d4;
    vertical-align: middle;
    margin:10px 15px;
}

</style>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body>
    

<div class="header">
  <a href="#default" class="logo">TINY CODERS</a>
  <div>
    <ul class="nav" style="border-radius: 50px; margin-left: 30%; margin-right: 30%;">
      <h1> ALL INDIAN UNIVERSITIES INFORMATION 2022 </h1>
    </ul>
  </div>
  <div class="header-right">
    <a  href="index.html">Home</a>
    <a href="aboutus.html">About us</a>
   
  </div>
</div>
   
    
        <form action="law.php" method="post">
         <div class="search"><br>
		<input type="text" name="valueToSearch" placeholder="Search">
		<input type="submit" name="search" value="Filter">
            </div>
	<table>
        <tr>
            <th>institute_id</th>
			<th>name</th>
			<th>tlr</th>
			<th>rpc</th>
			<th>oi</th>
			<th>perception</th>
			<th>city</th>
			<th>state</th>
			<th>rank</th>
		</tr>
		<?php while($row = mysqli_fetch_array($search_result)):?>
      <tr>
        			<td><?php echo $row['institute_id'];?></td>
        			<td><?php echo $row['name'];?></td>
        			<td><?php echo $row['tlr'];?></td>
        			<td><?php echo $row['rpc'];?></td>
        			<td><?php echo $row['oi'];?></td>
        			<td><?php echo $row['perception'];?></td>
        			<td><?php echo $row['city'];?></td>
        			<td><?php echo $row['state'];?></td>
        			<td><?php echo $row['rank'];?></td>
        		</tr>

       
                <?php endwhile;?>
            
	
    
    </table>
    </form>
</body>
</html>
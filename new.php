<?php
if(isset($_POST['search']))
{
   $valueToSearch = $_POST['valueToSearch'];
    
    $query = "SELECT * FROM `dental` WHERE  (`institute_id`, `name`, `tlr`, `rpc`, `go`, `oi`, `perception`, `city`, `state`, `rank`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
}
 else {
    $query = "SELECT * FROM `dental`";
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
	<head>
		<title>Php search</title>
	</head>
	<body>
		<form action="new.php" method="post">
		<input type="text" name="valueToSearch" placeholder="Search.."><br><br>
		<input type="submit" name="search" value="filter"><br><br>
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


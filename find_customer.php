<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <body>
        <h2>CD List that someone currently borrowing</h2>
        <?php
            if(!mysql_connect("134.74.112.19", "lin20f", "yi")) {
                echo "<h2>Connection Error.</h2>";
                die();
            }
            mysql_select_db("d217");
        ?>
        <table border="0" cellpadding="0" cellspacing="0">
            <tr bgcolor="#f87820">
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>SSN</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Name</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Phone #</b></td>
                <td><img src="img/blank.gif" alt="" width="10" height="25"></td>
            </tr>
            <?php
            	error_reporting(E_ALL ^ E_NOTICE);
				
				$return_by = $_REQUEST['return_by'];
				$title = $_REQUEST['title'];
				
                $result = mysql_query("SELECT * FROM Customer WHERE ssn IN(SELECT ssn from Rent where ADDDATE(rent_date, INTERVAL period DAY) <= '$return_by' AND cd_name = '$title') ORDER BY ssn");
                $i = 0;
                while ($row = mysql_fetch_array($result)) {
                    echo "<tr valign='middle'>";
                    echo "<td>".$row['ssn']."</td>";
	                echo "<td>".$row['name']."</td>";
					echo "<td>".$row['phone']."</td>";
                    echo "</td>";
                    echo "</tr>";
                    $i++;
                }
            ?>
        </table>
		<a href = "5.php">Return to find customer</a>
    </body>
</html>

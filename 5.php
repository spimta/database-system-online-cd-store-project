<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <body>
        <h2>CD Rent List</h2>
        <?php
            if(!mysql_connect("134.74.112.19", "lin20f", "yi")) {
                echo "<h2>Connection Error.</h2>";
                die();
            }
            mysql_select_db("d217");
        ?>
        <table border="0" cellpadding="0" cellspacing="0">
            <tr bgcolor="#f87820">
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>CD Title</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>SSN</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Rent Date</b></td>
				<td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Period</b></td>
                <td><img src="img/blank.gif" alt="" width="10" height="25"></td>
            </tr>
            <?php
            	error_reporting(E_ALL ^ E_NOTICE);
				
                $result = mysql_query("SELECT * FROM Rent ORDER BY cd_name");
                $i = 0;
                while ($row = mysql_fetch_array($result)) {
                    echo "<tr valign='middle'>";
                    echo "<td>".$row['cd_name']."</td>";
	                echo "<td>".$row['ssn']."</td>";
					echo "<td>".$row['rent_date']."</td>";
					echo "<td>".$row['period']."</td>";
                    echo "</td>";
                    echo "</tr>";
                    $i++;
                }
            ?>
        </table> 

        <h2>Find Customer Info</h2>

        <form action="<?php echo "find_customer.php"; ?>" method="get">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr><td>CD Tittle: </td><td><input type="text" size="30" name="title"></td></tr>
                <tr><td>Return By(yyyy-mm-dd): </td><td> <input type="text" size="30" name="return_by"></td></tr>
                <tr><td>&nbsp;</td><td><input type="submit" value="Search"></td></tr>
				
            </table>
        </form>
		<a href = "menu.php">Return to menu</a>
    </body>
</html>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <body>
        <h2>Select Supplier</h2>
        <?php
            if(!mysql_connect("134.74.112.19", "lin20f", "yi")) {
                echo "<h2>Connection Error.</h2>";
                die();
            }
            mysql_select_db("d217");
        ?>
        <table border="0" cellpadding="0" cellspacing="0">
            <tr bgcolor="#f87820">
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Name</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Address</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="50" height="6"><br><b>Command</b></td>
				<td class=tabhead><img src="img/blank.gif" alt="" width="50" height="6"><br><b></b></td>
                <td><img src="img/blank.gif" alt="" width="10" height="25"></td>
            </tr>
            <?php
            	error_reporting(E_ALL ^ E_NOTICE);
				
				if ($_REQUEST['action'] == "del") {
                    $name = mysql_real_escape_string($_REQUEST['name']);
                    mysql_query("DELETE FROM Supplier WHERE name='$name'");
                }
				
                else if ($_REQUEST['name'] != "") {
                    if ($_REQUEST['address'] == "") {
                        $address = "NULL";
                    } else {
                        $address = mysql_real_escape_string($_REQUEST['address']);
                    }
                    $name = mysql_real_escape_string($_REQUEST['name']);
                    mysql_query("INSERT INTO Supplier (name,address) VALUES('$name','$address')");
                    echo "INSERT INTO Supplier (name,address) VALUES('$name','$address')";
                }

                if ($_REQUEST['action'] == "del") {
                    $name = mysql_real_escape_string($_REQUEST['name']);
                    mysql_query("DELETE FROM Supplier WHERE name='$name'");
                }
				
				$title = $_REQUEST['title'];
				$year = $_REQUEST['year'];
				$type = $_REQUEST['type'];
				$producer_name = $_REQUEST['producer_name'];
				
                $result = mysql_query("SELECT name,address FROM Supplier ORDER BY name");
                $i = 0;
                while ($row = mysql_fetch_array($result)) {
                    echo "<tr valign='middle'>";
                    echo "<td>".$row['name']."</td>";
	                echo "<td>".$row['address']."</td>";
                    echo "<td><a onclick=\"return confirm('Are you sure?');\" href='selectSupplier.php?action=del&amp;name=".$row['name']."&amp;title=".$title."&amp;year=".$year."&amp;type=".$type."&amp;producer_name=".$producer_name."&amp;supplier_name=".$row['name']."'><span class='red'>Delete</span></a></td>";
					echo "<td><a href='2.php?title=".$title."&amp;year=".$year."&amp;type=".$type."&amp;producer_name=".$producer_name."&amp;supplier_name=".$row['name']."'><span class='red'>Select</span></a></td>";
                    echo "</td>";
                    echo "</tr>";
                    $i++;
                }
            ?>
        </table>

        <h2>Add Supplier</h2>

        <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="get">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr><td>name: </td><td><input type="text" size="30" name="name"></td></tr>
                <tr><td>address: </td><td> <input type="text" size="30" name="address"></td></tr>
				<tr><td><input type="hidden" name="title" value='<?php echo "$title";?>' /></td></tr>
				<tr><td><input type="hidden" name="year" value='<?php echo $year;?>' /></td></tr>
				<tr><td><input type="hidden" name="type" value='<?php echo "$type";?>' /></td></tr>
				<tr><td><input type="hidden" name="producer_name" value='<?php echo "$producer_name";?>' /></td></tr>
                <tr><td>&nbsp;</td><td><input type="submit" value="Add Supplier"></td></tr>
				
            </table>
        </form>
		<a href = "2.php">Return to insert CD</a>
    </body>
</html>

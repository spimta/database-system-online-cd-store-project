<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <body>
        <h2>Insert Rugular Custormer</h2>
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
				<td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>CD</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Command</b></td>
                <td><img src="img/blank.gif" alt="" width="10" height="25"></td>
            </tr>
            <?php
            	error_reporting(E_ALL ^ E_NOTICE);
				
				if ($_REQUEST['action'] == "del") {
                    $ssn = $_REQUEST['ssn'];
					$title = $_REQUEST['title'];
                    mysql_query("DELETE FROM Rent WHERE cd_name='$title' AND ssn = '$ssn'");
                }
				
                else if ($_REQUEST['ssn'] != "") {
                    if ($_REQUEST['name'] == "") {
                        $name = "NULL";
                    } else {
                        $name = mysql_real_escape_string($_REQUEST['name']);
                    }
					if ($_REQUEST['phone'] == "") {
                        $phone = "NULL";
                    } else {
                        $phone = mysql_real_escape_string($_REQUEST['phone']);
                    }
					if ($_REQUEST['title'] == "") {
                        $title = "NULL";
                    } else {
                        $title = mysql_real_escape_string($_REQUEST['title']);
                    }
					if ($_REQUEST['period'] == "") {
                        $period = "NULL";
                    } else {
                        $period = intval($_REQUEST['period']);
                    }
					if ($_REQUEST['date'] == "") {
                        $date = "NULL";
                    } else {
                        $date = mysql_real_escape_string($_REQUEST['date']);
                    }
                    $ssn = mysql_real_escape_string($_REQUEST['ssn']);
                    mysql_query("INSERT INTO Customer (ssn,name,phone) VALUES('$ssn','$name','$phone')");
					mysql_query("INSERT INTO Rent (cd_name,ssn,rent_date,period) VALUES('$title','$ssn','$date',$period)");
                }

                $result = mysql_query("SELECT * FROM Customer NATURAL JOIN (SELECT cd_name AS title, ssn FROM Rent)R ORDER BY ssn;");
				
                $i = 0;
                while ($row = mysql_fetch_array($result)) {
                    echo "<tr valign='middle'>";
                    echo "<td>".$row['ssn']."</td>";
	                echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['phone']."</td>";
					echo "<td>".$row['title']."</td>";
                    echo "<td><a onclick=\"return confirm('Are you sure?');\" href='3.php?action=del&amp;ssn=".$row['ssn']."&amp;title=".$row['title']."'><span class='red'>Delete</span></a></td>";
                    echo "</td>";
                    echo "</tr>";
                    $i++;
                }
            ?>
        </table>

        <h2>Add Customer</h2>

        <form action="<?php echo 'rent1.php'; ?>" method="get">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr><td>SSN:</td><td><input type="text" size="30" name="ssn"></td></tr>
                <tr><td>Name:</td><td> <input type="text" size="30" name="name"></td></tr>
				<tr><td>Phone:</td><td> <input type="text" size="30" name="phone"></td></tr>
                <tr><td>&nbsp;</td><td><input type="submit" value="Add Customer"></td></tr>
            </table>
        </form>
		<a href = "menu.php">Return to menu</a>
    </body>
</html>

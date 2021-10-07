<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <body>
        <h2>CD Selection List</h2>
        <?php
            if(!mysql_connect("134.74.112.19", "lin20f", "yi")) {
                echo "<h2>Connection Error.</h2>";
                die();
            }
            mysql_select_db("d217");
        ?>
        <table border="0" cellpadding="0" cellspacing="0">
            <tr bgcolor="#f87820">
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Title</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Year</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="50" height="6"><br><b>Type</b></td>
				<td class=tabhead><img src="img/blank.gif" alt="" width="50" height="6"><br><b>Command</b></td>
                <td><img src="img/blank.gif" alt="" width="10" height="25"></td>
            </tr>
            <?php
            	error_reporting(E_ALL ^ E_NOTICE);
				
				$title = $_REQUEST['title'];
				$ssn = $_REQUEST['ssn'];
				$name = $_REQUEST['name'];
				$phone = $_REQUEST['phone'];
				$starting_date = $_REQUEST['starting_date'];
				$percent_discount = $_REQUEST['percent_discount'];
				
				if ($_REQUEST['action'] == "sel") {}
				
                else if ($_REQUEST['title'] != "" && $_REQUEST['ssn'] != "") {
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
					if ($_REQUEST['date'] == "") {
                        $date = "NULL";
                    } else {
                        $date = mysql_real_escape_string($_REQUEST['date']);
                    }
					if ($_REQUEST['period'] == "") {
                        $period = "NULL";
                    } else {
                        $period = intval($_REQUEST['period']);
                    }
					if ($_REQUEST['starting_date'] == "") {
                        $starting_date = "NULL";
                    } else {
                        $starting_date = mysql_real_escape_string($_REQUEST['starting_date']);
                    }
					if ($_REQUEST['percent_discount'] == "") {
                        $percent_discount = "NULL";
                    } else {
                        $percent_discount = intval($_REQUEST['percent_discount']);
                    }
                    $title = mysql_real_escape_string($_REQUEST['title']);
                    $ssn = mysql_real_escape_string($_REQUEST['ssn']);
                }
				
                $result = mysql_query("SELECT * FROM CD ORDER BY title");
                $i = 0;
                while ($row = mysql_fetch_array($result)) {
                    echo "<tr valign='middle'>";
                    echo "<td>".$row['title']."</td>";
	                echo "<td>".$row['year']."</td>";
					echo "<td>".$row['type']."</td>";
                    echo "<td><a href='rent2.php?action=sel&amp;title=".$row['title']."&amp;ssn=".$ssn."&amp;name=".$name."&amp;phone=".$phone."&amp;starting_date=".$starting_date."&amp;percent_discount=".$percent_discount."'><span class='red'>Select</span></a></td>";
                    echo "</td>";
                    echo "</tr>";
                    $i++;
                }
            ?>
        </table>

        <h2>Add Rental Record</h2>

        <form action="<?php echo "4.php"; ?>" method="get">
            <table border="0" cellpadding="0" cellspacing="0">
				<tr><td>CD Title:</td><td><textarea name="title"><?php echo "$title";?></textarea></td></tr>
                <tr><td>date(yyyy-mm-dd): </td><td><input type="text" size="30" name="date"></td></tr>
                <tr><td>period(days): </td><td> <input type="text" size="30" name="period"></td></tr>
				<tr><td><input type="hidden" name="ssn" value='<?php echo "$ssn";?>' /></td></tr>
				<tr><td><input type="hidden" name="name" value='<?php echo "$name";?>' /></td></tr>
				<tr><td><input type="hidden" name="phone" value='<?php echo "$phone";?>' /></td></tr>
				<tr><td><input type="hidden" name="starting_date" value='<?php echo "$starting_date";?>' /></td></tr>
				<tr><td><input type="hidden" name="percent_discount" value='<?php echo $percent_discount;?>' /></td></tr>
                <tr><td>&nbsp;</td><td><input type="submit" value="Rent"></td></tr>
				
            </table>
        </form>
		<a href = "4.php">Return to insert vip customer</a>
    </body>
</html>

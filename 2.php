<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <body>
        <h2>CD List</h2>
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
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Type</b></td>
				<td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Producer</b></td>
				<td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Supplier</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Command</b></td>
                <td><img src="img/blank.gif" alt="" width="10" height="25"></td>
            </tr>
            <?php
            	error_reporting(E_ALL ^ E_NOTICE);
				
				if ($_REQUEST['action'] == "del") {
                    $title = $_REQUEST['title'];
					$producer_name = $_REQUEST['producer_name'];
					$supplier_name = $_REQUEST['supplier_name'];
					
					mysql_query("DELETE FROM SuppliedBy WHERE supplier_name='$supplier_name' AND cd_name='$title'");
					mysql_query("DELETE FROM ProducedBy WHERE producer_name='$producer_name' AND cd_name='$title' AND cd_name NOT IN (SELECT cd_name FROM SuppliedBy)");
					mysql_query("DELETE FROM CD WHERE title = '$title' AND title NOT IN (SELECT cd_name FROM ProducedBy)");
                }
				
                else if ($_REQUEST['title'] != "") {
                    if ($_REQUEST['year'] == "") {
                        $year = "NULL";
                    } else {
                        $year = intval($_REQUEST['year']);
                    }
					if ($_REQUEST['producer_name'] == "") {
                        $producer_name = "NULL";
                    } else {
                        $producer_name = mysql_real_escape_string($_REQUEST['producer_name']);
                    }
					if ($_REQUEST['supplier_name'] == "") {
                        $supplier_name = "NULL";
                    } else {
                        $supplier_name = mysql_real_escape_string($_REQUEST['supplier_name']);
                    }
                    $title = mysql_real_escape_string($_REQUEST['title']);
                    $type = mysql_real_escape_string($_REQUEST['type']);
                    mysql_query("INSERT INTO CD (title,year,type) VALUES('$title',$year,'$type')");
					mysql_query("INSERT INTO ProducedBy (cd_name,producer_name) VALUES('$title','$producer_name')");
					mysql_query("INSERT INTO SuppliedBy (cd_name,supplier_name) VALUES('$title','$supplier_name')");
                }

                $result = mysql_query("SELECT * FROM CD NATURAL JOIN (SELECT cd_name AS title, producer_name AS producer FROM ProducedBy)R NATURAL JOIN (SELECT cd_name AS title, supplier_name AS supplier FROM SuppliedBy)T ORDER BY title;");
				
                $i = 0;
                while ($row = mysql_fetch_array($result)) {
                    echo "<tr valign='middle'>";
                    echo "<td>".$row['title']."</td>";
	                echo "<td>".$row['year']."</td>";
                    echo "<td>".$row['type']."</td>";
					echo "<td>".$row['producer']."</td>";
					echo "<td>".$row['supplier']."</td>";
                    echo "<td><a onclick=\"return confirm('Are you sure?');\" href='2.php?action=del&amp;title=".$row['title']."&amp;supplier_name=".$row['supplier']."&amp;producer_name=".$row['producer']."'><span class='red'>Delete</span></a></td>";
                    echo "</td>";
                    echo "</tr>";
                    $i++;
                }
            ?>
        </table>

        <h2>Add CD</h2>

        <form action="<?php echo "selectProducer.php"; ?>" method="get">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr><td>Title:</td><td><input type="text" size="30" name="title"></td></tr>
                <tr><td>Year:</td><td> <input type="text" size="30" name="year"></td></tr>
				<tr><td>Type:</td><td> <input type="text" size="30" name="type"></td></tr>
                <tr><td>&nbsp;</td><td><input type="submit" value="Add CD"></td></tr>
            </table>
        </form>
		<a href = "menu.php">Return to menu</a>
    </body>
</html>

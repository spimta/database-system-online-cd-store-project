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
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Name</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Address</b></td>
                <td><img src="img/blank.gif" alt="" width="10" height="25"></td>
            </tr>
            <?php
            	error_reporting(E_ALL ^ E_NOTICE);
				
				$year = intval($_REQUEST['year']);
				$artist = $_REQUEST['artist'];
				
                $result = mysql_query("SELECT * FROM Producer WHERE name IN (SELECT producer_name from (select * from (SELECT title as cd_name, year, type FROM CD)C  NATURAL JOIN Song WHERE artist = '$artist' AND year = $year)R NATURAL JOIN ProducedBy);");
                $i = 0;
                while ($row = mysql_fetch_array($result)) {
                    echo "<tr valign='middle'>";
                    echo "<td>".$row['name']."</td>";
	                echo "<td>".$row['address']."</td>";
                    echo "</td>";
                    echo "</tr>";
                    $i++;
                }
            ?>
        </table>
		<a href = "6.php">Return to find producer</a>
    </body>
</html>

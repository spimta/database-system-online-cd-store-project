<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <body>
        <h2>CD And Song List</h2>
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
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>CD Year</b></td>
				<td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Track number</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Song Name</b></td>
				<td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Artist</b></td>
                <td><img src="img/blank.gif" alt="" width="10" height="25"></td>
            </tr>
            <?php
            	error_reporting(E_ALL ^ E_NOTICE);
				
                $result = mysql_query("SELECT * FROM (SELECT title AS cd_name, year FROM CD)R NATURAL JOIN Song");
                $i = 0;
                while ($row = mysql_fetch_array($result)) {
                    echo "<tr valign='middle'>";
                    echo "<td>".$row['cd_name']."</td>";
	                echo "<td>".$row['year']."</td>";
					echo "<td>".$row['track_number']."</td>";
					echo "<td>".$row['song_name']."</td>";
					echo "<td>".$row['artist']."</td>";
                    echo "</td>";
                    echo "</tr>";
                    $i++;
                }
            ?>
        </table>

        <h2>Find Producer Info</h2>

        <form action="<?php echo "find_producer.php"; ?>" method="get">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr><td>Artist: </td><td><input type="text" size="30" name="artist"></td></tr>
                <tr><td>Year: </td><td> <input type="text" size="30" name="year"></td></tr>
                <tr><td>&nbsp;</td><td><input type="submit" value="Search"></td></tr>
				
            </table>
        </form>
		<a href = "menu.php">Return to menu</a>
    </body>
</html>

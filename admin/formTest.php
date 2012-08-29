<html>
<body>
<table>
    <form method="post" action="formTestPorcess.php">
    <tr>
        <td><input type="hidden" name="summary[]" value="1"/></td>
        <td><input type="text" name="stat1[]"/></td>
        <td><input type="text" name="stat2[]"/></td>
        <td><input type="hidden" name="stat3[]" value="1"/>1st</td>
        <td><select name="stat4[]">
                <option value="">Choose</option>
                <option value="hteam">hteam</option>
                <option value="ateam">ateam</option>
            </select>
        </td>
    </tr>
    <tr>
        <td><input type="hidden" name="summary[]" value="2"/></td>
        <td><input type="text" name="stat1[]"/></td>
        <td><input type="text" name="stat2[]"/></td>
        <td><input type="hidden" name="stat3[]" value="2"/></td>
                <td><select name="stat4[]">
                <option value="">Choose</option>
                <option value="hteam">hteam</option>
                <option value="ateam">ateam</option>
            </select>
        </td>
    </tr>
    <tr>
        <td><input type="hidden" name="summary[]" value="3"/></td>
        <td><input type="text" name="stat1[]"/></td>
        <td><input type="text" name="stat2[]"/></td>
        <td><input type="text" name="stat3[]"/></td>
                <td><select name="stat4[]">
                <option value="">Choose</option>
                <option value="hteam">hteam</option>
                <option value="ateam">ateam</option>
            </select>
        </td>
    </tr>
    <tr>
        <td><input type="submit" value="Submit" /></td>
    </tr>
    </form>
</table>

</body>
</html>
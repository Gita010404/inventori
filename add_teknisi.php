<html>
<head>
    <title>Add teknisi</title>
</head>

<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>
<p>Belajar Pemrograman Web</p>
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama teknisi</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>Tanggal Lahir</td>
                <td><input type="text" name="tanggal_lahir"></td>
            </tr>
            <tr> 
                <td>gender</td>
                <td><input type="text" name="gender"></td>
            </tr>
             <tr> 
                <td>no hp</td>
                <td><input type="text" name="no_hp"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nama_teknisi= $_POST['nama'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $gender= $_POST['gender'];
        $no_hp = $_POST['no_hp'];

        // include database connection file
        include_once("config_teknisi.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO teknisi(nama_teknisi,tanggal_lahir,gender,no_hp) VALUES('$nama_teknisi','$tanggal_lahir','$gender','$no_hp')");

        // Show message when user added
        echo "User added successfully. <a href='index.php'>View teknisi</a>";
    }
    ?>
</body>
</html>
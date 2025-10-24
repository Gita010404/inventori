<?php
// include database connection file
include_once("config_teknisi.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];
   $nama_teknisi= $_POST['nama_teknisi'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $gender= $_POST['gender'];
        $no_hp = $_POST['no_hp'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE teknisi SET nama_teknisi='$nama_teknisi',tanggal_lahir='$tanggal_lahir',gender='$gender',no_hp='$no_hp' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index_teknisi.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM teknisi WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $nama_teknisi = $user_data['nama_teknisi'];
    $tanggal_lahir = $user_data['tanggal_lahir'];
    $gender= $user_data['gender'];
    $no_hp = $user_data['no_hp'];
}
?>
<html>
<head>  
    <title>Edit User Data</title>
</head>

<body>
    <a href="index_teknisi.php">Home</a>
    <br/><br/>

    <form name="update_user" method="post" action="edit_teknisi.php">
        <table border="0">
            <tr> 
                <td>Nama Teknisi</td>
                <td><input type="text" name="nama_teknisi" value=<?php echo $nama_teknisi;?>></td>
            </tr>
            <tr> 
                <td>Tanggal Lahir</td>
                <td><input type="text" name="tanggal_lahir" value=<?php echo $tanggal_lahir;?>></td>
            </tr>
            <tr> 
                <td>Gender</td>
                <td><input type="text" name="gender" value=<?php echo $gender;?>></td>
            </tr>
             <tr> 
                <td>No HP</td>
                <td><input type="text" name="no_hp" value=<?php echo $no_hp;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
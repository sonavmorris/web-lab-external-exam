<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database connection</title>
    <style>
        .form
        {
            background-attachment: fixed;
            background-color: skyblue;
            font: size 2px;
            font-family: Arial;

        }
        .table
        {
            border-color: black;
            background-color: aquamarine;

        }
    </style>
</head>
<body>
<form action="" method="POST" >
    <table text-align="center" class="table">
    <h3>REGISTER HERE</h3>
        <tr>
            <td>USERNAME:</td>
            <td><input type="text" name="username" value="" placeholder="enter username"></td>
        </tr>
        <tr>
            <td>PASSWORD:</td>
            <td><input type="password" name="password" value="" placeholder="enter password"></td>
        </tr>
        <tr>
            <td>EMAIL ID:</td>
            <td><input type="text" name="emailid" value="" placeholder="example@gmail.com"></td>
        </tr>
        <tr>
            <td>PHONE NO:</td>
            <td><input type="number" name="phoneno" value="" placeholder="enter 10-digit phoneno"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="submit"></td>
        </tr>
        
    </table>
</form> 
<?php
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $emailid=$_POST['emailid'];
    $phoneno=$_POST['phoneno'];
    $conn=mysqli_connect("localhost","root","","student");
    if($conn)
    {
        echo"sucessfully connected";
        echo"<br>";
    }
    else
    {
        echo"connection failed";
        echo"<br>";
    }
    $query="INSERT INTO res(username,password,emailid,phoneno)VALUES('{$username}','{$password}','{$emailid}','{$phoneno}')";
    if(mysqli_query($conn,$query))
    {
        echo"successfully inserted";
        echo"<br>";
    }
    else
    {
        echo"insertion failed";
        echo"<br>";
    }
}
?>
<table class="form" cellpadding="5" cellspacing="3" colspan="3" border="2px">
        <tr>
            <th>USERNAME:</th>
            <th>PASSWORD:</th>
            <th>EMAILID:</th>
            <th>PHONENO:</th>
        </tr>
</table>
    <?php
    $search="SELECT * FROM res";
    $data=mysqli_query($conn,$search);
    while($res=mysqli_fetch_assoc($data))
    {
        ?>
        <table class=form cellpadding="5" cellspacing="3" colspan="3" border="2px">
        <tr>
            <td><?php echo$res['username'];?></td>
            <td><?php echo$res['password'];?></td>
            <td><?php echo$res['emailid'];?></td>
            <td><?php echo$res['phoneno'];?></td>
        
        </tr>
    </table>
        <?php
        }
        ?>
</html>

    
    
       

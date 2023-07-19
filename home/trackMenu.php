<!-- when track menu is clicked it will show all courier placed by that User-->
<?php
session_start();
if(isset($_SESSION['uid'])){
    echo "";
    }else{
    header('location: ../login.php');
    }

?>
<?php include('header.php'); ?>

<div style="overflow-x:auto;">
<table width='80%' border="1px dash" style="margin-top:30px;margin-left:auto ;margin-right:auto ;font-weight:bold;border-spacing: 5px 5px;border-collapse: collapse;">
    <tr style="background-color: Lightblue;font-size:20px">
        <th>No.</th>
        <th>Item's Image</th>
        <th>Sender Name</th>
        <th>Receiver Name</th>
        <th>Receiver Email</th>
        <th>Action</th>
    </tr>

    <?php
    include('../dbconnection.php');

    $email = $_SESSION['emm'];

    $qryy= "SELECT * FROM `courier` WHERE `semail`='$email'";
    $run= mysqli_query($dbcon,$qryy);

    if(mysqli_num_rows($run)<1){
        echo "<tr><td colspan='6'>No record found..</td></tr>";
    }
    else{
        $count=0;
        while($data=mysqli_fetch_assoc($run))
        {
            $count++;
        ?>
        <tr align="center">
            <td><?php echo $count; ?></td>
            <td><img src="../dbimages/<?php echo $data['image']; ?>" alt="pic" style="max-width: 100px;"/> </td>
            <td><?php echo $data['sname']; ?></td>
            <td><?php echo $data['rname']; ?></td>
            <td><?php echo $data['remail']; ?></td>
            <div class="container" style="max-height: : 100px;">
                <div class="row">
                <div class="col-md-12">
                <div class="form-group">               
                <button onclick="window.location.href='updationtable.php?sid=<?php echo $data['c_id']; ?>'" class="btn btn-danger" style="cursor:pointer">Edit</button>
                </td>
                 </div>
                <div class="form-group">
                <button onclick="window.location.href='deletecourier.php?bb=<?php echo $data['billno']; ?>'" class="btn btn-danger" style="cursor:pointer">Delete</button>
                </div>
                <div class="form-group">
                <button onclick="window.location.href='status.php?sidd=<?php echo $data['c_id']; ?>'" class="btn btn-danger" style="cursor:pointer" >Check Status</button>
                </div>  
                </div>
                </div>      
            </div>
        </tr>
        <?php
        }
    }
    ?>
</table>
</div>
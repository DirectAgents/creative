<?php  
 include_once("config.php"); 

 $id = '1';  


$sql=mysqli_query($connecDB,"SELECT * FROM work ORDER BY id DESC ");

  
 while($row = mysqli_fetch_array($sql))
{ ?>


<div class="col-md-4">
<table class="table">
    <tbody>
      <tr>
        <td class="about"><?php echo $row['name']; ?></td>
      </tr>
    </tbody>
  </table>
</div>

<?php } ?> 
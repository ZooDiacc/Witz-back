<?php
include('includes/config.php');
if(!empty($_POST["chapid"])) 
{
 $id=intval($_POST['chapid']);
$query=mysqli_query($con,"SELECT * FROM media WHERE chapter_id=$id and is_active=1");
?>
<option value="">Select Media</option>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['content']); ?></option>
  <?php
 }
}
?>
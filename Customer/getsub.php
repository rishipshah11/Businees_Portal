<?php

include 'connection.php';

$c_id = $_POST['cat_id'];

$subcategories = $con->query("select * from subcategory where c_id='$c_id'");
 
while($s = $subcategories->fetch_object())
{
	?>
	<option value="<?php echo $s->sub_id; ?>"><?php echo $s->sub_name; ?></option>
	<?php
}

?>
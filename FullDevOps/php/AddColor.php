<?php
	$ColorQuery = "SELECT category_name FROM sm_sub_category WHERE sub_category_name = '".$_GET['category']."';";
	$RColorQuery = $SM->query($ColorQuery);
	if (@$RColorQuery->num_rows > 0){
		$RValue = true;
		while (@$RowColor = $RColorQuery->fetch_array(MYSQLI_ASSOC))
			$Public_RowColor = $RowColor['category_name'];
		?>
			<style>
				.options nav ul li#<?php echo $Public_RowColor; ?> {
					background-color: rgba(0,0,0,.6);
				}
				.options nav ul li#<?php echo $Public_RowColor; ?> span {
					color: #fff;
				}
			</style>
		<?php
	} else {
		$RValue = false;
	}
?>
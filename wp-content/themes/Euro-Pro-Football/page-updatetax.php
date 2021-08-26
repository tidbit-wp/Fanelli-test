<?php 
	global $wpdb;
	$table_name = $wpdb->prefix . "tax";
	$taxid = $_POST['taxid'];
	$tax = $wpdb->get_results( "SELECT * FROM $table_name WHERE tax_id =$taxid" ); ?>
<style>
	.modall {
		display: none; /*Hidden by default */
	position: fixed; /* Stay in place */
	z-index: 1; /* Sit on top */
	left: 0;
	top: 0;
	width: 100%; /* Full width */
	height: 100%; /* Full height */
	overflow: auto; /* Enable scroll if needed */
	background-color: rgb(0,0,0); /* Fallback color */
	background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}

	/* Modal Content/Box */
	.modall-content {
	background-color: #fefefe;
	margin: 5% auto; /* 15% from the top and centered */
	padding: 20px;
	border: 1px solid #888;
	width: 60%; /* Could be more or less, depending on screen size */
	}

	/* The Close Button */
	.closee {
	color: #aaa;
	float: right;
	font-size: 28px;
	font-weight: bold;
	}

	.closee:hover,
	.closee:focus {
	color: black;
	text-decoration: none;
	cursor: pointer;
	}
</style>
<script>
$(document).ready(function() { 

	$('.closee').click(function(){
		$('.modall').css('display','none');
	}); 

	$('#updatelocationformsubmit').click(function(){


		locationname =$('#update_location_name').val();
		locationid =$('#Locationid').val();

		if(locationname ==''){

			if(locationname==''){
				$('#errorupdatelocationname').html('Please enter the Location name'); 
				$('#errorupdatelocationname').css({"color": "red", "font-size": "18px"});    
			}else{
				$('#errorupdatelocationname').html('');
			}
		}else{
			
				jQuery.ajax({
					type: 'POST',
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					data: {
						locationid:locationid,
						locationname:locationname,
						action:'updatetaxform'
					},
				success: function(result)
				{
					if(result == '1')
					{
						//alert("location Succesfully updated");
						$('#successmassage').css('display','block');
					}
					return false;
					}
							//window.location = '/newthankyou';
					}).done(function() {
						// setTimeout(function(){
						//     jQuery("#overlay").fadeOut(300);
						// },500);
						location.reload();
					}); 
		}
	}); 

}); 
</script>
<?php 
	//var_dump($product_id);
	foreach ($tax as $row){  ?>
<!-- The Modal -->
			<div id="myModal" class="modall">
				<!-- Modal content -->
				<div class="modall-content">
					<div class="row" style="background: #fafafa;margin-bottom: 20px;">
						<div class="col-md-10"><h4>Update tax value</h4></div>
						<div class="col-md-2"><span class="closee">&times;</span></div>
					</div>
					<form method="post" id="updateproductform">
				
						<div class="form-group row">
							<label for="update_location_name" class="col-sm-4 col-form-label">Tax Value </label>
							<div class="col-sm-8">
							<input type="text" class="form-control"  id="update_location_name" value="<?php echo $row->tax_value; ?>" required>
							<p id="errorupdatelocationname"></p>
                            <input type="hidden" id="Locationid" value="<?php echo $taxid;?>">
							</div>
						</div>

                        <button type="button" class="btn btn-primary mb-2" id="updatelocationformsubmit">Submit</button>
					</form>
					<div class="alert alert-success alert-dismissible fade in" id="successmassage" style="display:none;margin: 20px 0px;">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Successfully!</strong> Updated TAX details.
					</div>
                </div>
			</div>
	<?php } 
	die();
	?>
				
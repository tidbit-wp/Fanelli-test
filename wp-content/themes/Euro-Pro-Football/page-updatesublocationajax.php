<?php 
	global $wpdb;
	$table_name = $wpdb->prefix . "sublocation";
	$sublocation_id = $_POST['sublocationid'];
	$sublocation = $wpdb->get_results( "SELECT * FROM $table_name WHERE sublocation_id =$sublocation_id" ); ?>
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

	$('#updatesublocationformsubmit').click(function(){

		if($('#update_sublocation_active').is(":checked")){
				$('#update_sublocation_active').attr("value","Yes");
			}else{
				$('#update_sublocation_active').attr("value","No");
			}

        sublocationname =$('#update_sublocation_name').val();
		sublocationvanue =$('#update_sublocation_vanue').val();
		sublocation_active =$('#update_sublocation_active').val();
		sublocationid =$('#subLocationid').val();

		if(sublocationname =='' || sublocationvanue ==''){

			if(sublocationname==''){
				$('#errorupdatesublocationname').html('Please enter the SubLocation name.'); 
				$('#errorupdatesublocationname').css({"color": "red", "font-size": "18px"});    
			}else{
				$('#errorupdatesublocationname').html('');
			}

            if(sublocationvanue==''){
				$('#errorupdatesublocationvanue').html('Please enter the SubLocation vanue.'); 
				$('#errorupdatesublocationvanue').css({"color": "red", "font-size": "18px"});    
			}else{
				$('#errorupdatesublocationvanue').html('');
			}

			// if(sublocation_active=='No'){
			// 		$('#errorupdatesublocationactive').html('Must be checked this box'); 
			// 		$('#errorupdatesublocationactive').css({"color": "red", "font-size": "18px"});    
			// }else{
			// 		$('#errorupdatesublocationactive').html('');
			// }
		}else{
			
				jQuery.ajax({
					type: 'POST',
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					data: {
						sublocationid:sublocationid,
						sublocationname:sublocationname,
						sublocationvanue:sublocationvanue,
						sublocation_active:sublocation_active,
						action:'updatesublocationform'
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
	foreach ($sublocation as $row){    
		$sublocationactivecheck = $row->sublocation_active; ?>
<!-- The Modal -->
			<div id="myModal" class="modall">
				<!-- Modal content -->
				<div class="modall-content">
					<div class="row" style="background: #fafafa;margin-bottom: 20px;">
						<div class="col-md-10"><h4>Update SubLocation</h4></div>
						<div class="col-md-2"><span class="closee">&times;</span></div>
					</div>
					<form method="post" id="updateproductform">
				
						<div class="form-group row">
							<label for="update_sublocation_name" class="col-sm-4 col-form-label">Sub Location Name</label>
							<div class="col-sm-8">
							<input type="text" class="form-control"  id="update_sublocation_name" value="<?php echo $row->sublocation_name ?>" required>
							<p id="errorupdatesublocationname"></p>
                            <input type="hidden" id="subLocationid" value="<?php echo $sublocation_id;?>">
							</div>
						</div>

                        <div class="form-group row">
							<label for="update_sublocation_vanue" class="col-sm-4 col-form-label">Sub Location vanue</label>
							<div class="col-sm-8">
							<input type="text" class="form-control"  id="update_sublocation_vanue" value="<?php echo $row->sublocation_vanue ?>" required>
							<p id="errorupdatesublocationvanue"></p>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="update_sublocation_active" class="col-sm-4 col-form-label">Sub location active</label>
							<div class="col-sm-8">
							<input type="checkbox" class="form-control" id="update_sublocation_active" required <?php if($sublocationactivecheck == "Yes"){?> checked value="Yes" <?php }else{ ?> value="No" <?php } ?>>
							<p id="errorupdatesublocationactive"></p>
							</div>
						</div>

                        <button type="button" class="btn btn-primary mb-2" id="updatesublocationformsubmit">Submit</button>
					</form>
					<div class="alert alert-success alert-dismissible fade in" id="successmassage" style="display:none;margin: 20px 0px;">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Successfully!</strong> Updated SubLocation.
					</div>
                </div>
			</div>
	<?php } 
	die();
	?>
				
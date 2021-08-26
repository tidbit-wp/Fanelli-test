<?php 
global $wpdb;
$table_name1 = $wpdb->prefix . "mapping";
$mapping_id = $_POST['mappingid'];
$mapping = $wpdb->get_results( "SELECT * FROM $table_name1 WHERE mapping_id =$mapping_id" ); ?>
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

		$('#updatemappingformsubmit').click(function(){

			if($('#mapping_active').is(":checked")){
				$('#mapping_active').attr("value","Yes");
				
			}else{
				$('#mapping_active').attr("value","No");
			}
			
            mapping_active =$('#mapping_active').val();
            mapping_id=$('#mappingid').val();

			
				jQuery.ajax({
					type: 'POST',
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					data: {
					mapping_id:mapping_id,
                    mapping_active:mapping_active,
					action:'updatedmappingform'
					},
				success: function(result)
				{
                   // alert(result);
					if(result == '1')
					{
						alert("mapping Succesfully updated");
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
		});
}); 

</script>
<?php 
//var_dump($product_id);
foreach ($mapping as $row){ 
    // $productidfrommapping = $row->product_id;
    // $locationidfrommapping = $row->location_id;
    // $sublocationidfrommapping = $row->sublocation_id;
    // $eventidfrommapping = $row->event_id;
    $mappingactivecheck = $row->mapping_active;
    ?>

    <div id="myModal" class="modall">
				<!-- Modal content -->
				<div class="modall-content">

					<div class="row" style="background: #fafafa;margin-bottom: 20px;">
						<div class="col-md-10"><h4>Update Mapping</h4></div>
						<div class="col-md-2"><span class="closee">&times;</span></div>
					</div>
            <form id="mapping-form" method="post">
                <input type="hidden" id="mappingid" value="<?php echo $row->mapping_id; ?>">
                <div class="row">
                    <div class="col-md-6" >
                        <label for="mapping_active" style="font-size: 16px;padding: 0px 10px;margin-right: 35px;padding-top: 10px;">Mapping Active/Inactive </label>
                    </div>
                    <div class="col-md-6">
                        <input type="checkbox"  id="mapping_active" required  style="margin: 15px 0px;" <?php if($mappingactivecheck == "Yes"){?> checked value="Yes" <?php }else{ ?> value="No" <?php } ?>>
                        <p id="errormappingactive"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary" id="updatemappingformsubmit" style="padding: 8px 15px;font-size: 16px;margin: 15px 0px;">Submit Mapping</button>
                    </div>
                </div>
			</form>
                <div class="alert alert-success alert-dismissible fade in" id="successmassage" style="display:none;margin: 20px 0px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Successfully!</strong> Updated mapping.
                </div>
        </div>
    </div>

    <?php } 
                    die();
                    ?>
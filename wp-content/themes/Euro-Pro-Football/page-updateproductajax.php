<?php 
global $wpdb;
$table_name = $wpdb->prefix . "products";
$product_id = $_POST['productid'];
$product = $wpdb->get_results( "SELECT * FROM $table_name WHERE product_id =$product_id" ); ?>
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
	productupdateddependecy =$('select[name=demo] option').filter(':selected').val();
	console.log(productupdateddependecy);


	$('.closee').click(function(){
		$('.modall').css('display','none');	
	}); 

		
		function valueChanged()
    {
          
			if($('#updateProduct_dependency_checked').is(":checked")){
				$('#updateProduct_dependency_checked').attr("value","Yes");
				$("#answers").show();
			}else{
				$('#updateProduct_dependency_checked').attr("value","No");
				$("#answers").hide();
				}
    		
	}
	$("#updateProduct_dependency_checked").on("change", valueChanged);
	


		$('#updateproductformsubmit').click(function(){

			if($('#update_prod_active').is(":checked")){
				$('#update_prod_active').attr("value","Yes");
				
			}else{
				$('#update_prod_active').attr("value","No");
			}
			
			if(!$('#updateProduct_dependency_checked').is(':checked')){
				$('select[name=demo] option').filter(':selected').attr('value','N/A');
				$('select[name=demo] option').filter(':selected').text('N/A');
			}
			
		productupdatedname =$('#update_prod_name').val();
		productupdateddisc =$('#update_prod_disc').val();
		productupdatedprice =$('#update_prod_price').val();
		productupdatedprice2 =$('#update_prod_2ndprice').val();
		productupdatedprice3 =$('#update_prod_3rdprice').val();
		productupdateddependecy =$('select[name=demo] option').filter(':selected').val();
		productupdatedactive =$('#update_prod_active').val();
		productid =$('#productid').val();

		console.log(productupdateddependecy);

		if(productupdatedname ==''  || productupdatedprice ==''){

			if(productupdatedname==''){
				$('#erroeproname').html('Please enter the Product name'); 
				$('#erroeproname').css({"color": "red", "font-size": "18px"});    
			}else{
				$('#erroeproname').html('');
  				}

			// if(productupdateddisc==''){
			// 	$('#erroeprodisc').html('Please enter few Discription about Product'); 
			// 	$('#erroeprodisc').css({"color": "red", "font-size": "18px"});    
			// }else{
			// 	$('#erroeprodisc').html('');
  			// }

			if(productupdatedprice==''){
				$('#erroeprodprice').html('Please enter Product Price value'); 
				$('#erroeprodprice').css({"color": "red", "font-size": "18px"});    
			}else{
				$('#erroeprodprice').html('');
  			}

			// if(productupdatedactive=='No'){
			// 	$('#erroeprodactive').html('must be checked if product is active'); 
			// 	$('#erroeprodactive').css({"color": "red", "font-size": "18px"});    
			// }else{
			// 	$('#erroeprodactive').html('');
  			// }

		}else{
			
				jQuery.ajax({
					type: 'POST',
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					data: {
						productid:productid,
						productupdatedname:productupdatedname,
						productupdateddisc:productupdateddisc,
						productupdatedprice:productupdatedprice,
						productupdatedprice2:productupdatedprice2,
						productupdatedprice3:productupdatedprice3,
						productupdateddependecy:productupdateddependecy,
						productupdatedactive:productupdatedactive,
						action:'updateproductform'
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
foreach ($product as $row){ 
    $productdependencycheck = $row->product_dependency;
	//echo $productdependencycheck;
    $productactivecheck = $row->product_active;
    $pro_name = $row->product_name;
    ?>



<!-- The Modal -->
<div id="myModal" class="modall">
				<!-- Modal content -->
				<div class="modall-content">
					<div class="row" style="background: #fafafa;margin-bottom: 20px;">
						<div class="col-md-10"><h4>Update Products</h4></div>
						<div class="col-md-2"><span class="closee">&times;</span></div>
					</div>
					<form method="post" id="updateproductform">
				
						<div class="form-group row">
							<label for="update_prod_name" class="col-sm-4 col-form-label">Product Name</label>
							<div class="col-sm-8">
							<input type="text" class="form-control"  id="update_prod_name" value="<?php echo $row->product_name; ?>" required>
							<p id="erroeproname"></p>
							<input type="hidden" id="productid" value="<?php echo $product_id;?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="update_prod_disc" class="col-sm-4 col-form-label">Product Discription</label>
							<div class="col-sm-8">
							<textarea class="form-control" id="update_prod_disc" rows="3" placeholder="Type Product Details"><?php echo $row->product_discription; ?></textarea>
							<p id="erroeprodisc"></p>
							</div>
						</div>
						<div class="form-group row">
							<label for="update_prod_price" class="col-sm-4 col-form-label">Product Price</label>
							<div class="col-sm-8">
							<input type="number"  min="0" max="10000000" id="update_prod_price" value="<?php echo $row->product_price; ?>" required>
							<p id="erroeprodprice"></p>
							</div>
						</div>
						<div class="form-group row">
							<label for="update_prod_2ndprice" class="col-sm-4 col-form-label">Product 2nd Price</label>
							<div class="col-sm-8">
							<input type="number"  min="0" max="10000000" id="update_prod_2ndprice" value="<?php echo $row->product_price2ndtime; ?>" required>
							
							</div>
						</div>
						<div class="form-group row">
							<label for="update_prod_3rdprice" class="col-sm-4 col-form-label">Product 3rd Price</label>
							<div class="col-sm-8">
							<input type="number"  min="0" max="10000000" id="update_prod_3rdprice" value="<?php echo $row->product_price3rdtime ?>" required>
							</div>
						</div>
						
                        <div class="form-group row">
                            <label for="updateProduct_dependency_checked" class="col-sm-4 col-form-label">Need to take any product before you can select this product</label>
                            <div class="col-sm-8">
                            <input type="checkbox" class="form-control" id="updateProduct_dependency_checked" required <?php if($productdependencycheck == "N/A" ||$productdependencycheck == "" ){?> value="No" <?php }else{ ?>  checked value="Yes" <?php } ?>  >
                            </div>
                        </div>
						 <?php if($productdependencycheck) { ?>
                        <div class="form-group row" id="answers">
                            <label for="updateDeoendency_Product" class="col-sm-4 col-form-label">Select Products</label>
                            <div class="col-sm-8">
                            <select class="form-control" id="updateDeoendency_Product" name="demo">
                                <option value="<?php echo $productdependencycheck; ?>" selected ><?php echo $productdependencycheck; ?></option>
                                <?php 
                            global $wpdb;
                            $table_name = $wpdb->prefix . "products";
                            $product = $wpdb->get_results( "SELECT * FROM $table_name WHERE product_active='Yes'" );
                            foreach ($product as $rows){ ?>
									 <option name="product_list" value="<?php echo $rows->product_name;?>"><?php echo $rows->product_name;?></option>
                            
                            <?php } ?>
                        </select>
                        </div>
 			         </div><?php } ?>

						<div class="form-group row">
							<label for="update_prod_active" class="col-sm-4 col-form-label">Product active</label>
							<div class="col-sm-8">
							<input type="checkbox" class="form-control" id="update_prod_active" required <?php if($productactivecheck == "Yes"){?> checked value="Yes" <?php }else{ ?> value="No" <?php } ?>>
							<p id="erroeprodactive"></p>
							</div>
						</div>

                        <button type="button" class="btn btn-primary mb-2" id="updateproductformsubmit">Submit</button>
						

					
					</form>
					<div class="alert alert-success alert-dismissible fade in" id="successmassage" style="display:none;margin: 20px 0px;">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Successfully!</strong> Updated Products.
					</div>
                    </div>
			</div>
					<?php } 
                    die();
                    ?>
				
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<style>

	
</style>
<script type="text/javascript">

jQuery(function($) {
  
  var items = $("#tab1 .table tbody tr");

  var numItems = items.length;
  var perPage = 10;

  // Only show the first 2 (or first `per_page`) items initially.
  items.slice(perPage).hide();

  // Now setup the pagination using the `.pagination-page` div.
  $(".pagination").pagination({
      items: numItems,
      itemsOnPage: perPage,
      cssStyle: "light-theme",
      displayedPages: 2,
      edges: 2,
    //   prevText:"&laquo",
    //   nextText:"&raquo;",
      // This is the actual page changing functionality.
      onPageClick: function(pageNumber) {
          // We need to show and hide `tr`s appropriately.
          var showFrom = perPage * (pageNumber - 1);
          var showTo = showFrom + perPage;

          // We'll first hide everything...
          items.hide()
               // ... and then only show the appropriate rows.
               .slice(showFrom, showTo).show();
      }
  });
  
  function checkFragment() {
      // If there's no hash, treat it like page 1.
      var hash = window.location.hash || "#page-1";

      // We'll use a regular expression to check the hash string.
      hash = hash.match(/^#page-(\d+)$/);

      if(hash) {
          // The `selectPage` function is described in the documentation.
          // We've captured the page number in a regex group: `(\d+)`.
          $(".pagination").pagination("selectPage", parseInt(hash[1]));
      }
  };

  // We'll call this function whenever back/forward is pressed...
  $(window).bind("popstate", checkFragment);

  // ... and we'll also call it when the page has loaded
  // (which is right now).
  checkFragment();
});
  </script>  
  <script type="text/javascript" src="https://flaviusmatis.github.io/simplePagination.js/jquery.simplePagination.js"></script>

  <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("mytable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

<script>

$(document).ready(function() {
	
function valueChanged()
    {
        if($('#Product_dependency_checked').is(":checked")){   
			$('#Product_dependency_checked').attr("value","Yes");
		    $("#answerss").show();
			}else{
			$('#Product_dependency_checked').attr("value","No");
			// $('#Deoendency_Product option:selected').attr('value','N/A');
			// $('#Deoendency_Product option:selected').text('N/A');
            $("#answerss").hide();	
			}
    }
	$("#Product_dependency_checked").on("change", valueChanged);
});	


</script>
<script>
$(document).ready(function() {
$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).removeClass("btn-default").addClass("btn-primary");   
});


//product form submit AJax call
$("#productformsubmit").click(function () {

	if($('#prod_active').is(":checked")){
	$('#prod_active').attr("value","Yes");
}else{
	$('#prod_active').attr("value","No");
	$('#Deoendency_Product option:selected').attr('value','N/A');
			$('#Deoendency_Product option:selected').text('N/A');
}

if($('#Product_dependency_checked').is(":checked")){
$('#Product_dependency_checked').attr("value","Yes");
}else{
$('#Product_dependency_checked').attr("value","No");
} 		
		 productname =$('#Prod_name').val();
         product_discription =$('#Prod_discription').val();
         product_price =$('#Prod_price').val();
		 product_2ndtimeprice =$('#Prod_2ndtimeprice').val();
		 product_3rdtimeprice =$('#Prod_3rdtimeprice').val();
		 product_dependency =$('#Product_dependency_checked').val();
		 product_dependecyname =$('#Deoendency_Product option:selected').val();
		 product_active =$('#prod_active').val();

		 console.log(product_dependecyname);
	
		 //alert(productname + product_discription + product_2ndtimeprice + product_3rdtimeprice + product_dependency + product_dependecyname + product_active);
		 if(productname =='' ||  product_price ==''){
			if(productname==''){
				$('#erroename').html('Please enter the Product name'); 
				$('#erroename').css({"color": "red", "font-size": "18px"});    
			}else{
				$('#erroename').html('');
  				}

			// if(product_discription==''){
			// 	$('#errordiscription').html('Please enter few Discription about Product'); 
			// 	$('#errordiscription').css({"color": "red", "font-size": "18px"});    
			// }else{
			// 	$('#errordiscription').html('');
  			// }

			if(product_price==''){
				$('#errorprice').html('Please enter Product Price value'); 
				$('#errorprice').css({"color": "red", "font-size": "18px"});    
			}else{
				$('#errorprice').html('');
  			}

			// if(product_active=='No'){
			// 	$('#errorproductactive').html('must be checked if product is active'); 
			// 	$('#errorproductactive').css({"color": "red", "font-size": "18px"});    
			// }else{
			// 	$('#errorproductactive').html('');
  			// }

	}else{
		// ajax function

		jQuery.ajax({
    	type: 'POST',
    	url: '<?php echo admin_url('admin-ajax.php'); ?>',
    	data: {
        productname:productname,
		hgvhvg:product_dependecyname,
		product_discription:product_discription,
		product_price:product_price,
		product_2ndtimeprice:product_2ndtimeprice,
		product_3rdtimeprice:product_3rdtimeprice,
		product_active:product_active,
        action:'productformcode'
        },
      success: function(result)
      {
      
          if(result == '1')
          {
			//alert("Product Succesfully added");
			$('#successmassage').css('display','block');
            
          }
        //   if(result == 'email exist'){
        //       alert('Email address is already exist.Please type another name');
        //   }
        //     if(result == 'added successfully'){
        //   // window.open('https://martechkb.com/newthankyou/','_self');
        //   alert('Your Profile is suceesfully added');
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

<script>
$(document).ready(function() { 
$('.well #tab1 #clickeditform').click(function(){
	var productid = $(this).val();

	jQuery.ajax({
    	type: 'POST',
    	url: '<?php echo admin_url('admin-ajax.php'); ?>',
    	data: {
		productid:productid,
        action:'updateproductdata'
        },
      success: function(result)
      {
        $('.hereadd').html(result);
          return false;
            }
                
                 //window.location = '/newthankyou';
          }).done(function() {
            $('.modall').css('display','block');
    });
	
	
});	
});
</script>


<!------ Include the above in your HEAD tag ---------->

<div class="col-md-12 col-lg-12 col-sm-12">
    
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                <div class="hidden-xs">Product Listing</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                <div class="hidden-xs">Add New Product</div>
            </button>
        </div>
        <!-- <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Following</div>
            </button>
        </div> -->
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
		<div class="row">
		  	<div class="col-md-6"><h3 style="margin: 0px;padding: 10px;">List of Products</h3></div>
		  	<div class="col-md-6"> <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."></div>
		  </div>
				<table class="table table-hover" id="mytable">
				<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Product Name</th>
					<th scope="col">Product Discription</th>
					<th scope="col">Product Price</th>
					<th scope="col">Product Active</th>	
					<!-- <th scope="col">Product 2ndtime Price</th>
					<th scope="col">Product 3rdtime price</th>
					<th scope="col">Product Dependency name</th>
					<th scope="col">Product Active</th> -->
					<th></th>					
				</tr>
				</thead>
				<tbody>
				<?php 
				global $wpdb;
				$table_name = $wpdb->prefix . "products";
				$product = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY product_id desc" );
				//var_dump($product);
				$count = 0; 
			 foreach ($product as $row){  $count++;?>

					<tr>
						<th scope="row"><?php echo $count ?></th>
						<td><?php echo $row->product_name ?></td>
						<td><?php echo $row->product_discription ?></td>
						<td><?php echo $row->product_price ?></td>
						<td><?php echo $row->product_active;?> 
					</td>
						<td><button id="clickeditform" value="<?php echo $row->product_id ?>">Edit Product</button>
						<!-- <input  id="addiddata" type="checkbox" checked data-toggle="toggle" data-on="Active" data-off="InActive" data-onstyle="primary" data-offstyle="light"> -->					</td>
						<!-- <td><?php// echo $row->product_price2ndtime ?></td>
						<td><?php //echo $row->product_price3rdtime ?></td>
						<td><?php //echo $row->product_dependency ?></td>
							 -->
						
					</tr>
					
					<?php } ?>
					</tbody>
				</table>
				<div class="hereadd"></div>
				<div id="light-pagination" class="pagination" style="justify-content: center;display: flex;"></div>

        </div>
        <div class="tab-pane fade in" id="tab2">
          <h3 style="margin-bottom:15px;">Create new Products</h3>
			<form id="product-form" method="post">
			<div class="form-group row">
				<label for="Prod_name" class="col-sm-4 col-form-label">Product Name</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" id="Prod_name" placeholder="Name of product" required>
				<p id="erroename"></p>
				</div>
 			 </div>
			  <div class="form-group row">
				<label for="Prod_discription" class="col-sm-4 col-form-label">Product Discription</label>
				<div class="col-sm-8">
				<textarea class="form-control" id="Prod_discription" rows="3" placeholder="Type Product Details"></textarea>
				<p id="errordiscription"></p>
				</div>
 			 </div>
			  <div class="form-group row">
				<label for="Prod_price" class="col-sm-4 col-form-label">Product Price</label>
				<div class="col-sm-8">
				<input type="number"  min="0" max="10000000" class="form-control" id="Prod_price" required placeholder="Price of product">
				<p id="errorprice"></p>
				</div>
 			 </div>
			  <div class="form-group row">
				<label for="Prod_2ndtimeprice" class="col-sm-4 col-form-label">Product 2nd time Price</label>
				<div class="col-sm-8">
				<input type="number"  min="0" max="10000000" class="form-control" id="Prod_2ndtimeprice" required placeholder="Price of product">
				</div>
 			 </div>
			  <div class="form-group row">
				<label for="Prod_3rdtimeprice" class="col-sm-4 col-form-label">Product 3rd time Price</label>
				<div class="col-sm-8">
				<input type="number"  min="0" max="10000000" class="form-control" id="Prod_3rdtimeprice" required placeholder="Price of product">
				</div>
 			 </div>
			  <div class="form-group row">
				<label for="Product_dependency_checked" class="col-sm-4 col-form-label">Need to take any product before you can select this product</label>
				<div class="col-sm-8">
				<input type="checkbox" class="form-control" id="Product_dependency_checked"  value="">
				</div>
 			 </div>
			  <div class="form-group row" id="answerss" style="display:none;">
				<label for="Deoendency_Product" class="col-sm-4 col-form-label">Select Products</label>
				<div class="col-sm-8">
				<select class="form-control" id="Deoendency_Product">
					<option value="N/A" selected >N/A</option>
					<?php 
				global $wpdb;
				$table_name = $wpdb->prefix . "products";
				$product = $wpdb->get_results( "SELECT * FROM $table_name WHERE product_active='Yes'" );
				 foreach ($product as $row){ ?>

					<option name="product_list" value="<?php echo $row->product_name;?>" ><?php echo $row->product_name; ?></option>
					<?php } ?>
   				 </select>
				</div>
 			 </div>
			  <div class="form-group row">
				<label for="prod_active" class="col-sm-4 col-form-label">Product active(If yes then checked the box)</label>
				<div class="col-sm-8">
				<input type="checkbox" class="form-control" id="prod_active" required value="">
				<p id="errorproductactive"></p>
				</div>
 			 </div>
			<button type="button" class="btn btn-primary mb-2" id="productformsubmit">Submit</button>
			
			</form>
			<div class="alert alert-success alert-dismissible fade in" id="successmassage" style="display:none;margin: 20px 0px;">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Successfully!</strong> Updated Products.
			</div>
        </div>
      </div>
    </div>
</div>
            
    
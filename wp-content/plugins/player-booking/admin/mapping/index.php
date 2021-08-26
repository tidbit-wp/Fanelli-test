<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
		$(".btn-pref .btn").click(function () {
			$(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
			// $(".tab").addClass("active"); // instead of this do the below 
			$(this).removeClass("btn-default").addClass("btn-primary");   
		});

		// ajax Function
		$("#mappingformsubmit").click(function () {

			if($('#mapping_active').is(":checked")){
				$('#mapping_active').attr("value","Yes");
			}else{
				$('#mapping_active').attr("value","No");
			}

		mapping_productname =$('#mapping_productname option:selected').val();
        mapping_locationtname =$('#mapping_locationtname option:selected').val();
        mapping_sublocationname =$('#mapping_sublocationname option:selected').val();
        mapping_eventname =$('#mapping_eventname option:selected').val();
		mapping_active =$('#mapping_active').val();

		if(mapping_productname =='' || mapping_locationtname == '' || mapping_sublocationname == '' || mapping_eventname == ''){

			if(mapping_productname==''){
				$('#errormappingproduct').html('Please enter the Location name'); 
				$('#errormappingproduct').css({"color": "red", "font-size": "18px"});    
			}else{
				$('#errormappingproduct').html('');
			}

			if(mapping_locationtname==''){
					$('#errormappinglocation').html('Must be checked this box'); 
					$('#errormappinglocation').css({"color": "red", "font-size": "18px"});    
			}else{
					$('#errormappinglocation').html('');
			}

            if(mapping_sublocationname==''){
					$('#errormappingsublocation').html('Must be checked this box'); 
					$('#errormappingsublocation').css({"color": "red", "font-size": "18px"});    
			}else{
					$('#errormappingsublocation').html('');
			} 

            if(mapping_eventname==''){
					$('#errormappingevent').html('Must be checked this box'); 
					$('#errormappingevent').css({"color": "red", "font-size": "18px"});    
			}else{
					$('#errormappingevent').html('');
			}

            

		}else{

			jQuery.ajax({
				type: 'POST',
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				data: {
					mapping_productname:mapping_productname,
					mapping_locationtname:mapping_locationtname,
                  mapping_sublocationname:mapping_sublocationname,
                  mapping_eventname:mapping_eventname,
                  mapping_active:mapping_active,
					action:'mappingformcode'
				},
				success: function(result)
				{
					if(result == '1')
					{ 
						//alert("Product Succesfully added");
						$('#successmassage').css('display','block');            
					}
				  return false;
				}
						//window.location = '/newthankyou';
				}).done(function() {
					location.reload();
					// setTimeout(function(){
					//     jQuery("#overlay").fadeOut(300);
					// },500);
			  	}); 
			}

		});
	});
</script>
<!--  -->

<script>
	$(document).ready(function() { 
	$('.well #tab1 #clcikeditmapping').click(function(){
	var mappingid = $(this).val();

	jQuery.ajax({
    	type: 'POST',
    	url: '<?php echo admin_url('admin-ajax.php'); ?>',
    	data: {
        mappingid:mappingid,
        	action:'updatemappingdata'
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
<script>
$(document).ready(function() { 
	$('.well #tab1 #viewBookings').click(function(){
	var mappingid = $(this).val();

	jQuery.ajax({
    	type: 'POST',
    	url: '<?php echo admin_url('admin-ajax.php'); ?>',
    	data: {
          mappingid:mappingid,
        	action:'viewmappingdata'
        },
      success: function(result)
      {
        $('.hereadd').html(result);
          return false;
            }
                //window.location = '/newthankyou';
          }).done(function() {
            $('.modallz').css('display','block');
    	});
	
	});	
});
</script>


<!------ Include the above in your HEAD tag ---------->

<div class="col-md-12 col-lg-12 col-sm-12">
    
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                <div class="hidden-xs">Mapping Listing</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                <div class="hidden-xs">Add Mapping</div>
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
		  	<div class="col-md-6"><h3 style="margin: 0px;padding: 10px;">List of Mappings</h3></div>
		  	<div class="col-md-6"> <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."></div>
		  </div>
				<table class="table table-hover" id="mytable">
				<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Product Name</th>
					<th scope="col">Location name</th>
                    <th scope="col">SubLocation name</th>
                    <th scope="col">Event name</th>
					<th>Active/Inactive<th>
            <th></th>
            <th></th>
				</tr>
				</thead>
				<tbody>
				<?php 
					global $wpdb;
					$table_name = $wpdb->prefix . "mapping";
					$mapping = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY mapping_id desc" );
					//var_dump($mapping);
					$count = 0; 
					foreach ($mapping as $row){  $count++;?>
						<tr>
							<th scope="row"><?php echo $count ?></th>
							
                            <?php 
                            $table_name = $wpdb->prefix . "products";
                            $mappingsss = $wpdb->get_results( "SELECT * FROM $table_name WHERE product_id = $row->product_id " );
                             foreach ($mappingsss as $sss){  ?> <td> <?php echo $sss->product_name; ?> </td>
                            
                           <?php } ?>
                            <?php 
                            $table_name = $wpdb->prefix . "location";
                            $locations = $wpdb->get_results( "SELECT * FROM $table_name WHERE location_id = $row->location_id " );
                             foreach ($locations as $locks){  ?> <td> <?php echo $locks->location_name; ?> </td>
                           <?php } ?>
                            
                            <?php 
                            $table_name = $wpdb->prefix . "sublocation";
                            $sublocation = $wpdb->get_results( "SELECT * FROM $table_name WHERE sublocation_id = $row->sublocation_id " );
                             foreach ($sublocation as $sublocks){  ?> <td> <?php echo $sublocks->sublocation_name; ?> </td>
                           <?php } ?>

                            
                            <?php 
                            $table_name = $wpdb->prefix . "event";
                            $event = $wpdb->get_results( "SELECT * FROM $table_name WHERE event_id = $row->event_id " );
                             foreach ($event as $eventsss){  ?> <td> <?php echo $eventsss->event_name; ?> </td>
                           <?php } ?>	
                            <td><?php echo $row->mapping_active?></td>	
                            <td><button id="clcikeditmapping" value="<?php echo $row->mapping_id ?>">Edit Mapping</button></td>	
                            <td><button id="viewBookings" value="<?php echo $row->mapping_id ?>">View Future Bookings</button>	</td>
						</tr>
					<?php } ?>
				</tbody>
				</table>
				<div class="hereadd"></div>

				<div id="light-pagination" class="pagination" style="justify-content: center;display: flex;"></div>
        </div>
        <div class="tab-pane fade in" id="tab2">
          <h3 style="margin-bottom:15px;">Add Mapping</h3>
			<form id="mapping-form" method="post">
            <table class="table table-hover" id="mytable">
				<thead>
				<tr>
					<th scope="col">Product Name</th>
					<th scope="col">Location name</th>
                    <th scope="col">SubLocation name</th>
                    <th scope="col">Event name</th>
				</tr>
				</thead>
				<tbody>
                <tr>
					<th scope="col" class="col-md-3">
                        <select id="mapping_productname" style="width:100%;">
                        <option value="" selected disable>Choose Product</option>
                        <?php 
                            global $wpdb;
                            $table_name = $wpdb->prefix . "products";
                            $product = $wpdb->get_results( "SELECT * FROM $table_name WHERE product_active='Yes'" );
                            foreach ($product as $row){ 
                        ?>
                            <option name="product_list" value="<?php echo $row->product_id?>"><?php echo $row->product_name?></option>
                        <?php } ?>
                    </select>
                    <p id="errormappingproduct"></p>
                    </th>
					<th scope="col" class="col-md-3">
                        <select id="mapping_locationtname" style="width:100%;">
                            <option value="" selected disable>Choose location</option>
                            <?php 
                                global $wpdb;
                                $table_name = $wpdb->prefix . "location";
                                $location = $wpdb->get_results( "SELECT * FROM $table_name WHERE location_active='Yes'" );
                                foreach ($location as $row){ 
                            ?>
                                <option name="location_list" value="<?php echo $row->location_id?>"><?php echo $row->location_name?></option>
                            <?php } ?>
                        </select>
                        <p id="errormappinglocation"></p>
                    </th>
                    <th scope="col" class="col-md-3">
                    <select id="mapping_sublocationname" style="width:100%;">
                            <option value="" selected disable>Choose sublocation</option>
                            <?php 
                                global $wpdb;
                                $table_name = $wpdb->prefix . "sublocation";
                                $sublocation = $wpdb->get_results( "SELECT * FROM $table_name WHERE sublocation_active='Yes'" );
                                foreach ($sublocation as $row){ 
                            ?>
                                <option name="sublocation_list" value="<?php echo $row->sublocation_id?>"><?php echo $row->sublocation_name?></option>
                            <?php } ?>
                        </select>
                        <p id="errormappingsublocation"></p>
                    </th>
                    <th scope="col" class="col-md-3"> 
                        <select id="mapping_eventname" style="width:100%;">
                            <option value="" selected disable>Choose Event</option>
                            <?php 
                                global $wpdb;
                                $table_name = $wpdb->prefix . "event";
                                $event = $wpdb->get_results( "SELECT * FROM $table_name WHERE event_active='Yes'" );
                                foreach ($event as $row){ 
                            ?>
                                <option name="event_list" value="<?php echo $row->event_id?>"><?php echo $row->event_name?></option>
                            <?php } ?>
                        </select>
                        <p id="errormappingevent"></p>
                    </th>
				</tr>
                </tbody>
				</table>
                <div class="row">
                <div class="col-md-4" >
                        <label for="mapping_active" style="font-size: 16px;padding: 0px 10px;margin-right: 35px;padding-top: 10px;">Mapping Active/Inactive </label>
                        <input type="checkbox"  id="mapping_active" value="" required  style="margin: 0;" >
                        <p id="errormappingactive"></p>
                        </div>
                <div class="col-md-8"><button type="button" class="btn btn-primary" id="mappingformsubmit" style="padding: 8px 15px;font-size: 18px;">Submit Mapping</button>
                </div>
			</div>
			</form>

			<div class="alert alert-success alert-dismissible fade in" id="successmassage" style="display:none;margin: 20px 0px;">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Successfully!</strong> Added Mapping.
			</div>
        </div>
      </div>
    </div>
</div>
            
    
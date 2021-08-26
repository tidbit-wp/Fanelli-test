<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<script type="text/javascript">

// For pagination show into event listing tab 
	jQuery(function($) 
	{
			
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
<!-- pagination end script-->

<!--  script for Search/filter Rows Automatically-->
<script>
function myFunction() 
{
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
	$(document).ready(function() 
	{ 
	$('.well #tab1 #clcikeditevent').click(function(){
	var booking_id = $(this).val();
	
	jQuery.ajax({
    	type: 'POST',
    	url: '<?php echo admin_url('admin-ajax.php'); ?>',
    	data: {
			booking_id:booking_id,
        	action:'booking_data'
        },
      success: function(result)
      {
        $('.hereadd').html(result);
          return false;
            }
               
          }).done(function() {
            $('.modall').css('display','block');
    	});
	
	});	
});
</script>
<!--  end OF custom Script code-->

<div class="col-md-12 col-lg-12 col-sm-12">
    
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                <div class="hidden-xs">Booking Listing</div>
            </button>
        </div>       
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
          <div class="row">
		  	<div class="col-md-6"><h3 style="margin: 0px;padding: 10px;">List of Booking</h3></div>
		  	<div class="col-md-6"> <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."></div>
		  </div>
				<table class="table table-hover" id="mytable">
				<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">User Name</th>
					<th scope="col">Product Name</th>
					<th scope="col">Product Price</th>
					<th scope="col">Location Name</th>
					<th scope="col">SubLocation Name</th>
					<th scope="col">SubLocation Venue</th>
					<th scope="col">Event Name</th>
					<th scope="col">Event Date&Time</th>
					<!-- <th scope="col">Status</th> -->
					<th>Action<th>
				</tr>
				</thead>
				<tbody>
				<?php 
					global $wpdb;
					$table_name = $wpdb->prefix . "book";
					$book = $wpdb->get_results( "SELECT * FROM $table_name WHERE booked_status='succeeded' ORDER BY book_id DESC" );
				 /* echo '<pre>';
					print_r($book);
					echo '</pre>';   */
					$count = 0; 
					foreach ($book as $row)
					{ 
						$count++;
						?>
						<tr>
							<th scope="row"><?php echo $count ?></th>
							<td><?php 							
							$user_info = get_userdata($row->user_id);
							if(!empty($user_info))
							{
								echo $user_info->first_name." ".$user_info->last_name;
							}								
							?></td>
							<td><?php echo $row->product_name; ?></td>
							<td><?php echo $row->product_price; ?></td>
							<td><?php echo $row->location_name; ?></td>
							<td><?php echo $row->sublocation_name; ?></td>
							<td><?php echo $row->sublocation_vanue; ?></td>
							<td><?php $eventid=$row->event_id; 
										$table_name1 = $wpdb->prefix . "event";
										$mappingsss = $wpdb->get_results( "SELECT * FROM $table_name1 WHERE event_id=$eventid AND event_active='Yes'" );
										foreach ($mappingsss as $sss){  
											echo $sss->event_name;
										}?>
							</td>
							<td><?php echo $row->event_date.'('.$row->event_timeslot.')'; ?></td>
							<!-- <td><?php //echo $row->booked_status; ?></td>						 -->
							<td><button id="clcikeditevent" value="<?php echo $row->book_id; ?>">View Booking Details</button></td>					
						</tr>
					<?php } ?>
				</tbody>
				</table>
				<div class="hereadd"></div>

				<div id="light-pagination" class="pagination" style="justify-content: center;display: flex;"></div>
        </div>
    </div>
</div>


            
    
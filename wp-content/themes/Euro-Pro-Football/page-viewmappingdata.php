
<?php 
global $wpdb;
$table_name = $wpdb->prefix . "book";
$mappingid = $_POST['mappingid'];
$today = date("m/d/Y"); 
$bookeddata = $wpdb->get_results( "SELECT * FROM $table_name WHERE  event_date > $today AND mapping_id=$mappingid AND booked_status='succeeded'" ); 

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
.modallz {
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
.modallz-content {
  background-color: #fefefe;
  margin: 5% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 70%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.FutureModelClose {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.FutureModelClose:hover,
.FutureModelClose:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
.table{
	overflow: auto;
	display: block;
}
.d-none{
  display:none;
}
</style>
<script>
$(document).ready(function() {    

	$('.FutureModelClose').on('click', function(){
		$('.modallz').css('display','none');	
	}); 

    // $("#mytable #openfuturemodel").click(function () {
    //     $(".maindiv").toggle();
    // });
    $('#openfuturemodel').on('click', function(){
      $('.blist-tbl').toggleClass('d-none');
    })
});     
</script>
<!-- The Modal -->
<div id="myModal" class="modallz">
				<!-- Modal content -->
				<div class="modallz-content">
				<div class="row" style="background: #fafafa;margin-bottom: 20px;">
						<div class="col-md-10"><h4>future Bookings List</h4></div>
						<div class="col-md-2"><span class="FutureModelClose">&times;</span></div>
					</div>
				<table class="table table-hover" id="mytable">
				<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">User Name</th>
					<th scope="col">Product Name</th>
					<th scope="col">Product Price</th>
					<th scope="col">Location Name</th>
					<th scope="col">Sub Location Name</th>
					<th scope="col">Sub Location Vanue</th>
					<th scope="col">Event Name</th>
					<th scope="col">Event Type</th>
					<th scope="col">Event Date Time</th>
					<!-- <th scope="col">Status</th> -->
					<!-- <th>Action<th> -->
				</tr>
				</thead>
				<tbody>
<?php 
//var_dump($product_id);
$count = 0; 
foreach($bookeddata as $rowsss){
  $today = date("m/d/Y"); 
  $fatchdate=$rowsss->event_date;
  if($fatchdate > $today ){
    $count++;
    ?>
						<tr>
							<th scope="row"><?php echo $count ?></th>
							<td><?php 							
							$user_info = get_userdata($rowsss->user_id);
							if(!empty($user_info))
							{
								echo $user_info->first_name." ".$user_info->last_name;
							}								
							?></td>
							<td><?php echo $rowsss->product_name; ?></td>
							<td><?php echo $rowsss->product_price; ?></td>
							<td><?php echo $rowsss->location_name; ?></td>
							<td><?php echo $rowsss->sublocation_name; ?></td>
							<td><?php echo $rowsss->sublocation_vanue; ?></td>
							<td><?php $eventid=$rowsss->event_id; 
										$table_name1 = $wpdb->prefix . "event";
										$mappingsss = $wpdb->get_results( "SELECT * FROM $table_name1 WHERE event_id=$eventid AND event_active='Yes'" );
										foreach ($mappingsss as $sss){  
											echo $sss->event_name;
										}?>
							</td>
							<td><?php echo $rowsss->event_type; ?></td>
							<td><?php echo $rowsss->event_date.'('.$rowsss->event_timeslot.')'; ?></td>
							<!-- <td><?php //echo $rowsss->booked_status; ?></td>						 -->
							<!-- <td><button id="openfuturemodel" value="<?php //echo $rowsss->book_id; ?> ">View Details</button></td>
                          <table class="blist-tbl table d-none">
                            <tr>
                              <th colspan='2'>Transaction ID </th>
                              <th>Payment Status </th>
                              <th colspan='2'>Name Of Card </th>
                              <th colspan='2'>Email Address </th>
                              <th colspan='2'> Address Line1</th>
                              <th colspan='2'>Address Line2 </th>
                              <th> City</th>
                              <th>Country </th>
                              <th>Postcode </th>
                              <th>Contact No </th>
                            </tr>
                            <tr>
                              <td colspan='2'><?php //echo $rowsss->stripe_id; ?></td>
                              <td><?php // echo $rowsss->booked_status; ?></td>
                              <td colspan='2'><?php// echo $rowsss->name_of_card; ?></td>
                              <td colspan='2'><?php //echo $rowsss->emailaddress; ?></td>
                              <td colspan='2'><?php //echo $rowsss->addressline1; ?></td>
                              <td colspan='2'><?php //echo $rowsss->addressline2; ?></td>
                              <td><?php //echo $rowsss->city; ?></td>
                              <td><?php //echo $rowsss->country; ?></td>
                              <td><?php //echo $rowsss->postcode; ?></td>
                              <td><?php //echo $rowsss->contact_no; ?></td>   
                            </tr>
                          </table>				 -->
						</tr>
                       
					<?php }  }?>
				</tbody>
				</table>
				<div class="hereadd"></div>

                </div>
                <!-- model content end -->
			</div>
            <!-- The Modal -->
<?php 
die(); ?>
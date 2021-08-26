<?php 
global $wpdb;
$table_name = $wpdb->prefix . "book";
$booking_id = $_POST['booking_id'];
$booking_data = $wpdb->get_results( "SELECT * FROM $table_name WHERE book_id =$booking_id" ); ?>
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
	width: 70%; /* Could be more or less, depending on screen size */
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
	label.col-md-4.col-form-label {
		padding: 5px 40px;
    font-size: 16px;
    color: #303031e6;
}
label.col-md-8.col-form-label {
    padding: 5px 20px;
    font-size: 16px;
    font-weight: normal;
}

</style>

<script>
$(document).ready(function() { 
	$('.closee').click(function(){
		$('.modall').css('display','none');
	});

	$('#submitstatus').click(function(){
		Player_status = $( "#Bookingproductstatus option:selected" ).val();
		bookid=$('#mainid').val();
		$.ajax({
				type :'POST',
				url : '<?php echo admin_url('admin-ajax.php'); ?>',
				data : {
						'action' : 'bookingstatusupdate', 
						'Player_status' : Player_status,
						'bookid' : bookid
				},
				success: function (result) {
				if(result == '1'){ 
                    $('#successmassage').css('display','block');            
                }
            	return false;   
				}
								
			});

	});
}); 
</script>
<?php 
	//var_dump($product_id);
	foreach ($booking_data as $row){   
            
    ?><div id="myModal" class="modall">
    <!-- Modal content -->
    <div class="modall-content">
        <div class="row" style="background: #fafafa;margin-bottom: 20px;">
            <div class="col-md-10"><h3> Booking Details </h3></div>
            <div class="col-md-2"><span class="closee">&times;</span></div>
        </div>
		<div class="form-group row" style="background-color: #f7f7f7">
			<h3 style="margin-top: 0px; margin: 0px 15px;margin-bottom:20px;color: #428bca;padding-top: 12px;"> Payment Information </h3>
				<div class="row">
					<label class="col-md-4 col-form-label">Booking Date&time</label>			
					<label class="col-md-8 col-form-label"><?php echo $row->book_timestamp; ?></label>
				</div>
				<div class="row">
					<label class="col-md-4 col-form-label">Transaction ID</label>			
					<label class="col-md-8 col-form-label"><?php echo $row->stripe_id; ?></label>
				</div>
				<div class="row">
					<label class="col-md-4 col-form-label">Payment Status</label>
					<label class="col-md-8 col-form-label"><?php echo $row->booked_status; ?></label>
				</div>
				<div class="row">
					<label class="col-md-4 col-form-label">Name Of Card</label>			
					<label class="col-md-8 col-form-label"><?php echo $row->name_of_card; ?></label>
				</div>
		</div>
	<div class="form-group row">
		<h3 style="margin-top: 0px; margin: 0px 15px;margin-bottom:20px;color: #428bca;padding-top: 12px;"> Address Information </h3>
		<div class="row">
			<label class="col-md-4 col-form-label">Address</label>			
			<label class="col-md-8 col-form-label"><?php echo $row->addressline1; ?>,<?php echo $row->addressline2; ?></label>
		</div>
		<div class="row">
			<label class="col-md-4 col-form-label">City-Country</label>			
			<label class="col-md-8 col-form-label"><?php echo $row->city; ?>,<?php echo $row->country; ?></label>
		</div>
		<div class="row">
			<label class="col-md-4 col-form-label">Postcode</label>			
			<label class="col-md-8 col-form-label"><?php echo $row->postcode; ?></label>
		</div>
		<div class="row">
			<label class="col-md-4 col-form-label">Contact No</label>
			<label class="col-md-8 col-form-label"><?php echo $row->contact_no; ?></label>
		</div>
		<div class="row">
			<label class="col-md-4 col-form-label">Email Address</label>			
			<label class="col-md-8 col-form-label"><?php echo $row->emailaddress; ?></label>
		</div>
	</div>
	<div class="form-group row" style="padding: 20px 0px;background-color: #f7f7f7;">
			<div class="col-md-4"><button type="button" style="padding: 8px 19px;margin: 0px;"><a href="<?php echo home_url(); ?>/wp-admin/user-edit.php?user_id=<?php echo $row->user_id; ?>" style="text-decoration: none;color: black;"> View User Details</a></button></div>
			<div class="col-md-8">
			<form method="post" id="booingstatus">			
				<select class="mdb-select md-form" id="Bookingproductstatus">
					<option value="<?php echo $row->product_status; ?>"  selected><?php echo $row->product_status; ?></option>
					<option name="product_status" value="Pending">Pending</option>
					<option name="product_status" value="Payment Received">Payment Received</option>
					<option name="product_status" value="Product completed">Product completed</option>
					<option name="product_status" value="Did not appear">Did not appear</option>
				</select>
				<input type="hidden" id="mainid" value="<?php echo $booking_id;?>">
				<button type="button" id="submitstatus" class="btn btn-primary" style="padding: 6px 20px;font-size: 18px;">Submit Status</button>
		</form>
		<div class="alert alert-success alert-dismissible fade in" id="successmassage" style="display:none;margin: 20px 0px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Successfully!</strong> Updated Status..
        </div>
		</div>

		</div>			
    </div>
</div>
<?php } 
die();
?>
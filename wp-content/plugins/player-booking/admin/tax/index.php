<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
	$(document).ready(function() {
		$(".btn-pref .btn").click(function () {
			$(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
			// $(".tab").addClass("active"); // instead of this do the below 
			$(this).removeClass("btn-default").addClass("btn-primary");   
		});
    });
</script>

<script>
	$(document).ready(function() { 
	$('.well #tab1 #clcikeditlocation').click(function(){
	var taxid = $(this).val();

	jQuery.ajax({
    	type: 'POST',
    	url: '<?php echo admin_url('admin-ajax.php'); ?>',
    	data: {
			taxid:taxid,
        	action:'updatetax'
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
                <div class="hidden-xs">Tax Details</div>
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
        
				<table class="table table-hover" id="mytable">
				<thead>
				<tr>
					<th>NO </th>
					<th scope="col">Tax value</th>
					<th><th>
				</tr>
				</thead>
				<tbody>
				<?php 
					global $wpdb;
					$table_name = $wpdb->prefix . "tax";
					$location = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY tax_id desc" );
					//var_dump($location);
					$count = 0; 
					foreach ($location as $row){  $count++;?>
						<tr>
							<th scope="row"><?php echo $count ?></th>
							<td><?php echo $row->tax_value?></td>
							<td><button id="clcikeditlocation" value="<?php echo $row->tax_id ?>">Edit Tax</button></td>					
						</tr>
					<?php } ?>
				</tbody>
				</table>
				<div class="hereadd"></div>

        </div>
      </div>
    </div>
</div>
            
    
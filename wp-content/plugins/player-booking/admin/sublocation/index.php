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
$("#sublocationformsubmit").click(function () {

if($('#sublocation_active').is(":checked")){
$('#sublocation_active').attr("value","Yes");
}else{
$('#sublocation_active').attr("value","No");
}

sublocationname =$('#sublocation_name').val();
sublocationvanue =$('#sublocation_vanue').val();
sublocation_active =$('#sublocation_active').val();

if(sublocationname =='' || sublocationvanue ==''){

	if(sublocationname==''){
		$('#errorsublocationname').html('Please enter the SubLocation name'); 
		$('#errorsublocationname').css({"color": "red", "font-size": "18px"});    
	}else{
		$('#errorsublocationname').html('');
	}

    if(sublocationvanue==''){
		$('#errorsublocationvanue').html('Please enter the SubLocation vanue'); 
		$('#errorsublocationvanue').css({"color": "red", "font-size": "18px"});    
	}else{
		$('#errorsublocationvanue').html('');
	}

	//  if(sublocation_active=='No'){
	// 		$('#errorsublocationactive').html('Must be checked this box'); 
	// 		$('#errorsublocationactive').css({"color": "red", "font-size": "18px"});    
	// }else{
	// 		$('#errorsublocationactive').html('');
  // 	}
}else{

	jQuery.ajax({
    	type: 'POST',
    	url: '<?php echo admin_url('admin-ajax.php'); ?>',
    	data: {
			sublocationname:sublocationname,
            sublocationvanue:sublocationvanue,
			sublocation_active:sublocation_active,
       	 	action:'sublocationformcode'
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

<script>
	$(document).ready(function() { 
	$('.well #tab1 #updatesublocationbtn').click(function(){
	var sublocationid = $(this).val();

	jQuery.ajax({
    	type: 'POST',
    	url: '<?php echo admin_url('admin-ajax.php'); ?>',
    	data: {
			sublocationid:sublocationid,
        	action:'updatesublocationdata'
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
<!--  -->

<!------ Include the above in your HEAD tag ---------->

<div class="col-md-12 col-lg-12 col-sm-12">
    
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                <div class="hidden-xs">SubLocation Listing</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                <div class="hidden-xs">Add New Sublocation</div>
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
		  	<div class="col-md-6"><h3 style="margin: 0px;padding: 10px;">List of SubLocations</h3></div>
		  	<div class="col-md-6"> <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."></div>
		  </div>
				<table class="table table-hover" id="mytable">
				<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">SubLocation Name</th>
                    <th scope="col">SubLocation venue</th>
					<th scope="col">SubLocation active</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				<?php 
				global $wpdb;
				$table_name = $wpdb->prefix . "sublocation";
				$sublocation = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY sublocation_id desc" );
				//var_dump($sublocation);
				$count = 0; 
			 foreach ($sublocation as $row){  $count++;?>
					<tr>
						<th scope="row"><?php echo $count ?></th>
						<td><?php echo $row->sublocation_name?></td>
                        <td><?php echo $row->sublocation_vanue?></td>
						<td><?php echo $row->sublocation_active?></td>	
						<td><button id="updatesublocationbtn" value="<?php echo $row->sublocation_id?>">Edit Sublocation </button></td>					
					</tr>
					<?php } ?>
				</tbody>
				</table>
				<div class="hereadd"></div>
				<div id="light-pagination" class="pagination" style="justify-content: center;display: flex;"></div>

        </div>
        <div class="tab-pane fade in" id="tab2">
          <h3 style="margin-bottom:15px;">Create new Locaion</h3>
			<form id="location-form" method="post">
			<div class="form-group row">
				<label for="sublocation_name" class="col-sm-4 col-form-label">SubLocation Name</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" id="sublocation_name" placeholder="Name of SubLocation" required>
				<p id="errorsublocationname"></p>
				</div>
 			 </div>

              <div class="form-group row">
				<label for="sublocation_vanue" class="col-sm-4 col-form-label">SubLocation venue</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" id="sublocation_vanue" required>
				<p id="errorsublocationvanue"></p>
				</div>
 			 </div>
			  
			  <div class="form-group row">
				<label for="sublocation_active" class="col-sm-4 col-form-label">SubLocation Active/Inactive </label>
				<div class="col-sm-8">
				<input type="checkbox" class="form-control" id="sublocation_active" value="" required >
				<p id="errorsublocationactive"></p>
				</div>
 			 </div>
			
			<button type="button" class="btn btn-primary mb-2" id="sublocationformsubmit">Submit</button>
			
			</form>

			<div class="alert alert-success alert-dismissible fade in" id="successmassage" style="display:none;margin: 20px 0px;">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Successfully!</strong> Created SubLocation.
			</div>
        </div>
      </div>
    </div>
</div>
            
    
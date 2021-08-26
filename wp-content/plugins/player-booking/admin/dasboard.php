<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
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
	td1 = tr[i].getElementsByTagName("td")[1];
	
    if (td1) {
      txtValue = td1.textContent || td1.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

<!------ Include the above in your HEAD tag ---------->
<?php
if(isset($_REQUEST['action'])&& $_REQUEST['action']=='delete')
{		
	$result=wp_delete_user($_REQUEST['user_id']);
	if($result)
	{
		wp_redirect ( admin_url() . 'admin.php?page=gmgt_system&message=3');
	}
}
?>
<div class="col-md-12 col-lg-12 col-sm-12">
    
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                <div class="hidden-xs">Player Listing</div>
            </button>
        </div>
    </div>

        <div class="well">
      <div class="tab-content">
		<?php
		if(isset($_REQUEST['message']))
		{
			$message =$_REQUEST['message'];
			if($message == 3) 
			{
			?>
				<div class="alert_msg alert alert-success alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
						</button>
					 <?php _e('Player Deleted Successfully');?>
				</div>
			<?php
			}
		}
		?>		
        <div class="tab-pane fade in active" id="tab1">
		<div class="row">
		  	<div class="col-md-6"><h3 style="margin: 0px;padding: 10px;">List of Player</h3></div>
		  	<div class="col-md-6"> <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."></div>
		  </div>
				<table class="table table-hover" id="mytable">
				<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Username</th>
					<th scope="col">Name</th>
					<th scope="col">Email</th>					
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				<?php 
				$get_player = array('role' => 'Player','orderby' => 'ID', 'order' => 'DESC');
				$playerdata=get_users($get_player);
				
				$count = 0; 
				foreach ($playerdata as $row)
				{  
					$count++; ?>

					<tr>
						<th scope="row"><?php echo $count ?></th>
						<td><?php echo $row->user_login ?></td>
						<td><?php echo $row->first_name." ".$row->last_name ?></td>
						<td><?php echo $row->user_email ?></td>						
						<td>					
						<a href="<?php echo get_edit_user_link($row->ID); ?>" target='_blank' class="btn btn-info">Edit Player</a>	
						
						<a href="?page=gmgt_system&action=delete&user_id=<?php echo $row->ID;?>" onclick="return confirm('<?php _e('Are you sure you want to delete this player?');?>');" class="btn btn-danger">Delete Player</a>	
						</td>
					</tr>
					
					<?php } ?>
					</tbody>
				</table>
				<div class="hereadd"></div>
				<div id="light-pagination" class="pagination" style="justify-content: center;display: flex;"></div>

        </div>
      </div>
    </div>
</div>
            
    
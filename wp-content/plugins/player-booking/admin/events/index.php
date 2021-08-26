<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<script type="text/javascript">
// for weekly MON,tue,wen click,toggle,hide,show ..etc 
$(document).ready(function(){
			$('input[name="eventtype"]').click(function(){
				var inputValue = $(this).attr("value");
				if(inputValue == "onetime"){
					$('.onetime').css('display','block');
					$('.recurring').css('display','none');
				}
				if(inputValue == "recurring"){
					$('.onetime').css('display','none');
					$('.recurring').css('display','block');   
				}
			});
			// $('input[name="weekly[]"]').click(function() {
			// 			var daysvalue = $(this).attr("value");
			// 			$("." + daysvalue).toggle();
			// });
});
// For pagination show into event listing tab 
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
<!-- pagination end script-->

<!--  script for Search/filter Rows Automatically-->
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
<!-- script for disable past days to calender -->
<script>
	// past date disable to end date field
	$(function(){
    var dtToday = new Date();   
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;

    // or instead:
    // var maxDate = dtToday.toISOString().substr(0, 10);

   // alert(maxDate);
   // $('#EventEndDate').attr('min', maxDate);
	$('#Recuring-startdate').attr('min', maxDate);
	// $('#Recuring-endtdate').attr('min', maxDate);
	$('#Singledate').attr('min', maxDate);
		


	
});
</script>
<!-- event page custon jquery start -->
<script>
	$(document).ready(function() {
		$(".btn-pref .btn").click(function () {
			$(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
			// $(".tab").addClass("active"); // instead of this do the below 
			$(this).removeClass("btn-default").addClass("btn-primary");   
		});

		$("#Recuring-startdate").on("change", function(event) { 
			value= $(this).val();
			 $('#Recuring-endtdate').attr('min',value );
		} );


// for recurring day wise add slots code
		// monday  
		var uniqueId = 1;
		var getclassmonday =$('.weeklyslot').attr('name');
			$(function() {
				$('#duplicatedivformonday').click(function() {
					var copy = $("#copyforweeklyslot").clone(true);
					var formId = getclassmonday + uniqueId;
					copy.attr('id', formId );
					$('.Mainforweeklyslot').append(copy);
					$('#' + formId).find('input').each(function(){
						$(this).attr('id', $(this).attr('id') + uniqueId); 
					});
					$('#' + formId).find('input').each(function(){
						$(this).attr('name', $(this).attr('name') + uniqueId); 
					});
					$('#' + formId).find('span').each(function(){
						$(this).attr('id', $(this).attr('id') + uniqueId); 
					});
					uniqueId++;  
				});
			});

			var getclassOT =$('.ontimeslot').attr('name');
			$(function() {
				$('#duplicatedivforOT').click(function() {
					var copy = $("#copyforontimeslot").clone(true);
					var formId = getclassOT + uniqueId;
					copy.attr('id', formId );
					$('.Mainforontimeslot').append(copy);
					$('#' + formId).find('input').each(function(){
						$(this).attr('id', $(this).attr('id') + uniqueId); 
					});
					$('#' + formId).find('input').each(function(){
						$(this).attr('name', $(this).attr('name') + uniqueId); 
					});
					$('#' + formId).find('span').each(function(){
						$(this).attr('id', $(this).attr('id') + uniqueId); 
					});
					uniqueId++;  
				});
			});

		// 	//tuesday
		// 	var getclasstuesday =$('.Tuesday').attr('name');
		// 	$(function() {
		// 		$('#duplicatedivfortuesday').click(function() {
		// 			var copy = $("#copyfortuesday").clone(true);
		// 			var formId = getclasstuesday + uniqueId;
		// 			copy.attr('id', formId );
		// 			$('.Mainfortuesday').append(copy);
		// 			$('#' + formId).find('input').each(function(){
		// 				$(this).attr('id', $(this).attr('id') + uniqueId); 
		// 			});
		// 			uniqueId++;  
		// 		});
		// 	});
		// 	//wednesday
		// 	var getclasswednesday =$('.Wednesday').attr('name');
		// 	$(function() {
		// 		$('#duplicatedivforwednesday').click(function() {
		// 			var copy = $("#copyforwednesday").clone(true);
		// 			var formId = getclasswednesday + uniqueId;
		// 			copy.attr('id', formId );
		// 			$('.Mainforwednesday').append(copy);
		// 			$('#' + formId).find('input').each(function(){
		// 				$(this).attr('id', $(this).attr('id') + uniqueId); 
		// 			});
		// 			uniqueId++;  
		// 		});
		// 	});
		// 	//thursday
		// 	var getclassthursday =$('.Thursday').attr('name');
		// 	$(function() {
		// 		$('#duplicatedivforthursday').click(function() {
		// 			var copy = $("#copyforthursday").clone(true);
		// 			var formId = getclassthursday + uniqueId;
		// 			copy.attr('id', formId );
		// 			$('.Mainforthursday').append(copy);
		// 			$('#' + formId).find('input').each(function(){
		// 				$(this).attr('id', $(this).attr('id') + uniqueId); 
		// 			});
		// 			uniqueId++;  
		// 		});
		// 	});
		// 	//friday
		// 	var getclassfriday =$('.Friday').attr('name');
		// 	$(function() {
		// 		$('#duplicatedivforfriday').click(function() {
		// 			var copy = $("#copyforfriday").clone(true);
		// 			var formId = getclassfriday + uniqueId;
		// 			copy.attr('id', formId );
		// 			$('.Mainforfriday').append(copy);
		// 			$('#' + formId).find('input').each(function(){
		// 				$(this).attr('id', $(this).attr('id') + uniqueId); 
		// 			});
		// 			uniqueId++;  
		// 		});
		// 	});
		// 	//saturday
		// 	var getclasssaturday =$('.Saturday').attr('name');
		// 	$(function() {
		// 		$('#duplicatedivforsaturday').click(function() {
		// 			var copy = $("#copyforsaturday").clone(true);
		// 			var formId = getclasssaturday + uniqueId;
		// 			copy.attr('id', formId );
		// 			$('.Mainforsaturday').append(copy);
		// 			$('#' + formId).find('input').each(function(){
		// 				$(this).attr('id', $(this).attr('id') + uniqueId); 
		// 			});
		// 			uniqueId++;  
		// 		});
		// 	});
		// 	//sunday
		// 	var getclasssunday =$('.Sunday').attr('name');
		// 	$(function() {
		// 		$('#duplicatedivforsunday').click(function() {
		// 			var copy = $("#copyforsunday").clone(true);
		// 			var formId = getclasssunday + uniqueId;
		// 			copy.attr('id', formId );
		// 			$('.Mainforsunday').append(copy);
		// 			$('#' + formId).find('input').each(function(){
		// 				$(this).attr('id', $(this).attr('id') + uniqueId); 
		// 			});
		// 			uniqueId++;  
		// 		});
		// 	});
			
			
// 	end of days section duplicate fuctinality

// ajax Function for Event Page
	$("#eventformsubmit").click(function () {

			if($('#event_active').is(":checked")){
				$('#event_active').attr("value","Yes");
			}else{
				$('#event_active').attr("value","No");
			}
		
		eventsname = $("#events_name").val();
		const event_type = $('input[name="eventtype"]:checked').val();
		events_onetimedate =$('#Singledate').val();
		//default onetime value
		event_slot_fromtime = $('input[name="slotfromtime"]').val();
		event_slot_totime = $('.ontimeslot #copyforontimeslot input[name="slottotime"]').val();
		event_capacity = $('#onetimecapacity').val();
		//1st onetime slot value
		event_slot_fromtime1 = $('input[name="slotfromtime1"]').val();
		event_slot_totime1 = $('#ontimeslot1 input[name="slottotime1"]').val();
		event_capacity1 = $('#onetimecapacity1').val();
		//2nd onetime slot value
		event_slot_fromtime2 = $('input[name="slotfromtime2"]').val();
		event_slot_totime2 = $('#ontimeslot2 input[name="slottotime2"]').val();
		event_capacity2 = $('#onetimecapacity2').val();
		//3rd onetime slot value
		event_slot_fromtime3 = $('input[name="slotfromtime3"]').val();
		event_slot_totime3 = $('#ontimeslot3 input[name="slottotime3"]').val();
		event_capacity3 = $('#onetimecapacity3').val();
		//4th onetime slot value
		event_slot_fromtime4 = $('input[name="slotfromtime4"]').val();
		event_slot_totime4 = $('#ontimeslot4 input[name="slottotime4"]').val();
		event_capacity4 = $('#onetimecapacity4').val();
		//5th onetime slot value
		event_slot_fromtime5 = $('input[name="slotfromtime5"]').val();
		event_slot_totime5 = $('#ontimeslot5 input[name="slottotime5"]').val();
		event_capacity5 = $('#onetimecapacity5').val();

		event_active =$('#event_active').val();
		 
		

	// for Recurring type variable 
		var EventTypeRecurringDays = [];
        $('.weekDays-selector input[name="weekly[]"]:checked').each(function(i){
          EventTypeRecurringDays[i] = $(this).val();
        });
		recurringstartdate = $('input[name="recurringstartdate"]').val(); //recurring main from date
		recurringendtdate = $('input[name="recurringendtdate"]').val(); //recurring main To date

		recurringweeklyslotfromtime = $('input[name="recurringweeklyslotfromtime"]').val();
		recurringweeklyslottotime = $(' .weeklyslot #copyforweeklyslot input[name="recurringweeklyslottotime"]').val();
		recurringweeklyslotcapacity = $('#recurringweeklyslotcapacity').val();
// first slot value
		recurringweeklyslotfromtime1 = $('input[name="recurringweeklyslotfromtime1"]').val();
		recurringweeklyslottotime1 = $(' #weeklyslot1 input[name="recurringweeklyslottotime1"]').val();
		recurringweeklyslotcapacity1 = $('#recurringweeklyslotcapacity1').val();
//secondslot value
		recurringweeklyslotfromtime2 = $('input[name="recurringweeklyslotfromtime2"]').val();
		recurringweeklyslottotime2 = $(' #weeklyslot2 input[name="recurringweeklyslottotime2"]').val();
		recurringweeklyslotcapacity2 = $('#recurringweeklyslotcapacity2').val();
//3rd slot value
		recurringweeklyslotfromtime3 = $('input[name="recurringweeklyslotfromtime3"]').val();
		recurringweeklyslottotime3 = $(' #weeklyslot3 input[name="recurringweeklyslottotime3"]').val();
		recurringweeklyslotcapacity3 = $('#recurringweeklyslotcapacity3').val();
//4th slot value
		recurringweeklyslotfromtime4 = $('input[name="recurringweeklyslotfromtime4"]').val();
		recurringweeklyslottotime4 = $(' #weeklyslot4 input[name="recurringweeklyslottotime4"]').val();
		recurringweeklyslotcapacity4 = $('#recurringweeklyslotcapacity4').val();
//5th slot value
		recurringweeklyslotfromtime5 = $('input[name="recurringweeklyslotfromtime5"]').val();
		recurringweeklyslottotime5 = $(' #weeklyslot5 input[name="recurringweeklyslottotime5"]').val();
		recurringweeklyslotcapacity5 = $('#recurringweeklyslotcapacity5').val();
		
		// alert(EventTypeRecurringDays);
		// alert(recurringstartdate);
		// alert(recurringendtdate);
		// alert(recurringweeklyslotfromtime);
		// alert(recurringweeklyslottotime);
		// alert(recurringweeklyslotcapacity);
		//for monday get from and to date 
			//recurringmondayslotfromtime = $('input[name="recurringmondayslotfromtime"]').val();
			//recurringmondayslottotime = $('input[name="recurringmondayslottotime"]').val();
			//recurringmondaycapacity = $('#recurringmondaycapacity').val();

		//for Tuseday get from and to date 
			// recurringtuesdayslotfromtime = $('input[name="recurringtuesdayslotfromtime"]').val();
			// recurringtuesdayslottotime = $('input[name="recurringtuesdayslottotime"]').val();
			// recurringtuesdaycapacity = $('#recurringtuesdaycapacity').val();

		//for wednesday get from and to date 
			// recurringwednesdayslotfromtime = $('input[name="recurringwednesdayslotfromtime"]').val();
			// recurringwednesdayslottotime = $('input[name="recurringwednesdayslottotime"]').val();
			// recurringwednesdaycapacity = $('#recurringwednesdaycapacity').val();

		//for Thursday get from and to date 
			// recurringthursdayslotfromtime = $('input[name="recurringthursdayslotfromtime"]').val();
			// recurringthursdayslottotime = $('input[name="recurringthursdayslottotime"]').val();
			// recurringthursdaycapacity = $('#recurringthursdaycapacity').val();

		//for Friday get from and to date 
			// recurringfridayslotfromtime = $('input[name="recurringfridayslotfromtime"]').val();
			// recurringfridayslottotime = $('input[name="recurringfridayslottotime"]').val();
			// recurringfridaycapacity = $('#recurringfridaycapacity').val();

		//for Saturday get from and to date 
			// recurringsaturdayslotfromtime = $('input[name="recurringsaturdayslotfromtime"]').val();
			// recurringsaturdayslottotime = $('input[name="recurringsaturdayslottotime"]').val();
			// recurringsaturdaycapacity = $('#recurringsaturdaycapacity').val();

		//for Sunday get from and to date 
			// recurringsundayslotfromtime = $('input[name="recurringsundayslotfromtime"]').val();
			// recurringsundayslottotime = $('input[name="recurringsundayslottotime"]').val();
			// recurringsundaycapacity = $('#recurringsundaycapacity').val();

		if(eventsname =='' || $('input[name="eventtype"]:checked').length == 0  || event_type == "onetime" || event_type == "recurring" ){

			if(eventsname ==''){
				$('#erroreventname').html('Please enter the Event name'); 
				$('#erroreventname').css({"color": "red", "font-size": "18px"});    
			}else{
				$('#erroreventname').html('');
			}
			
			if($('input[name="eventtype"]:checked').length == 0){
				$('#erroeeventtype').html('Must be select Event type'); 
				$('#erroeeventtype').css({"color": "red", "font-size": "18px"}); 
			}else{
				$('#erroeeventtype').html('');
			}

		 	if(event_type == "onetime" ){

				if(events_onetimedate =='' || event_slot_fromtime=='' || event_slot_totime=='' || event_capacity=='' || event_slot_fromtime1=='' || event_slot_totime1=='' || event_capacity1=='' ||
				event_slot_fromtime2=='' || event_slot_totime2=='' || event_capacity2=='' || event_slot_fromtime3=='' || event_slot_totime3=='' || event_capacity3=='' ||
				event_slot_fromtime4=='' || event_slot_totime4=='' || event_capacity4=='' || event_slot_fromtime5=='' || event_slot_totime5=='' || event_capacity5==''
				){ 
							
							if(events_onetimedate==''){
								$('#errorsingledate').html('Please enter the Event date'); 
								$('#errorsingledate').css({"color": "red", "font-size": "18px"});    
							}else{
								$('#errorsingledate').html('');
							}
							// default validation for onetime event slots
							if(event_slot_fromtime==''){
								$('#errorslotfromtime').html('Please enter the Event from time'); 
								$('#errorslotfromtime').css({"color": "red", "font-size": "18px"});    
							}else{
								$('#errorslotfromtime').html('');
							}

							if(event_slot_totime==''){
								$('#errorslottotime').html('Please enter the Event to time'); 
								$('#errorslottotime').css({"color": "red", "font-size": "18px"});    
							}else{
								$('#errorslottotime').html('');
							}

							if(event_capacity==''){
								$('#erroronetimecapacity').html('Please enter the Event slot capacity'); 
								$('#erroronetimecapacity').css({"color": "red", "font-size": "18px"});    
							}else{
								$('#erroronetimecapacity').html('');
							}
							// 1st validation for onetime event slots
							if(event_slot_fromtime1==''){
								$('#errorslotfromtime1').html('Please enter the Event from time'); 
								$('#errorslotfromtime1').css({"color": "red", "font-size": "18px"});    
							}else{
								$('#errorslotfromtime1').html('');
							}

							if(event_slot_totime1==''){
								$('#errorslottotime1').html('Please enter the Event to time'); 
								$('#errorslottotime1').css({"color": "red", "font-size": "18px"});    
							}else{
								$('#errorslottotime1').html('');
							}

							if(event_capacity1==''){
								$('#erroronetimecapacity1').html('Please enter the Event slot capacity'); 
								$('#erroronetimecapacity1').css({"color": "red", "font-size": "18px"});    
							}else{
								$('#erroronetimecapacity1').html('');
							}
							// 2nd validation for onetime event slots
							if(event_slot_fromtime2==''){
								$('#errorslotfromtime2').html('Please enter the Event from time'); 
								$('#errorslotfromtime2').css({"color": "red", "font-size": "18px"});    
							}else{
								$('#errorslotfromtime2').html('');
							}

							if(event_slot_totime2==''){
								$('#errorslottotime2').html('Please enter the Event to time'); 
								$('#errorslottotime2').css({"color": "red", "font-size": "18px"});    
							}else{
								$('#errorslottotime2').html('');
							}

							if(event_capacity2==''){
								$('#erroronetimecapacity2').html('Please enter the Event slot capacity'); 
								$('#erroronetimecapacity2').css({"color": "red", "font-size": "18px"});    
							}else{
								$('#erroronetimecapacity2').html('');
							}
							// 3rd validation for onetime event slots
							if(event_slot_fromtime3==''){
								$('#errorslotfromtime3').html('Please enter the Event from time'); 
								$('#errorslotfromtime3').css({"color": "red", "font-size": "18px"});    
							}else{
								$('#errorslotfromtime3').html('');
							}

							if(event_slot_totime3==''){
								$('#errorslottotime3').html('Please enter the Event to time'); 
								$('#errorslottotime3').css({"color": "red", "font-size": "18px"});    
							}else{
								$('#errorslottotime3').html('');
							}

							if(event_capacity3==''){
								$('#erroronetimecapacity3').html('Please enter the Event slot capacity'); 
								$('#erroronetimecapacity3').css({"color": "red", "font-size": "18px"});    
							}else{
								$('#erroronetimecapacity3').html('');
							}
							// 4th validation for onetime event slots
							if(event_slot_fromtime4==''){
								$('#errorslotfromtime4').html('Please enter the Event from time'); 
								$('#errorslotfromtime4').css({"color": "red", "font-size": "18px"});    
							}else{
								$('#errorslotfromtime4').html('');
							}

							if(event_slot_totime4==''){
								$('#errorslottotime4').html('Please enter the Event to time'); 
								$('#errorslottotime4').css({"color": "red", "font-size": "18px"});    
							}else{
								$('#errorslottotime4').html('');
							}

							if(event_capacity4==''){
								$('#erroronetimecapacity4').html('Please enter the Event slot capacity'); 
								$('#erroronetimecapacity4').css({"color": "red", "font-size": "18px"});    
							}else{
								$('#erroronetimecapacity4').html('');
							}
							// 5th validation for onetime event slots
							if(event_slot_fromtime5==''){
								$('#errorslotfromtime5').html('Please enter the Event from time'); 
								$('#errorslotfromtime5').css({"color": "red", "font-size": "18px"});    
							}else{
								$('#errorslotfromtime5').html('');
							}

							if(event_slot_totime5==''){
								$('#errorslottotime5').html('Please enter the Event to time'); 
								$('#errorslottotime5').css({"color": "red", "font-size": "18px"});    
							}else{
								$('#errorslottotime5').html('');
							}

							if(event_capacity5==''){
								$('#erroronetimecapacity5').html('Please enter the Event slot capacity'); 
								$('#erroronetimecapacity5').css({"color": "red", "font-size": "18px"});    
							}else{
								$('#erroronetimecapacity5').html('');
							}

					}else{
					jQuery.ajax({
						type: 'POST',
						url: '<?php echo admin_url('admin-ajax.php'); ?>',
						data: {
							events_name:eventsname,
							event_type:event_type,
							events_onetimedate:events_onetimedate,
							// default slot values
							event_slot_fromtime:event_slot_fromtime,
							event_slot_totime:event_slot_totime,
							event_capacity:event_capacity,
							//1st slot value
							event_slot_fromtime1:event_slot_fromtime1,
							event_slot_totime1:event_slot_totime1,
							event_capacity1:event_capacity1,
							//2nd slot value
							event_slot_fromtime2:event_slot_fromtime2,
							event_slot_totime2:event_slot_totime2,
							event_capacity2:event_capacity2,
							//3rd slot value
							event_slot_fromtime3:event_slot_fromtime3,
							event_slot_totime3:event_slot_totime3,
							event_capacity3:event_capacity3,
							//4th slot value
							event_slot_fromtime4:event_slot_fromtime4,
							event_slot_totime4:event_slot_totime4,
							event_capacity4:event_capacity4,
							//5th slot value
							event_slot_fromtime5:event_slot_fromtime5,
							event_slot_totime5:event_slot_totime5,
							event_capacity5:event_capacity5,

							event_active:event_active,
							action:'eventformsubmit'
						},
						success: function(result)
						{
							//alert(result);
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

				}
				if(event_type == "recurring"){
					
					if(recurringstartdate =="" || recurringendtdate == "" ||  EventTypeRecurringDays == "" || recurringweeklyslotfromtime=='' || recurringweeklyslottotime =='' || recurringweeklyslotcapacity =='' ||
					recurringweeklyslotfromtime1=='' || recurringweeklyslottotime1 =='' || recurringweeklyslotcapacity1 =='' || recurringweeklyslotfromtime2=='' || recurringweeklyslottotime2 =='' || recurringweeklyslotcapacity2 =='' ||
					recurringweeklyslotfromtime3=='' || recurringweeklyslottotime3 =='' || recurringweeklyslotcapacity3 =='' || recurringweeklyslotfromtime4=='' || recurringweeklyslottotime4 =='' || recurringweeklyslotcapacity4 =='' ||
					recurringweeklyslotfromtime5=='' || recurringweeklyslottotime5 =='' || recurringweeklyslotcapacity5 ==''
					){ 
					 
						if(recurringstartdate == ''){
							$('#erroerecurringFRomdaet').html('Please enter Start date for Recurring'); 
							$('#erroerecurringFRomdaet').css({"color": "red", "font-size": "18px"});
						}else{
							$('#erroerecurringFRomdaet').html('');	
						} 

						if(recurringendtdate == ''){
							$('#erroerecurringEnddaet').html('Please enter End date for Recurring'); 
							$('#erroerecurringEnddaet').css({"color": "red", "font-size": "18px"});
						}else{
							$('#erroerecurringEnddaet').html('');
						} 
						
						if(EventTypeRecurringDays==''){
							$('#errorweekdays').html('You must be select Week days.'); 
							$('#errorweekdays').css({"color": "red", "font-size": "18px"});   
						}else{
							$('#errorweekdays').html('');
						}
					// default timeslot validation
 						if(recurringweeklyslotfromtime==''){
							$('#errorweeklyslotfromtime').html('Please enter Recurring Slots FromTime'); 
							$('#errorweeklyslotfromtime').css({"color": "red", "font-size": "18px"});    
						}else{
							$('#errorweeklyslotfromtime').html('');
						}

						if(recurringweeklyslottotime==''){
							$('#errorweeklyslottotime').html('Please enter Recurring Slots ToTime'); 
							$('#errorweeklyslottotime').css({"color": "red", "font-size": "18px"});    
						}else{
							$('#errorweeklyslottotime').html('');
						}

						if(recurringweeklyslotcapacity==''){
							$('#errorweeklyslotcapacity').html('PLease Enter Recurring Slot Capacity'); 
							$('#errorweeklyslotcapacity').css({"color": "red", "font-size": "18px"});    
						}else{
							$('#errorweeklyslotcapacity').html('');
						}
						// 1st time slot validation
						if(recurringweeklyslotfromtime1==''){
							$('#errorweeklyslotfromtime1').html('Please enter Recurring Slots FromTime'); 
							$('#errorweeklyslotfromtime1').css({"color": "red", "font-size": "18px"});    
						}else{
							$('#errorweeklyslotfromtime1').html('');
						}

						if(recurringweeklyslottotime1==''){
							$('#errorweeklyslottotime1').html('Please enter Recurring Slots ToTime'); 
							$('#errorweeklyslottotime1').css({"color": "red", "font-size": "18px"});    
						}else{
							$('#errorweeklyslottotime1').html('');
						}

						if(recurringweeklyslotcapacity1==''){
							$('#errorweeklyslotcapacity1').html('PLease Enter Recurring Slot Capacity'); 
							$('#errorweeklyslotcapacity1').css({"color": "red", "font-size": "18px"});    
						}else{
							$('#errorweeklyslotcapacity1').html('');
						}
						// 2nd time slot validation
						if(recurringweeklyslotfromtime2==''){
							$('#errorweeklyslotfromtime2').html('Please enter Recurring Slots FromTime'); 
							$('#errorweeklyslotfromtime2').css({"color": "red", "font-size": "18px"});    
						}else{
							$('#errorweeklyslotfromtime2').html('');
						}

						if(recurringweeklyslottotime2==''){
							$('#errorweeklyslottotime2').html('Please enter Recurring Slots ToTime'); 
							$('#errorweeklyslottotime2').css({"color": "red", "font-size": "18px"});    
						}else{
							$('#errorweeklyslottotime2').html('');
						}

						if(recurringweeklyslotcapacity2==''){
							$('#errorweeklyslotcapacity2').html('PLease Enter Recurring Slot Capacity'); 
							$('#errorweeklyslotcapacity2').css({"color": "red", "font-size": "18px"});    
						}else{
							$('#errorweeklyslotcapacity2').html('');
						}
						// 3rd time slot validation
						if(recurringweeklyslotfromtime3==''){
							$('#errorweeklyslotfromtime3').html('Please enter Recurring Slots FromTime'); 
							$('#errorweeklyslotfromtime3').css({"color": "red", "font-size": "18px"});    
						}else{
							$('#errorweeklyslotfromtime3').html('');
						}

						if(recurringweeklyslottotime3==''){
							$('#errorweeklyslottotime3').html('Please enter Recurring Slots ToTime'); 
							$('#errorweeklyslottotime3').css({"color": "red", "font-size": "18px"});    
						}else{
							$('#errorweeklyslottotime3').html('');
						}

						if(recurringweeklyslotcapacity3==''){
							$('#errorweeklyslotcapacity3').html('PLease Enter Recurring Slot Capacity'); 
							$('#errorweeklyslotcapacity3').css({"color": "red", "font-size": "18px"});    
						}else{
							$('#errorweeklyslotcapacity3').html('');
						}
						// 4th time slot validation
						if(recurringweeklyslotfromtime4==''){
							$('#errorweeklyslotfromtime4').html('Please enter Recurring Slots FromTime'); 
							$('#errorweeklyslotfromtime4').css({"color": "red", "font-size": "18px"});    
						}else{
							$('#errorweeklyslotfromtime4').html('');
						}

						if(recurringweeklyslottotime4==''){
							$('#errorweeklyslottotime4').html('Please enter Recurring Slots ToTime'); 
							$('#errorweeklyslottotime4').css({"color": "red", "font-size": "18px"});    
						}else{
							$('#errorweeklyslottotime4').html('');
						}

						if(recurringweeklyslotcapacity4==''){
							$('#errorweeklyslotcapacity4').html('PLease Enter Recurring Slot Capacity'); 
							$('#errorweeklyslotcapacity4').css({"color": "red", "font-size": "18px"});    
						}else{
							$('#errorweeklyslotcapacity4').html('');
						}
						// 5th time slot validation
						if(recurringweeklyslotfromtime5==''){
							$('#errorweeklyslotfromtime5').html('Please enter Recurring Slots FromTime'); 
							$('#errorweeklyslotfromtime5').css({"color": "red", "font-size": "18px"});    
						}else{
							$('#errorweeklyslotfromtime5').html('');
						}

						if(recurringweeklyslottotime5==''){
							$('#errorweeklyslottotime5').html('Please enter Recurring Slots ToTime'); 
							$('#errorweeklyslottotime5').css({"color": "red", "font-size": "18px"});    
						}else{
							$('#errorweeklyslottotime5').html('');
						}

						if(recurringweeklyslotcapacity5==''){
							$('#errorweeklyslotcapacity5').html('PLease Enter Recurring Slot Capacity'); 
							$('#errorweeklyslotcapacity5').css({"color": "red", "font-size": "18px"});    
						}else{
							$('#errorweeklyslotcapacity5').html('');
						}

					}else{
					jQuery.ajax({
						type: 'POST',
						url: '<?php echo admin_url('admin-ajax.php'); ?>',
						data: {
							events_name:eventsname,
							event_type:event_type,
							Recurringstartdate:recurringstartdate,
							Recurringenddate:recurringendtdate,
							Recuringdays:EventTypeRecurringDays,
							ReciringslotFromtime:recurringweeklyslotfromtime,
							Recurringslottotime:recurringweeklyslottotime,
							Recurringslotcapacity:recurringweeklyslotcapacity,
							// 1st slot value
							ReciringslotFromtime1:recurringweeklyslotfromtime1,
							Recurringslottotime1:recurringweeklyslottotime1,
							Recurringslotcapacity1:recurringweeklyslotcapacity1,
							// 2nd Slot value
							ReciringslotFromtime2:recurringweeklyslotfromtime2,
							Recurringslottotime2:recurringweeklyslottotime2,
							Recurringslotcapacity2:recurringweeklyslotcapacity2,
							//3rd slot value
							ReciringslotFromtime3:recurringweeklyslotfromtime3,
							Recurringslottotime3:recurringweeklyslottotime3,
							Recurringslotcapacity3:recurringweeklyslotcapacity3,
							// 4th slot value
							ReciringslotFromtime4:recurringweeklyslotfromtime4,
							Recurringslottotime4:recurringweeklyslottotime4,
							Recurringslotcapacity4:recurringweeklyslotcapacity4,
							//5thslot value
							ReciringslotFromtime5:recurringweeklyslotfromtime5,
							Recurringslottotime5:recurringweeklyslottotime5,
							Recurringslotcapacity5:recurringweeklyslotcapacity5,

							event_active:event_active,
							action:'eventformsubmit'
						},
						success: function(result)
						{
							alert(result);
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
				}
						// else if(EventTypeRecurringDays=='Monday'){ //for Monday Specific validation

						// 		if(recurringmondayslotfromtime==''){
						// 			$('#errormondayfromtime').html('Please enter Slots From Time'); 
						// 			$('#errormondayfromtime').css({"color": "red", "font-size": "18px"});    
						// 		}else{
						// 			$('#errormondayfromtime').html('');
						// 		}

						// 		if(recurringmondayslottotime==''){
						// 			$('#errormondaytotime').html('Please enter Slots To Time'); 
						// 			$('#errormondaytotime').css({"color": "red", "font-size": "18px"});    
						// 		}else{
						// 			$('#errormondaytotime').html('');
						// 		}

						// 		if(recurringmondaycapacity==''){
						// 			$('#errormondaycapacity').html('PLease Enter Slot capacity'); 
						// 			$('#errormondaycapacity').css({"color": "red", "font-size": "18px"});    
						// 		}else{
						// 			$('#errormondaycapacity').html('');
						// 		}

						// }else if(EventTypeRecurringDays=='Tuesday'){ //for Monday Specific validation
						// 		if(recurringtuesdayslotfromtime==''){
						// 			$('#errortuesdayfromtime').html('Please enter Slots From Time'); 
						// 			$('#errortuesdayfromtime').css({"color": "red", "font-size": "18px"});    
						// 		}else{
						// 			$('#errortuesdayfromtime').html('');
						// 		}

						// 		if(recurringtuesdayslottotime==''){
						// 			$('#errortuesdaytotime').html('Please enter Slots To Time'); 
						// 			$('#errortuesdaytotime').css({"color": "red", "font-size": "18px"});    
						// 		}else{
						// 			$('#errortuesdaytotime').html('');
						// 		}

						// 		if(recurringtuesdaycapacity==''){
						// 			$('#errortuesdaycapacity').html('PLease Enter Slot capacity'); 
						// 			$('#errortuesdaycapacity').css({"color": "red", "font-size": "18px"});    
						// 		}else{
						// 			$('#errortuesdaycapacity').html('');
						// 		}

						// }else if(EventTypeRecurringDays=='Wednesday'){ //for Wednesday Specific validation

						// 		if(recurringwednesdayslotfromtime==''){
						// 			$('#errorwednesdayfromtime').html('Please enter Slots From Time'); 
						// 			$('#errorwednesdayfromtime').css({"color": "red", "font-size": "18px"});    
						// 		}else{
						// 			$('#errorwednesdayfromtime').html('');
						// 		}

						// 		if(recurringwednesdayslottotime==''){
						// 			$('#errorwednesdaytotime').html('Please enter Slots To Time'); 
						// 			$('#errorwednesdaytotime').css({"color": "red", "font-size": "18px"});    
						// 		}else{
						// 			$('#errorwednesdaytotime').html('');
						// 		}

						// 		if(recurringwednesdaycapacity==''){
						// 			$('#errorwednesdaycapacity').html('PLease Enter Slot capacity'); 
						// 			$('#errorwednesdaycapacity').css({"color": "red", "font-size": "18px"});    
						// 		}else{
						// 			$('#errorwednesdaycapacity').html('');
						// 		}

						// }else if(EventTypeRecurringDays=='Thursday'){ //for Thursday Specific validation

						// 		if(recurringthursdayslotfromtime==''){
						// 			$('#errorthursdayfromtime').html('Please enter Slots From Time'); 
						// 			$('#errorthursdayfromtime').css({"color": "red", "font-size": "18px"});    
						// 		}else{
						// 			$('#errorthursdayfromtime').html('');
						// 		}

						// 		if(recurringthursdayslottotime==''){
						// 			$('#errorthursdaytotime').html('Please enter Slots To Time'); 
						// 			$('#errorthursdaytotime').css({"color": "red", "font-size": "18px"});    
						// 		}else{
						// 			$('#errorthursdaytotime').html('');
						// 		}

						// 		if(recurringthursdaycapacity==''){
						// 			$('#errorthursdaycapacity').html('PLease Enter Slot capacity'); 
						// 			$('#errorthursdaycapacity').css({"color": "red", "font-size": "18px"});    
						// 		}else{
						// 			$('#errorthursdaycapacity').html('');
						// 		}

						// 	}else if(EventTypeRecurringDays=='Friday'){ //for friday Specific validation

						// 			if(recurringfridayslotfromtime==''){
						// 				$('#errorfridayfromtime').html('Please enter Slots From Time'); 
						// 				$('#errorfridayfromtime').css({"color": "red", "font-size": "18px"});    
						// 			}else{
						// 				$('#errorfridayfromtime').html('');
						// 			}

						// 			if(recurringfridayslottotime==''){
						// 				$('#errorfridaytotime').html('Please enter Slots To Time'); 
						// 				$('#errorfridaytotime').css({"color": "red", "font-size": "18px"});    
						// 			}else{
						// 				$('#errorfridaytotime').html('');
						// 			}

						// 			if(recurringfridaycapacity==''){
						// 				$('#errorfridaycapacity').html('PLease Enter Slot capacity'); 
						// 				$('#errorfridaycapacity').css({"color": "red", "font-size": "18px"});    
						// 			}else{
						// 				$('#errorfridaycapacity').html('');
						// 			}

						// 		}else if(EventTypeRecurringDays=='Saturday'){ //for Saturday Specific validation

						// 				if(recurringsaturdayslotfromtime==''){
						// 					$('#errorsaturdayfromtime').html('Please enter Slots From Time'); 
						// 					$('#errorsaturdayfromtime').css({"color": "red", "font-size": "18px"});    
						// 				}else{
						// 					$('#errorsaturdayfromtime').html('');
						// 				}

						// 				if(recurringsaturdayslottotime==''){
						// 					$('#errorsaturdaytotime').html('Please enter Slots To Time'); 
						// 					$('#errorsaturdaytotime').css({"color": "red", "font-size": "18px"});    
						// 				}else{
						// 					$('#errorsaturdaytotime').html('');
						// 				}

						// 				if(recurringsaturdaycapacity==''){
						// 					$('#errorsaturdaycapacity').html('PLease Enter Slot capacity'); 
						// 					$('#errorsaturdaycapacity').css({"color": "red", "font-size": "18px"});    
						// 				}else{
						// 					$('#errorsaturdaycapacity').html('');
						// 				}

						// 			}else if(EventTypeRecurringDays=='Sunday'){ //for Sunday Specific validation

						// 				if(recurringsundayslotfromtime==''){
						// 					$('#errorsundayfromtime').html('Please enter Slots From Time'); 
						// 					$('#errorsundayfromtime').css({"color": "red", "font-size": "18px"});    
						// 				}else{
						// 					$('#errorsundayfromtime').html('');
						// 				}

						// 				if(recurringsundayslottotime==''){
						// 					$('#errorsundaytotime').html('Please enter Slots To Time'); 
						// 					$('#errorsundaytotime').css({"color": "red", "font-size": "18px"});    
						// 				}else{
						// 					$('#errorsundaytotime').html('');
						// 				}

						// 				if(recurringsundaycapacity==''){
						// 					$('#errorsundaycapacity').html('PLease Enter Slot capacity'); 
						// 					$('#errorsundaycapacity').css({"color": "red", "font-size": "18px"});    
						// 				}else{
						// 					$('#errorsundaycapacity').html('');
						// 				}

	 			
				
		}		
		
		});
	});
</script>


<script>
	$(document).ready(function() { 
	$('.well #tab1 #clcikeditevent').click(function(){
	var updateeventid = $(this).val();

	jQuery.ajax({
    	type: 'POST',
    	url: '<?php echo admin_url('admin-ajax.php'); ?>',
    	data: {
			updateeventid:updateeventid,
        	action:'updateeventdata'
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
<!--  end OF custom Script code-->

<div class="col-md-12 col-lg-12 col-sm-12">
    
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                <div class="hidden-xs">Events Listing</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                <div class="hidden-xs">Add New Events</div>
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
		  	<div class="col-md-6"><h3 style="margin: 0px;padding: 10px;">List of Events</h3></div>
		  	<div class="col-md-6"> <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."></div>
		  </div>
				<table class="table table-hover" id="mytable">
				<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Event Name</th>
					<th scope="col">Event Type</th>
					<th scope="col">Event date</th>
					<th scope="col">Event active</th>
					<th><th>
				</tr>
				</thead>
				<tbody>
				<?php 
					global $wpdb;
					$table_name = $wpdb->prefix . "event";
					$event = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY event_id desc" );
					//var_dump($event);
					$count = 0; 
					foreach ($event as $row){ $typename=$row->event_type; $count++;?>
						<tr>
							<th scope="row"><?php echo $count ?></th>
							<td><?php echo $row->event_name?></td>
							<td><?php echo $row->event_type?></td>
							<td><?php if($typename == "onetime"){ $eventdateE=strtotime($row->event_date); echo date("d-m-Y",$eventdateE); }elseif($typename == "recurring"){
									$table_names = $wpdb->prefix . "recurring_event_info";
									$eventdate = $wpdb->get_results( "SELECT * FROM $table_names WHERE event_id=$row->event_id" );
										foreach($eventdate as $rowssss){
										?><b>Start Date:- </b><?php $startdateE=strtotime($rowssss->startdate); echo date("d-m-Y",$startdateE); ?><br><b>End Date:- </b><?php $enddateE=strtotime($rowssss->enddate); echo date("d-m-Y",$enddateE); 	}
							} ?></td>
							<td><?php echo $row->event_active?></td>	
							<td><button id="clcikeditevent" value="<?php echo $row->event_id ?>">Edit Event</button></td>					
						</tr>
					<?php } ?>
				</tbody>
				</table>
				<div class="hereadd"></div>

				<div id="light-pagination" class="pagination" style="justify-content: center;display: flex;"></div>
        </div>
        <div class="tab-pane fade in" id="tab2">
          <h3 style="margin-bottom:15px;">Create new Events</h3>
			<form id="event-form" method="post">
			<div class="form-group row">
				<label for="events_name" class="col-sm-4 col-form-label">Events Name</label>
				<div class="col-sm-8">
					<input type="text" name="events_name" class="form-control" id="events_name"  placeholder="Name of Event">
					<p id="erroreventname"></p>
				</div>
 			 </div>
			  
			  <div class="form-group row">
				<label for="eventtype" class="col-sm-4 col-form-label">Event Type </label>
				<div class="col-sm-8">
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="eventtype" id="onetimeevent" value="onetime">
						<label class="form-check-label" for="onetimeevent"> One Time Event </label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="eventtype" id="recurringevent" value="recurring">
						<label class="form-check-label" for="recurringevent">Recurring Event</label>
					</div>
				<p id="erroeeventtype"></p>
					<div class="row onetime" id="onetime" style="display:none;background-color: #fafafa; padding: 15px 0px;margin: 10px 0px;">
						<div class="col-md-12" style="margin-bottom: 15px;">
							<label for="Singledate">Select date</label>
							<input type="date" id="Singledate" name="singledate">
							<p id="errorsingledate"></p>
						</div>

						<div class="ontimeslot" name="ontimeslot" style="background-color: #eeeeee;margin: 40px 15px 0px 15px;">
								<h4 style="text-align: center;padding: 17px 0px;color: #428bca;"> One-Time Slots </h4>
								<div class="Mainforontimeslot">
									<div id="copyforontimeslot">
										<div class="col-md-12" style="margin-bottom: 15px;">
											<label for="slotfromtime">From time</label>
											<input type="time" id="slotfromtime" name="slotfromtime"><span id="errorslotfromtime"></span>
											<label for="slottotime">To time</label>
											<input type="time" id="slottotime" name="slottotime"><span id="errorslottotime"></span>
											<label for="onetimecapacity">Capacity </label>
											<input type="number" min="0" max="10000000" height="30px" id="onetimecapacity"><span id="erroronetimecapacity"></span>
										</div>
									</div>
								</div>	
								<button id="duplicatedivforOT" style="padding: 5px 10px;margin: 10px 0px 15px 15px;">Add More Slots</button>			
						</div>
					</div>
					<div class="row recurring" id="recurring" style="display:none;background-color: #fafafa; padding: 15px 0px;margin: 10px 0px;">
						<div class="col-md-12" style="margin-bottom: 15px;">
							<label for="Recuring-startdate">Start date</label>
							<input type="date" id="Recuring-startdate" name="recurringstartdate"><p id="erroerecurringFRomdaet"></p>
							<label for="Recuring-endtdate">End date</label>
							<input type="date" id="Recuring-endtdate" name="recurringendtdate"><p id="erroerecurringEnddaet"></p>
						</div>
						<div class="col-md-12">
							<div class="weekDays-selector">
								<input type="checkbox" id="weekday-mon" class="weekday" name="weekly[]" value="Monday" />
								<label for="weekday-mon">Mon</label>
								<input type="checkbox" id="weekday-tue" class="weekday" name="weekly[]" value="Tuesday" />
								<label for="weekday-tue">Tue</label>
								<input type="checkbox" id="weekday-wed" class="weekday"  name="weekly[]" value="Wednesday" />
								<label for="weekday-wed">Wen</label>
								<input type="checkbox" id="weekday-thu" class="weekday" name="weekly[]" value="Thursday"/>
								<label for="weekday-thu">Thu</label>
								<input type="checkbox" id="weekday-fri" class="weekday" name="weekly[]" value="Friday"/>
								<label for="weekday-fri">Fri</label>
								<input type="checkbox" id="weekday-sat" class="weekday" name="weekly[]" value="Saturday"/>
								<label for="weekday-sat">Sat</label>
								<input type="checkbox" id="weekday-sun" class="weekday" name="weekly[]" value="Sunday"/>
								<label for="weekday-sun">Sun</label>
							</div>
							<p id="errorweekdays">

							<div class="weeklyslot" name="weeklyslot" style="background-color: #eeeeee;margin: 15px 0px;">
								<h4 style="text-align: center;padding: 17px 0px;color: #428bca;"> Recurring TimeSlot </h4>
								<div class="Mainforweeklyslot">
									<div id="copyforweeklyslot">
										<div class="col-md-12">
											<label for="recurringweeklyslotfromtime">Slot From time</label>
											<input type="time" id="recurringweeklyslotfromtime" name="recurringweeklyslotfromtime"><span id="errorweeklyslotfromtime"></span>
											<label for="recurringweeklyslottotime"> Slot To time</label>
											<input type="time" id="recurringweeklyslottotime" name="recurringweeklyslottotime"><span id="errorweeklyslottotime"></span>
											<label for="recurringweeklyslotcapacity">Capacity </label>
											<input type="number" min="0" max="10000000" height="30px" id="recurringweeklyslotcapacity" required><span id="errorweeklyslotcapacity"></span>
										</div>
									</div>
								</div>	
								<button id="duplicatedivformonday" style="padding: 5px 10px;margin: 10px 0px 15px 15px;">Add More Slots</button>			
							</div>

							<!-- Monday Recurring Section -->
						<!-- <div class="Monday selectt" name="monday" style="background-color: #eeeeee;margin: 15px 0px;">
								
								<div class="Mainformonday">
									<div id="copyformonday">
										<div class="col-md-12">
											<label for="recurringmondayslotfromtime">Slot From time</label>
											<input type="time" id="recurringmondayslotfromtime" name="recurringmondayslotfromtime"><p id="errormondayfromtime"></p>
											<label for="recurringmondayslottotime"> Slot To time</label>
											<input type="time" id="recurringmondayslottotime" name="recurringmondayslottotime"><p id="errormondaytotime"></p>
											<label for="recurringmondaycapacity">Capacity </label>
											<input type="number" min="0" max="10000000" height="30px" id="recurringmondaycapacity" required><p id="errormondaycapacity"></p>
										</div>
									</div>
					
						</div> -->
						
						<!-- Tuesday Recurring Section -->
						<!-- <div class="Tuesday selectt" name="tuesday" style="background-color: #eeeeee;margin: 15px 0px;">
								<h4 style="text-align: center;padding: 17px 0px;color: #428bca;"> Tuesday Recurring </h4>
								<div class="Mainfortuesday">
									<div id="copyfortuesday">
										<div class="col-md-12">
									
											<label for="recurringtuesdayslotfromtime">Slot From time</label>
											<input type="time" id="recurringtuesdayslotfromtime" name="recurringtuesdayslotfromtime"><p id="errortuesdayfromtime"></p>
											<label for="recurringtuesdayslottotime"> Slot To time</label>
											<input type="time" id="recurringtuesdayslottotime" name="recurringtuesdayslottotime"><p id="errortuesdaytotime"></p>
											<label for="recurringtuesdaycapacity">Capacity </label>
											<input type="number" min="0" max="10000000" height="30px" id="recurringtuesdaycapacity" required><p id="errortuesdaycapacity"></p>
										</div>
									</div>
								</div><button id="duplicatedivfortuesday" style="padding: 5px 10px;margin: 10px 0px 15px 15px;">Add More Slots</button>				
						</div> -->
						<!-- Wednesday Recurring Section -->
						<!-- <div class="Wednesday selectt" name="wednesday" style="background-color: #eeeeee;margin: 15px 0px;">
								<h4 style="text-align: center;padding: 17px 0px;color: #428bca;"> Wednesday Recurring </h4>
								<div class="Mainforwednesday">
									<div id="copyforwednesday">
										<div class="col-md-12">
									
											<label for="recurringwednesdayslotfromtime">Slot From time</label>
											<input type="time" id="recurringwednesdayslotfromtime" name="recurringwednesdayslotfromtime"><p id="errorwednesdayfromtime"></p>
											<label for="recurringwednesdayslottotime"> Slot To time</label>
											<input type="time" id="recurringwednesdayslottotime" name="recurringwednesdayslottotime"><p id="errorwednesdaytotime"></p>
											<label for="recurringwednesdaycapacity">Capacity </label>
											<input type="number" min="0" max="10000000" height="30px" id="recurringwednesdaycapacity" required><p id="errorwednesdaycapacity"></p>
										</div>
									</div>
								</div><button id="duplicatedivforwednesday" style="padding: 5px 10px;margin: 10px 0px 15px 15px;">Add More Slots</button>				
						</div> -->
						<!-- Thursday Recurring Section -->
						<!-- <div class="Thursday selectt" name="thursday" style="background-color: #eeeeee;margin: 15px 0px;">
								<h4 style="text-align: center;padding: 17px 0px;color: #428bca;"> Thursday Recurring </h4>
								<div class="Mainforthursday">
									<div id="copyforthursday">
										<div class="col-md-12">
									
											<label for="recurringthursdayslotfromtime">Slot From time</label>
											<input type="time" id="recurringthursdayslotfromtime" name="recurringthursdayslotfromtime"><p id="errorthursdayfromtime"></p>
											<label for="recurringthursdayslottotime"> Slot To time</label>
											<input type="time" id="recurringthursdayslottotime" name="recurringthursdayslottotime"><p id="errorthursdaytotime"></p>
											<label for="recurringthursdaycapacity">Capacity </label>
											<input type="number" min="0" max="10000000" height="30px" id="recurringthursdaycapacity" required><p id="errorthursdaycapacity"></p>
										</div>
									</div>
								</div><button id="duplicatedivforthursday" style="padding: 5px 10px;margin: 10px 0px 15px 15px;">Add More Slots</button>				
						</div> -->
						<!-- Friday Recurring Section -->
						<!-- <div class="Friday selectt" name="friday" style="background-color: #eeeeee;margin: 15px 0px;">
								<h4 style="text-align: center;padding: 17px 0px;color: #428bca;"> Friday Recurring </h4>
								<div class="Mainforfriday">
									<div id="copyforfriday">
										<div class="col-md-12">
									
											<label for="recurringfridayslotfromtime">Slot From time</label>
											<input type="time" id="recurringfridayslotfromtime" name="recurringfridayslotfromtime"><p id="errorfridayfromtime"></p>
											<label for="recurringfridayslottotime"> Slot To time</label>
											<input type="time" id="recurringfridayslottotime" name="recurringfridayslottotime"><p id="errorfridaytotime"></p>
											<label for="recurringfridaycapacity">Capacity </label>
											<input type="number" min="0" max="10000000" height="30px" id="recurringfridaycapacity" required><p id="errorfridaycapacity"></p>
										</div>
									</div>
								</div><button id="duplicatedivforfriday" style="padding: 5px 10px;margin: 10px 0px 15px 15px;">Add More Slots</button>				
						</div> -->
						<!-- Saturday Recurring Section -->
						<!-- <div class="Saturday selectt" name="saturday" style="background-color: #eeeeee;margin: 15px 0px;">
								<h4 style="text-align: center;padding: 17px 0px;color: #428bca;"> Saturday Recurring </h4>
								<div class="Mainforsaturday">
									<div id="copyforsaturday">
										<div class="col-md-12">
									
											<label for="recurringsaturdayslotfromtime">Slot From time</label>
											<input type="time" id="recurringsaturdayslotfromtime" name="recurringsaturdayslotfromtime"><p id="errorsaturdayfromtime"></p>
											<label for="recurringsaturdayslottotime"> Slot To time</label>
											<input type="time" id="recurringsaturdayslottotime" name="recurringsaturdayslottotime"><p id="errorsaturdaytotime"></p>
											<label for="recurringsaturdaycapacity">Capacity </label>
											<input type="number" min="0" max="10000000" height="30px" id="recurringsaturdaycapacity" required><p id="errorsaturdaycapacity"></p>
										</div>
									</div>
								</div><button id="duplicatedivforsaturday" style="padding: 5px 10px;margin: 10px 0px 15px 15px;">Add More Slots</button>				
						</div> -->
						<!-- Sunday Recurring Section -->
						<!-- <div class="Sunday selectt" name="sunday" style="background-color: #eeeeee;margin: 15px 0px;">
								<h4 style="text-align: center;padding: 17px 0px;color: #428bca;"> Sunday Recurring </h4>
								<div class="Mainforsunday">
									<div id="copyforsunday">
										<div class="col-md-12">
									
											<label for="recurringsundayslotfromtime">Slot From time</label>
											<input type="time" id="recurringsundayslotfromtime" name="recurringsundayslotfromtime"><p id="errorsundayfromtime"></p>
											<label for="recurringsundayslottotime"> Slot To time</label>
											<input type="time" id="recurringsundayslottotime" name="recurringsundayslottotime"><p id="errorsundaytotime"></p>
											<label for="recurringsundaycapacity">Capacity </label>
											<input type="number" min="0" max="10000000" height="30px" id="recurringsundaycapacity" required><p id="errorsundaycapacity"></p>
										</div>
									</div>
								</div><button id="duplicatedivforsunday" style="padding: 5px 10px;margin: 10px 0px 15px 15px;">Add More Slots</button>				
						</div> -->


						</div>
					</div>
				
				</div>
				
 			 </div>

			  <div class="form-group row">
				<label for="event_active" class="col-sm-4 col-form-label">Event Active/Inactive (If yes then checked the box)</label>
				<div class="col-sm-8">
				<input type="checkbox" class="form-control" id="event_active" required value="">
				<p id="erroreventactive"></p>
				</div>
 			 </div>
			<button type="button" class="btn btn-primary mb-2" id="eventformsubmit">Submit</button>
			
			</form>

			<div class="alert alert-success alert-dismissible fade in" id="successmassage" style="display:none;margin: 20px 0px;">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Successfully!</strong> Created Event.
			</div>
        </div>
      </div>
    </div>
</div>


            
    
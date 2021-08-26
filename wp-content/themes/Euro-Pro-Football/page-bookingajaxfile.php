<?php 
global $wpdb;

$productname=$_POST['productname'];
$productid=$_POST['productid'];

$locationid=$_POST['locationid'];
$subloccationid=$_POST['sublocatioid'];

//echo $productid;
?>  
<div class="col-md-12">
<label style="display: block;margin-top:20px; padding-bottom:2rem; height:100%;">PLEASE SELECT A TRIAL LOCATION BELOW:</label>
</div>
<div class="form-row mt-4" id="loctnmain" >  

<?php 
if($productid){
    $table_name = $wpdb->prefix . "mapping";
    $productname = $wpdb->get_results( "SELECT * FROM $table_name WHERE product_id=$productid AND mapping_active='Yes' " );
    $array_location=array();
    foreach ( $productname as $forech){  
            array_push($array_location,ucfirst($forech->location_id));
    }
    $array_location_1 = array_unique($array_location);
    
    // $array_mappingid=array();
    // foreach ( $productname as $forech){  
    //         array_push($array_mappingid,ucfirst($forech->mapping_id));
    // }
    // $array_mapping_1 = array_unique($array_location);
    foreach($array_location_1 as $row){
                $table_name1 = $wpdb->prefix . "location";
                $mappingsss = $wpdb->get_results( "SELECT * FROM $table_name1 WHERE location_id = $row AND location_active='Yes'" );
                // if(empty($mappingsss)){
                //     echo'<h1>Hello User, </h1> <p>Welcome to {$name}</p>';
                // }else{
                    foreach ($mappingsss as $sss){  ?>
                   
                    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="btn-group mr-2 mb-md-0 mb-3 w-100">
                        <button id="fatchoption" class="btn btn-transparent dropdown-toggle w-100 locks"  type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" locationid="<?php echo $sss->location_id; ?>" ><?php echo $sss->location_name; ?><span class = "caret"><img src="/wp-content/uploads/2021/06/Path-28.png" alt=""></span></button>
                        <div class="dropdown-menu">
                    
                        <!-- <select class="form-control" id="fatchoption"> -->
                            <!-- <option value="" disabled selected hidden locationid="<?php// echo $sss->location_id; ?>" class="locks sel<?php// echo $sss->location_id; ?>" ><?php// echo $sss->location_name; ?></option> -->
                        <?php
                        $table_name2 = $wpdb->prefix . "mapping";
                        $sublocationnames = $wpdb->get_results( "SELECT sublocation_id FROM $table_name2 WHERE product_id=$productid AND location_id=$sss->location_id AND mapping_active='Yes'"); 
                        $array_sublocationlocation=array();
                            foreach ( $sublocationnames as $forechss){  
                                    array_push($array_sublocationlocation,ucfirst($forechss->sublocation_id));
                            }
                            $array_sublocationlocation_1 = array_unique($array_sublocationlocation);

                        foreach($array_sublocationlocation_1 as $sublockslist){
                            $table_namessss = $wpdb->prefix . "sublocation";
                            $sublocation = $wpdb->get_results( "SELECT * FROM $table_namessss WHERE sublocation_id = $sublockslist AND sublocation_active='Yes'" );
                           ?> 
                                   <?php foreach($sublocation as $fnllll){?> 
                                        <a class="dropdown-item sublocks" id=<?php echo $id;?> select="selected" value="<?php echo $sss->location_name;?>(<?php echo $fnllll->sublocation_name?>)" locationid="<?php echo $sss->location_id;?>" locationname="<?php echo $sss->location_name;?>" sublocationid="<?php echo $fnllll->sublocation_id;?>" sublocationname="<?php echo $fnllll->sublocation_name;?>" sublocationvanue="<?php echo $fnllll->sublocation_vanue?>" mappingid="<?php echo $sublockslist->mapping_id;?>" > <b><?php echo $fnllll->sublocation_name?></b><br><?php echo $fnllll->sublocation_vanue?> </a>
                                       
                                         <!-- <option name="sublocationlist" class="sublocks" value="<?php// echo $fnllll->sublocation_name?>" locationid="<?php// echo $sss->location_id;?>" sublocationid="<?php// echo $fnllll->sublocation_id;?>"><?php// echo $fnllll->sublocation_name?><?php  ?></option> -->
                                   <?php }
                             ?> <?php
                        } ?>
</div>

</div>
                        <!-- </select> -->
                    </div>
<?php } 
    } 

}

?></div><p id="locationerro"></p>
<script>
jQuery(document).ready(function(jQuery){ 

    $('.dropdown-menu a').click(function(){ 

        var ProductID = $('input[name=productselect]:checked').val();
        var Productname = $('input[name=productselect]').attr('selectedname');
        var Productprice = $('input[name=productselect]').attr('productprice');
        
        var locationid = $(this).attr('locationid');
        var locationname=$(this).attr('locationname');

        var sublocationid = $(this).attr('sublocationid');
        var sublocationname = $(this).attr('sublocationname');
        var sublocationvanue = $(this).attr('sublocationvanue');

        var mappingid=$(this).attr('mappingid');
        var gettextforbutton =$(this).attr('value');
        $('.dropdown-menu a').removeClass('backoptioncolor');
        $(this).addClass('backoptioncolor');
        $('.dropdown-menu a').parents().children('#fatchoption').removeClass('yellowbackground');
    $(this).parents().children('#fatchoption').addClass('yellowbackground');

        $('#addlocationdatafromajax').attr({"locationid": locationid,"locationname":locationname, "sublocationid": sublocationid,"sublocationname":sublocationname,"sublocationvanue":sublocationvanue,"productid":ProductID, "productname":Productname,"productprice":Productprice,"mappingid":mappingid});
        
        // EventIbfo desplay
        $('#getEventinfo').html('<div class="col-md-12" style=" text-transform: uppercase;"><p>Sub Location : '+sublocationname+'</p><p>Venue : '+sublocationvanue+'</p></div>');


        // locationid = $(this).attr("locationid");
        // sublocationid = $(this).attr("sublocationid");
        $.ajax({
                beforeSend: function(){
                },
                type :'POST',
                url : '<?php echo admin_url('admin-ajax.php'); ?>',
                data : {
                        'action' : 'callin', 
                        'productid' : ProductID,
                        'locationid': locationid,
                        'sublocatioid':sublocationid
                },
                success: function (result) {
                     //alert(JSON.stringify(valsarray3));
                     //alert(result);
                  //   $(".product-block").remove();
                    // $(".Paggggggiiiiiination").remove();
                     $("#addonclick").html(result);    
                     //$("#ajax-loader").hide();
                    // console.log('fgd', result);
                },
                error: function(err){
                     //just for test - error (you can remove it later)
                     //console.log(err);
                     //console.log(choices);
                   //  $("#ajax-loader").hide();
                    // console.log('ee', err);

                },
                complete:function(data){
                    // Hide image container
                   // jQuery('#myUL li').css('display', 'none');
                   // $("#ajax-loader").hide();
                   // console.log('ds', data);
                   
                //    console.log(locationid);
                //     console.log(sublocationid);
                }
                             
            });
    });

});
</script>
<?php

die();
?>


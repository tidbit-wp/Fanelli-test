<?php 

/*
* Custom Page For Register Player
*/
get_header();?>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

  <section class="contact-section pt-8 pb-8">
   <div class="container">
      <div class="contact-title profile-title">
          <h1 class="text-uppercase "> <span><img class="img-fluid star" src="/wp-content/uploads/2021/06/Euro-Pro-Star.png" alt="star"></span>CREATE PLAYER PROFILE</h1>
      </div>
    
<form id="CreateProfile" class="top-space" method="post" autocomplete="off"> 
  <div class="col-md-12">
  <label>FULL NAME</label>
  </div>
   <div class="form-row">
    <div class="form-group col-md-6">
      <input type="text" class="form-control" id="PlayerFirstName" placeholder="First Name">
      <p id="errorPlayerFirstName"></p>
    </div>
    <div class="form-group col-md-6">
      <input type="text" class="form-control" id="PlayerLastName" placeholder="Last Name">
      <p id="errorPlayerLastName"></p>
    </div>
  </div>  
  <div class="form-row">
  <div class="form-group col-md-12">
    <label>Email address</label>
    <input type="email" class="form-control" id="playeremailaddress" required  placeholder="Enter email">
    <p id="errorplayeremailaddress"></p>
  </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-6">
    <label>AGE</label>
      <input type="text" class="form-control" id="PlayerAge" placeholder="Age">
      <p id="errorPlayerAge"></p>
    </div>
  </div>
 
   <div class="form-row">
    <div class="form-group col-md-6">
    <label style="display:block;">DATE OF BIRTH</label>
      <input type="date" class="form-control" id="PlayerDateOfBirth" placeholder="00/00/0000">
      <p id="errorPlayerDateOfBirth"></p>
    </div>
  </div> 

    <div class="radio-btns chck">
      <div class="col-md-12">
        <label style="display: block;">STRONGEST FOOT</label>
      </div>
    <div class="form-row">
  <div class="form-group col-md-4">
<label class="radio-inline"><input type="radio" name="StrongestFoot" value="Left"><span class="checkmark"></span><span class="radio-text radio-text-inline ">Left</span></label>
</div>
  <div class="form-group col-md-4">
  <label class="radio-inline"><input type="radio" name="StrongestFoot" value="Right"><span class="checkmark"></span><span class="radio-text radio-text-inline">Right</span></label>

  </div>
  <div class="form-group col-md-4">
  <label class="radio-inline"><input type="radio" name="StrongestFoot" value="Both"><span class="checkmark"></span><span class="radio-text radio-text-inline">Both</span></label>

  </div>
</div>
<p id="errorStrongestFoot"></p>
    </div>


    <div class="form-row">
      <label style="display: block;margin-top:20px;">CURRENT PLAYING POSITION</label>
    </div>
    <div class="form-group csel">
    <select class="form-control" id="Position1">
    <option value="" disabled selected hidden>Position 1</option>
    <option name="playingpossition1" value="Goal Keeper">Goal Keeper</option>
    <option name="playingpossition1" value="Left Back">Left Back</option>
    <option name="playingpossition1" value="Left Wing">Left Wing</option>
    <option name="playingpossition1" value="Right Back">Right Back</option>
    <option name="playingpossition1" value="Right Wing Back">Right Wing Back</option>
    <option name="playingpossition1" value="Centre Back">Centre Back</option>
    <option name="playingpossition1" value="Left Midfield">Left Midfield</option>
    <option name="playingpossition1" value="Right Midfield">Right Midfield</option>
    <option name="playingpossition1" value="Central Defensive Midfield">Central Defensive Midfield</option>
    <option name="playingpossition1" value="Central Midfield">Central Midfield</option>
    <option name="playingpossition1" value="Central Attacking Midfield">Central Attacking Midfield</option>
    <option name="playingpossition1" value="Left Wing/Forward">Left Wing/Forward</option>
    <option name="playingpossition1" value="Centre Forward">Centre Forward</option>
    <option name="playingpossition1" value="Right Wing/Forwardr">Right Wing/Forward</option>
    <option name="playingpossition1" value="N/A">N/A</option>
    </select>
    <p id="errorplayingpossition1" style="display:none;"></p>
    <select class="form-control" id="Position2">
    <option value="" disabled selected hidden>Position 2</option>
    <option name="playingpossition2" value="Goal Keeper">Goal Keeper</option>
    <option name="playingpossition2" value="Left Back">Left Back</option>
    <option name="playingpossition2" value="Left Wing">Left Wing</option>
    <option name="playingpossition2" value="Right Back">Right Back</option>
    <option name="playingpossition2" value="Right Wing Back">Right Wing Back</option>
    <option name="playingpossition2" value="Centre Back">Centre Back</option>
    <option name="playingpossition2" value="Left Midfield">Left Midfield</option>
    <option name="playingpossition2" value="Right Midfield">Right Midfield</option>
    <option name="playingpossition2" value="Central Defensive Midfield">Central Defensive Midfield</option>
    <option name="playingpossition2" value="Central Midfield">Central Midfield</option>
    <option name="playingpossition2" value="Central Attacking Midfield">Central Attacking Midfield</option>
    <option name="playingpossition2" value="Left Wing/Forward">Left Wing/Forward</option>
    <option name="playingpossition2" value="Centre Forward">Centre Forward</option>
    <option name="playingpossition2" value="Right Wing/Forwardr">Right Wing/Forward</option>
    <option name="playingpossition2" value="N/A">N/A</option>
    </select>
    <p id="errorplayingpossition2" style="display:none;"></p>
    <select class="form-control" id="Position3">
    <option value="" disabled selected hidden>Position 3</option>
    <option name="playingpossition3" value="Goal Keeper">Goal Keeper</option>
    <option name="playingpossition3" value="Left Back">Left Back</option>
    <option name="playingpossition3" value="Left Wing">Left Wing</option>
    <option name="playingpossition3" value="Right Back">Right Back</option>
    <option name="playingpossition3" value="Right Wing Back">Right Wing Back</option>
    <option name="playingpossition3" value="Centre Back">Centre Back</option>
    <option name="playingpossition3" value="Left Midfield">Left Midfield</option>
    <option name="playingpossition3" value="Right Midfield">Right Midfield</option>
    <option name="playingpossition3" value="Central Defensive Midfield">Central Defensive Midfield</option>
    <option name="playingpossition3" value="Central Midfield">Central Midfield</option>
    <option name="playingpossition3" value="Central Attacking Midfield">Central Attacking Midfield</option>
    <option name="playingpossition3" value="Left Wing/Forward">Left Wing/Forward</option>
    <option name="playingpossition3" value="Centre Forward">Centre Forward</option>
    <option name="playingpossition3" value="Right Wing/Forwardr">Right Wing/Forward</option>
    <option name="playingpossition3" value="N/A">N/A</option>
    </select>
    <p id="errorplayingpossition3" style="display:none;"></p>

  </div>
  
<div class="mt-2">
<div class="form-row">
  <label>Current Playing Level (minimum requirement - School Team)</label>
</div>
</div>
    
<div class="row checkbox-btns">
  <div class=" pl-0 pr-0 col-md-4">
    <label class="form-check-label">
      <input type="checkbox" class="form-control" name="playinglavel" id="PayerPlayinglavel" value="School Team"><span class="checkmarks">School Team
    </label>
  </div>

  <div class=" pl-0 pr-0 col-md-4">
    <label class="form-check-label">
      <input type="checkbox" class="form-control" name="playinglavel" id="PayerPlayinglavel" value="Sunday Team"><span class="checkmarks">Sunday Team
    </label>
  </div>

  <div class=" pl-0 pr-0 col-md-4">
    <label class="form-check-label">
      <input type="checkbox" class="form-control" name="playinglavel" id="PayerPlayinglavel" value="Saturday Team"><span class="checkmarks">Saturday Team
    </label>
  </div>

  <div class=" pl-0 pr-0 col-md-4">
    <label class="form-check-label">
      <input type="checkbox" class="form-control" name="playinglavel" id="PayerPlayinglavel" value="District Team"><span class="checkmarks">District Team
    </label>
  </div>

  <div class=" pl-0 pr-0 col-md-4">
    <label class="form-check-label">
      <input type="checkbox" class="form-control" name="playinglavel" id="PayerPlayinglavel" value="County Team"><span class="checkmarks">County Team
    </label>
  </div>

  <div class="pl-0 pr-0 col-md-4">
    <label class="form-check-label">
      <input type="checkbox" class="form-control" name="playinglavel" id="PayerPlayinglavel" value="County Team"><span class="checkmarks">Grass Roots Academy 
    </label>
  </div>

  <p id="errorPayerPlayinglavel"></p>
</div>
<p id="errorplayinglavel"></p>
<div class="form-row">
  <label>Name OF LEAGUE (IF APPLICABLE)</label>
</div>
  <div class="form-row league-name">
    <div class="form-group pl-0 pr-0 col-md-4">
      <p id="errorschoolleague"></p>
      <input type="text" class="form-control league"  name="schoolleague" id="schoolleague" placeholder="Name of School" autocomplete="new-password">
    </div>
    <div class="form-group pl-0 pr-0 col-md-4">
      <p id="errorSundayClubname"></p>
      <input type="text" class="form-control league"  name="SundayClubname" id="SundayClubname"  placeholder="Sunday Club Team Name">
    </div>
    <div class="form-group pl-0 pr-0 col-md-4">
      <p id="errorSaturdayClubTeamName"></p>
      <input type="text" class="form-control league"  name="SaturdayClubTeam" id="SaturdayClubTeamName" placeholder="Saturday Club Team Name ">
    </div>
    <div class="form-group pl-0 pr-0 col-md-4">
      <input type="text" class="form-control league" name="nameofdistrictteam" id="nameofDistteam" placeholder="Name of District">
      <p id="errornameofDistteam"></p>
    </div>
    <div class="form-group pl-0 pr-0 col-md-4">
      <input type="text" class="form-control league" name="countryteamname" id="Countryteamname" placeholder="Name of County ">
      <p id="errorCountryteamname"></p>
    </div>
    <div class="form-group pl-0 pr-0 col-md-4">
      <input type="text" class="form-control league" name="grassRootteamname" id="grassrootacademyname" placeholder="Grass Roots Academy Name">
      <p id="errorgrassrootacademyname"></p>
    </div>
  </div>  
  <div class="form-group">
    <div class="mt-5">
    <div class="form-row">
    <label class="division-label">DIVISION OF LEAGUE(IF APPLICABLE)</label>
    </div>
    </div>
    <input type="text" class="form-control" id="divisionOfLeague" aria-describedby="emailHelp" placeholder="DiVISION..">
    <p id="errordivisionOfLeague"></p>
  </div>
  <div class="form-group">
    <div class="form-row">
    <label>Which Team do You Support?</label>
    </div>
    <input type="text" class="form-control Cptext" id="Teamsupport"  aria-describedby="emailHelp" placeholder="I support..">
    <p id="errorTeamsupport"></p>
  </div>
  <div class="form-group">
    <div class="form-row">
      <label>Who is Your Favourite Player?</label>
    </div>
    <input type="text" class="form-control Cptext" id="Favouriteplayer"  aria-describedby="emailHelp" placeholder="My favorite player is..">
    <p id="errorFavouriteplayer"></p>
  </div>
  <div class="form-group">
    <div class="form-row">
    <label>Which Player Do You Aspire To Be? </label>
    </div>
    <input type="text" class="form-control Cptext" id="aspirePlayer"  aria-describedby="emailHelp" placeholder="I aspire to be like..">
    <p id="erroraspirePlayer"></p>
  </div>
  <div class="form-row">
  <label>Players size (for kit) (<a href="" data-toggle="modal" data-target="#myModal--effect-zoomIn">Please see size here</a>)</label>
  </div>
  <div class="modal fade" id="myModal--effect-zoomIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               
            </div>
            <div class="modal-body">
               <img width="100%" src="/wp-content/uploads/2021/07/image001-1.png" alt="" />
            </div>
           
         </div>
      </div>
   </div>
<div class="form-row kit-size league-name">
    <div class="form-group pl-0 pr-0  col-md-6">
      <p id="erroePlayerheight"></p>
      <input type="text" class="form-control league lheight" id="Playerheight" placeholder="Height ">
    </div>
    <!-- <div class="form-group pl-0 pr-0  col-md-6">
      <p id="errorchestsize"></p>
    <select class="form-control league" id="Playerchestsize">
    <option value="" disabled selected hidden>Chest size</option>
    <option name="chestsize" value='35"-37" (89 cm - 94 cm)'>35"-37" (89 cm - 94 cm)</option>
    <option name="chestsize" value='38"-40" (95 cm - 102 cm)'>38"-40" (95 cm - 102 cm)</option>
    <option name="chestsize" value='41"-43" (103 cm - 109 cm)'>41"-43" (103 cm - 109 cm)</option>
    <option name="chestsize" value='44"-46" (110 cm - 117 cm)'>44"-46" (110 cm - 117 cm)</option>
    <option name="chestsize" value='47"-49" (118 cm - 124 cm)'>47"-49" (118 cm - 124 cm)</option>
    <option name="chestsize" value='50"-53" (125 cm - 135 cm)'>50"-53" (125 cm - 135 cm)</option>
    </select>
    </div> -->
    <div class="form-group pl-0 pr-0  col-md-6">
      <p id="errorchestsize"></p>
    <select class="form-control league" id="Playerchestsize">
    <option value="" disabled selected hidden>Chest size</option>
    <option name="chestsize" value='13 / 33 (in/cm)'>13 / 33 (in/cm)</option>
    <option name="chestsize" value='14 / 36 (in/cm)'>14 / 36 (in/cm)</option>
    <option name="chestsize" value='16 / 41 (in/cm)'>16 / 41 (in/cm)</option>
    <option name="chestsize" value='17 / 44 (in/cm)'>17 / 44 (in/cm)</option>
    <option name="chestsize" value='19 / 48 (in/cm)'>19 / 48 (in/cm)</option>
    <option name="chestsize" value='21 / 52 (in/cm)'>21 / 52 (in/cm)</option>
    <option name="chestsize" value='22 / 56 (in/cm)'>22 / 56 (in/cm)</option>
    <option name="chestsize" value='24 / 60 (in/cm)'>24 / 60 (in/cm)</option>
    <option name="chestsize" value='25 / 63 (in/cm)'>25 / 63 (in/cm)</option>
    <option name="chestsize" value='27 / 66 (in/cm)'>27 / 66 (in/cm)</option>
    </select>
    </div>
    <!-- <div class="form-group pl-0 pr-0  col-md-6">
    <select class="form-control league" id="waistsize">
    <option value="" disabled selected hidden>Waist size</option>
    <option name="westsize" value='29"-31" (74 cm - 79 cm)'>29"-31" (74 cm - 79 cm)</option>
    <option name="westsize" value='32"-34" (80 cm - 86 cm)'>32"-34" (80 cm - 86 cm)</option>
    <option name="westsize" value='35"-36" (87 cm - 91 cm)'>35"-36" (87 cm - 91 cm)</option>
    <option name="westsize" value='44"-46" (110 cm - 117 cm)'>44"-46" (110 cm - 117 cm)</option>
    <option name="westsize" value='39"-40" (98 cm - 102 cm)'>39"-40" (98 cm - 102 cm)</option>
    <option name="westsize" value='41"-43" (103 cm - 109 cm)'>41"-43" (103 cm - 109 cm)</option>
    </select>
    <p id="errorwestsize"></p>
    </div> -->
    <div class="form-group pl-0 pr-0  col-md-6">
    <select class="form-control league" id="waistsize">
    <option value="" disabled selected hidden>Waist size</option>
    <option name="westsize" value='4XS'>4XS</option>
    <option name="westsize" value='3XS'>3XS</option>
    <option name="westsize" value='XXS'>XXS</option>
    <option name="westsize" value='XS'>XS</option>
    <option name="westsize" value='Small'>Small</option>
    <option name="westsize" value='Medium'>Medium</option>
    <option name="westsize" value='Large'>Large</option>
    <option name="westsize" value='XL'>Xl</option>
    <option name="westsize" value='XXL'>XXL</option>
    <option name="westsize" value='3XL'>3XL</option>
    </select>
    <p id="errorwestsize"></p>
    </div>
    <!-- <div class="form-group pl-0 pr-0  col-md-6">
    <select class="form-control league" id="PlayerFootsize">
    <option value="" disabled selected hidden>FOOT SIZE</option>
    <option name="footzize" value="5">5</option>
    <option name="footzize" value="6">6</option>
    <option name="footzize" value="7">7</option>
    <option name="footzize" value="8">8</option>
    <option name="footzize" value="9">9</option>
    <option name="footzize" value="10">10</option>
    <option name="footzize" value="11">11</option>
    </select>
    <p id="errorfootzize"></p>
    </div> -->
    <div class="form-group pl-0 pr-0  col-md-6">
    <select class="form-control league" id="PlayerFootsize">
    <option value="" disabled selected hidden>FOOT SIZE</option>
    <option name="footzize" value="2">2</option>
    <option name="footzize" value="3">3</option>
    <option name="footzize" value="4">4</option>
    <option name="footzize" value="5">5</option>
    <option name="footzize" value="6">6</option>
    <option name="footzize" value="7">7</option>
    <option name="footzize" value="8">8</option>
    <option name="footzize" value="9">9</option>
    <option name="footzize" value="10">10</option>
    <option name="footzize" value="11">11</option>
    </select>
    <p id="errorfootzize"></p>
    </div>
  </div>  
</section>

<section class="parent-information">
<div class="container">
      <div class="contact-title parent-title about-title">
          <h1 class="text-uppercase "> <span><img class="img-fluid star" src="/wp-content/uploads/2021/06/Euro-Pro-Star.png" alt="star"></span>PARENT/GUARDIAN DETAILS:</h1>
      </div>
  <div class="col-md-12">
  <label>FULL NAME</label>
  </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <input type="text" class="form-control" id="parentfirstname" placeholder="First Name">
        <p id="errorparentfirstname"></p>
      </div>
      <div class="form-group col-md-6">
        <input type="text" class="form-control" id="parentlastname" placeholder="Last Name">
        <p id="errorparentlastname"></p>
      </div>
    </div>  

    <div class="form-group col-md-12">
      <label>Email address</label>
      <input type="email" class="form-control" id="parentemailaddress" style="text-transform:lowercase" required placeholder="Enter email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
      <p id="errorparentemailaddress"></p>
    </div>
    <div class="form-group col-md-12">
      <label>Contact Number <span class="text-lowercase">(to be used as Emergency Contact )</span> </label>
      <input type="text"  class="form-control" id="parentconactno" name="parentphone" placeholder="01234 567890">
      <p id="errorparentconactno"></p>
    </div>

    <div class="col-md-12">
    <label>ADDRESS</label>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <input type="text" class="form-control pname" id="propertyname" placeholder="PROPERTY NAME/NUMBER">
      <p id="errorpropertyname"></p>
      </div>
      <div class="form-group col-md-12">
        <input type="text" class="form-control" id="addressline1" placeholder="ADDRESS LINE 1">
      <p id="erroraddressline1"></p>
      </div>
      <div class="form-group col-md-12">
        <input type="text" class="form-control" id="addressline2" placeholder="ADDRESS LINE 2">
      <p id="erroraddressline2"></p>
      </div>
      <div class="form-group col-md-6">
        <input type="text" class="form-control" id="towncity" placeholder="TOWN /CITY ">
      <p id="errortowncity"></p>
      </div>
      <div class="form-group col-md-6">
        <input type="text" class="form-control" id="country" placeholder="COUNTRY">
      <p id="errorcountry"></p>
      </div>
      <div class="form-group col-md-12">
        <input type="text" class="form-control pname" id="postcode" placeholder="POSTCODE">
      <p id="errorpostcode"></p>
      </div>
    </div>
   <div class="col-md-12">
   <label>USER NAME</label>
   </div>
    
      <div class="form-group">
        <div class="col-md-12">
        <input type="text" class="form-control pname" id="playerusername" placeholder="USERNAME">
        <p id="errorplayerusername"></p>
        </div>
      </div>
   

      
    
   <div class="col-md-12">
   <label>PASSWORD</label>
   </div>
      <div class="form-group">
     <div class="col-md-12">
     <input type="password" class="form-control pname" id="playerpassword" placeholder="PASSWORD" >
      <p id="errorplayerpassword"></p>
     </div>
      </div>
      <div class="form-group">
      <div class="col-md-12">
      <input type="password" class="form-control pname" id="playerconfirmpassword" placeholder="CONFIRM PASSWORD" >
      <p id="errorplayerconfirmpassword"></p>
      <p id="commonerror-msg"></p>
      </div>
     
      </div>
  

    <div class="col-md-12">
    <label>How Did You Hear About Euro Pro Football</label>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
      <select class="form-control" id="didyouhearabout">
      <option value="" disabled selected hidden>PLEASE PICK A SUBJECT </option>
      <option name="hearaboutepf" value="WORD OF MOUTH">WORD OF MOUTH</option>
      <option name="hearaboutepf" value="THROUGHT OUR INSTGRAM"> THROUGH OUR INSTAGRAM</option>
      <option name="hearaboutepf" value="THROUGHT OUR FACEBOOK">THROUGH OUR FACEBOOK</option>
      <option name="hearaboutepf" value="THROUGH GOOGLE">GOOGLE SEARCH</option>
      <option name="hearaboutepf" value="Via RECOMMENDATION">Via RECOMMENDATION</option>
      </select>
      <p id="errorhearaboutepf"></p>
      </div>
      </div>
</div>
</section>
<section class="medical-information m-label">

<div class="container">
      <div class="contact-title medical-title about-title">
          <h1 class="text-uppercase "> <span><img class="img-fluid star" src="/wp-content/uploads/2021/06/Euro-Pro-Star.png" alt="star"></span>Medial Information</h1>
      </div>

<div class="col-md-12">
<label style="display: block;">Is the player receiving any type of medical treatment whatsoever?</label>
</div>
<div class="form-row mtreat ">
  <div class="form-group mb-3 pl-0 pr-0 col-md-6"><label class="radio-inline"><input type="radio" class="form-control" name="Recivemedicaltreatment" value="Yes"> <span class="checkmark"></span><span class="radio-text">Yes</span></label>
  </div>
  <div class="form-group  mb-3 pl-0 pr-0 col-md-6"><label class="radio-inline"><input type="radio" class="form-control" name="Recivemedicaltreatment" value="No" > <span class="checkmark"></span><span class="radio-text">No</span></label></div>
</div>
<p id="errorRecivemedicaltreatment"></p>
<div class="form-group form-check">
<textarea class="form-control" id="Recivedmedicaltreetmenttext" rows="3" placeholder="Please provide details:" style="display:none;"></textarea>
<!-- <p id="errorRecivedmedicaltreetmenttext"></p> -->
  </div>

 <div class="col-md-12">
 <label style="display: block;">Is the player taking any medication? (Eg Asthma Pump).</label>
 </div>
  <div class="form-row mtreat">
<div class="form-group mb-3 pl-0 pr-0 col-md-6">
<label class="radio-inline"><input type="radio" name="takingantmedication" value="Yes"><span class="checkmark"></span><span class="radio-text">Yes</span></label>

</div>
<div class="form-group  mb-3 pl-0 pr-0 col-md-6">
<label class="radio-inline"><input type="radio" name="takingantmedication" value="No"><span class="checkmark"></span><span class="radio-text">No</span></label>
</div>
</div>
<p id="errortakingantmedication"></p>
<div class="form-group form-check">
<textarea class="form-control" id="takingantmedicationtext" rows="3" placeholder="Please provide details:" style="display:none;"></textarea>
<!-- <p id="errortakingantmedicationtext"></p> -->
  </div>

  <div class="col-md-12">
  <label style="display: block;">Does the player have any allergies?</label>
  </div>
<div class="form-row mtreat mb-neg">
  <div class="col-md-6 form-group pl-0 pr-0"><label class="radio-inline"><input type="radio" class="form-control" name="anyallergies" value="Yes"><span class="checkmark"></span><span class="radio-text">Yes</span></label>
</div>
  <div class="col-md-6 form-group pl-0 pr-0"><label class="radio-inline"><input type="radio" class="form-control" name="anyallergies" value="No"><span class="checkmark"></span><span class="radio-text">No</span></label></div>
</div>
<p id="erroranyallergies"></p>
    
        <div class="form-group up-mob  pl-pr">
            <input type="text" class="form-control allergie-height allergie" id="stateallergies" placeholder="State Allergies:" style="display:none;">
            <!-- <p id="errorstateallergies"></p> -->
        </div>
    
    
        <div class="form-group pl-pr">
            <input type="text" class="form-control allergie-height" id="statemedication" placeholder="State Medication:" style="display:none;">
            <!-- <p id="errorstatemedication"></p> -->
        </div>
    
<div class="col-md-12">
<label style="display: block; margin-top:40px;">Self-Administered:</label>
</div>
    <div class="form-row mtreat">
        <div class="col-md-6 pl-0 pr-0 form-group">
        
        <label class="radio-inline"><input type="radio" name="selfadministration" value="Yes"><span class="checkmark"></span><span class="radio-text">Yes</span></label>
       
        </div>
        <div class="col-md-6 pl-0 pr-0 form-group">
        <label class="radio-inline"><input type="radio" name="selfadministration" value="No"><span class="checkmark"></span><span class="radio-text">No</span></label>
        
        </div>
        <p id="errorselfadministration"></p>
        
    </div>
    <div class="mt-5">
      <div class="col-md-12">
        <label style="display: block;">Does the player bring and keep medication on their person: </label>
      </div>
    </div>
    <div class="form-row mtreat">
    <div class="col-md-6 pl-0 pr-0 form-group">
        <label class="radio-inline"><input type="radio" name="playerbringandkeepmedication" value="Yes"><span class="checkmark"></span><span class="radio-text">Yes</span></label>
</div>
<div class="col-md-6 pl-0 pr-0 form-group">
        <label class="radio-inline"><input type="radio" name="playerbringandkeepmedication" value="No"><span class="checkmark"></span><span class="radio-text">No</span></label>
</div>
        <p id="errorplayerbringandkeepmedication"></p>
       
    </div>
   
        <div class="form-group pl-pr">
            <input type="text" class="form-control allergie-height reaction allergie" id="allergicreaction" placeholder="State the various triggers which may cause an allergic reaction:">
            <!-- <p id="errorallergicreaction"></p> -->
        </div>
   
   
        <div class="form-group pl-pr">
        <input type="text" class="form-control allergie-height allergie " id="additionalinfo" placeholder="Additional Info...">
        <!-- <p id="erroradditionalinfo"></p> -->
        </div>
   

       <div class="text-right frm-submit">
       <button type="button" class="btn btn-submit" id="submitProfile">SUBMIT FORM</button>
       </div>
</form>
</div>
</div>
</section>
<script>

jQuery('input[name="Recivemedicaltreatment"]:radio').change(function () {
    var radio_value = (jQuery('input[name="Recivemedicaltreatment"]:checked').val());
    if (radio_value == 'Yes') {
        jQuery('#Recivedmedicaltreetmenttext').show();
    }
    else if (radio_value == 'No') {
        jQuery('#Recivedmedicaltreetmenttext').hide();
    }
});
jQuery('input[name="takingantmedication"]:radio').change(function () {
    var radio_value = (jQuery('input[name="takingantmedication"]:checked').val());
    if (radio_value == 'Yes') {
        jQuery('#takingantmedicationtext').show();
    }
    else if (radio_value == 'No') {
        jQuery('#takingantmedicationtext').hide();
    }
});
jQuery('input[name="anyallergies"]:radio').change(function () {
    var radio_value = (jQuery('input[name="anyallergies"]:checked').val());
    if (radio_value == 'Yes') {
        jQuery('#stateallergies').show();
        jQuery('#statemedication').show();

    }
    else if (radio_value == 'No') {
        jQuery('#stateallergies').hide();
        jQuery('#statemedication').hide();
    }
});
/* jQuery("#parentconactno").on('keyup', function()
{
	 Parent_contact = $(this).val();
	 var phoneno = /^(?:\+\d{2})? \d{4}? \d{6}$/; // 
	  var phoneno1 = /^(?:\d{5})? \d{6}?$/; // 
	  if(Parent_contact){
		   if(Parent_contact.match(phoneno) || Parent_contact.match(phoneno1))
		   {
				jQuery('#errorparentconactno').html('');
		   }		   
		   else
		   {
			   jQuery('#errorparentconactno').html('Not a valid Phone Number');
				jQuery('#errorparentconactno').css({"color": "red", "font-size": "18px", "margin-top": "1rem" });
				return false;
				
		   }
	  }
}); */
jQuery("#playerconfirmpassword").on('keyup', function(){
  player_password = jQuery('#playerpassword').val();
         Player_confirmpassword =jQuery('#playerconfirmpassword').val();
        // console.log(player_password);
    if (player_password != Player_confirmpassword){
        jQuery('#commonerror-msg').html("Your passwords don't match.Try again");  
          jQuery('#commonerror-msg').css({"color": "red", "font-size": "18px", "margin-top": "1rem" }); 
    }else{
          jQuery('#commonerror-msg').html("");  }
   });
//  Custom Profile register page javascript and jQuery

jQuery(function($){ 

    // Player Personal Details
        var Player_Firstname ='';
        var Player_LastName ='';
        var Player_email ='';
        var Player_Age ='';
        var Player_DOB = '';
        var Player_Strongestfoot = '';
        var Player_Currentplayingposition1 ='';
        var Player_Currentplayingposition2 ='';
        var Player_Currentplayingposition3 ='';
        //checkbox array
        var Player_Currentplayinglavelvals ='';
        var Player_Currentplayinglavelvalsarray =''; //
        var Player_Nameofschool = '';
        var Player_sundayclubteamname = '';
        var Player_saturdayclubteamname = '';
        var Player_nameofdist = '';
        var player_nameofcountry = '';
        var Player_grassrootacademyname = '';
        var Player_divisionofleague ='';
        var Player_teamyousupport = '';
        var Player_favouriteplayer ='';
        var Player_aspireby = '';
        var Player_height ='';
        var Player_chestsize = '';
        var Player_weistsize = '';
        var Player_footsize = '';
    // Player Parent/Guardian details
        var Parent_fullname = '';
        var Parent_lastname = '';
        var Parent_email = '';
        var Parent_contact = '';
        var Parent_AddressPropertyname = '';
        var Parent_addressline1 ='';
        var Parent_addressline2 ='';
        var Parent_addresstown = '';
        var Parent_addresscountry = '';
        var Parent_addressZip = '';
    // Main Username and Password to Store in databse WP_User table
        var PlayerUsername = '';
        var player_password = '';
        var Player_confirmpassword ='';
        var Player_wheredoyouhearabout = '';    
    // Player Medical Details 
        var M_recivedMedicaltreatment = '';
        var M_Recivedmedicaltreetmenttext = '';
        var M_takinganymedication = '';
        var m_takingmadicationtext = '';
        var m_anyallergies = '';
        var M_stateallergies ='';
        var M_satemedication = '';
        var M_selfadministration = '';
        var M_keepmedicationontheirperson = '';
        var M_allergicreaction = '';
        var M_additinalinfo = '';
    
        $('#submitProfile').click(function(event){

         Player_Firstname =$('#PlayerFirstName').val();
         Player_LastName =$('#PlayerLastName').val();
         Player_email =$('#playeremailaddress').val();
         Player_Age =$('#PlayerAge').val();
         Player_DOB = $('#PlayerDateOfBirth').val();
         const Player_Strongestfoots = $('input[name=StrongestFoot]:checked').val();
         Player_Currentplayingposition1 = $( "#Position1 option:selected" ).val();
         Player_Currentplayingposition2 =$( "#Position2 option:selected" ).val();
         Player_Currentplayingposition3 =$( "#Position3 option:selected" ).val();

         Player_Currentplayinglavel =$('#PayerPlayinglavel').val();

         Player_Nameofschool = $('#schoolleague').val();
         Player_sundayclubteamname = $('#SundayClubname').val();
         Player_saturdayclubteamname = $('#SaturdayClubTeamName').val();
         Player_nameofdist = $('#nameofDistteam').val();
         player_nameofcountry = $('#Countryteamname').val();
         Player_grassrootacademyname = $('#grassrootacademyname').val();
         Player_divisionofleague =$('#divisionOfLeague').val();
         Player_teamyousupport = $('#Teamsupport').val();
         Player_favouriteplayer =$('#Favouriteplayer').val();
         Player_aspireby = $('#aspirePlayer').val();
         Player_height =$('#Playerheight').val();
         Player_chestsize = $( "#Playerchestsize option:selected" ).val();
         Player_weistsize = $( "#waistsize option:selected" ).val();
         Player_footsize = $( "#PlayerFootsize option:selected" ).val();
    // Player Parent/Guardian details
         Parent_fullname = $('#parentfirstname').val();
         Parent_lastname = $('#parentlastname').val();
         Parent_email = $('#parentemailaddress').val();
         Parent_contact = $('#parentconactno').val();
         Parent_AddressPropertyname = $('#propertyname').val();
         Parent_addressline1 =$('#addressline1').val();
         Parent_addressline2 =$('#addressline2').val();
         Parent_addresstown = $('#towncity').val();
         Parent_addresscountry = $('#country').val();
         Parent_addressZip = $('#postcode').val();
    // Main Username and Password to Store in databse WP_User table
         PlayerUsername = $('#playerusername').val();
         player_password = $('#playerpassword').val();
         Player_confirmpassword =$('#playerconfirmpassword').val();
         Player_wheredoyouhearabout = $('#didyouhearabout option:selected' ).val();
    //medical info
         const M_recivedMedicaltreatments = $('input[name="Recivemedicaltreatment"]:checked').val();
         M_Recivedmedicaltreetmenttext = $('#Recivedmedicaltreetmenttext').val(); 
         const  M_takinganymedications = $('input[name="takingantmedication"]:checked').val();
         m_takingmadicationtext = $('#takingantmedicationtext').val();
         const m_anyallergiess = $('input[name="anyallergies"]:checked').val();
         M_stateallergies =$('#stateallergies').val();
         M_satemedication = $('#statemedication').val();
         const M_selfadministrations = $('input[name="selfadministration"]:checked').val();
         const M_keepmedicationontheirpersons = $('input[name="playerbringandkeepmedication"]:checked').val();
        // console.log(M_keepmedicationontheirpersons);
         M_allergicreaction = $('#allergicreaction').val();
         M_additinalinfo = $('#additionalinfo').val();

if(M_recivedMedicaltreatments == "Yes"){

}else if(M_recivedMedicaltreatments == "No"){

}
         checked = $("input[name=playinglavel]:checked").length;

         var re = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{8})+$/;
          if(Player_email){
               if (re.test(Player_email)) { 
                    jQuery('#errorplayeremailaddress').html('You have entered an invalid email address!');
                    jQuery('#errorplayeremailaddress').css({"color": "red", "font-size": "18px", "margin-top": "1rem" });
                    return false;
               }else{
                    jQuery('#errorplayeremailaddress').html('');
               }
          }
          var re = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{8})+$/;
          if(Parent_email){
               if (re.test(Parent_email)) { 
                    jQuery('#errorparentemailaddress').html('You have entered an invalid email address!');
                    jQuery('#errorparentemailaddress').css({"color": "red", "font-size": "18px", "margin-top": "1rem"});
                    return false;
               }else{
                    jQuery('#errorparentemailaddress').html('');
               }
          }
 
        /* var phoneno = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/; // 
         
          if(Parent_contact){
               if((!Parent_contact.match(phoneno))){
                    jQuery('#errorparentconactno').html('Not a valid Phone Number');
                    jQuery('#errorparentconactno').css({"color": "red", "font-size": "18px", "margin-top": "1rem" });
                    return false;
               }else{
                    jQuery('#errorparentconactno').html('');
               }
          } */
		  
		 
		 var phoneno = /^(?:\+44)? \d{4}? \d{6}$/; // 
		  var phoneno1 = /^(?:\d{5})? \d{6}?$/; // 
		  if(Parent_contact){
			   if(Parent_contact.match(phoneno) || Parent_contact.match(phoneno1))
			   {
					jQuery('#errorparentconactno').html('');
			   }		   
			   else
			   {
				   jQuery('#errorparentconactno').html('Not a valid Phone Number');
					jQuery('#errorparentconactno').css({"color": "red", "font-size": "18px", "margin-top": "1rem" });
					return false;
					
			   }
		  }
          
        if (player_password != Player_confirmpassword ) {
          jQuery('#commonerror-msg').html("Your passwords don't match.Try again");  
          $('#commonerror-msg').css({"color": "red", "font-size": "18px", "margin-top": "1rem" }); 
          jQuery('#errorplayerconfirmpassword').remove(); 
        }else{
          jQuery('#commonerror-msg').html('');
        }
         

if(Player_Firstname =='' || Player_LastName == '' ||  Player_Age =='' || Player_email ==''|| Player_DOB =='' ||Player_Strongestfoots == ''|| Player_Currentplayingposition1 ==''||
 Player_Currentplayingposition2 =='' || Player_Currentplayingposition3 =='' || Player_Nameofschool =='' || Player_divisionofleague ==''|| 
 Player_teamyousupport =='' || Player_favouriteplayer =='' || Player_aspireby =='' || Player_height == ''|| Player_chestsize == '' || Player_weistsize=='' || 
 Player_footsize =='' || Parent_fullname =='' || Parent_lastname =='' || Parent_email == '' || Parent_contact =='' || Parent_AddressPropertyname =='' || 
 Parent_addressline1 == '' || Parent_addressline2 == '' || Parent_addresstown == '' || Parent_addresscountry == '' || Parent_addressZip =='' || 
 PlayerUsername =='' || player_password =='' || Player_confirmpassword == '' || Player_wheredoyouhearabout =='' || M_recivedMedicaltreatments =='' ||
 M_takinganymedications == '' || m_anyallergiess =='' || M_selfadministrations =='' || M_keepmedicationontheirpersons =='' || player_password != Player_confirmpassword){

  if(Player_Firstname==''){
      $('#errorPlayerFirstName').html('Please enter your First name'); 
      $('#errorPlayerFirstName').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorPlayerFirstName').html('');
  } 

  if(Player_LastName==''){
      $('#errorPlayerLastName').html('Please enter your Last name'); 
      $('#errorPlayerLastName').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorPlayerLastName').html('');
  }
  if(Player_email==''){
      $('#errorplayeremailaddress').html('Please enter your Email address'); 
      $('#errorplayeremailaddress').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorplayeremailaddress').html('');
  }
  

  if(Player_Age==''){
      $('#errorPlayerAge').html('Please enter your Age'); 
      $('#errorPlayerAge').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorPlayerAge').html('');
  }

  if(Player_DOB==''){
      $('#errorPlayerDateOfBirth').html('Please enter your Date Of Birth'); 
      $('#errorPlayerDateOfBirth').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorPlayerDateOfBirth').html('');
  }

  if(Player_Strongestfoots==''){
      $('#errorStrongestFoot').html('Please Select the Strongestfoot '); 
      $('#errorStrongestFoot').css({"color": "red", "font-size": "18px"});    
  }else{
      $('#errorStrongestFoot').html('');
  }

  if(Player_Currentplayingposition1==''){
      $('#errorplayingpossition1').html('Please Select the current playing possion'); 
      $('#errorplayingpossition1').css({"color": "red", "font-size": "18px" , "display": "block" , "margin-top":"1rem"});    
  }else{
      $('#errorplayingpossition1').css({'display':'none'});
  }
  if(Player_Currentplayingposition2==''){
      $('#errorplayingpossition2').html('Please Select the current playing possion'); 
      $('#errorplayingpossition2').css({"color": "red", "font-size": "18px" , "display": "block" , "margin-top":"1rem"});    
  }else{
      $('#errorplayingpossition2').css({'display':'none'});
  }
  if(Player_Currentplayingposition3==''){
      $('#errorplayingpossition3').html('Please Select the current playing possion'); 
      $('#errorplayingpossition3').css({"color": "red", "font-size": "18px", "display": "block" , "margin-top":"1rem"});    
  }else{
      $('#errorplayingpossition3').css({'display':'none'});
  }
 
  if(Player_Nameofschool==''){
      $('#errorschoolleague').html('Please enter name of school'); 
      $('#errorschoolleague').css({"color": "red", "font-size": "18px", "margin-top":"-27px"});    
  }else{
      $('#errorschoolleague').html('');
  }

  if(Player_divisionofleague==''){
      $('#errordivisionOfLeague').html('Please enter division of League name'); 
      $('#errordivisionOfLeague').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errordivisionOfLeague').html('');
  }

  if(Player_teamyousupport==''){
      $('#errorTeamsupport').html('Please enter the team You Support'); 
      $('#errorTeamsupport').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorTeamsupport').html('');
  }

  if(Player_favouriteplayer==''){
      $('#errorFavouriteplayer').html('Please enter favourite player name '); 
      $('#errorFavouriteplayer').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorFavouriteplayer').html('');
  }

  if(Player_aspireby==''){
      $('#erroraspirePlayer').html('Please enter player name which you aspire'); 
      $('#erroraspirePlayer').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#erroraspirePlayer').html('');
  }

  if(Player_height==''){
      $('#erroePlayerheight').html('Please enter your height'); 
      $('#erroePlayerheight').css({"color": "red", "font-size": "18px", "margin-top":"-27px"});    
  }else{
      $('#erroePlayerheight').html('');
  }

  if(Player_chestsize==''){
      $('#errorchestsize').html('Please Select chest size'); 
      $('#errorchestsize').css({"color": "red", "font-size": "18px", "margin-top":"-27px"});    
  }else{
      $('#errorchestsize').html('');
  }

  if(Player_weistsize==''){
      $('#errorwestsize').html('Please select weist size'); 
      $('#errorwestsize').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorwestsize').html('');
  }

  if(Player_footsize==''){
      $('#errorfootzize').html('Please Select the Footsize'); 
      $('#errorfootzize').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorfootzize').html('');
  }

  if(Parent_fullname==''){
      $('#errorparentfirstname').html('Please enter the Parent First name'); 
      $('#errorparentfirstname').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorparentfirstname').html('');
  }

  if(Parent_lastname==''){
      $('#errorparentlastname').html('Please enter the Parent Last name'); 
      $('#errorparentlastname').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorparentlastname').html('');
  }
  

  if(Parent_email==''){
      $('#errorparentemailaddress').html('Please enter the Email address'); 
      $('#errorparentemailaddress').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorparentemailaddress').html('');
  }

  if(Parent_contact==''){
      $('#errorparentconactno').html('Please enter the contact No'); 
      $('#errorparentconactno').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorparentconactno').html('');
  }

  if(Parent_AddressPropertyname==''){
      $('#errorpropertyname').html('Please enter Property Name'); 
      $('#errorpropertyname').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorpropertyname').html('');
  }

  if(Parent_addressline1==''){
      $('#erroraddressline1').html('Please enter address line 1'); 
      $('#erroraddressline1').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#erroraddressline1').html('');
  }

  if(Parent_addressline2==''){
      $('#erroraddressline2').html('Please enter address line 2'); 
      $('#erroraddressline2').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#erroraddressline2').html('');
  }

  if(Parent_addresstown==''){
      $('#errortowncity').html('Please enter the Town name'); 
      $('#errortowncity').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errortowncity').html('');
  }

  if(Parent_addresscountry==''){
      $('#errorcountry').html('Please enter the country name'); 
      $('#errorcountry').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorcountry').html('');
  }

  if(Parent_addressZip==''){
      $('#errorpostcode').html('Please enter the Zip code'); 
      $('#errorpostcode').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorpostcode').html('');
  }

  if(PlayerUsername==''){
      $('#errorplayerusername').html('Please enter the username'); 
      $('#errorplayerusername').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorplayerusername').html('');
  }

  if(player_password==''){
      $('#errorplayerpassword').html('Please enter the Password'); 
      $('#errorplayerpassword').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorplayerpassword').html('');
  }

  if(Player_confirmpassword==''){
      $('#errorplayerconfirmpassword').html('Please enter confirm password'); 
      $('#errorplayerconfirmpassword').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorplayerconfirmpassword').html('');
  }

  

  if(Player_wheredoyouhearabout==''){
      $('#errorhearaboutepf').html('Please enter this field'); 
      $('#errorhearaboutepf').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorhearaboutepf').html('');
  }

//  
if(M_recivedMedicaltreatments==''){
      $('#errorRecivemedicaltreatment').html('Please type player receiving any type of medical treatment'); 
      $('#errorRecivemedicaltreatment').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorRecivemedicaltreatment').html('');
  }

// if(M_Recivedmedicaltreetmenttext==''){
//       $('#errorRecivedmedicaltreetmenttext').html('please provide details'); 
//       $('#errorRecivedmedicaltreetmenttext').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
//   }else{
//       $('#errorRecivedmedicaltreetmenttext').html('');
//   }

  if(M_takinganymedications==''){
      $('#errortakingantmedication').html('player taking any medication?'); 
      $('#errortakingantmedication').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errortakingantmedication').html('');
  }

  // if(m_takingmadicationtext==''){
  //     $('#errortakingantmedicationtext').html('please provide details'); 
  //     $('#errortakingantmedicationtext').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  // }else{
  //     $('#errortakingantmedicationtext').html('');
  // }

  if(m_anyallergiess==''){
      $('#erroranyallergies').html('Please enter this field details'); 
      $('#erroranyallergies').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#erroranyallergies').html('');
  }

  // if(M_stateallergies==''){
  //     $('#errorstateallergies').html('Please enter this field'); 
  //     $('#errorstateallergies').css({"color": "red", "font-size": "18px", "margin-top":"2rem"});    
  // }else{
  //     $('#errorstateallergies').html('');
  // }

  // if(M_satemedication==''){
  //     $('#errorstatemedication').html('Please enter this field'); 
  //     $('#errorstatemedication').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  // }else{
  //     $('#errorstatemedication').html('');
  // }

  if(M_selfadministrations==''){
      $('#errorselfadministration').html('Please select this field'); 
      $('#errorselfadministration').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorselfadministration').html('');
  }

  if(M_keepmedicationontheirpersons==''){
      $('#errorplayerbringandkeepmedication').html('Please select this field'); 
      $('#errorplayerbringandkeepmedication').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  }else{
      $('#errorplayerbringandkeepmedication').html('');
  }

  // if(M_allergicreaction==''){
  //     $('#errorallergicreaction').html('Please enter this field'); 
  //     $('#errorallergicreaction').css({"color": "red", "font-size": "18px", "margin-top":"2rem"});    
  // }else{
  //     $('#errorallergicreaction').html('');
  // }

  // if(M_additinalinfo==''){
  //     $('#erroradditionalinfo').html('Please enter any additional details'); 
  //     $('#erroradditionalinfo').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});    
  // }else{
  //     $('#erroradditionalinfo').html('');
  // }

       
          if(!checked) {
            $('#errorplayinglavel').html("You must check at least one Industries services.");
            $('#errorplayinglavel').css({"color": "red", "font-size": "18px", "margin-top":"1rem"});   
          }else{
            $('#errorplayinglavel').html(''); 
            
          }

          if (player_password != Player_confirmpassword ) {
          jQuery('#commonerror-msg').html("Your passwords don't match.Try again");  
          $('#commonerror-msg').css({"color": "red", "font-size": "18px", "margin-top": "1rem" }); 
          jQuery('#errorplayerconfirmpassword').remove(); 
        }else{
          jQuery('#commonerror-msg').html('');
        }

          $('html, body').animate({           
            scrollTop: $("#CreateProfile").offset().top
          }, 4000);

         
}else{

              var checkboxes = document.getElementsByName('playinglavel');
             Player_Currentplayinglavelvals ='';
             Player_Currentplayinglavelvalsarray =[];
                for (var i=0, n=checkboxes.length;i<n;i++) 
                {
                    if (checkboxes[i].checked) 
                    {
                      Player_Currentplayinglavelvals += ","+checkboxes[i].value;
                      Player_Currentplayinglavelvalsarray.push(checkboxes[i].value)
                    }
                }
                if (Player_Currentplayinglavelvals){
                         $('#errorplayinglavel').html('');
                         Player_Currentplayinglavelvals = Player_Currentplayinglavelvals.substring(1);
                    } 
                  // console.log(Player_Currentplayinglavelvalsarray);

                  if (player_password != Player_confirmpassword ) {
                    jQuery('#commonerror-msg').html("Your passwords don't match.Try again");  
                    $('#commonerror-msg').css({"color": "red", "font-size": "18px", "margin-top": "1rem" }); 
                    jQuery('#errorplayerconfirmpassword').remove(); 
                  }else{
                    jQuery('#commonerror-msg').html('');
                  }

  jQuery.ajax({
    type: 'POST',
    url: frontend_ajax_object.ajaxurl,
    data: {
        username:PlayerUsername,email:Player_email,password:player_password,firstname:Player_Firstname,lastname:Player_LastName,
        Player_Age:Player_Age,Player_DOB:Player_DOB,Player_Strongestfoots:Player_Strongestfoots,
        Player_Currentplayingposition1:Player_Currentplayingposition1,Player_Currentplayingposition2:Player_Currentplayingposition2,
        Player_Currentplayingposition3:Player_Currentplayingposition3,Player_Currentplayinglavel:Player_Currentplayinglavelvalsarray,
        Player_Nameofschool:Player_Nameofschool,Player_sundayclubteamname:Player_sundayclubteamname,Player_saturdayclubteamname:Player_saturdayclubteamname,
        Player_nameofdist:Player_nameofdist,player_nameofcountry:player_nameofcountry,Player_grassrootacademyname:Player_grassrootacademyname,
        Player_divisionofleague:Player_divisionofleague,Player_teamyousupport:Player_teamyousupport,Player_favouriteplayer:Player_favouriteplayer,
        Player_aspireby:Player_aspireby,Player_height:Player_height,Player_chestsize:Player_chestsize,Player_weistsize:Player_weistsize,Player_footsize:Player_footsize,
        Parent_fullname:Parent_fullname,Parent_lastname:Parent_lastname,Parent_email:Parent_email,Parent_contact:Parent_contact,Parent_AddressPropertyname:Parent_AddressPropertyname,
        Parent_addressline1:Parent_addressline1,Parent_addressline2:Parent_addressline2,Parent_addresstown:Parent_addresstown,Parent_addresscountry:Parent_addresscountry,
        Parent_addressZip:Parent_addressZip,Player_wheredoyouhearabout:Player_wheredoyouhearabout,M_recivedMedicaltreatments:M_recivedMedicaltreatments,
        M_Recivedmedicaltreetmenttext:M_Recivedmedicaltreetmenttext,M_takinganymedications:M_takinganymedications,m_takingmadicationtext:m_takingmadicationtext,
        m_anyallergiess:m_anyallergiess,M_stateallergies:M_stateallergies,M_satemedication:M_satemedication,M_selfadministrations:M_selfadministrations,
        M_keepmedicationontheirpersons:M_keepmedicationontheirpersons,M_allergicreaction:M_allergicreaction,M_additinalinfo:M_additinalinfo,
        action: 'customuserregister'
        },
      success: function(result)
      {
      
          if(result == 'username exist')
          {
              alert('Username already exists. Please use another Name');
          }
          if(result == 'email exist'){
              alert('Email address already exists. Please use another email');
          }
            if(result == 'added successfully'){
          // window.open('https://martechkb.com/newthankyou/','_self');
          alert('Your Profile is successfully added');
          window.location = '/book-a-trial';
          return false;
            }
                
                 //window.location = '/newthankyou';
                }
          }).done(function() {
            // setTimeout(function(){
            //     jQuery("#overlay").fadeOut(300);
            // },500);
    }); 
}




          // checked = $("input[name=playinglavel]:checked").length;
          // if(!checked) {
          //   $('#errorplayinglavel').html("You must check at least one Industries services.");
          // }else{
            
          //   var checkboxes = document.getElementsByName('checked');
          //    Player_Currentplayinglavelvals ='';
          //    Player_Currentplayinglavelvalsarray =[];
          //       for (var i=0, n=checkboxes.length;i<n;i++) 
          //       {
          //           if (checkboxes[i].checked) 
          //           {
          //             Player_Currentplayinglavelvals += ","+checkboxes[i].value;
          //             Player_Currentplayinglavelvalsarray.push(checkboxes[i].value)
          //           }
          //       }
          //       if (Player_Currentplayinglavelvals){
          //                $('#errorservices').html('');
          //                Player_Currentplayinglavelvals = Player_Currentplayinglavelvals.substring(1);
          //           } 
          //           alert(Player_Currentplayinglavelvals + Player_Currentplayinglavelvalsarray);
          //           console.log(Player_Currentplayinglavelvals);
          // }



          
        });

    });
    </script>
<?php

get_footer();
  
?>
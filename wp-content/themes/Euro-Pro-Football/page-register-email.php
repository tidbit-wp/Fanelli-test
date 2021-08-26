<?php get_header(); ?>

<?php
       
  $name = 'Arun';
  $email = 'arun@tidbitlab.com';
  $subject = "Recieve Mail from '$email'";
  $to = 'arun@tidbitsolutions.tech';
  $headers = "MIME-Versions: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charser=UTF-8" . "\r\n";
    
  ob_start(); ?>





<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr style="pading-bottom:">
        <th style="font-size: 2rem; color:#07153E">THANK YOU</th>
    </tr>
    <tr>
        <td>
            <p style="text-align:center; font-size:1.5rem; color:#07153E; padding-bottom:3rem">Thank you for registering with Euro Pro Football. We have recieved your details and look forward to seeing you soon at once of our venues.</p>
        </td>
    </tr>
    <tr>
        <table width="90%" style="background-color:#F6F6F6;margin:0 auto; padding:2rem;font-size:1.2rem; text-align:left;" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <th style="text-transform:uppercase; width:60%">Name</th>
                <th style="text-transform:capitalize;">Home Address</th>
            </tr>
            <tr>
               <td style="padding-bottom:2rem; width:60%">Arun Pathak</td>
               <td style="padding-bottom:2rem">Lorem Ipsum dolor Sit Amet Consectetur</td>
            </tr>
            <tr>
               <th>Date of Birth</th>
            </tr>
            <tr>
               <td style="padding-bottom:2rem"> 29 May 2011</td>
            </tr>
            <tr>
                <th style="width:60%;">PARENT / GUARDIAN DETAILS</th>
                <th>CONTACT NUMBER</th>
            </tr>
            <tr>
                <td style="padding-bottom:2rem; width:60%">Lorem Ipsum</td>
                <td style="padding-bottom:2rem">9999 99999</td>
            </tr>
        </table>
    </tr>

    <tr>
        <td>
            <p style="text-align:center; font-size:1.2rem; padding-top:3rem; padding: bottom 3rem;">Please note that you cannot reply to this email. If you have any questions please  contact us at info@euprofootball.com or call us on 0330 118 83 31</p>
        </td>
    </tr>
    <tr>
        <table style="background-color:#07153E; padding:2rem">
            <tr>
               <table style=" width:90%;margin:0 auto;">
                   <tr>
                       <td width="50%">
                           <img style="height: auto;max-width: 100%;border: none;display: block;padding: 5px 0; width:30%;" src="https://wordpress-426808-1993275.cloudwaysapps.com/wp-content/uploads/2021/06/Euro-Pro-Logo.png" alt="">
                       </td>
                       <td width="50%" style="text-align:right">
                           <a href="https://www.facebook.com/euprofootball/">
                               <img src="https://wordpress-426808-1993275.cloudwaysapps.com/wp-content/uploads/2021/06/Facebook-Icon.png"  style="width:15%; margin-right:1rem" alt=""/>
                           </a>
                           <a href="https://www.instagram.com/euprofootball/">
                               <img src="https://wordpress-426808-1993275.cloudwaysapps.com/wp-content/uploads/2021/06/Instagram-Icon.png" style="width:15%; margin-right:1rem" alt=""/>
                           </a>
                           <a href="https://twitter.com/euprofootball">
                               <img src="https://wordpress-426808-1993275.cloudwaysapps.com/wp-content/uploads/2021/06/Twitter-Icon.png"   style="width:15%; margin-right:1rem" alt=""/>
                           </a>
                       </td>
                   </tr>
               </table>
            </tr>
        </table>
    </tr>
</table>
<?php
  $body = ob_get_clean();
$sent = wp_mail($to,$subject,$body,$headers);
      if($sent) {
        var_dump('Mail sent');
      }//message sent!
      else  {
        var_dump('Mail not sent, please try again!');
      }//me
    ?>
<?php get_footer(); ?>
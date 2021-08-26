<?php get_header(); ?>

<?php
       
  $name = 'sumit';
  $email = 'simit@tidbitlab.com';
  $subject = "Recieve Mail from '$email'";
  $to = 'sumit@tidbitsolutions.tech';
  $headers = "MIME-Versions: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charser=UTF-8" . "\r\n";
    
  ob_start(); ?>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr style="pading-bottom:">
        <th style="font-size: 2rem; color:#07153E">BOOKING CONFIRMATION</th>
    </tr>
    <tr>
        <td>
            <p style="text-align:center; font-size:1.5rem; color:#07153E; padding-bottom:3rem">Thank you for booking with Euro Pro Football. We have recieved your details and look forward to seeing you soon at once of our venues.</p>
        </td>
    </tr>
    <tr>
        <table width="90%" style="background-color:#F6F6F6;margin:0 auto; padding:2rem;font-size:1.2rem; text-align:left;" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <th style="text-transform:uppercase; width:60%"></th>
                <th style="text-transform:uppercase; background-color:#FFCD33; padding:1rem">CURRENCY : £ GBP</th>
            </tr>
            <tr>
                <th style="text-transform:uppercase; width:60%; padding-top:1rem;">ORDER NUMBER</th>
                <th style="text-transform:capitalize;padding-top:1rem;">Home Address</th>
            </tr>
            <tr>
               <td style="padding-bottom:2rem; width:60%">XXXXXXX</td>
               <td style="padding-bottom:2rem">Lorem Ipsum dolor <br> Sit Amet <br> Consectetur</td>
            </tr>
            <tr>
               <th>NAME</th>
            </tr>
            <tr>
               <td style="padding-bottom:2rem">Lorem Ipsum</td>
            </tr>
            <tr>
                <th style="width:60%;">PRODUCT DESCRIPTION</th>
                <th>CONTACT NUMBER</th>
            </tr>
            <tr>
                <td style="padding-bottom:2rem; width:60%">Lorem Ipsum</td>
                <td style="padding-bottom:2rem">XXXXX XXXXXX</td>
            </tr>
            <tr>
        <td colspan='2' style="padding-top:2rem; padding-bottom:1rem"><hr></td>
    </tr>
    <tr>
        <td style="width:70%; padding-bottom:.85rem">TAX</td>
        <td style="width:30%; text-align:right; padding-bottom:.85rem">£ XXX</td>
    </tr>
    <tr>
        <td style="width:70%">TOTAL PAYMENT (TO EURO PRO FOOTBALL LTD)</td>
        <td style="width:30%; text-align:right">£ XXX</td>
    </tr>
        </table>
    </tr>
    
    <tr>
        <td>
            <p style="text-align:center; font-size:1.2rem; padding-top:3rem; padding: bottom 3rem;">Please note that you cannot reply to this email. If you have any questions please  contact us at info@euprofootball.com or call us on 0330 118 83 31</p>
        </td>
    </tr>
    <tr>
        <table style="background-color:#07153E; padding:2rem ; margin:0 auto;">
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
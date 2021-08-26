<?php
        global $wpdb;
        $table_name = $wpdb->prefix . "book";
        $book = $wpdb->get_results( "SELECT * FROM $table_name WHERE booked_status='succeeded' AND 'product_status'='Payment Received'");
      
        var_dump($book); 
        ?> <a href="https://www.google.com"  rel="noopener">newopner</a> <?php 
?>
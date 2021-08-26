<?php 	  
//FAQ CLASS START  
class MJ_GmgtFAQs
{	
	//ADD FAQ DATA
	public function MJ_gmgt_add_faq($data)
	{		
		global $wpdb;
		$table_gmgt_faq = $wpdb->prefix . 'gmgt_faq';
		
		$faqdata['title']=$data['title'];
		$faqdata['description']=$data['description'];		
	
		if($data['action']=='edit')
		{
			$faqid['id']=$data['faq_id'];
			$result=$wpdb->update( $table_gmgt_faq, $faqdata ,$faqid);
			return $result;
		}
		else
		{			
			$result=$wpdb->insert( $table_gmgt_faq, $faqdata );
			
			if($result)
				$result=$wpdb->insert_id;
			return $result;
		}	
	}
	//get all FAQ
	public function MJ_gmgt_get_all_faq()
	{
		global $wpdb;
		$table_gmgt_faq = $wpdb->prefix . 'gmgt_faq';
	
		$result = $wpdb->get_results("SELECT * FROM $table_gmgt_faq");
		return $result;	
	}
	//get single FAQ
	public function MJ_gmgt_get_single_faq($id)
	{		
		global $wpdb;
		$table_gmgt_faq = $wpdb->prefix . 'gmgt_faq';
		$result = $wpdb->get_row("SELECT * FROM $table_gmgt_faq where id=".$id);
		return $result;
	}
	//delete FAQ
	public function MJ_gmgt_delete_faq($id)
	{
		global $wpdb;
		$table_gmgt_faq = $wpdb->prefix . 'gmgt_faq';
		$result = $wpdb->query("DELETE FROM $table_gmgt_faq where id= ".$id);
		return $result;
	}	
}
//FAQ CLASS END
?>
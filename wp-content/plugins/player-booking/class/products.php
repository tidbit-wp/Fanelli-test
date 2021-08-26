<?php 	  
//SERVICES CLASS START  
class MJ_Gmgtservices
{	
	//ADD SERVICES DATA
	public function MJ_gmgt_add_service($data)
	{		
		global $wpdb;
		$table_gmgt_services = $wpdb->prefix . 'gmgt_services';
		
		$servicedata['pages']=$data['pages'];
		$servicedata['brochure_site']=$data['brochure_site'];
		$servicedata['woo_commerce']=$data['woo_commerce'];
		$servicedata['hosting_brochure']=$data['hosting_brochure'];
		$servicedata['hosting_ecommerce']=$data['hosting_ecommerce'];
		$servicedata['ssl_certificate']=$data['ssl_certificate'];
		$servicedata['video_banner']=$data['video_banner'];
		$servicedata['contact_forms']=$data['contact_forms'];
		$servicedata['events_booking']=$data['events_booking'];
		$servicedata['imagery']=$data['imagery'];
		$servicedata['copy_writing']=$data['copy_writing'];
		$servicedata['seo']=$data['seo'];		
	
		if($data['action']=='edit')
		{
			$serviceid['service_id']=$data['service_id'];
			$result=$wpdb->update( $table_gmgt_services, $servicedata ,$serviceid);
			return $result;
		}
		else
		{
			
			$result=$wpdb->insert( $table_gmgt_services, $servicedata );
			
			if($result)
				$result=$wpdb->insert_id;
			return $result;
		}	
	}
	//get all service
	public function MJ_gmgt_get_all_service()
	{
		global $wpdb;
		$table_gmgt_services = $wpdb->prefix . 'gmgt_services';
	
		$result = $wpdb->get_results("SELECT * FROM $table_gmgt_services");
		return $result;	
	}
	//get all booked service
	public function MJ_gmgt_get_all_booked_service()
	{
		global $wpdb;
		$table_gmgt_booked_service = $wpdb->prefix . 'gmgt_booked_service';
	
		$result = $wpdb->get_results("SELECT * FROM $table_gmgt_booked_service ORDER BY id DESC");
		return $result;	
	}
	//get single service
	public function MJ_gmgt_get_single_service($id)
	{		
		global $wpdb;
		$table_gmgt_services = $wpdb->prefix . 'gmgt_services';
		$result = $wpdb->get_row("SELECT * FROM $table_gmgt_services where service_id=".$id);
		return $result;
	}
	//get single booked service
	public function MJ_gmgt_get_single_booked_service($id)
	{		
		global $wpdb;
		$table_gmgt_booked_service = $wpdb->prefix . 'gmgt_booked_service';
		$result = $wpdb->get_row("SELECT * FROM $table_gmgt_booked_service where id=".$id);
		return $result;
	}
	public function MJ_gmgt_get_auto_page_no()
	{		
		global $wpdb;
		$table_gmgt_services = $wpdb->prefix . 'gmgt_services';
		$result = $wpdb->get_results("SELECT * FROM $table_gmgt_services");
		if(!empty($result))
		{
			$page_no=count($result);
			$page_no=$page_no+1;
		}
		else
		{
			$page_no=1;
		}
		return $page_no;
	}
}
//SERVICES CLASS END
?>
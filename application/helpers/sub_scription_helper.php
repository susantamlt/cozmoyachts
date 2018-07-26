<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This helper file is used to define the Miscellenous Functions used in Edulinked project
 * 
 */

//------------------------------------------------------------------------------------------------------


/*
* this function checks the course has a image or not if not it returns a default image
*/
if ( ! function_exists('listing_of_products'))
{
	function listing_of_products($id)
    {
        //echo '<pre>';print_r($id);exit;
        $CI =& get_instance();
        $CI->db->where('user_id',$_SESSION['seller_user_id']);
        $products_count = $CI->db->get('products')->num_rows();
        //echo $CI->db->last_query();
        //echo '<pre>'; print_r($products_count); exit;
		if($id=='1'&&$products_count<=2)
        {  
          return true;
        }else if($id=='2'&&$products_count<=4)
        {
          return true;
        }else if($id=='3'&&$products_count<=14){
          return true;
        }else if($id=='4'){
          return true;
        }else if($id=='5'){
          return true;
        }else{
          //echo '<pre>'; print_r($products_count); exit;
          return false;  
        } 
	}
}

if ( ! function_exists('microsite_view'))
{
	function microsite_view($option)
    {
        //$CI =& get_instance();
        //$user_package_id = $CI->db->get('member_plans')->row_array();
        //echo '<pre>'; print_r($user_package_id); exit;
        if($option=='y')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return true;
        }
		else
        {
          return false;
        } 
	}
}

if ( ! function_exists('price_optional'))
{
	function price_optional($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/users/default.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/social_timeline_image/".$imgPath;
        } 
	}
}

if ( ! function_exists('view_contact_info_of_lead_for_promoted_products'))
{
	function view_contact_info_of_lead_for_promoted_products($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/users/default.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/social_timeline_image/".$imgPath;
        } 
	}
}

if ( ! function_exists('self_managing_control_panel'))
{
	function self_managing_control_panel($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/users/default.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/social_timeline_image/".$imgPath;
        } 
	}
}

if ( ! function_exists('online_promotion'))
{
	function online_promotion($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/users/default.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/social_timeline_image/".$imgPath;
        } 
	}
}

if ( ! function_exists('request_a_call_back_option'))
{
	function request_a_call_back_option($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/users/default.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/social_timeline_image/".$imgPath;
        } 
	}
}

if ( ! function_exists('unlimited_addresses'))
{
	function unlimited_addresses($ads_sts)
    {
        //echo $ads_sts;exit;
		if($ads_sts=='y')
        {  
          return true;
        }
		else
        {
          return false;
        } 
	}
}

if ( ! function_exists('mobile_microsite_view'))
{
	function mobile_microsite_view($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/users/default.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/social_timeline_image/".$imgPath;
        } 
	}
}

if ( ! function_exists('access_to_statistics'))
{
	function access_to_statistics($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/users/default.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/social_timeline_image/".$imgPath;
        } 
	}
}

if ( ! function_exists('link_to_completed_projects'))
{
	function link_to_completed_projects($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/users/default.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/social_timeline_image/".$imgPath;
        } 
	}
}

if ( ! function_exists('receive_project_leads'))
{
	function receive_project_leads($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/users/default.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/social_timeline_image/".$imgPath;
        } 
	}
}

if ( ! function_exists('advertorials'))
{
	function advertorials($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/users/default.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/social_timeline_image/".$imgPath;
        } 
	}
}

if ( ! function_exists('add_videos_option'))
{
	function add_videos_option($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/users/default.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/social_timeline_image/".$imgPath;
        } 
	}
}

if ( ! function_exists('technical_doccument'))
{
	function technical_doccument($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/users/default.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/social_timeline_image/".$imgPath;
        } 
	}
}

if ( ! function_exists('priority_ranking'))
{
	function priority_ranking($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/users/default.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/social_timeline_image/".$imgPath;
        } 
	}
}

if ( ! function_exists('commission_percentage'))
{
	function commission_percentage($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/users/default.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/social_timeline_image/".$imgPath;
        } 
	}
}

if ( ! function_exists('verified_icon_option'))
{
	function verified_icon_option($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/users/default.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/social_timeline_image/".$imgPath;
        } 
	}
}

/* End of file misc_functions_helper.php */
/* Location: ./application/helpers/misc_functions_helper.php */
?>
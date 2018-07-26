<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This helper file is used to define the Miscellenous Functions used in Edulinked project
 * 
 */

//------------------------------------------------------------------------------------------------------


/*
* this function checks the course has a image or not if not it returns a default image
*/
if ( ! function_exists('profile_img'))
{
	function profile_img($imgPath)
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
          return $root_path."images/users/".$imgPath;
        } 
	}
}
if ( ! function_exists('header_img'))
{
	function header_img($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/social_header_image/default_banner.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/social_header_image/".$imgPath;
        } 
	}
}
if ( ! function_exists('topic_img'))
{
	function topic_img($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/topic_image/default.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/topic_image/".$imgPath;
        } 
	}
}
if ( ! function_exists('jobs_img'))
{
	function jobs_img($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/topic_image/default.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/topic_image/".$imgPath;
        } 
	}
}
if(!function_exists('discussion_image'))
{
	function discussion_image($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/discussion/default.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/discussion/".$imgPath;
        } 
	}
}
if ( ! function_exists('company_img'))
{
	function company_img($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/company_page/default.png";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/company_page/".$imgPath;
        } 
	}
}
if ( ! function_exists('company_banner_img'))
{
	function company_banner_img($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/company_page/banners/default_banner.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/company_page/banners/".$imgPath;
        } 
	}
}
if ( ! function_exists('news_image'))
{
	function news_image($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          return $root_path."images/news_image/default.png";
        }else{
          return $root_path."images/news_image/".$imgPath;
        } 
	}
}
if ( ! function_exists('timeline_img'))
{
	function timeline_img($imgPath)
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

if ( ! function_exists('company_img'))
{
	function company_img($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/companies/default.jpg";exit;
          return $root_path."images/companies/default.png";
        }
		else
        {
          //echo $root_path."images/companies/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/companies/".$imgPath;
        } 
	}
}

if ( ! function_exists('products_img'))
{
	function products_img($imgPath)
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
          return $root_path."images/catelogues/".$imgPath;
        } 
	}
}

if ( ! function_exists('microsite_banner'))
{
	function microsite_banner($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/microsite/banners/default_banner.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/microsite/banners/".$imgPath;
        } 
	}
}

if ( ! function_exists('microsite_img'))
{
	function microsite_img($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/microsite/default.png";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/microsite/".$imgPath;
        } 
	}
}

if ( ! function_exists('news_img'))
{
	function news_img($imgPath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($imgPath == '')
        {  
          //echo $root_path."images/users/default.jpg";exit;
          return $root_path."images/default.jpg";
        }
		else
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/news_image/".$imgPath;
        } 
	}
}



if (!function_exists('user_image'))
{
    function user_image($filePath)
    {
        $CI = &get_instance();
        $base_image_path = base_url('assets/images');
        $root_path = base_url();
        //echo $filePath;exit;
        //if ($status == 1)
//        {
            //echo $filePath.'hiiii';exit;
            return $root_path . "assets/timthumb.php?src=".$base_image_path.'/users/'.$filePath.'&w=160&h=160';
        //} else
//        {
//            //echo $root_path . 'assets/files/ipt_files/' . $filePath;exit;
//            return $root_path . 'assets/images/users/' . $filePath;
//        }
    }
}


if (!function_exists('site_logo_img'))
{
    function site_logo_img($filePath)
    {
        $CI = &get_instance();
        $base_image_path = base_url('assets/images');
        $root_path = base_url();
        //echo $filePath;exit;
        return $root_path . "assets/timthumb.php?src=".$base_image_path.'/photo_gallery/'.$filePath.'&w=155&h=106';
        
    }
}


if (!function_exists('project_image'))
{
    function project_image($filePath)
    {
        $CI = &get_instance();
        $base_image_path = base_url('assets/images');
        $root_path = base_url();
        //echo $filePath;exit;
        return $root_path . "assets/timthumb.php?src=".$base_image_path.'/projects/'.$filePath.'&w=150&h=150';
        
    }
}

if (!function_exists('cons_update_image'))
{
    function cons_update_image($filePath)
    {
        $CI = &get_instance();
        $base_image_path = base_url('assets/images');
        $root_path = base_url();
        //echo $filePath;exit;
        return $root_path . "assets/timthumb.php?src=".$base_image_path.'/construction/'.$filePath.'&w=150&h=150';
        
    }
}

if (!function_exists('social_chat_image'))
{
    function social_chat_image($filePath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($filePath !== '')
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/social_chat_image/".$filePath;
        } 
	}
}

if (!function_exists('social_group_chat_image'))
{
    function social_group_chat_image($filePath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($filePath !== '')
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/social_group_chat_image/".$filePath;
        } 
	}
}

if (!function_exists('journal_file'))
{
    function journal_file($filePath)
    {
        //echo $imgPath;exit;
        $root_path = config_item('assets_dir');
		if($filePath !== '')
        {
          //echo $root_path."images/users/".$imgPath;exit;
          //return $root_path.$imgPath;
          return $root_path."images/journal_files/".$filePath;
        } 
	}
}

function get_doller_value()
{
    $from   = 'USD'; /*change it to your required currencies */
    $to     = 'INR';
    $url    = 'http://download.finance.yahoo.com/d/quotes.csv?e=.csv&f=sl1d1t1&s='. $from . $to .'=X';
    $handle = @fopen($url, 'r');
    if ($handle) {
    $result = fgets($handle, 4096);
    fclose($handle);
    }
    $allData = explode(',', $result); /* Get all the contents to an array */
    $dollarValue = $allData[1];
    return $dollarValue;

}


 
 
/*
 * converts seconds to minutes Ex : 70 sec to 1.10 min
 */
function secTomin($seconds)
{
	$mintues = floor($seconds/60);
	$secondsleft = $seconds%60;
	$min_format = $mintues+($secondsleft/100);
	//$timearr = explode(".",$min_format);
	//$timearr[0].":".$timearr[1];
	return $min_format;
}



 
 
 
    // this is for drop down values
    function get_time_drp($hm){
        $time_values = array();
       
            $mx=24;
        if($hm == 'm'){
            $mx=60;
        }
        for($i=0;$i<$mx;$i++){
            $ar_val = str_pad($i, 2, "0", STR_PAD_LEFT);
            $time_values[$ar_val] = $ar_val;
        }
        return $time_values;
    }
    	
	function populate() {
    // echo "ss";exit;
    $hours = '';
	$minutes ='';
	$ampm = '';
    for($i = 360; $i <= 1380; $i += 15){
        $hours = floor($i / 60);
		// echo "<pre>";
		// print_r($hours);
        $minutes = $i % 60;
		 $ampm = $hours % 24 < 12 ? 'AM' : 'PM';
		$hours = $hours % 12;
        if ($hours === 0){
            $hours = 12;
        }
        if ($hours < 10){
          $hours = '0' . $hours; // adding leading zero
        }
        if ($minutes < 10){
            $minutes = '0' . $minutes; // adding leading zero
        }
       
        
		
		 $r[$hours . ':' . $minutes . ' ' . $ampm]=$hours . ':' . $minutes . ' ' . $ampm;
		 // echo "<prE>";
		 // print_r($r);
		 
        // select.append($('<option></option>')
            // .attr('value', hours + ':' + minutes + ' ' + ampm)
            // .text(hours + ':' + minutes + ' ' + ampm)); 
    }
	return $r;
	// exit;
}
    
    
    function get_countries()
    {
        //$countries
        // setup countries list here
        //http://www.phpro.org/examples/Country-Array.html 
    }
    
    function week_end_date($date) {
        $ts = strtotime($date);
        $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
        return strtotime('next sunday', $start);
    }

/* End of file misc_functions_helper.php */
/* Location: ./application/helpers/misc_functions_helper.php */
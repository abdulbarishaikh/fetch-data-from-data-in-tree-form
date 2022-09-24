<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 class Blocker extends CI_Controller{ 

     function requestBlocker(){
		$CI = &get_instance();
		if(!$CI->session->has_userdata('logged_in'))
		{
			redirect('login');
		}
		else{
			echo "sorry";
		}
	 } 
 } 
 ?> 
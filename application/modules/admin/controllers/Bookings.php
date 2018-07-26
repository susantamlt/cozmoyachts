<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Bookings extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->model('bookings_model');
		$this->load->library('ccavenue');
		$this->load->library('session');
		$this->load->helper('url');
		modules::run('login/login/is_admin_logged_in');
	}

	public function index() {
		$this->load->view('common/admin-top');
		$this->load->view('booking/list');
		$this->load->view('common/admin-bottom');
	}

	public function bookings_list() {
		$result = $this->bookings_model->get_bookings_list();
		$aaData = array();
		foreach($result['aaData'] as $row){
			if($row[1]!=''){
				$row[1]= ucwords('#'.$row[1]);
			}
			if($row[2]!=''){
				$row[2]= ucwords($row[2]);
			}
			if($row[3]!=''){
				$row[3]= ucwords($row[3]);
			}
			if($row[4]!=''){
				$row[4]= ucwords($row[4]);
			}
			if($row[5]!=''){
				$row[5]= ucwords($row[5]);
			}
			if($row[6]!=''){
				if($row[6]=='2'){$selected = 'Pay 100%';$button='btn-success';} else if ($row[6]=='3') {$selected = 'Pay 20%';$button='btn-warning';} else if ($row[6]=='4') {$selected = 'Refund';$button='btn-danger';} else {$selected = 'Unpaid';$button='btn-danger';}
				$row[6]='<a data-id="'.$row[0].'" data-bid="'.$row[6].'" id="paymentStatus-'.$row[0].'" href="javascript:void(0)" class="btn dropdown-toggle '.$button.' paymentStatusb" data-toggle="dropdown">'.$selected.'</a>';
			}
			if($row[7]!=''){
				if($row[7]=='complete'){$selected1 = 'Complete';$button1='btn-success';} else if ($row[7]=='confirm') {$selected1 = 'Confirm';$button1='btn-info';} else if ($row[7]=='cancel') {$selected1 = 'Cancel';$button1='btn-danger';} else {$selected1 = 'Pending';$button1='btn-warning';}
				$row[7]='<a data-id="'.$row[0].'" data-bid="'.$row[7].'" id="bookingStatus-'.$row[0].'" href="javascript:void(0)" class="btn dropdown-toggle '.$button1.' bookingStatusb" data-toggle="dropdown">'.$selected1.'</a>';
			}
			if($row[8]!=''){
				$row[8]= date('jS M Y', strtotime($row[8]));
			}
			$row[9] = '<a href="'.base_url('admin/bookings/booking_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('admin/bookings/booking_edit/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function booking_add() {
		$data['cy_website'] = $this->bookings_model->get_ljp_website();
		$data['cy_package'] = $this->bookings_model->get_ljp_package();
		$this->load->view('common/admin-top');
		$this->load->view('booking/bookingadd',$data);
		$this->load->view('common/admin-bottom');
	}

	public function booking_edit($id='') {
		$data['cy_website'] = $this->bookings_model->get_ljp_website();
		$data['cy_package'] = $this->bookings_model->get_ljp_package();
		$ljp_Data = $this->bookings_model->get_ljp_ParticularDataEdit($id);
		$ljp_Data[0]['emailid']=$ljp_Data[0]['email'];
		$ljp_Data[0]['book_date'] = date('m/d/Y',strtotime($ljp_Data[0]['book_date']));
		$ljp_Data[0]['book_time'] = date('h:i a',strtotime($ljp_Data[0]['book_time']));
		if($ljp_Data[0]['user_id'] > 0){
			$data['cy_user'] = $this->bookings_model->getUserList();
		} else {
			$data['cy_user'] = array();
		}
		$uResult['email'] = $this->bookings_model->getLeadUser($ljp_Data[0]);
		$data['cy_lead'] = $this->bookings_model->getLeadList($uResult);
		$data['ljp_Data'] = $ljp_Data;
		$this->load->view('common/admin-top');
		$this->load->view('booking/bookingedit',$data);
		$this->load->view('common/admin-bottom');
	}

	public function booking_view($id='') {
		$paymentStatus = $this->config->item('payment_status');
		$ljp_Data = $this->bookings_model->get_ljp_ParticularDataView($id);
		$ljp_Data[0]['payment_status'] = $paymentStatus[$ljp_Data[0]['payment_status']];
		$ljp_Data[0]['booking_status'] = ucwords($ljp_Data[0]['booking_status']);
		$data['ljp_Data'] = $ljp_Data;
		$this->load->view('common/admin-top');
		$this->load->view('booking/bookingview',$data);
		$this->load->view('common/admin-bottom');
	}

	public function existingCustomer() {
		$data = $this->input->post();
		$result = $this->bookings_model->getUserList();
		if(!empty($result)){
			unset($result['']);
			echo json_encode(array('status'=>'1','datas'=>$result));
		} else {
			echo json_encode(array('status'=>'0','msg'=>'No User Avilable'));
		}
	}

	public function existingEmail() {
		$data = $this->input->post();
		$result = $this->bookings_model->existingEmail($data);
		if(empty($result)){
			unset($result['']);
			echo json_encode(array('status'=>'1','msg'=>'No data avilable'));
		} else {
			echo json_encode(array('status'=>'0','msg'=>'Already email "'.$data['email'].'" exits as a user'));
		}
	}

	public function existingLead() {
		$data = $this->input->post();
		if($data['user_id']!='' || $data['emailid']!=''){
			$uResult['email'] = $this->bookings_model->getLeadUser($data);
			$result = $this->bookings_model->getLeadList($uResult);
			if(!empty($result)){
				unset($result['']);
				echo json_encode(array('status'=>'1','datas'=>$result));
			} else {
				echo json_encode(array('status'=>'0','msg'=>'No User Avilable'));
			}
		} else {
			echo json_encode(array('status'=>'0','msg'=>'Please user  or enter email id'));
		}
	}

	public function existingLeadDetails() {
		$data = $this->input->post();
		if($data['lead_id']!=''){
			$result = $this->bookings_model->getExitingLead($data);
			if(!empty($result)){
				echo json_encode(array('status'=>'1','datas'=>$result));
			} else {
				echo json_encode(array('status'=>'0','msg'=>'No User Avilable'));
			}
		} else {
			echo json_encode(array('status'=>'0','msg'=>'Please select lead'));
		}
	}

	public function booking_status_save() {
		$data = $this->input->post();
		$result = $this->bookings_model->bookings_save($data);
		if($result > 0){
			echo json_encode(array('status'=>'1','msg'=>'successfull'));
		} else {
			echo json_encode(array('status'=>'0','msg'=>'No User Avilable'));
		}
	}

	public function bookings_save() {
		$data = $this->input->post();
		$sessionData = array();
		if(!empty($data)){
			$userdata = $this->bookings_model->saveUsers($data);
			$reverse = array_reverse(explode(',',$data['address']));
			$sessionData['billing_name']=$userdata['name'];
			$sessionData['billing_address']=end($reverse);
			$sessionData['billing_country']=$userdata['country_code'];
			$sessionData['billing_state']=$reverse[2];
			$sessionData['billing_postal']=$reverse[0];
			$sessionData['billing_phone']=$userdata['phone'];
			$sessionData['user_email']=$userdata['email'];
			$sessionData['billing_city']=$reverse[3];
			$sessionData['billing_postal']=$reverse[0];
			$sessionData['shipping_name']=$userdata['name'];
			$sessionData['shipping_address']=end($reverse);
			$sessionData['shipping_country']=$userdata['country_code'];
			$sessionData['shipping_state']=$reverse[2];
			$sessionData['shipping_phone']=$userdata['phone'];
			$sessionData['shipping_city']=$reverse[3];
			$sessionData['shipping_postal']=$reverse[0];
			unset($data['name']);
			unset($data['phone']);
			$data['user_id'] = $userdata['user_id'];
			$data['book_date'] = date('Y-m-d',strtotime($data['book_date']));
			$data['book_time'] = date('H:i:s',strtotime($data['book_time']));
			$result = $this->bookings_model->bookings_save($data);
			if($result['id'] > 0){
				$sessionData['booking_id'] = $result['bid'];
				$sessionData['order_id'] = $result['oid'];
				if($data['payment_status']=='3'){
					$sessionData['totalamount'] = $data['total_amount'];
					$sessionData['p_amount'] = ($data['total_amount'] * 20) / 100;
				} else {
					$sessionData['totalamount'] = $data['total_amount'];
					$sessionData['p_amount'] = 0;
				}
				$bill['billing_info'] = $sessionData;
				if($data['payment_method']=='stripe'){
					$nawurl = 'ccavenue';
				} else {
					$nawurl = '';
				}
				$this->session->set_userdata($bill);
				echo json_encode(array('status'=>'1','msg'=>'successfull','url'=>$nawurl));
			} else {
				echo json_encode(array('status'=>'0','msg'=>'No User Avilable','url'=>''));
			}
		} else {
			echo json_encode(array('status'=>'0','msg'=>'No User Avilable','url'=>''));
		}
	}

	public function ccavenue() {
		$billing_data = $this->session->userdata('billing_info');
		if(!empty($billing_data)){
			$data['billing_cust_name']=$billing_data['billing_name'];
			$data['billing_cust_address']=$billing_data['billing_address'];
			$data['billing_cust_country']=$billing_data['billing_country'];
			$data['billing_cust_state']=$billing_data['billing_state'];
			$data['billing_zip']=$billing_data['billing_postal'];
			$data['billing_cust_tel']=$billing_data['billing_phone'];
			$data['billing_cust_email']=$billing_data['user_email'];
			$data['billing_cust_city']=$billing_data['billing_city'];
			$data['billing_zip_code']=$billing_data['billing_postal'];
			$data['delivery_cust_name']=$billing_data['shipping_name'];
			$data['delivery_cust_address']=$billing_data['shipping_address'];
			$data['delivery_cust_country']=$billing_data['shipping_country'];
			$data['delivery_cust_state']=$billing_data['shipping_state'];
			$data['delivery_cust_tel']=$billing_data['shipping_phone'];
			$data['delivery_cust_notes']='';
			$data['delivery_cust_city']=$billing_data['shipping_city'];
			$data['delivery_zip_code']=$billing_data['shipping_postal'];

			$data['Merchant_Id'] = '44675';
			$data['WorkingKey'] = 'D2E31D2311D4EE361F3328CF84F21244';
			$stamp = strtotime("now").$this->input->ip_address();
			$data['Order_Id'] = $billing_data['booking_id'];
			$data['Amount'] = ($billing_data['p_amount'] > 0 ? $billing_data['p_amount'] : $billing_data['totalamount']);
			$data['Redirect_Url']="'".base_url('admin/bookings/confirm')."'";
			$data['Checksum']=$this->ccavenue->getCheckSum($data['Merchant_Id'],$data['Amount'],$data['Order_Id'] ,$data['Redirect_Url'],$data['WorkingKey']);
			//redirect('admin/bookings/confirm');
			$this->load->view('booking/ccavenueBooking',$data);
		} else {
			redirect('admin/bookings');
		}
	}

	public function confirm() {
		$billing_data = $this->session->userdata('billing_info');
		$this->session->unset_userdata('billing_info');
		if($billing_data['p_amount'] > 0){
			$data['booking_id']= $billing_data['booking_id'];
			$data['payment_status']= 3;
		} else {
			$data['booking_id']= $billing_data['booking_id'];
			$data['payment_status']= 2;
		}
		$_data['status'] = 'successfull';
		$result = $this->bookings_model->bookings_save($data);
		$this->load->view('common/admin-top');
		$this->load->view('booking/bookingConfirm',$_data);
		$this->load->view('common/admin-bottom');
	}
}
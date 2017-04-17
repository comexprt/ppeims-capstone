<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ppeims extends CI_Controller {
	
	function __construct()
	{
	   parent::__construct();
	   date_default_timezone_set('asia/manila');
	   $this->load->model('Model_query','',TRUE);
	   $this->load->library('pagination');
	   
		$prefs = array (
			   'local_time'    => time(),
	        );
		   
		$this->load->library('calendar', $prefs);
		$this->load->library('session');	
    }
 
	public function index(){if ($this->session->userdata('logged_so')){redirect('ppeims/Homepage');}else{redirect('ppeims/login');}}
	
	function login(){if ($this->session->userdata('logged_so')){redirect('ppeims/Homepage');}else{$this->load->view("login");}}
	
	function InvalidURL(){$this->load->view('error-404');	}
	
	function verifyloginEmployee(){
	   $confirmation=$this->input->post('login');
	   if ($confirmation=="login"){
		   $this->load->library('form_validation');
		   $this->form_validation->set_rules('Username', 'Username', 'trim|required');
		   $this->form_validation->set_rules('Password', 'Password', 'trim|required|callback_check_database_employee');
		   if($this->form_validation->run() == FALSE)
		   {$this->login();}else{redirect('ppeims/Homepage');}}else{redirect('ppeims/InvalidURL');}}
	 
	 function check_database_employee($Password){
	   $Username = $this->input->post('Username');
		if( $Username != ''){
		  $result = $this->Model_query->checkAuthentication($Username, $Password);
		   if($result){$sess_array = array(); foreach($result as $row){$sess_array = array('Username' => $row->Username,
				'Password' => $row->Password,'Fname' => $row->Fname,'Lname' => $row->Lname,'Position' => $row->Position,);
			  	$this->session->set_userdata('logged_so', $sess_array);}return TRUE;}else{
				$this->form_validation->set_message('check_database_employee', 'Opps !!  Error: Invalid username or password');
				return false;}}else{redirect('ppeims/InvalidURL');}}
	
	public function emp_logout(){if ($this->session->userdata('logged_so')){$this->session->sess_destroy();redirect('ppeims');}else{redirect('ppeims/InvalidURL');}}
	
	public function Homepage(){
		if($this->session->userdata('logged_so')){
		
			$session_data = $this->session->userdata('logged_so');$Fname = $session_data['Fname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];
			$data['Fname'] = "$Fname";$data['Lname'] = "$Lname";$data['Position'] = "$Position";			
			$this->load->view('Homepage',$data);
		}else{redirect('ppeims/InvalidURL');}}
		
	//Initial page w/o Function
		
	public function inventory(){
		if($this->session->userdata('logged_so')){
			$session_data = $this->session->userdata('logged_so');$Fname = $session_data['Fname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];
			$data['Fname'] = "$Fname";$data['Lname'] = "$Lname";$data['Position'] = "$Position";	
			$data['getEquipment'] = $this->Model_query->getEquipment();			
			$this->load->view('inventory',$data);
		}else{redirect('ppeims/InvalidURL');}}
	//Initial page w/o Function End --
	 public function Inventory_Report(){
		if($this->session->userdata('logged_so')){$session_data = $this->session->userdata('logged_so');	
			$action = $this->session->flashdata('action');$this->session->keep_flashdata('action');$message = $this->session->flashdata('message');$this->session->keep_flashdata('message');
			
			$Fname = $session_data['Fname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];
			$data['Fname'] = "$Fname";$data['Lname'] = "$Lname";$data['Position'] = "$Position";		
			if ($action =="add-ui") {$data['message']= $message;}else{$data['message'] = "";}
			
			$data['getEquipment'] = $this->Model_query->getEquipmentName();
			$data['getLastInventoryReport'] = $this->Model_query->getLastInventoryReport();
			$data['getInventoryReportInfo'] = $this->Model_query->getInventoryReportInfo();
			$data['getInventoryReportInfoDetails'] = $this->Model_query->getInventoryReportInfoDetails();
			
			$this->load->view('inventory-report',$data);
		}else{redirect('ppeims/InvalidURL');}}
		
		public function createinventoryreport(){
		if($this->session->userdata('logged_so')){
		$session_data = $this->session->userdata('logged_so');$Fname = $session_data['Fname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];
		
			if ($this->input->post('access') == "add-ui"){
				$Cur_date = date("Y-m-d");
				$rp =  "$Fname[0]. $Lname";
				
				$newRow2=array( "date_create" =>$Cur_date,"prepared_by" => $rp,"status" => 1);
				$this->Model_query->addInventoryReport($newRow2);
				
				$result = $this->Model_query->getLastInventoryReport();
				if($result){ $Id_array = array(); foreach($result as $row){$Id_array = array( 'irid' => $row->irid);}}else{$Id_array = array();$Id_array = array( 'irid' =>0);}
				$Lastirid = $Id_array ['irid'];
				
				$item_array=$this->input->post('equipment');
				$arrlength = count($item_array);
					for($x = 0; $x < $arrlength; $x++) 
					{
						$separate_name=explode('-',$item_array[$x]);
						$In_Stock = "$separate_name[1] $separate_name[2]";
						
						$newRow=array( "irid" =>$Lastirid ,"Particular" => $separate_name[0],"In_Stock" => $In_Stock,"Remarks" =>"");
					$this->Model_query->addInventoryReportDetails($newRow);
					}
				
				
				$message="Inventory Report Has been created .."; $this->session->set_flashdata('action','add-ui');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/update_inventory_report/'.$Lastirid);
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
		
	public function delete_inventory_report(){
		if($this->session->userdata('logged_so')){
				$id = $this->uri->segment(3);
				
				$this->Model_query->deleteInventoryReport($id);
				$this->Model_query->deleteInventoryReportDetails($id);
				$message="Inventory Report has been Deleted .."; $this->session->set_flashdata('action','add-ui');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/Inventory_Report');
		}
		else{redirect('ppeims/InvalidURL');}}
	
	public function update_inventory_report(){
		if($this->session->userdata('logged_so')){$session_data = $this->session->userdata('logged_so');
			$id = $this->uri->segment(3);
			
			$action = $this->session->flashdata('action');$this->session->keep_flashdata('action');$message = $this->session->flashdata('message');$this->session->keep_flashdata('message');
			$Fname = $session_data['Fname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];
			$data['Fname'] = "$Fname";$data['Lname'] = "$Lname";$data['Position'] = "$Position";
			//echo $id;
			if ($action=="add-ui") {$data['message']= $message;}else{$data['message'] = "";}
			
			$data['id'] = $id;
			$data['getInventoryReport'] = $this->Model_query->getInventoryReport($id);			
			$this->load->view('update_inventory_report',$data);
		}else{redirect('ppeims/InvalidURL');}}
		
		public function addremarks(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-ui"){
				$irid = $this->input->post('irid');
				$irdid = $this->input->post('irdid');
				$Remarks = $this->input->post('Remarks');
				//echo $irdid."-".$irid."-".$Remarks;
				$this->Model_query->addInventoryReportRemarks($Remarks,$irdid);
				$message="Remarks has been added .."; $this->session->set_flashdata('action','add-ui');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/update_inventory_report/'.$irid);
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
		
		public function print_inventory_report_confirm(){
		if($this->session->userdata('logged_so')){$session_data = $this->session->userdata('logged_so');
			$id = $this->uri->segment(3);
			$this->Model_query->getInventoryReportStatus($id);			
			$this->load->view('print-inventory-report-confirm');
		}else{redirect('ppeims/InvalidURL');}}
		
	public function issuance(){
		if($this->session->userdata('logged_so')){
		$action = $this->session->flashdata('action');$this->session->keep_flashdata('action');$message = $this->session->flashdata('message');$this->session->keep_flashdata('message');
			
			if ($action =="add-ui") {$data['message']= $message;}else{$data['message'] = "";}
			
			$session_data = $this->session->userdata('logged_so');$Fname = $session_data['Fname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];
			$data['Fname'] = "$Fname";$data['Lname'] = "$Lname";$data['Position'] = "$Position";			
			$data['getlast_issuance'] = $this->Model_query->getlast_issuance();			
			$data['getlist_issuance'] = $this->Model_query->getlist_issuance();			
			$this->load->view('issuance',$data);
		}else{redirect('ppeims/InvalidURL');}}
		
			
	public function addIssuance(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-ui"){
				$Cur_date = date("Y-m-d");
				$newRow=array( "status" => 3,"date_modified" => $Cur_date ,"total_personnel" => 0);
				$this->Model_query->addIssuance($newRow);
				$message="New Equipment Issuance has been added .."; $this->session->set_flashdata('action','add-ui');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/update_issuance/new_entry');
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
	
		public function update_issuance(){
		if($this->session->userdata('logged_so')){$session_data = $this->session->userdata('logged_so');
			$id = $this->uri->segment(3);
			
			$action = $this->session->flashdata('action');$this->session->keep_flashdata('action');$message = $this->session->flashdata('message');$this->session->keep_flashdata('message');
			$Fname = $session_data['Fname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];
			$data['Fname'] = "$Fname";$data['Lname'] = "$Lname";$data['Position'] = "$Position";
			//echo $id;
			if ($action=="add-ui") {$data['message']= $message;}else{$data['message'] = "";}
			$data['getPersonnelName'] = $this->Model_query->getPersonnelName();
			$data['getGroupName'] = $this->Model_query->getGroupName();
			
			if ($id == "new_entry"){
				$data['getLastTransaction'] = $this->Model_query->getLastIssuance();
				$result = $this->Model_query->getIssuance_last();
				
			}else{
				$data['getLastTransaction'] = $this->Model_query->getupdated_transactionDate($id);
				$result = $this->Model_query->getIssuance_lastS($id);
				
			}
				if($result){ $Id_array = array(); foreach($result as $row){$Id_array = array( 'isno' => $row->isno);}}else{$Id_array = array();$Id_array = array( 'isno' =>0);}
				$LastSId = $Id_array ['isno'];
			// echo $LastSId;
			$data['LastSId'] = $LastSId;
			$data['getLastIssuanceData'] = $this->Model_query->getLastIssuanceData($LastSId);
			$data['getLastIssuanceItemData'] = $this->Model_query->getLastIssuanceItemData($LastSId);
		
			$this->load->view('issuance_personnel',$data);
		}else{redirect('ppeims/InvalidURL');}}
		
		public function delete_issuance_personnel(){
		if($this->session->userdata('logged_so')){
				$id = $this->uri->segment(3);
				$id1 = $this->uri->segment(4);

				$this->Model_query->deleteIssuancePersonnel($id1);
				$message="Personnel on Issuance has been removed."; $this->session->set_flashdata('action','add-ui');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/update_issuance/'.$id);
			}else{redirect('ppeims/InvalidURL');}}
		
		public function delete_issuance(){
		if($this->session->userdata('logged_so')){
				$id = $this->uri->segment(3);

				$this->Model_query->delete_issuance($id);
				$message="Issuance has been successfully deleted."; $this->session->set_flashdata('action','add-ui');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/issuance');
			}else{redirect('ppeims/InvalidURL');}}
		
		public function update_issuance_item(){
		if($this->session->userdata('logged_so')){$session_data = $this->session->userdata('logged_so');
			$id = $this->uri->segment(3);
			
			$action = $this->session->flashdata('action');$this->session->keep_flashdata('action');$message = $this->session->flashdata('message');$this->session->keep_flashdata('message');
			$Fname = $session_data['Fname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];
			$data['Fname'] = "$Fname";$data['Lname'] = "$Lname";$data['Position'] = "$Position";
			//echo $id;
			if ($action=="add-ui") {$data['message']= $message;}else{$data['message'] = "";}
			
			$data['LastSId'] = $id;
			$data['getPersonnelIssuanceItemData'] = $this->Model_query->getPersonnelIssuanceItemData($id);
			$data['getPersonnelIssuanceISNO'] = $this->Model_query->getPersonnelIssuanceISNO($id);
			$data['getEquipment'] = $this->Model_query->getEquipment();
			$this->load->view('issuance_personnel_item',$data);
		}else{redirect('ppeims/InvalidURL');}}
		
		
	public function delete_issuance_item(){
		if($this->session->userdata('logged_so')){
				$id=$this->input->post('LastSId');
				$item_array=$this->input->post('item_issued');
				$arrlength = count($item_array);
					for($x = 0; $x < $arrlength; $x++) 
					{
						$separate_name=explode('-',$item_array[$x]);
						$this->Model_query->deleteItemIssuedonEI($separate_name[0],$separate_name[1]);
					}
					
				$this->Model_query->deleteItemIssuedPersonnel($id);
				$message="All Items on Personnel Issued has been Removed."; $this->session->set_flashdata('action','add-ui');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/update_issuance_item/'.$id);
			}else{redirect('ppeims/InvalidURL');}}
	
	public function addItemIssued(){
	if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-ui"){
				$id=$this->input->post('LastSId');
				$item_array=$this->input->post('particulars');
				$arrlength = count($item_array);
					for($x = 0; $x < $arrlength; $x++) 
					{
						$separate_name=explode('-',$item_array[$x]);

						$newRow=array( "particulars" => $separate_name[0],"in_stock" => $separate_name[1],"issued" => 0,"unit" => $separate_name[2],"date_received" => "00-00-00","pino" => $id,"EI_No" => $separate_name[3]);
					$this->Model_query->addItemIssued($newRow);
					}
				$message="New Item on Personnel has been added .."; $this->session->set_flashdata('action','add-ui');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/update_issuance_item/'.$id);
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
		
	public function UpdateItemIssued(){
	if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-ui"){
				$id=$this->input->post('LastSId');
				$old_issued=$this->input->post('old_issued');
				$issued=$this->input->post('issued');
				$date_received=$this->input->post('date_received');
				$iino=$this->input->post('iino');
				$EI_No=$this->input->post('EI_No');
				
				if ($issued == 0){
					$new_date_recieved = '0000-00-00';
				}else{
					$new_date_recieved = $date_received;
				}
				
				$this->Model_query->updateItemIssued($iino,$issued,$new_date_recieved);
				$this->Model_query->updateItemIssuedonEI($issued,$old_issued,$EI_No);
				
				$message="Particular has been updated ..."; $this->session->set_flashdata('action','add-ui');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/update_issuance_item/'.$id);
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
		
	
	
	public function addPersonnelIssued(){
	if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-ui"){
				$LastSId=$this->input->post('LastSId');
				$item_array=$this->input->post('items');
				$arrlength = count($item_array);
					for($x = 0; $x < $arrlength; $x++) 
					{
						$separate_name=explode('-',$item_array[$x]);
						$newRow=array( "personnel_name" => $separate_name[0],"work_center" => $separate_name[1],"total_item_issued" => 0,"isno" => $LastSId);
						$this->Model_query->addPersonnelIssued($newRow);
					}
				$message="New Personnel on Issuance has been added .."; $this->session->set_flashdata('action','add-ui');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/update_issuance/'.$LastSId);
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
		
	
	
	
	public function Equipment_Batch(){
		if($this->session->userdata('logged_so')){
			$action = $this->session->flashdata('action');$this->session->keep_flashdata('action');$message = $this->session->flashdata('message');$this->session->keep_flashdata('message');
			$session_data = $this->session->userdata('logged_so');$Fname = $session_data['Fname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];
			$Fname = $session_data['Fname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];
			$data['Fname'] = "$Fname";$data['Lname'] = "$Lname";$data['Position'] = "$Position";		
			if ($action =="add-ui") {$data['message']= $message;}else{$data['message'] = "";}
			
			$data['getEquipment'] = $this->Model_query->getEquipment();			
			$data['getEquipmentList'] = $this->Model_query->getEquipmentList();			
			$data['getEquipmentListDraftCount'] = $this->Model_query->getEquipmentListDraftCount();		
			$data['gettransaction_last'] = $this->Model_query->gettransaction_last();				
			$this->load->view('personal_protective_equipment_batch',$data);
		}else{redirect('ppeims/InvalidURL');}}
	
	
	public function equipment_batch_drafts(){
		if($this->session->userdata('logged_so')){
			$action = $this->session->flashdata('action');$this->session->keep_flashdata('action');$message = $this->session->flashdata('message');$this->session->keep_flashdata('message');
			$session_data = $this->session->userdata('logged_so');$Fname = $session_data['Fname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];
			$Fname = $session_data['Fname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];
			$data['Fname'] = "$Fname";$data['Lname'] = "$Lname";$data['Position'] = "$Position";		
			if ($action =="add-ui") {$data['message']= $message;}else{$data['message'] = "";}
			
			$data['getEquipment'] = $this->Model_query->getEquipment();			
			$data['getEquipmentListDraft'] = $this->Model_query->getEquipmentListDraft();					
			$this->load->view('equipment-batch-drafts',$data);
		}else{redirect('ppeims/InvalidURL');}}
	
	
	
	//Manage_account Function
		public function manage_account(){
		if($this->session->userdata('logged_so')){
			$action = $this->session->flashdata('action');$this->session->keep_flashdata('action');$message = $this->session->flashdata('message');$this->session->keep_flashdata('message');
			$session_data = $this->session->userdata('logged_so');$Fname = $session_data['Fname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];
			$data['Fname'] = "$Fname";$data['Lname'] = "$Lname";$data['Position'] = "$Position";			
			if ($action =="add-a") {$data['message']= $message;}else{$data['message'] = "";}
			$data['getAdmin'] = $this->Model_query->getAdmin();	
			$this->load->view('manage-account',$data);
		}else{redirect('ppeims/InvalidURL');}}
		
		public function edit_account(){
		if($this->session->userdata('logged_so')){
			$action = $this->session->flashdata('action');$this->session->keep_flashdata('action');$message = $this->session->flashdata('message');$this->session->keep_flashdata('message');
			$session_data = $this->session->userdata('logged_so');$Fname = $session_data['Fname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];
			$data['Fname'] = "$Fname";$data['Lname'] = "$Lname";$data['Position'] = "$Position";			
			if ($action =="add-a") {$data['message']= $message;}else{$data['message'] = "";}
			$data['getAdmin'] = $this->Model_query->getAdmin();	
			$this->load->view('edit-account',$data);
		}else{redirect('ppeims/InvalidURL');}}
		
		public function update_account(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-account"){$A_No = $this->input->post('A_No');
				if ($this->input->post('old_id1') == $this->input->post('old_id2')){
					$newPassword = $this->input->post('new_id');$message="Saved Changes and REDIRECTED in a few seconds ..";
					$newRow=array( "Username" => $this->input->post('Username'),"Password" => $newPassword,"Fname" => $this->input->post('Fname'),
									"Lname" => $this->input->post('Lname'),"Position" => $this->input->post('Position'));
					$this->Model_query->updateAccount($A_No,$newRow);
					}else {$message="Invalid Old Password ..";}
				$this->session->set_flashdata('action','add-a');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/manage_account');
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
			
		public function update_account_password(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-account"){$A_No = $this->input->post('A_No');
				if ($this->input->post('password') != $this->input->post('cpassword')){
					$message="Invalid Current Password ..";
				}elseif (($this->input->post('password')== $this->input->post('cpassword')) && ($this->input->post('npassword')!= $this->input->post('rpassword'))){
					$message="New Password Does not Match..";
				}elseif (($this->input->post('password')== $this->input->post('cpassword')) && ($this->input->post('npassword')== $this->input->post('rpassword'))){
					$newPassword = $this->input->post('new_id');$message="Saved Changes and REDIRECTED in a few seconds ..";
					$newRow=array( "Username" => $this->input->post('Username'),"Password" => $this->input->post('npassword'),"Fname" => $this->input->post('Fname'),
									"Lname" => $this->input->post('Lname'),"Position" => $this->input->post('Position'));
					$this->Model_query->updateAccount($A_No,$newRow);
					
					}else {$message="Error : Invalid Data Type";}
					
				$this->session->set_flashdata('action','add-a');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/manage_account');
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
	
	//Manage_account Function End --
	
	 
	
	//Personnel-Group Function
	public function personnel(){
		if($this->session->userdata('logged_so')){$session_data = $this->session->userdata('logged_so');	
			$action = $this->session->flashdata('action');$this->session->keep_flashdata('action');$message = $this->session->flashdata('message');$this->session->keep_flashdata('message');
			$GroupName = $this->session->flashdata('GroupName');$this->session->keep_flashdata('GroupName');
			$Fname = $session_data['Fname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];
			$data['Fname'] = "$Fname";$data['Lname'] = "$Lname";$data['Position'] = "$Position";		
			if ($action =="add-pn") {$data['message']= $message;
				if($GroupName != "All"){ 
					$data['getPersonnelName'] = $this->Model_query->getSpecificPersonnelName($GroupName);
				}else{$data['getPersonnelName'] = $this->Model_query->getPersonnelName();}
			}else{$data['message'] = "";$data['getPersonnelName'] = $this->Model_query->getPersonnelName();	}
			
			$data['getGroupName'] = $this->Model_query->getGroupName();			
			$this->load->view('personnel',$data);
		}else{redirect('ppeims/InvalidURL');}}
		
	public function filter_work_center(){
		if($this->session->userdata('logged_so')){
			$GroupName = $this->uri->segment(3);
			$extract = explode("%20",$GroupName);
			$combine = implode(" ",$extract);
			
			//print_r($combine);
			$message="Filter by $combine"; $this->session->set_flashdata('action','add-pn');$this->session->set_flashdata('message',"$message");$this->session->set_flashdata('GroupName',"$combine");
			redirect('ppeims/personnel');
		}else{redirect('ppeims/InvalidURL');}}
	
	public function new_personnel(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-personnel"){
				$PersonnelName = $this->input->post('PersonnelName');
				$newRow=array( "PersonnelName" => $PersonnelName,"G_No" => $this->input->post('G_No'));
				$this->Model_query->addPersonnelName($newRow);
				$message="$PersonnelName has been added."; $this->session->set_flashdata('action','add-pn');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/personnel');
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
			
	public function update_personnel(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-personnel"){
				$PersonnelName = $this->input->post('PersonnelName');$P_No = $this->input->post('P_No');
				$newRow=array( "PersonnelName" => $PersonnelName,"G_No" => $this->input->post('G_No'));
				$this->Model_query->updatePersonnelName($P_No,$newRow);
				$message="$PersonnelName has been updated."; $this->session->set_flashdata('action','add-pn');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/personnel');
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
			
	public function delete_personnel(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-personnel"){
				$PersonnelName = $this->input->post('PersonnelName');$P_No = $this->input->post('P_No');
				$this->Model_query->deletePersonnelName($P_No);
				$message="$PersonnelName has been deleted."; $this->session->set_flashdata('action','add-pn');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/personnel');
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
	//Personnel Function End --
	
	//Personnel-Group Function
	public function personnel_group(){
		if($this->session->userdata('logged_so')){$session_data = $this->session->userdata('logged_so');
			$action = $this->session->flashdata('action');$this->session->keep_flashdata('action');$message = $this->session->flashdata('message');$this->session->keep_flashdata('message');
			$Fname = $session_data['Fname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];
			$data['Fname'] = "$Fname";$data['Lname'] = "$Lname";$data['Position'] = "$Position";
			if ($action=="add-gn") {$data['message']= $message;}else{$data['message'] = "";}
			$data['getGroupName'] = $this->Model_query->getGroupName();
			$this->load->view('personnel-group',$data);
		}else{redirect('ppeims/InvalidURL');}}
		
	public function new_personnel_group(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-group"){
				$GroupName = $this->input->post('GroupName');
				$newRow=array( "GroupName" => $GroupName,"Description" => $this->input->post('Description'));
				$this->Model_query->addGroupName($newRow);
				$message="$GroupName has been added."; $this->session->set_flashdata('action','add-gn');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/personnel_group');
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
			
	public function update_personnel_group(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-group"){
				$GroupName = $this->input->post('GroupName');$G_No = $this->input->post('G_No');
				$newRow=array( "GroupName" => $GroupName,"Description" => $this->input->post('Description'));
				$this->Model_query->updateGroupName($G_No,$newRow);
				$message="$GroupName has been updated."; $this->session->set_flashdata('action','add-gn');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/personnel_group');
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
			
	public function delete_personnel_group(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-group"){
				$GroupName = $this->input->post('GroupName');$G_No = $this->input->post('G_No');
				$this->Model_query->deleteGroupName($G_No);
				$message="$GroupName has been deleted."; $this->session->set_flashdata('action','add-gn');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/personnel_group');
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
	//Personnel-Group Function End --		
	
	//Equipment Function
	public function equipment(){
		if($this->session->userdata('logged_so')){$session_data = $this->session->userdata('logged_so');
			$action = $this->session->flashdata('action');$this->session->keep_flashdata('action');$message = $this->session->flashdata('message');$this->session->keep_flashdata('message');
			$Fname = $session_data['Fname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];
			$data['Fname'] = "$Fname";$data['Lname'] = "$Lname";$data['Position'] = "$Position";
			if ($action=="add-e") {$data['message']= $message;}else{$data['message'] = "";}
			$data['getEquipment'] = $this->Model_query->getEquipment();
			
			$this->load->view('equipment',$data);
		}else{redirect('ppeims/InvalidURL');}}
	
	public function new_equipment(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-equipment"){
				$Particulars = $this->input->post('Particulars');
				$newRow=array( "Particulars" => $Particulars,"Description" => $this->input->post('Description'),"Stock" => $this->input->post('Stock'),
				"Re_Ordering_Pt" => $this->input->post('Re_Ordering_Pt'),"Issued" => $this->input->post('Issued'),"Unit" => "pcs","Remarks" => $this->input->post('Remarks'));
				$this->Model_query->addEquipment($newRow);
				$message="$Particulars has been added."; $this->session->set_flashdata('action','add-e');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/equipment');
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
			
	public function update_equipment(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-equipment"){
				$Particulars = $this->input->post('Particulars');$EI_No = $this->input->post('EI_No');
				$newRow=array( "Particulars" => $Particulars,"Description" => $this->input->post('Description'),"Stock" => $this->input->post('Stock'),
				"Re_Ordering_Pt" => $this->input->post('Re_Ordering_Pt'),"Issued" => $this->input->post('Issued'),"Unit" => $this->input->post('Unit'),"Remarks" => $this->input->post('Remarks'));
				$this->Model_query->updateEquipment($EI_No,$newRow);
				$message="$Particulars has been updated."; $this->session->set_flashdata('action','add-e');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/equipment');
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
	
	public function delete_equipment(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-equipment"){
				$Particulars = $this->input->post('Particulars');$EI_No = $this->input->post('EI_No');
				$this->Model_query->deleteEquipment($EI_No);
				$message="$Particulars has been deleted."; $this->session->set_flashdata('action','add-e');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/equipment');
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
	
	//Equipment Function End --		
	
	//Update Inventory Function
	public function update_inventory(){
		if($this->session->userdata('logged_so')){$session_data = $this->session->userdata('logged_so');
			$id = $this->uri->segment(3);
			
			$action = $this->session->flashdata('action');$this->session->keep_flashdata('action');$message = $this->session->flashdata('message');$this->session->keep_flashdata('message');
			$Fname = $session_data['Fname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];
			$data['Fname'] = "$Fname";$data['Lname'] = "$Lname";$data['Position'] = "$Position";
			//echo $id;
			if ($action=="add-ui") {$data['message']= $message;}else{$data['message'] = "";}
			$data['getEquipment'] = $this->Model_query->getEquipment();
			
			if ($id == "new_entry"){
				$data['getLastTransaction'] = $this->Model_query->getLastTransaction();
				$result = $this->Model_query->gettransaction_last();
				
			}else{
				$data['getLastTransaction'] = $this->Model_query->getupdated_transactionDate($id);
				$result = $this->Model_query->gettransaction_lastS($id);
				
			}
				if($result){ $Id_array = array(); foreach($result as $row){$Id_array = array( 'Tr_No' => $row->Tr_No);}}else{$Id_array = array();$Id_array = array( 'Tr_No' =>0);}
				$LastSId = $Id_array ['Tr_No'];
			// echo $LastSId;
			$data['LastSId'] = $LastSId;
			$data['getLastTransactionData'] = $this->Model_query->getLastTransactionData($LastSId);
			$data['gettransaction_last'] = $result;
			$this->load->view('update-inventory',$data);
		}else{redirect('ppeims/InvalidURL');}}
	
	public function inventory_equipmen_list(){
		if($this->session->userdata('logged_so')){$session_data = $this->session->userdata('logged_so');
			$action = $this->session->flashdata('action');$this->session->keep_flashdata('action');$LastSId1 = $this->session->flashdata('LastSId1');$this->session->keep_flashdata('LastSId1');$message = $this->session->flashdata('message');$this->session->keep_flashdata('message');
			$Fname = $session_data['Fname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];
			$data['Fname'] = "$Fname";$data['Lname'] = "$Lname";$data['Position'] = "$Position";
			if ($action=="add-iel") {$data['message']= $message;$LastSId=$LastSId1;}else{$data['message'] = "";$LastSId =$this->input->post('LastSId');}
			
			$data['getupdated_transactionDate'] = $this->Model_query->getupdated_transactionDate($LastSId);
			$data['getupdated_transactionAdmin'] = $this->Model_query->getupdated_transactionAdmin();
			$data['getUpdated_TransactionData'] = $this->Model_query->getUpdated_TransactionData($LastSId);
			$data['getLastTransactionData'] = $this->Model_query->getLastTransactionData($LastSId);
			$data['getUpdated_Transaction'] = $this->Model_query->getUpdated_Transaction($LastSId);
			//print_r ($data);
			$this->load->view('inventory-equipment-list',$data);
		}else{redirect('ppeims/InvalidURL');}}
	

	// start - Equipment - Batch
	public function new_ui(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-ui"){
				$Particulars = $this->input->post('Particulars');
				$uri = $this->input->post('uri');
				//echo $uri;
				$EI_No = $this->input->post('EI_No');
				$newRow=array( "Particulars" => $Particulars,"Added_S" => 0,"Subtracted_S" => 0,"unit" => "",
				"Total_S" => 0,"Re_OrderPt" => 3,"Expiration_Date" => "0000-00-00","Remarks" => "","Tr_No" => $uri,"EI_No" => $EI_No);
				//var_dump($newRow);
				$this->Model_query->addUI($newRow);
				$message="Equipment : $Particulars has been added to the list .."; $this->session->set_flashdata('action','add-ui');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/update_inventory/'.$uri);
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
			
	public function addbatch(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-ui"){
				$Cur_date = date("Y-m-d");
				$Pb=$this->input->post('Pb');
				$newRow=array( "Tr_Date" => $Cur_date,"Pb" =>$Pb ,"Status" => 0);
				$this->Model_query->addbatch($newRow);
				$message="New Batch has been added .."; $this->session->set_flashdata('action','add-ui');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/update_inventory/new_entry');
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
			
	public function delete_iel_step1(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-ui"){
				$Particulars = $this->input->post('Particulars');$Tr_D_No = $this->input->post('Tr_D_No');$uri = $this->input->post('uri');
				$this->Model_query->deleteUpdateTransactionDetails($Tr_D_No);
				$message="Equipment: $Particulars has been deleted on the list.."; $this->session->set_flashdata('action','add-ui');$this->session->set_flashdata('LastSId1',"$Tr_No");$this->session->set_flashdata('message',"$message");
				redirect('ppeims/update_inventory/'.$uri);
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
			
	
	// end - Equipment Batch
	
	public function update_iel(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-iel"){
				$Particulars = $this->input->post('Particulars');$Tr_D_No = $this->input->post('Tr_D_No');$Tr_No = $this->input->post('Tr_No');
				$Stock= $this->input->post('Stock');$Total_S = $Stock - $this->input->post('old_Added_S') + $this->input->post('Added_S');
				
				$newRow=array( "Particulars" => $Particulars,"Added_S" => $this->input->post('Added_S'),"Subtracted_S" => 0,
				"Unit" => $this->input->post('Unit'),"Total_S" => $Total_S,"Re_OrderPt" => $this->input->post('Re_OrderPt')
				,"Expiration_Date" => $this->input->post('Expiration_Date'),"Remarks" => $this->input->post('Remarks'),"Tr_No" => $this->input->post('Tr_No'),"EI_No" => $this->input->post('EI_No'));
				
				$this->Model_query->updateUpdateTransactionDetails($Tr_D_No,$newRow);
				$message="Equipment : $Particulars has been updated.."; $this->session->set_flashdata('action','add-iel');$this->session->set_flashdata('LastSId1',"$Tr_No");$this->session->set_flashdata('message',"$message");
				redirect('ppeims/inventory_equipmen_list');
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
			
	public function delete_iel(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-iel"){
				$Particulars = $this->input->post('Particulars');$Tr_D_No = $this->input->post('Tr_D_No');$Tr_No = $this->input->post('Tr_No');
				$this->Model_query->deleteUpdateTransactionDetails($Tr_D_No);
				$message="Equipment: $Particulars has been deleted on the list.."; $this->session->set_flashdata('action','add-iel');$this->session->set_flashdata('LastSId1',"$Tr_No");$this->session->set_flashdata('message',"$message");
				redirect('ppeims/inventory_equipmen_list');
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
			
	
			
	public function update_ui(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-ui"){
				$Tr_No = $this->input->post('Tr_No');
				$newRow=array( "Tr" => $Particulars,"Description" => $this->input->post('Description'),"Stock" => $this->input->post('Stock'),
				"Re_Ordering_Pt" => $this->input->post('Re_Ordering_Pt'),"Issued" => $this->input->post('Issued'),"Unit" => $this->input->post('Unit'),"Remarks" => $this->input->post('Remarks'));
				$this->Model_query->updateUI($Tr_No,$newRow);
				$message="Batch No: $Tr_No has been Successfully Updated"; $this->session->set_flashdata('action','add-ui');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/Equipment_Batch');
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
	
	public function update_tr_complete(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-ui"){
				$Tr_No = $this->input->post('Tr_No');
				$Cur_date = date("Y-m-d");
				$newRow=array( "Tr_No" => $Tr_No,"Tr_Date" => $Cur_date,"Pb" => $this->input->post('Pb'),"Status" => 1);
				$this->Model_query->updateUI($Tr_No,$newRow);
				$message="Batch No: $Tr_No - Marked as Completed .."; $this->session->set_flashdata('action','add-ui');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/Equipment_Batch');
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
	
	public function update_tr_Draft(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-ui"){
				$Tr_No = $this->input->post('Tr_No');
				$Cur_date = date("Y-m-d");
				$newRow=array( "Tr_No" => $Tr_No,"Tr_Date" => $Cur_date,"Pb" => $this->input->post('Pb'),"Status" => 2);
				$this->Model_query->updateUI($Tr_No,$newRow);
				$message="Batch No: $Tr_No - Saved as Draft .."; $this->session->set_flashdata('action','add-ui');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/equipment_batch_drafts');
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
	
	public function delete_tr(){
		if($this->session->userdata('logged_so')){
			if ($this->input->post('access') == "add-ui"){
				$Tr_No = $this->input->post('Tr_No');
				$this->Model_query->deleteUI($Tr_No);
				$message="Batch No: $Tr_No Has been Deleted.."; $this->session->set_flashdata('action','add-ui');$this->session->set_flashdata('message',"$message");
				redirect('ppeims/Equipment_Batch');
			}else{redirect('ppeims/InvalidURL');}}else{redirect('ppeims/InvalidURL');}}
	
	
	
	
	
	//Equipment Function End --		
			
	public function select_plant_personnel() {
		if ($this->session->userdata('logged_so')) {
			$session_data = $this->session->userdata('logged_so');
			$Fname = $session_data['Fname'];
			$Lname = $session_data['Lname'];
			$Position = $session_data['Position'];
			$data['Fname'] = "$Fname";
			$data['Lname'] = "$Lname";
			$data['Position'] = "$Position";
			$this->load->view('select-plant-personnel',$data);
		} else {
			redirect('ppeims/InvalidURL');
		}
	}

	public function print_plant_personnel_draft() {
		if ($this->session->userdata('logged_so')) {
			$session_data = $this->session->userdata('logged_so');
			$Fname = $session_data['Fname'];
			$Lname = $session_data['Lname'];
			$Position = $session_data['Position'];
			$data['Fname'] = "$Fname";
			$data['Lname'] = "$Lname";
			$data['Position'] = "$Position";
			$this->load->view('print-plant-personnel-draft',$data);
		} else {
			redirect('ppeims/InvalidURL');
		}
	}

	public function add_personal_protective_equipment_issuance() {
		if ($this->session->userdata('logged_so')) {
			$session_data = $this->session->userdata('logged_so');
			$Fname = $session_data['Fname'];
			$Lname = $session_data['Lname'];
			$Position = $session_data['Position'];
			$data['Fname'] = "$Fname";
			$data['Lname'] = "$Lname";
			$data['Position'] = "$Position";
			$this->load->view('add-personal-protective-equipment-issuance',$data);
		} else {
			redirect('ppeims/InvalidURL');
		}
	}
}


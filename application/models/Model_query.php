<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Model_query extends CI_Model
{
		public function __construct()
		{
			parent::__construct();
		}

		
		function checkAuthentication($username, $password){
			$this -> db -> select('Username, Password,Fname,Lname,Position');
			$this -> db -> from('Administrator');
			$this -> db -> where('Username', $username);
			$this -> db -> where('Password', $password);
			$this -> db -> limit(1);
			$query = $this -> db -> get();
			if($query -> num_rows() == 1){
				return $query->result();   
			} else {     
					return false;
				}
		}
		public function getEquipmentList(){ $query = $this->db->query("SELECT * FROM `updated_transaction` WHERE Tr_No != 1 ORDER BY Tr_No DESC");$result = $query->result();return $result;}
		
		public function getAdmin(){ $query = $this->db->query("SELECT * FROM `administrator` Where Username ='admin'");$result = $query->result();return $result;}
		public function getGroupName(){ $query = $this->db->query("SELECT * FROM `group` Where 1 ORDER BY G_No");$result = $query->result();return $result;}
		public function getEquipment(){ $query = $this->db->query("SELECT * FROM `equipement_inventory` Where 1 ORDER BY EI_No");$result = $query->result();return $result;}
		public function getPersonnelName(){ $query = $this->db->query("SELECT * FROM `personnel` JOIN	`group` ON personnel.G_No = group.G_No WHERE 1 ORDER BY GroupName,PersonnelName");$result = $query->result();return $result;}
		
		public function getLastTransaction(){
			$query = $this->db->query("SELECT * FROM `updated_transaction` JOIN	`updated_transaction_Details` ON updated_transaction.Tr_No = updated_transaction_Details.Tr_No ORDER BY updated_transaction.Tr_No DESC LIMIT 1");
			$result = $query->result();return $result;}
			
		public function getLastTransactionData($data){
			$query = $this->db->query("SELECT * FROM `updated_transaction` JOIN	`updated_transaction_Details` ON updated_transaction.Tr_No = updated_transaction_Details.Tr_No WHERE updated_transaction.Tr_No='".$data."'");
			$result = $query->result();return $result;}
		
		public function getupdated_transactionData($data){
			$query = $this->db->query("SELECT * FROM `updated_transaction` JOIN `updated_transaction_Details` ON updated_transaction.Tr_No = updated_transaction_Details.Tr_No JOIN `equipement_inventory` ON updated_transaction_Details.EI_No = equipement_inventory.EI_No WHERE updated_transaction.Tr_No='".$data."'");
			$result = $query->result();return $result;}
		
		public function getupdated_transactionDate($data){
			$query = $this->db->query("SELECT * FROM `updated_transaction` WHERE Tr_No='".$data."' limit 1");
			$result = $query->result();return $result;}
		
		public function getupdated_transactionAdmin(){
			$query = $this->db->query("SELECT * FROM `administrator` WHERE 1 limit 1");
			$result = $query->result();return $result;}
		
		public function getupdated_transaction($data){
			$query = $this->db->query("SELECT * FROM `updated_transaction` WHERE updated_transaction.Tr_No='".$data."'");
			$result = $query->result();return $result;}
		
		public function addPersonnelName($data){$this->db->insert("Personnel",$data);}
		public function updatePersonnelName($data1,$data2){$this->db->where('P_No', $data1);$this->db->update('Personnel', $data2);}
		public function deletePersonnelName($data){$this->db->where('P_No', $data);$this->db->delete('Personnel');}
		
		public function addGroupName($data){$this->db->insert("Group",$data);}
		public function updateGroupName($data1,$data2){$this->db->where('G_No', $data1);$this->db->update('Group', $data2);}
		public function deleteGroupName($data){$this->db->where('G_No', $data);$this->db->delete('Group');}
		
		public function addEquipment($data){$this->db->insert("equipement_inventory",$data);}
		public function updateEquipment($data1,$data2){$this->db->where('EI_No', $data1);$this->db->update('equipement_inventory', $data2);}
		public function deleteEquipment($data){$this->db->where('EI_No', $data);$this->db->delete('equipement_inventory');}
		
		public function updateUI($data1,$data2){$this->db->where('Tr_No', $data1);$this->db->update('updated_transaction', $data2);}
		public function deleteUI($data){$this->db->where('Tr_No', $data);$this->db->delete('updated_transaction');}
		
		public function updateAccount($data1,$data2){$this->db->where('A_No', $data1);$this->db->update('Administrator', $data2);}
		public function addUI($data){$this->db->insert("updated_transaction_Details",$data);}

		public function updateUpdateTransactionDetails($data1,$data2){$this->db->where('Tr_D_No', $data1);$this->db->update('updated_transaction_Details', $data2);}
		public function deleteUpdateTransactionDetails($data){$this->db->where('Tr_D_No', $data);$this->db->delete('updated_transaction_Details');}
		
		/************************************************           E        N          D       ****************************************/

		
	
	}	
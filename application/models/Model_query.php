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
		public function getAdmin(){ $query = $this->db->query("SELECT * FROM `Administrator` Where Username ='admin'");$result = $query->result();return $result;}
		public function getGroupName(){ $query = $this->db->query("SELECT * FROM `Group` Where 1 ORDER BY G_No");$result = $query->result();return $result;}
		public function getEquipment(){ $query = $this->db->query("SELECT * FROM `Equipement_Inventory` Where 1 ORDER BY EI_No");$result = $query->result();return $result;}
		public function getPersonnelName(){ $query = $this->db->query("SELECT * FROM `Personnel` JOIN	`Group` ON Personnel.G_No = Group.G_No WHERE 1 ORDER BY GroupName,PersonnelName");$result = $query->result();return $result;}
		
		public function getLastTransaction(){
			$query = $this->db->query("SELECT * FROM `Updated_Transaction` JOIN	`Updated_Transaction_Details` ON Updated_Transaction.Tr_No = Updated_Transaction_Details.Tr_No ORDER BY Updated_Transaction.Tr_No DESC LIMIT 1");
			$result = $query->result();return $result;}
			
		public function getLastTransactionData($data){
			$query = $this->db->query("SELECT * FROM `Updated_Transaction` JOIN	`Updated_Transaction_Details` ON Updated_Transaction.Tr_No = Updated_Transaction_Details.Tr_No WHERE Updated_Transaction.Tr_No='".$data."'");
			$result = $query->result();return $result;}
		
		public function getUpdated_TransactionData($data){
			$query = $this->db->query("SELECT * FROM `Updated_Transaction` JOIN `Updated_Transaction_Details` ON Updated_Transaction.Tr_No = Updated_Transaction_Details.Tr_No JOIN `Equipement_Inventory` ON Updated_Transaction_Details.EI_No = Equipement_Inventory.EI_No WHERE Updated_Transaction.Tr_No='".$data."'");
			$result = $query->result();return $result;}
		
		public function getUpdated_Transaction($data){
			$query = $this->db->query("SELECT * FROM `Updated_Transaction` WHERE Updated_Transaction.Tr_No='".$data."'");
			$result = $query->result();return $result;}
		
		public function addPersonnelName($data){$this->db->insert("Personnel",$data);}
		public function updatePersonnelName($data1,$data2){$this->db->where('P_No', $data1);$this->db->update('Personnel', $data2);}
		public function deletePersonnelName($data){$this->db->where('P_No', $data);$this->db->delete('Personnel');}
		
		public function addGroupName($data){$this->db->insert("Group",$data);}
		public function updateGroupName($data1,$data2){$this->db->where('G_No', $data1);$this->db->update('Group', $data2);}
		public function deleteGroupName($data){$this->db->where('G_No', $data);$this->db->delete('Group');}
		
		public function addEquipment($data){$this->db->insert("Equipement_Inventory",$data);}
		public function updateEquipment($data1,$data2){$this->db->where('EI_No', $data1);$this->db->update('Equipement_Inventory', $data2);}
		public function deleteEquipment($data){$this->db->where('EI_No', $data);$this->db->delete('Equipement_Inventory');}
		
		public function updateAccount($data1,$data2){$this->db->where('A_No', $data1);$this->db->update('Administrator', $data2);}
		public function addUI($data){$this->db->insert("Updated_Transaction_Details",$data);}

		public function updateUpdateTransactionDetails($data1,$data2){$this->db->where('Tr_D_No', $data1);$this->db->update('Updated_Transaction_Details', $data2);}
		public function deleteUpdateTransactionDetails($data){$this->db->where('Tr_D_No', $data);$this->db->delete('Updated_Transaction_Details');}
		
		/************************************************           E        N          D       ****************************************/

		
	
	}	
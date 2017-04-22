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
		public function getEquipmentList(){ $query = $this->db->query("SELECT * FROM `updated_transaction` WHERE Tr_No != 1 AND Status=1 ");$result = $query->result();return $result;}
		public function getEquipmentListDraft(){ $query = $this->db->query("SELECT * FROM `updated_transaction` WHERE Tr_No != 1 AND Status=2 ");$result = $query->result();return $result;}
		public function getEquipmentListDraftCount(){ $query = $this->db->query("SELECT COUNT(*) AS draftcount FROM `updated_transaction` WHERE Tr_No != 1 AND Status = 2");$result = $query->result();return $result;}
		
		public function getAdmin(){ $query = $this->db->query("SELECT * FROM `administrator` Where Username ='admin'");$result = $query->result();return $result;}
		public function getGroupName(){ $query = $this->db->query("SELECT * FROM `group` Where 1 ORDER BY GroupName");$result = $query->result();return $result;}
		public function getEquipment(){ $query = $this->db->query("SELECT * FROM `equipement_inventory` Where 1 ORDER BY Particulars");$result = $query->result();return $result;}
		public function getEquipmentName(){ $query = $this->db->query("SELECT * FROM `equipement_inventory` Where 1 ORDER BY Particulars");$result = $query->result();return $result;}
		
		public function getInventoryReport($data){ $query = $this->db->query("SELECT * FROM `inventory_report_details` Where irid = '".$data."' ORDER BY Particular");$result = $query->result();return $result;}
		
		public function getPersonnelName(){ $query = $this->db->query("SELECT * FROM `personnel` JOIN	`group` ON personnel.G_No = group.G_No WHERE 1 ORDER BY PersonnelName");$result = $query->result();return $result;}
		
		public function getSpecificPersonnelName($data){ $query = $this->db->query("SELECT * FROM `personnel` JOIN	`group` ON personnel.G_No = group.G_No WHERE GroupName = '".$data."' ORDER BY PersonnelName");$result = $query->result();return $result;}
		
		public function getLastTransaction(){
			$query = $this->db->query("SELECT * FROM `updated_transaction` JOIN	`updated_transaction_Details` ON updated_transaction.Tr_No = updated_transaction_Details.Tr_No ORDER BY updated_transaction.Tr_No DESC LIMIT 1");
			$result = $query->result();return $result;}
		
		public function getLastTransactionS($data){
			$query = $this->db->query("SELECT * FROM `updated_transaction` JOIN	`updated_transaction_Details` ON updated_transaction.Tr_No = updated_transaction_Details.Tr_No WHERE updated_transaction.Tr_No='".$data."' LIMIT 1");
			$result = $query->result();return $result;}
			
		public function getLastIssuance(){
			$query = $this->db->query("SELECT * FROM `issuance` JOIN `personnel_issued` ON issuance.isno = personnel_issued.isno where 1 ORDER BY issuance.isno DESC LIMIT 1");
			$result = $query->result();return $result;}
		
		public function getLastBatch(){
			$query = $this->db->query("SELECT * FROM `updated_transaction` JOIN `updated_transaction_Details` ON updated_transaction.Tr_No = updated_transaction_Details.Tr_No where 1 ORDER BY updated_transaction.Tr_No DESC LIMIT 1");
			$result = $query->result();return $result;}
			
		public function getLastIssuanceS($data){
			$query = $this->db->query("SELECT * FROM `issuance` JOIN `personnel_issued` ON issuance.isno = personnel_issued.isno where isno='".$data."' ORDER BY issuance.isno LIMIT 1");
			$result = $query->result();return $result;}
			
		public function getLastTransactionData($data){
			$query = $this->db->query("SELECT * FROM `updated_transaction` JOIN	`updated_transaction_Details` ON updated_transaction.Tr_No = updated_transaction_Details.Tr_No WHERE updated_transaction.Tr_No='".$data."'");
			$result = $query->result();return $result;}
			
		public function getLastIssuanceData($data){
			$query = $this->db->query("SELECT * FROM `issuance` JOIN `personnel_issued` ON issuance.isno = personnel_issued.isno WHERE issuance.isno = '".$data."'");
			$result = $query->result();return $result;}
		
		
		public function getLastBatchData($data){
			$query = $this->db->query("SELECT * FROM `updated_transaction` JOIN `updated_transaction_Details` ON updated_transaction.Tr_No = updated_transaction_Details.Tr_No WHERE updated_transaction.Tr_No = '".$data."'");
			$result = $query->result();return $result;}
		
		
		public function getLastIssuanceItemData($data){
			$query = $this->db->query("SELECT * FROM `personnel_issued` WHERE isno = '".$data."'");
			$result = $query->result();return $result;}
		
		public function getitemlow(){
			$query = $this->db->query("SELECT * FROM `equipement_inventory` WHERE Re_Ordering_Pt >= Stock order by Particulars");
			$result = $query->result();return $result;}
			
		public function getitemlowcount(){
			$query = $this->db->query("SELECT count(*) as count FROM `equipement_inventory` WHERE Re_Ordering_Pt >= Stock");
			$result = $query->result();return $result;}
		
		public function getitemexpired(){
			$query = $this->db->query("SELECT updated_transaction.Tr_No, updated_transaction.Tr_Date,updated_transaction.Status, updated_transaction_details.Particulars, 
			updated_transaction_details.Added_S, updated_transaction_details.Unit,updated_transaction_details.Expiration_Date 
			FROM  `updated_transaction` join `updated_transaction_details` ON updated_transaction.Tr_No = updated_transaction_details.Tr_No 
			WHERE Expiration_Date <= CURRENT_DATE AND updated_transaction.Status != 3 ORDER by Expiration_Date DESC");
			$result = $query->result();return $result;}
			
		public function getitemexpiredcount(){
			$query = $this->db->query("SELECT count(*) as count FROM  `updated_transaction` join `updated_transaction_details` ON updated_transaction.Tr_No = updated_transaction_details.Tr_No 
			WHERE Expiration_Date <= CURRENT_DATE AND updated_transaction.Status != 3");
			$result = $query->result();return $result;}
		
		public function getissueonpersonnel(){
			$query = $this->db->query("SELECT * FROM issuance JOIN personnel_issued ON issuance.isno = personnel_issued.isno JOIN item_issued ON personnel_issued.pino = item_issued.pino ORDER BY date_received desc");
			$result = $query->result();return $result;}
		
		public function getLastBatchItemData($data){
			$query = $this->db->query("SELECT * FROM `updated_transaction_Details` WHERE Tr_No = '".$data."'");
			$result = $query->result();return $result;}
		
		public function getPersonnelIssuanceItemData($data){
			$query = $this->db->query("SELECT * FROM `item_issued` WHERE pino  = '".$data."'");
			$result = $query->result();return $result;}
		
		//other version on update
		public function updateItemIssued($data,$data1,$data2){
			$query = $this->db->query("update item_issued SET issued = ".$data1.",date_received='".$data2."' WHERE iino = ".$data.""); }
		
		
		public function updateItemIssuedonEI($data,$data1,$data2){
			$query = $this->db->query("update equipement_inventory SET Stock = stock + ".$data1." - ".$data." WHERE EI_No = ".$data2.""); }
		
		public function deleteItemIssuedonEI($data,$data1){
			$query = $this->db->query("update equipement_inventory SET Stock = stock + ".$data."  WHERE EI_No = ".$data1.""); }
		
		public function deleteItemIssuedPersonnel($data){
			$query = $this->db->query("delete from item_issued WHERE pino = ".$data.""); }
		
		public function getPersonnelIssuanceISNO($data){
			$query = $this->db->query("SELECT isno,personnel_name FROM `personnel_issued` WHERE pino = '".$data."'");
			$result = $query->result();return $result;}
		
		public function updateItemIssuance($data,$data1,$data2){
			$query = $this->db->query("UPDATE item_issued SET issued = '".$data."', date_received = '".$data1."' WHERE iino = '".$data2."' ");}
		
		public function getupdated_transactionData($data){
			$query = $this->db->query("SELECT * FROM `updated_transaction` JOIN `updated_transaction_Details` ON updated_transaction.Tr_No = updated_transaction_Details.Tr_No JOIN `equipement_inventory` ON updated_transaction_Details.EI_No = equipement_inventory.EI_No WHERE updated_transaction.Tr_No='".$data."'");
			$result = $query->result();return $result;}
		
		public function getupdated_transactionDate($data){
			$query = $this->db->query("SELECT * FROM `updated_transaction` WHERE Tr_No='".$data."' limit 1");
			$result = $query->result();return $result;}
		
		public function getupdated_IssuanceDate($data){
			$query = $this->db->query("SELECT * FROM `issuance` WHERE isno='".$data."' limit 1");
			$result = $query->result();return $result;}
		
		public function getupdated_transactionAdmin(){
			$query = $this->db->query("SELECT * FROM `administrator` WHERE 1 limit 1");
			$result = $query->result();return $result;}
		
		public function gettransaction_last(){
			$query = $this->db->query("SELECT * FROM `updated_transaction` WHERE 1 ORDER BY Tr_No DESC LIMIT 1");
			$result = $query->result();return $result;
		}
		
		public function gettransaction_lastS($data){
			$query = $this->db->query("SELECT * FROM `updated_transaction` WHERE Tr_No='".$data."' LIMIT 1");
			$result = $query->result();return $result;
		}
		
		public function getIssuance_last(){
			$query = $this->db->query("SELECT * FROM `issuance` WHERE 1 ORDER BY isno DESC LIMIT 1");
			$result = $query->result();return $result;
		}
		
		public function getbatch_last(){
			$query = $this->db->query("SELECT * FROM `updated_transaction` WHERE 1 ORDER BY Tr_No DESC LIMIT 1");
			$result = $query->result();return $result;
		}
		
		public function getIssuance_lastS($data){
			$query = $this->db->query("SELECT * FROM `issuance` WHERE isno='".$data."' LIMIT 1");
			$result = $query->result();return $result;
		}
		
		public function getbatch_lastS($data){
			$query = $this->db->query("SELECT * FROM `updated_transaction` WHERE Tr_No='".$data."' LIMIT 1");
			$result = $query->result();return $result;
		}
		
		public function getlast_issuance(){
			$query = $this->db->query("SELECT * FROM `issuance` WHERE 1 ORDER BY isno DESC LIMIT 1");
			$result = $query->result();return $result;
		}
		
		public function getlast_batch(){
			$query = $this->db->query("SELECT * FROM `updated_transaction` WHERE 1 ORDER BY Tr_No DESC LIMIT 1");
			$result = $query->result();return $result;
		}
		
		public function getlist_issuance(){
			$query = $this->db->query("SELECT * FROM `issuance` WHERE isno != 1 ORDER BY status DESC,date_modified DESC");
			$result = $query->result();return $result;
		}
		
		public function getlist_batch(){
			$query = $this->db->query("SELECT * FROM `updated_transaction` WHERE Tr_No != 1 ORDER BY status DESC,Tr_Date DESC");
			$result = $query->result();return $result;
		}
		
		
		public function getupdated_transaction($data){
			$query = $this->db->query("SELECT * FROM `updated_transaction` WHERE updated_transaction.Tr_No='".$data."'");
			$result = $query->result();return $result;}
		
		public function addPersonnelName($data){$this->db->insert("Personnel",$data);}
		public function updatePersonnelName($data1,$data2){$this->db->where('P_No', $data1);$this->db->update('Personnel', $data2);}
		public function deletePersonnelName($data){$this->db->where('P_No', $data);$this->db->delete('Personnel');}
		
		public function addGroupName($data){$this->db->insert("Group",$data);}
		public function updateGroupName($data1,$data2){$this->db->where('G_No', $data1);$this->db->update('Group', $data2);}
		public function deleteGroupName($data){$this->db->where('G_No', $data);$this->db->delete('Group');}
		
		public function deleteIssuancePersonnel($data){$this->db->where('pino', $data);$this->db->delete('personnel_issued');}
		public function deleteIssuancePersonnelItem($data){$this->db->where('iino',$data);$this->db->delete('item_issued');}
		
		public function delete_issuance($data){$this->db->where('isno', $data);$this->db->delete('issuance');}
	
		public function delete_issuance_item($data){$this->db->where('pino', $data);$this->db->delete('item_issued');}
		
		public function addEquipment($data){$this->db->insert("equipement_inventory",$data);}
		public function updateEquipment($data1,$data2){$this->db->where('EI_No', $data1);$this->db->update('equipement_inventory', $data2);}
		public function deleteEquipment($data){$this->db->where('EI_No', $data);$this->db->delete('equipement_inventory');}
		
		public function updateUI($data1,$data2){$this->db->where('Tr_No', $data1);$this->db->update('updated_transaction', $data2);}
		public function deleteUI($data){$this->db->where('Tr_No', $data);$this->db->delete('updated_transaction');}
		
		public function updateAccount($data1,$data2){$this->db->where('A_No', $data1);$this->db->update('Administrator', $data2);}
		public function addUI($data){$this->db->insert("updated_transaction_Details",$data);}
		public function addbatch($data){$this->db->insert("updated_transaction",$data);}
		public function addIssuance($data){$this->db->insert("issuance",$data);}
		public function addPersonnelIssued($data){$this->db->insert("personnel_issued",$data);}
		
		public function addItemIssued($data){$this->db->insert("item_issued",$data);}
		
		public function addInventoryReport($data){$this->db->insert("inventory_report",$data);}
		public function addInventoryReportDetails($data){$this->db->insert("inventory_report_details",$data);}
		
		public function getIssuanceDistinctItem($data){
			$query = $this->db->query("SELECT item_issued.EI_No, item_issued.particulars FROM personnel_issued JOIN item_issued on personnel_issued.pino = item_issued.pino  WHERE personnel_issued.isno = '".$data."' group BY item_issued.EI_No ORDER BY item_issued.EI_No");
			$result = $query->result();return $result;}
			
		public function getIssuanceDistinctItemInfo($data){
			$query = $this->db->query("SELECT item_issued.EI_No, personnel_issued.personnel_name, personnel_issued.work_center, item_issued.issued, item_issued.date_received, equipement_inventory.Unit FROM personnel_issued JOIN item_issued on personnel_issued.pino = item_issued.pino JOIN equipement_inventory on item_issued.EI_No = equipement_inventory.EI_No  WHERE personnel_issued.isno = '".$data."' ORDER BY item_issued.EI_No");
			$result = $query->result();return $result;}
		
		public function getLastInventoryReport(){
			$query = $this->db->query("SELECT * FROM `inventory_report` where 1 ORDER BY irid DESC LIMIT 1");
			$result = $query->result();return $result;}
		
		public function getallitems(){
			$query = $this->db->query("SELECT * FROM `equipement_inventory` where 1 ORDER BY Particulars");
			$result = $query->result();return $result;}
		
		public function getallissueditems(){
			$query = $this->db->query("SELECT SUM(issued) as sum_issued, EI_No FROM item_issued group BY EI_No");
			$result = $query->result();return $result;}
		
		public function getUpdatedStock(){
			$query = $this->db->query("SELECT Stock, EI_No FROM `equipement_inventory`");
			$result = $query->result();return $result;}
		
		public function getPendingCount(){
			$query = $this->db->query("SELECT count(*) as countpending FROM `issuance` WHERE status = 2");
			$result = $query->result();return $result;}
		
		public function getPendingCountb(){
			$query = $this->db->query("SELECT count(*) as countpending FROM `updated_transaction` WHERE status = 2");
			$result = $query->result();return $result;}
		
		public function getIssuedOnPersonnel($data){
			$query = $this->db->query("SELECT sum(total_item_issued) as countissued FROM `personnel_issued` WHERE isno = '".$data."'");
			$result = $query->result();return $result;}
		
		public function getitemsbatch($data){
			$query = $this->db->query("SELECT count(*) as countissued FROM `updated_transaction_Details` WHERE Tr_No = '".$data."'");
			$result = $query->result();return $result;}
		
		public function getitemsbatchinfo(){
			$query = $this->db->query("SELECT *  FROM `updated_transaction_Details` WHERE 1 order by Tr_No");
			$result = $query->result();return $result;}
		
		public function getInventoryReportInfo(){
			$query = $this->db->query("SELECT * FROM `inventory_report` join `inventory_report_details` on inventory_report.irid = inventory_report_details.irid where 1 ORDER BY inventory_report.status DESC, inventory_report.irid DESC");
			$result = $query->result();return $result;}
		
		public function getInventoryReportInfoDetails(){
			$query = $this->db->query("SELECT * FROM `inventory_report_details` ");
			$result = $query->result();return $result;}
			
		public function getInventoryReportStatus($data){
			$query = $this->db->query("update inventory_report set status = 0 where irid = '".$data."' ");}
		
		public function addInventoryReportRemarks($data,$data1){
			$query = $this->db->query("update inventory_report_details set Remarks = '".$data."' where irdid = '".$data1."' ");}
		
		public function deleteInventoryReport($data){
			$query = $this->db->query("delete from inventory_report where irid = '".$data."' ");}
		
		public function deleteInventoryReportDetails($data){
			$query = $this->db->query("delete from inventory_report_details where irid = '".$data."' ");}
		
		public function complete_issuance($data){
			$query = $this->db->query("update issuance set status = 1 where isno = '".$data."' ");}
		
		public function complete_inventory_report($data){
			$query = $this->db->query("update inventory_report set status = 0 where irid = '".$data."' ");}
		
		public function adjust_issuance($data){
			$query = $this->db->query("update issuance set status = 2 where isno = '".$data."' ");}
	
	public function adjust_batch($data){
			$query = $this->db->query("update updated_transaction set Status = 2 where Tr_No = '".$data."' ");}
		
		public function updateIssuancePersonnelItem($data,$data1){
			$query = $this->db->query("update equipement_inventory set Stock = Stock + '".$data."' where EI_No = '".$data1."' ");}
		
		public function removeitemsonbatch($data){
			$query = $this->db->query("delete from updated_transaction_Details where Tr_D_No = '".$data."' ");}
			
			
		public function updateBatchItem($data,$data1,$data2,$data3){
			$query = $this->db->query("update updated_transaction_details set Added_S = '".$data."',Re_OrderPt = '".$data1."',Expiration_Date = '".$data2."' where Tr_D_No = '".$data3."' ");}
	
		public function CompleteBatchItem($data,$data1){
			$query = $this->db->query("update updated_transaction set Status = 1 ,Tr_Date = '".$data."' where Tr_No = '".$data1."' ");}
	
		public function deleteBatchIssuance($data){
			$query = $this->db->query("delete from updated_transaction where Tr_No = '".$data."' ");}
			
		public function updateUpdateTransactionDetails($data1,$data2){$this->db->where('Tr_D_No', $data1);$this->db->update('updated_transaction_Details', $data2);}
		public function deleteUpdateTransactionDetails($data){$this->db->where('Tr_D_No', $data);$this->db->delete('updated_transaction_Details');}
		
		/************************************************           E        N          D       ****************************************/

		
	
	}	
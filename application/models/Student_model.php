<?php


class Student_model extends CI_Model
{
	
	
	

	public function addstudents($rfid, $sid, $lname, $fname, $mname, $gender, $bday, $sadd, $guardian, $guardianadd, $gcp, $status, $grade, $sectionad, $escc){
		
		$sql = "INSERT INTO student(rFID, studID, lname, fname, mname, gender, bdate, studAddress, guardian, guardianAddress, guardianCP, status, student_grade, section, ESC) VALUES (".$this->db->escape($rfid).",".$this->db->escape($sid).",".$this->db->escape($lname).",".$this->db->escape($fname).",".$this->db->escape($mname).",".$this->db->escape($gender).",".$this->db->escape($bday).",".$this->db->escape($sadd).",".$this->db->escape($guardian).",".$this->db->escape($guardianadd).",".$this->db->escape($gcp).",".$this->db->escape($status).",".$this->db->escape($grade).",".$this->db->escape($sectionad).",".$this->db->escape($escc).")";
		//return $sql;
		$this->db->query($sql);
		
		//$this->db->query($result);

	}

	public function getstudents($sfilter)
	{
		//$result = $this->db->get('contacts');

                if($sfilter=="ALL"){
		        $sql = $this->db->query("SELECT * from student");
                }else{
		        $sql = $this->db->query("SELECT * from student WHERE status=".$this->db->escape($sfilter)."");
                }

		$details = $sql->result_array();
		return $details;
		
		
		
	}
	
	public function getactivestudents()
	{
		//$result = $this->db->get('contacts');
		$sql = $this->db->query("SELECT * from student WHERE status='ACTIVE'");
		$details = $sql->result_array();
		return $details;
		
		
	}
	
	

	
	public function getallstudents()
	{
		//$result = $this->db->get('contacts');
		$sql = $this->db->query("SELECT * from student");
		$details = $sql->result_array();
		return $details;
		
	
		
	}
	
	
	public function getstudentsdetails($studid)
	{
	
		$sql = $this->db->query("SELECT * from student WHERE dbstudid=".$this->db->escape($studid)."");
		$details = $sql->result_array();
		return $details[0];
		
		
	}

	public function editstudent($studid)
	{
		$sql = $this->db->query("SELECT * from student where dbstudid=".$this->db->escape($studid)."");
		$singlerow = $sql->result_array();
		return $singlerow[0];
		
		
	}
	public function updatestudent($dbstudid, $rfid, $sid, $lname, $fname, $mname, $bday, $gender, $sadd, $guardian, $guardianadd, $gcp){
		
		$sql = "update student set rfID=".$this->db->escape($rfid).", studID=".$this->db->escape($sid).", lname=".$this->db->escape($lname).", fname=".$this->db->escape($fname).", mname=".$this->db->escape($mname).", bdate=".$this->db->escape($bday).", gender=".$this->db->escape($gender).", studAddress=".$this->db->escape($sadd).", guardian=".$this->db->escape($guardian).", guardianAddress=".$this->db->escape($guardianadd).", guardianCP=".$this->db->escape($gcp)." where dbstudid=".$this->db->escape($dbstudid)."";
		$this->db->query($sql);
	}

	public function updatestudentdetails($dbstudidd, $rfidd, $sidd, $lnamed, $fnamed, $mnamed, $genderd, $bdayd, $saddd, $guardiand, $guardianaddd, $gcpd, $statuss, $student_grade, $sectiondd, $esc){
		
		//update student record
		$sql = "update student set dbstudid=".$this->db->escape($dbstudidd).", rfID=".$this->db->escape($rfidd).", studID=".$this->db->escape($sidd).", lname=".$this->db->escape($lnamed).", fname=".$this->db->escape($fnamed).", mname=".$this->db->escape($mnamed).", gender=".$this->db->escape($genderd).", bdate=".$this->db->escape($bdayd).", studAddress=".$this->db->escape($saddd).", guardian=".$this->db->escape($guardiand).", guardianAddress=".$this->db->escape($guardianaddd).", guardianCP=".$this->db->escape($gcpd).", status=".$this->db->escape($statuss).", student_grade=".$this->db->escape($student_grade).", section=".$this->db->escape($sectiondd).", ESC=".$this->db->escape($esc)." where dbstudid=".$this->db->escape($dbstudidd)."";
		$this->db->query($sql);
		
		
		if($current_student_grade != $student_grade){
			
			$remarks = "Grade update from ".$current_student_grade." to ".$student_grade."";
			//log remarks
			$sql = "INSERT INTO student_log(log_remarks, dbstudid) VALUES (".$this->db->escape($remarks).",".$this->db->escape($dbstudid).")";
			
			$this->db->query($sql);
		}
		
		
	}
	
	
	public function updatepayment($ornox, $paydatex, $amountx, $appliedtox, $dbstudidx){
		
		//update payment
		$sql = "update payment set orno=".$this->db->escape($ornox).", paymentDate=".$this->db->escape($paydatex).", amount=".$this->db->escape($amountx).", status=".$this->db->escape($appliedtox).", studid=".$this->db->escape($dbstudidx)." where orno=".$this->db->escape($ornox)."";
		$this->db->query($sql);
		
	}
	

	public function displaystudent($studid)
	{
		$sql = $this->db->query("SELECT * from student where dbstudid=".$this->db->escape($studid)."");
		$singlerow = $sql->result_array();
		return $singlerow[0];
		
		
	}

	public function registerstudent($rfid, $sid, $regdate, $yrlvl, $section, $sy){
		
		$sql = "INSERT INTO registration(rFID, studID, regDate, yrLevel, section, sy) VALUES (".$this->db->escape($rfid).",".$this->db->escape($sid).",".$this->db->escape($regdate).",".$this->db->escape($yrlvl).",".$this->db->escape($section).",".$this->db->escape($sy).")";
		//return $sql;
		$this->db->query($sql);
	}
	
	public function saveadimage($dbstudids, $adimage){
		
		$sql = "update student set studentPic=".$this->db->escape($adimage)." where dbstudid=".$this->db->escape($dbstudids)."";
		$this->db->query($sql);
	}
	public function addregistration($rfid, $sid, $regdate, $yrlvl, $section, $sy){
		
		$sql = "INSERT INTO registration(rFID, studID, regDate, yrLevel, section, sy) VALUES (".$this->db->escape($rfid).",".$this->db->escape($sid).",".$this->db->escape($regdate).",".$this->db->escape($yrlvl).",".$this->db->escape($section).",".$this->db->escape($sy).")";
		//return $sql;
		$this->db->query($sql);
	}

	public function addpayment($dbstudid, $orno, $paydate, $amount, $appliedto){
		
		$sql = "INSERT INTO payment(studid, orno, paymentDate, amount, status) VALUES (".$this->db->escape($dbstudid).",".$this->db->escape($orno).",".$this->db->escape($paydate).",".$this->db->escape($amount).",".$this->db->escape($appliedto).")";
		//return $sql;
		$this->db->query($sql);
	}

	//public function getregistrations()
	//{
		//$result = $this->db->get('contacts');
	//	$sql = $this->db->query("SELECT * from student, registration WHERE student.rfID = registration.rfID");
		//return $sql->result_array();
		
		
	//}

	public function getpaymentlist($studid)
	{
		//$result = $this->db->get('contacts');
		$sql = $this->db->query("SELECT * from payment WHERE studid=".$this->db->escape($studid)."");
		return $sql->result_array();
		return $details[0];
		
	}
	
	public function getsection(){
		
		$sql = $this->db->query("SELECT DISTINCT section FROM student");
		return $sql->result_array();
		
		
	}
	
	
	
}

?>
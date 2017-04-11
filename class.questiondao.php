<?php
// write dao object for each class
include_once '/../common/class.common.php';
include_once '/../util/class.util.php';

Class QuestionDAO{

	private $_DB;
	private $_Question;
	private $_Term;
	private $_Course;
	private $_Session;
	private $_User;

	function QuestionDAO(){

		$this->_DB = DBUtil::getInstance();
		$this->_Question = new Question();
		$this->_Term = new Term();
		$this->_Course = new Course();
		$this->_Session = new Session();
		$this->_User = new User();
	}
	//get all Terms
	public function getAllTerms(){
		$TermList = array();

		$this->_DB->doQuery("SELECT * FROM tbl_term");

		$rows = $this->_DB->getAllRows();

		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_Term = new Term();

		    $this->_Term->setID ( $row['ID']);
		    $this->_Term->setName( $row['Name'] );


		    $TermList[]=$this->_Term;
   
		}
		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($TermList);

		return $Result;
	}
	public function getAllUser(){
		$UserList = array();

		$this->_DB->doQuery("SELECT * FROM tbl_user");

		$rows = $this->_DB->getAllRows();

		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_User = new User();

		    $this->_User->setID ( $row['ID']);
		    $this->_User->setFirstName( $row['FirstName']." ".$row['LastName'] );


		    $UserList[]=$this->_User;
   
		}
		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($UserList);

		return $Result;
	}

	//get all Sessions
	public function getAllSession(){
		$SessionList = array();

		$this->_DB->doQuery("SELECT * FROM tbl_registration_session");

		$rows = $this->_DB->getAllRows();

		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_Session = new Session();

		    $this->_Session->setID ( $row['ID']);
		    $this->_Session->setName( $row['Name'] );


		    $SessionList[]=$this->_Session;
   
		}
		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SessionList);

		return $Result;
	}
	//get all courses
	public function getAllCourse(){
		$CourseList = array();

		$this->_DB->doQuery("SELECT * FROM tbl_course");

		$rows = $this->_DB->getAllRows();

		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_Course = new Course();

		    $this->_Course->setID ( $row['ID']);
		    $this->_Course->setCourse( $row['CourseNo'] );
		    $this->_Course->setTitle( $row['Title'] );

		    $CourseList[]=$this->_Course;
   
		}
		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($CourseList);

		return $Result;
	}

	// get all Questions
	public function getAllQuestions(){

		$QuestionList = array();

		$this->_DB->doQuery("SELECT * FROM tbl_question_archive");

		$rows = $this->_DB->getAllRows();

		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_Question = new Question();

		    $this->_Question->setID ( $row['ID']);
		    $this->_Question->setTitle( $row['Title'] );
		    $this->_Question->setCourse( $row['CourseID'] );
		    $this->_Question->setTerm( $row['TermID'] );
		    $this->_Question->setSession( $row['SessionID'] );
		    $this->_Question->setTeacher( $row['TeacherID'] );
		    $this->_Question->setType( $row['Type'] );
		    $this->_Question->setTag( $row['Tag'] );
		    $this->_Question->setQuestionDate( $row['QuestionDate'] );
		    $this->_Question->setLink( $row['Link'] );

		    $QuestionList[]=$this->_Question;
   
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($QuestionList);

		return $Result;
	}

	public function searchQuestions($query){

		$QuestionList = array();
		$sql = "SELECT * FROM tbl_question_archive";
		$sql = $sql.$query;
		$this->_DB->doQuery($sql);

		$rows = $this->_DB->getAllRows();

		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_Question = new Question();

		    $this->_Question->setID ( $row['ID']);
		    $this->_Question->setTitle( $row['Title'] );
		    $this->_Question->setCourse( $row['CourseID'] );
		    $this->_Question->setTerm( $row['TermID'] );
		    $this->_Question->setSession( $row['SessionID'] );
		    $this->_Question->setTeacher( $row['TeacherID'] );
		    $this->_Question->setType( $row['Type'] );
		    $this->_Question->setTag( $row['Tag'] );
		    $this->_Question->setQuestionDate( $row['QuestionDate'] );
		    $this->_Question->setLink( $row['Link'] );

		    $QuestionList[]=$this->_Question;
   
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($QuestionList);

		return $Result;
	}

	public function updateQuestion($Question){

		$SQL = "UPDATE tbl_question_archive SET Title='".$Question->getTitle()."',CourseID='".$Question->getCourse()."',TermID='".$Question->getTerm()."',SessionID='".$Question->getSession()."',TeacherID='".$Question->getTeacher()."',Type='".$Question->getType()."',Tag='".$Question->getTag()."',QuestionDate='".$Question->getQuestionDate()."', Link = '".$Question->getLink()."' WHERE ID='".$Question->getID()."'";


		$SQL = $this->_DB->doQuery($SQL);

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}

	//create Question funtion with the Question object
	public function createQuestion($Question){

		$ID=$Question->getID();
		$Title=$Question->getTitle();
		$Course = $Question->getCourse();
		$Term = $Question->getTerm();
		$Session = $Question->getSession();
		$Teacher = $Question->getTeacher();
		$Type =  $Question->getType();
		$Tag = $Question->getTag();
		$Question_Date = $Question->getQuestionDate();
		$Link = $Question->getLink();

		$SQL = "INSERT INTO tbl_question_archive(ID,Title,CourseID,TermID,SessionID,TeacherID,Type,Tag,QuestionDate,Link) VALUES('$ID','$Title','$Course','$Term','$Session','$Teacher','$Type','$Tag','$Question_Date', '$Link')";

		$SQL = $this->_DB->doQuery($SQL);		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;
	}
	public function getTeacherFromID($ID){
		$SQL = "SELECT * FROM tbl_user WHERE ID = '$ID'";
		
		$this->_DB->doQuery($SQL);
		$rows = $this->_DB->getAllRows();
		$row = $rows[0];
		return $row['FirstName']." ".$row['LastName'];
		
	}
	public function getTermFromID($ID){
		$SQL = "SELECT Name FROM tbl_term WHERE ID = '$ID'";
		
		$this->_DB->doQuery($SQL);
		$rows = $this->_DB->getAllRows();

		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			
		}
		    return $row['Name'];
		
	}
	public function getSessionFromID($ID){
		$SQL = "SELECT Name FROM tbl_registration_session WHERE ID = '$ID'";
		
		$this->_DB->doQuery($SQL);
		$rows = $this->_DB->getAllRows();

		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			
		}
		    return $row['Name'];
		
	}
	public function getTitleFromID($ID){
		$SQL = "SELECT Title FROM tbl_course WHERE ID = '$ID'";
		
		$this->_DB->doQuery($SQL);
		$rows = $this->_DB->getAllRows();

		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			
		}
		    return $row['Title'];
		
	}
	public function getCourseFromID($ID){
		$SQL = "SELECT CourseNo FROM tbl_course WHERE ID = '$ID'";
		
		$this->_DB->doQuery($SQL);
		$rows = $this->_DB->getAllRows();

		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			
		}
		    return $row['CourseNo'];
		
	}

	//read an Discipline object based on its id form Discipline object
	public function readQuestion($Question){
		
		
		$SQL = "SELECT * FROM tbl_question_archive WHERE ID='".$Question->getID()."'";
		$this->_DB->doQuery($SQL);

		//reading the top row for this Discipline from the database
		$row = $this->_DB->getTopRow();

		$this->_Question = new Question();

		//preparing the Discipline object
	    $this->_Question->setID ( $row['ID']);
	    $this->_Question->setTitle( $row['Title'] );
	    $this->_Question->setCourse( $row['CourseID'] );
	    $this->_Question->setTerm( $row['TermID'] );
	    $this->_Question->setSession( $row['SessionID'] );
	    $this->_Question->setTeacher( $row['TeacherID'] );
	    $this->_Question->setType( $row['Type'] );
	    $this->_Question->setTag( $row['Tag'] );
	    $this->_Question->setQuestionDate( $row['QuestionDate'] );
	    $this->_Question->setLink( $row['Link'] );
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($this->_Question);

		return $Result;
	}
	public function deleteQuestion($Question){


		$SQL = "DELETE from tbl_question_archive where ID ='".$Question->getID()."'";
	
		$SQL = $this->_DB->doQuery($SQL);

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}

	//update an Discipline object based on its 
	public function updateDiscipline($Discipline){

		$SQL = "UPDATE tbl_Discipline SET Name='".$Discipline->getName()."' WHERE ID='".$Discipline->getID()."'";


		$SQL = $this->_DB->doQuery($SQL);

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}

	//delete an Discipline based on its id of the database
	public function deleteDiscipline($Discipline){


		$SQL = "DELETE from tbl_Discipline where ID ='".$Discipline->getID()."'";
	
		$SQL = $this->_DB->doQuery($SQL);

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}

}

echo '<br> log:: exit the class.questiondao.php';

?>
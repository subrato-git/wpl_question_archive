<?php

include_once '/../../../util/class.util.php';
include_once '/../../../bao/class.questionbao.php';


$_QuestionBAO = new QuestionBAO();
$_DB = DBUtil::getInstance();

/* saving a new Role account*/
if(isset($_POST['save']))
{
	echo "<br>Save called";
	 $Question = new Question();	
	 $Question->setID(Util::getGUID());
     $Question->setTitle($_DB->secureInput($_POST['title']));
     $Question->setCourse($_DB->secureInput($_POST['course']));
     $Question->setTerm($_DB->secureInput($_POST['term']));
     $Question->setSession($_DB->secureInput($_POST['session']));
     $Question->setTeacher($_DB->secureInput($_POST['teacher']));
     $Question->setType($_DB->secureInput($_POST['type']));
     $Question->setTag($_DB->secureInput($_POST['tag']));
     $Question->setQuestionDate($_DB->secureInput($_POST['question_date']));
     $Question->setLink($_DB->secureInput($_POST['link']));
     
     if ($Question->getTitle() == "") 	
     	echo "<br>Please Enter All Field";
     else 
	 	$_QuestionBAO->createQuestion($Question);		 
}


/* deleting an existing Role */
if(isset($_GET['del']))
{

	$Question = new Question();	
	$Question->setID($_GET['del']);	
	$_QuestionBAO->deleteQuestion($Question); //reading the Role object from the result object

	header("Location: view.question.php");
}


/* reading an existing Question information */
if(isset($_GET['edit']))
{
	$Question = new Question();	
	$Question->setID($_GET['edit']);	
	$getROW = $_QuestionBAO->readQuestion($Question)->getResultObject();                                  
}

/*updating an existing Role information*/
if(isset($_POST['update']))
{
	$Question = new Question();	

    $Question->setID ($_GET['edit']);
    $Question->setTitle( $_POST['title'] );
	$Question->setCourse( $_POST['course'] );
	$Question->setTerm( $_POST['term'] );
	$Question->setSession( $_POST['session'] );
	$Question->setTeacher( $_POST['teacher'] );
	$Question->setType( $_POST['type'] );
    $Question->setTag( $_POST['tag'] );
	$Question->setQuestionDate( $_POST['question_date'] );
	$Question->setLink( $_POST['link']);
	echo 'Update Called';
	echo $Question->getLink();
	
	$_QuestionBAO->updateQuestion($Question);

	header("Location: view.question.php");
}

if(isset($_POST['searh']))
{
	echo "<br>Search Called";
	if (isset($_POST['title_check'])){
		echo "Title checked";
	} 
	if (isset($_POST['course_check'])){
		echo "Course checked";
	}
	if (isset($_POST['term_check'])){
		echo "Term checked";
		echo $_POST['term'];
	}  
	

	//header("Location: view.search.question.php");
}

echo '<br> log:: exit blade.Question.php';

?>
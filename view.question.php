<?php

include_once 'blade/view.question.blade.php';
include_once '/../../common/class.common.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>QuestionCRUD Operations</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>

<body>
<center>
	<div id="header">
		<label>By : Kazi Masudul Alam</a></label>
	</div>

	<div id="form" >
		<form method="post">
			<table width="100%" border="1" cellpadding="15">
				<tr>
					
					<?php
						$Result = $_QuestionBAO->getAllCourse();
						if ($Result->getIsSuccess())
							$CourseList = $Result->getResultObject();					
				?>
				<td>
					<select name="title" style="width:170px">
					<option selected disabled>Select Course Title</option>
					<?php
						for ($i = 0; $i<sizeof($CourseList); $i++){
							$Course = $CourseList[$i];
					?>
					<?php
						if (!isset($_GET['edit'])){

					?>
						<option value="<?php echo $Course->getID();?>" > <?php echo $Course->getTitle(); ?> 
						</option>
					<?php
					}
						if (isset($_GET['edit'])){
							
							if ($getROW->getTitle() == $Course->getID() ){
					?>
						<option selected value = "<?php echo $Course->getID();?>" > <?php echo $Course->getTitle();?> 
						</option>
					<?php
					}
						else {

					?>
					<option value="<?php echo $Course->getID();?>" > <?php echo $Course->getTitle(); ?> 
					</option>
				<?php
				}	
				}
				}
				?>	
				</select>
				</td>
					<?php
						$Result = $_QuestionBAO->getAllCourse();
						if ($Result->getIsSuccess())
							$CourseList = $Result->getResultObject();					
				?>
				<td>
					<select name="course" style="width:170px">
					<option selected disabled>Select Course No</option>
					<?php
						for ($i = 0; $i<sizeof($CourseList); $i++){
							$Course = $CourseList[$i];
					?>
					<?php
						if (!isset($_GET['edit'])){

					?>
						<option value="<?php echo $Course->getID();?>" > <?php echo $Course->getCourse(); ?> 
						</option>
					<?php
					}
						if (isset($_GET['edit'])){
							
							if ($getROW->getCourse() == $Course->getID() ){
					?>
						<option selected value = "<?php echo $Course->getID();?>" > <?php echo $Course->getCourse();?> 
						</option>
					<?php
					}
						else {

					?>
					<option value="<?php echo $Course->getID();?>" > <?php echo $Course->getCourse(); ?> 
					</option>
				<?php
				}	
				}
				}
				?>	
				</select>
				</td>

				</tr>

				<tr>
				<?php
						$Result = $_QuestionBAO->getAllTerms();
						if ($Result->getIsSuccess())
							$TermList = $Result->getResultObject();					
				?>
				<td>
					<select name="term" style="width:170px">
					<option selected disabled>Select Term</option>
					<?php
						for ($i = 0; $i<sizeof($TermList); $i++){
							$Term = $TermList[$i];
					?>
					<?php
						if (!isset($_GET['edit'])){

					?>
						<option value="<?php echo $Term->getID();?>" > <?php echo $Term->getName(); ?> 
						</option>
					<?php
					}
						if (isset($_GET['edit'])){
							
							if ($getROW->getTerm() == $Term->getID() ){
					?>
						<option selected value = "<?php echo $Term->getID();?>" > <?php echo $Term->getName();?> 
						</option>
					<?php
					}
						else {

					?>
					<option value="<?php echo $Term->getID();?>" > <?php echo $Term->getName(); ?> 
					</option>
				<?php
				}	
				}
				}
				?>	
				</select>
				</td>	
				<?php
						$Result = $_QuestionBAO->getAllSession();
						if ($Result->getIsSuccess())
							$SessionList = $Result->getResultObject();					
				?>
				<td>
					<select name="session" style="width:170px">
					<option selected disabled>Select Session</option>
					<?php
						for ($i = 0; $i<sizeof($SessionList); $i++){
							$Session = $SessionList[$i];
					?>
					<?php
						if (!isset($_GET['edit'])){

					?>
						<option value="<?php echo $Session->getID();?>" > <?php echo $Session->getName(); ?> 
						</option>
					<?php
					}
						if (isset($_GET['edit'])){
							
							if ($getROW->getSession() == $Session->getID() ){
					?>
						<option selected value = "<?php echo $Session->getID();?>" > <?php echo $Session->getName();?> 
						</option>
					<?php
					}
						else {

					?>
					<option value="<?php echo $Session->getID();?>" > <?php echo $Session->getName(); ?> 
					</option>
				<?php
				}	
				}
				}
				?>	
				</select>
				</td>

				</tr>

				<tr>
				
				<?php
						$Result = $_QuestionBAO->getAllUser();
						if ($Result->getIsSuccess())
							$UserList = $Result->getResultObject();					
				?>
				<td>
					<select name="teacher" style="width:170px">
					<option selected disabled>Select Teacher</option>
					<?php
						for ($i = 0; $i<sizeof($UserList); $i++){
							$User = $UserList[$i];
					?>
					<?php
						if (!isset($_GET['edit'])){

					?>
						<option value="<?php echo $User->getID();?>" > <?php echo $User->getFirstName(); ?> 
						</option>
					<?php
					}
						if (isset($_GET['edit'])){
							
							if ($getROW->getTeacher() == $User->getID() ){
					?>
						<option selected value = "<?php echo $User->getID();?>" > <?php echo $User->getFirstName();?> 
						</option>
					<?php
					}
						else {

					?>
					<option value="<?php echo $User->getID();?>" > <?php echo $User->getFirstName(); ?> 
					</option>
				<?php
				}	
				}
				}
				?>	
				</select>
				</td>
					<td>
					<select name="type" style="width:170px">
					<option selected disabled>Select Question Type</option>
					<?php
						if (!isset($_GET['edit'])){
					?>
					<option value="CT">CT</option>
					<option value="Term-Final">Term-Final</option>
					<?php
					}
					if (isset($_GET['edit'])){
						if ($getROW->getType() == 'CT'){	
					?>
					<option selected value="CT">CT</option>
					<option value="Term-Final">Term-Final</option>
					<?php
				}
				else {
					?>
					<option value="CT">CT</option>
					<option selected="Term-Final">Term-Final</option>
					<?php
				}
			}
				?>
					</td>

				</tr>

				<tr>
				
				<td><input type="text" name="tag" placeholder="Tag" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getTag();  ?>"></td>
				<td><input type="date" name="question_date" placeholder="Date" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getQuestionDate(); ?>"></td>
				</tr>



				<tr>
				<td><input type="text" name="link" placeholder="Question Link" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getLink(); ?>"></td>
					<td>
						<?php
						if(isset($_GET['edit']))
						{
							?>
							<button type="submit" name="update">update</button>
							<?php
						}
						else
						{
							?>
							<button type="submit" name="save">save</button>
							<?php
						}
						?>
					</td>

				
				
				</tr>
			</table>
		</form>


<br>

	<table width="100%" border="1" cellpadding="15" align="center">
	<?php
	
	
	$Result = $_QuestionBAO->getAllQuestions();

	//if DAO access is successful to load all the Roles then show them one by one
	if($Result->getIsSuccess()){

		$QuestionList = $Result->getResultObject();
	?>
	
		<tr>
			
			<td>Title </td>
			<td>Course </td>
			<td>Term </td>
			<td>Session </td>
			<td>Teacher </td>
			<td>Type</td>
			<td>Tag</td>
			<td>Date</td>

		</tr>
		<?php
		for($i = 0; $i < sizeof($QuestionList); $i++) {
			$Question = $QuestionList[$i];
			//echo $Question->getLink();
			?>
		    <tr>
			    
			    <td><a href="<?php echo $Question->getLink(); ?>" target="_blank"> <?php echo $_QuestionBAO->getTitleFromID( $Question->getTitle());?> </a></td>
			    <td><?php echo $_QuestionBAO->getCourseFromID($Question->getCourse());?></td>
			    <td><?php echo $_QuestionBAO->getTermFromID($Question->getTerm()); ?></td>
			    <td><?php echo $_QuestionBAO->getSessionFromID($Question->getSession()); ?></td>
			    <td><?php echo $_QuestionBAO->getTeacherFromID($Question->getTeacher()); ?></td>
			    <td><?php echo $Question->getType(); ?></td>
			    <td><?php echo $Question->getTag(); ?></td>
			    <td><?php echo $Question->getQuestionDate(); ?></td>
			    <td><a href="?edit=<?php echo $Question->getID(); ?>" onclick="return confirm('sure to edit !'); " >edit</a></td>
			    <td><a href="?del=<?php echo $Question->getID(); ?>" onclick="return confirm('sure to delete !'); " >delete</a></td>
		    </tr>
	    <?php

		}

	}
	else{

		echo $Result->getResultObject(); //giving failure message
	}

	?>
	</table>
	</div>
</center>
</body>
</html>
<?php
 
include_once "./core/formulaireC.php";


if(isset($_POST['Title']) &&
 isset($_POST['Score'])&&
 isset($_POST['Question']) &&
 isset($_POST['Answer']) &&
 isset($_POST['Answer2']) &&
  isset($_POST['Answer3'])&&
  isset($_POST['Answer4'])&&
  isset($_POST['RightAnswerNumber'])&&
   isset($_POST['image']))
{
        $formulaire=new formulaire(
        $_POST['id'],
        $_POST['image'],
        $_POST['RightAnswerNumber'],
        $_POST['Question'] ,
        $_POST['Answer'] ,
        $_POST['Answer2'] ,
        $_POST['Answer3'],
        $_POST['Answer4'],
        $_POST['Score'],
        $_POST['Title']);
       
        $UC=new formulaireC();
        $UC->modifierformulaire($_POST['id'],$_POST['image'],$_POST['RightAnswerNumber'], $_POST['Question'], $_POST['Answer'] , $_POST['Answer2'], $_POST['Answer3'], $_POST['Answer4'],$_POST['Score'],$_POST['Title']);
        echo $_POST['id'];

        echo '<body onLoad="alert(\'Inscrit\')">';
        header("location:../CourseManagment/view/myCourse.php");
}
else
{
        echo '<body onLoad="alert(\'Erreur\')">';
}

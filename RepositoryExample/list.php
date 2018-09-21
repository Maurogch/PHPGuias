<?php
    require_once("Config/autoload.php");

    
    session_start();
    
    use Repository\StudentRepository as StudentRepository;
    use Model\Student as Student;

    if(!isset($_SESSION["StudentRepository"]))
        header("location:index.php?code=error");
    else    
        $studentRepository = $_SESSION["StudentRepository"];    

    foreach($studentRepository->GetAll() as $student)
    {
        echo $student->getLastName().", ".$student->getFirstName()."<br>";
    }
?>
<html>
    <body>
        <a href="index.php">Go to Add</a>
        <a href="logout.php">Log out</a>
    </body>
</html>
<?php
    require_once("Config/autoload.php");

    use Repository\StudentRepository as StudentRepository;
    use Model\Student as Student;
    
    $message = "";

    if($_POST)
    {
        session_start();

        if(!isset($_SESSION["StudentRepository"]))
            $studentRepository = new StudentRepository();
        else
            $studentRepository = $_SESSION["StudentRepository"];

        $lastName = (isset($_POST["lastName"])) ? $_POST["lastName"] : "";
        $firstName = (isset($_POST["firstName"])) ? $_POST["firstName"] : "";

        $student = new Student();
        $student->setLastName($lastName);
        $student->setFirstName($firstName);

        $studentRepository->Add($student);

        $_SESSION["StudentRepository"] = $studentRepository;        

        $message = "Student successfully added.";
    }
    elseif ($_GET)
    {
        $code = (isset($_GET["code"])) ? $_GET["code"] : "";

        if($code == "error")
            $message = "No Session established";
    }
?>
<html>
    <body>
        <form action="" method="post">
            Apellido: <input type="text" name="lastName">
            Nombre: <input type="text" name="firstName">
            <input type="submit" value="Agregar">
        </form>

        <a href="list.php">List al Students</a>

        <?php echo $message ?>
    </body>
</html>
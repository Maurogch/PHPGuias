<?php
    namespace Repository;

    use Model\Student as Student;

    interface IStudentRepository
    {
        function Add(Student $student);
        function GetAll();
    }
?>
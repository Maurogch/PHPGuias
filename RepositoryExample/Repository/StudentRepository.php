<?php
    namespace Repository;

    use Repository\IStudentRepository as IStudentRepository;
    use Model\Student as Student;

    class StudentRepository implements IStudentRepository
    {
        private $studentList = array();

        public function Add(Student $student)
        {
            array_push($this->studentList, $student);
        }

        public function GetAll()
        {
            return $this->studentList;
        }
    }
?>
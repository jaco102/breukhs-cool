<?php

namespace App\Controller;

use Common\Controller;
use App\Model\StudentModel;
use App\Model\ClassroomModel;
use App\Model\SchoolLevelModel;
use App\Model\SchoolYearModel;

class AdminController extends Controller
{
    private StudentModel $studentModel;
    private ClassroomModel $classroomModel;
    private SchoolLevelModel $shoolLevelModel;
    private SchoolYearModel $shoolYearModel;

    public function __construct()
    {
        $this->studentModel = new StudentModel();
        $this->classroomModel = new ClassroomModel();
        $this->shoolLevelModel = new SchoolLevelModel();
        $this->shoolYearModel = new SchoolYearModel();
    }

    public function home()
    {
        $this->render('admin/home', null, "admin/layout");
    }

    public function student()
    {
        $students = $this->studentModel->find();
        $this->render('admin/student/student', ["students" => $students], "admin/layout");
    }

    public function addStudent()
    {
        $this->render('admin/student/add', [], "admin/layout");
    }

    public function schoolLevel()
    {
        $schoolLevels = $this->shoolLevelModel->find();
        $this->render('admin/schoolLevel/schoolLevel', ["schoolLevels" => $schoolLevels], "admin/layout");
    }

    public function addSchoolLevel()
    {
        $this->render('admin/schoolLevel/add', [], "admin/layout");
    }

    public function schoolYear()
    {
        $schoolYears = $this->shoolYearModel->find();
        $this->render('admin/schoolYear/schoolYear', ["schoolYears" => $schoolYears], "admin/layout");
    }

    public function addSchoolYear()
    {
        $this->render('admin/schoolYear/add', [], "admin/layout");
    }

    public function classroom()
    {
        $classrooms = $this->classroomModel->find();
        $this->render('admin/classroom/classroom', ["classrooms" => $classrooms], "admin/layout");
    }

    public function addClassroom()
    {
        $this->render('admin/classroom/add', [], "admin/layout");
    }
}

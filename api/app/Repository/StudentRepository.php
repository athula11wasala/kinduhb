<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Student;
use App\Classes;
use App\Teachers;
use Exception;

class StudentRepository {

    /**
     * student add
     * 
     * @param type $data
     * @return boolean
     */
    public function studnetAdd($data) {

        try {
            \DB::beginTransaction();

            $objStudnet = new Student;
            $objStudnet->fname = $data['inputfname'];
            $objStudnet->lname = $data['inputlname'];
            $objStudnet->teacher_id = $data['selTeacher'];
            $objStudnet->class_id = $data['selClass'];
            $objStudnet->year = $data['inputYear'];
            $objStudnet->gender = $data['selGender'];
            $objStudnet->save();
            \DB::commit();
            return true;
        } catch (Exception $ex) {
            \DB::rollBack();

            throw new Exception($ex->getMessage());
        } catch (\PDOException $ex) {

            \DB::rollBack();

            throw new Exception($ex->getMessage());
        }
    }

    /**
     * student update
     * 
     * @param type $data
     */
    public function studnetupdate($data) {

        try {
            return Student::findOrFail($data['hndStudnetId'])
                            ->update(['fname' => $data['inputfname'],
                                'lname' => $data['inputlname'],
                                'teacher_id' => $data['selTeacher'],
                                'class_id' => $data['selClass'],
                                 'gender' => $data['selGender']
            ]);
        } catch (Exception $ex) {

            print_r($ex->getMessage()); die();
            throw new Exception($ex->getMessage());
        } catch (\PDOException $ex) {
  print_r($ex->getMessage()); die();
            throw new Exception($ex->getMessage());
        }
    }

    /**
     * 
     * delete student record
     * @param type $data
     * @return boolean
     * @throws Exception
     */
    public function studnetDelete($id) {

        try {
            $obj_student = Student::find($id);
            if ($obj_student) {
                return Student::destroy($id);
            }
        } catch (Exception $ex) {

            throw new Exception($ex->getMessage());
        } catch (\PDOException $ex) {

            throw new Exception($ex->getMessage());
        }
    }

    /**
     * teacher Info
     * @return type
     */
    public function techInfo() {

        $obj_tech = Teachers::all('id', 'name');
        return $obj_tech;
    }

    /**
     * çlass Info
     * @return type
     */
    public function classInfo() {

        $obj_tech = Classes::all('id', 'name');
        return $obj_tech;
    }

    /**
     * all studnet Info 
     * @param type $search_by_teacher
     * @param type $search_by_class
     * @return type
     */
    public function allStudentInfo($search_by_teacher, $search_by_class,$id='') {

        $obj_student = Student::select('students_record.id', 'students_record.fname','classes.id as class_id','teachers.id as teachers_id',
                'students_record.lname', 'classes.name as class', 'students_record.year', 'students_record.gender', 'teachers.name as teacher')
                ->leftJoin('classes', 'classes.id', '=', 'students_record.class_id')
                ->leftJoin('teachers', 'teachers.id', '=', 'students_record.teacher_id');

        if (!empty($search_by_class)) {

            $obj_student = $obj_student->where('classes.id', $search_by_class);
        }
        if (!empty($search_by_teacher)) {

            $obj_student = $obj_student->where('teachers.id', $search_by_teacher);
        }
        if (!empty($id)) {

            $obj_student = $obj_student->where('students_record.id', $id);
        }

        $obj_student = $obj_student->get();

        return $obj_student;
    }

}

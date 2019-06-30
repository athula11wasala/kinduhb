<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Services\CommonService;
use App\Traits\StudentValidators;

class StudentController extends Controller {

    private $commonService;

    use StudentValidators;

    /**
     * 
     * @param CommonService $commonService
     */
    public function __construct(CommonService $commonService) {

        $this->commonService = $commonService;
    }

    /**
     * get all student info
     *  
     * @param Request $request
     */
    public function index(Request $request) {

        $objTecher = $this->commonService->getTeacherInfo();
        $objClass = $this->commonService->getClassInfo();
        $search_by_teacher = !empty(Input::get('selTeacher')) ? Input::get('selTeacher') : '';
        $search_by_class = !empty(Input::get('selClass')) ? Input::get('selClass') : '';
        $obj_stdent = $this->commonService->getStudentInfo($search_by_teacher, $search_by_class);
        return response()->json(['obj_teacher' => $objTecher, 'obj_class' => $objClass,
                    'obj_student' => $obj_stdent], 200);
    }
    
    /**
     * get student info byid
     *  
     * @param Request $request
     */
    public function show(Request $request) {

        $obj_stdent = $this->commonService->getStudentById(Input::get('hndEditId'));
        return response()->json(['obj_student' => $obj_stdent,], 200);
    }

    /**
     * create student records
     * 
     * @param Request $request
     */
    public function create(Request $request) {

        if ($request->method() == "POST") {

            $validator = $this->studentValidate(Input::all());
            if ($validator->passes()) {

                $sutdent_add = $this->commonService->addStudent(Input::all());
                if ($sutdent_add) {
                    return response()->json(['data' => 'Successfully added'], 201);
                }
                return response()->json(['data' => 'Error occured'], 400);
            } else {

                return response()->json($validator->errors(), 400);
            }
        }
    }

    /**
     * delete student record
     * @param Request $request
     * @return type
     * 
     */
    public function destory(Request $request) {

        if ($request->method() == "POST") {

            $validator = $this->studentValidate(Input::all(), 'DELETE');
            if ($validator->passes()) {

                $student_delete = $this->commonService->deleteStudent(Input::get('hndStudnetId'));
                if ($student_delete) {
                    return response()->json(['data' => 'Successfully deleted'], 200);
                }
                return response()->json(['data' => 'Error occured'], 400);
            }
            return response()->json($validator->errors(), 400);
        }
    }

    /**
     * update studnets record
     * 
     * @param Request $request
     */
    public function update(Request $request) {

        if ($request->method() == "POST") {

            $validator = $this->studentValidate(Input::all(), 'PUT');
            if ($validator->passes()) {

                $student_edit = $this->commonService->updateStudent(Input::all());
                if ($student_edit) {

                    return response()->json(['data' => 'Successfully updated'], 202);
                }
                return response()->json(['data' => 'Error occured'], 400);
            }
            return response()->json($validator->errors(), 400);
        }
    }

}

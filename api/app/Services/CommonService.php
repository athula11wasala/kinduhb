<?php

namespace App\Services;

use App\Repository\StudentRepository;


class CommonService {
    
    private $studentRepository;

    /**
     * @param OrderRepository $ordrRepository
     */
    public function __construct(StudentRepository $studentRepository) {

        $this->studentRepository = $studentRepository;
    }
     
    /**
     * add student info
     * 
     * @param type $data
     * @return type
     */
    public function addStudent($data) {
        
        return $this->studentRepository->studnetAdd($data);
        
    }
    
    /**
     * update student info
     * 
     * @param type $data
     */
    public function updateStudent($data){
        
         return $this->studentRepository->studnetupdate($data);
    }
    
    public function deleteStudent($id) {
        
          return $this->studentRepository->studnetDelete($id);
    }
    
     public function getStudentInfo($search_by_teacher,$search_by_class) {
        return $this->studentRepository->allStudentInfo($search_by_teacher,$search_by_class);
    }
    
      public function getStudentById($id) {
        return $this->studentRepository->allStudentInfo('','',$id);
    }
    
    public function getTeacherInfo() {
        
        return $this->studentRepository->techInfo();
    }
    
    public function getClassInfo(){
      
         return $this->studentRepository->classInfo();
    }


   
    public function getOrdersByDate($data) {
        return $this->studentRepository->userAdd($data);
    }

    public function getOrdersByUser($data) {
        return $this->studentRepository->userAdd($data);
    }
    
}

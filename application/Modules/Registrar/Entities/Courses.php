<?php

namespace Modules\Registrar\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Courses extends Model
{
    use HasFactory;

    protected $fillable = ['department_id', 'course_code', 'course_name','level'];
    protected $guared = [];

    protected $table = 'courses';


    public function newCourses(){

        return $this->belongsToMany(Intake::class, 'available_courses', 'course_id', 'intake_id');

    }

//    available courses vs courses

    public function onOffer(){

        return $this->hasMany(AvailableCourse::class, 'id');

    }
    public function availablecourse(){

        return $this->hasOne(AvailableCourse::class, 'id');
    }

//    relationship between a course and an application

    public function apps(){

        return $this->hasMany(Application::class, 'id');

    }
    public function courseRequirements(){
        return $this->hasOne(CourseRequirement::class, 'course_id');
    }

    // public function dept(){

    //     return $this->belongsTo(Department::class, 'department_id');
    // }

    public function getCourseDept(){

        return $this->belongsTo(Department::class, 'department_id');

    }

    public function useDept(){
        return $this->belongsTo(Department::class);
    }

    protected static function newFactory()
    {
        return \Modules\Courses\Database\factories\CoursesFactory::new();
    }

//    public function intakes(){
//        $this->belongsTo(Intake::class, 'id');
//    }
}

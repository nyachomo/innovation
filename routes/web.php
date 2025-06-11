<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ClasController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\LeedController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\TimeTableController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\CourseModuleController;
use App\Http\Controllers\ClassNotesController;
use App\Http\Controllers\HighSchoolTeacherController;
Route::get('/', function () {
    //return view('welcome');
    return redirect()->route('login');
})->name('welcome');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


/*
Route::get('/administrators',[UserController::class, 'index'])->name('showAdministrator');
Route::get('admin.fetch.users',[UserController::class, 'adminFetchUsers'])->name('adminFetchUsers');
Route::post('admin.add.new.user2',[UserController::class, 'adminAddNewUser2'])->name('adminAddNewUser2');
Route::post('/update-user', [UserController::class, 'update'])->name('updateUser');
Route::post('/delete-user', [UserController::class, 'delete'])->name('deleteUser');
Route::post('/users/upload', [UserController::class, 'upload'])->name('users.upload');
Route::get('/users/download', [UserController::class, 'download'])->name('users.download');
Route::get('/download-user-file',[UserController::class,'downloadUserFile'])->name('downloadUserFile');
*/





Route::prefix('admin')->group(function () {
    Route::get('/administrators', [UserController::class, 'index'])->name('showAdministrator');
    Route::get('/fetch-users', [UserController::class, 'adminFetchUsers'])->name('adminFetchUsers');
    Route::post('/add-new-user', [UserController::class, 'adminAddNewUser2'])->name('adminAddNewUser2');
    Route::post('/update-user', [UserController::class, 'update'])->name('updateUser');
    Route::post('/delete-user', [UserController::class, 'delete'])->name('deleteUser');
    Route::post('/suspend-user', [UserController::class, 'suspend'])->name('suspendUser');
    Route::post('/users/upload', [UserController::class, 'upload'])->name('users.upload');
    Route::get('/users/download', [UserController::class, 'download'])->name('users.download');
    Route::get('/download-user-file', [UserController::class, 'downloadUserFile'])->name('downloadUserFile');
    Route::get('/user-account', [UserController::class, 'UserAccount'])->name('userAccount');
    Route::post('adminUpdateUserPassword',[UserController::class, 'adminUpdateUserPassword'])->name('adminUpdateUserPassword');
    Route::post('adminUpdateUserPicture',[UserController::class, 'adminUpdateUserPicture'])->name('adminUpdateUserPicture');
    Route::post('userUpdateProfile',[UserController::class, 'userUpdateProfile'])->name('userUpdateProfile');
    

    //admin manage timetable
    Route::get('manageTimeTable',[TimeTableController::class, 'showTimeTable'])->name('showTimeTable');
    Route::post('create-timetable',[TimeTableController::class, 'addTimeTable'])->name('addTimeTable');
    Route::post('update-timetable',[TimeTableController::class, 'updateTimeTable'])->name('updateTimeTable');
    Route::post('delete-timetable',[TimeTableController::class, 'deleteTimeTable'])->name('deleteTimeTable');

    //MANAGE CLASS NOTES
    Route::get('ShowClassNotes',[ClassNotesController::class, 'showClassNotes'])->name('showClassNotes');
    Route::post('create-class-notes',[ClassNotesController::class, 'addClassNotes'])->name('addClassNotes');
    Route::post('update-class-notes',[ClassNotesController::class, 'updateClassNotes'])->name('updateClassNotes');
    Route::post('delete-class-notes',[ClassNotesController::class, 'deleteClassNotes'])->name('deleteClassNotes');
    
});




//HIGH SCHOOL TEACHER
Route::prefix('h-schl')->group(function () {
    Route::get('/students', [HighSchoolTeacherController::class, 'fetchHighStudents'])->name('fetchHighStudents');
    Route::get('/ViewTraineeProfile', [HighSchoolTeacherController::class, 'ViewTraineeProfile'])->name('ViewTraineeProfile');
});



Route::prefix('trainees')->group(function () {
    Route::get('/show', [TraineeController::class, 'index'])->name('showTrainees');
    Route::get('/fetch-trainees', [TraineeController::class, 'fetchTrainees'])->name('fetchTrainees');
    Route::post('/add-trainee', [TraineeController::class, 'addTrainee'])->name('addTrainee');
    Route::post('/update-trainee', [TraineeController::class, 'updateTrainee'])->name('updateTrainee');
    Route::get('/view-notes/{id}', [TraineeController::class, 'traineeViewNotes'])->name('traineeViewNotes');
    //trainee view course

    Route::get('/view-course', [TraineeController::class, 'traineeViewCourse'])->name('traineeViewCourse');
    Route::get('/viewFeePayments', [TraineeController::class, 'traineeViewFeePayment'])->name('traineeViewFeePayment');
    Route::get('/viewAssignment', [TraineeController::class, 'traineeViewAssignment'])->name('traineeViewAssignment');
    Route::get('/fetch-assignments', [TraineeController::class, 'traineeFetchAssignments'])->name('traineeFetchAssignments');
    Route::get('/viewQuestions', [TraineeController::class, 'traineeViewQuestions'])->name('traineeViewQuestions');
    Route::get('/fetch_questions/{exam_id}', [TraineeController::class, 'fetchQuestionsForTrainee'])->name('fetchQuestionsForTrainee');


    Route::post('/store-answer', [TraineeController::class, 'storeStudentAnswer'])->name('storeStudentAnswer');

    //CATS
    Route::get('/viewCats', [TraineeController::class, 'traineeViewCats'])->name('traineeViewCats');
    Route::get('/fetch-cats', [TraineeController::class, 'traineeFetchCats'])->name('traineeFetchCats');

    //FINAL EXAM
    Route::get('/viewFinalExam', [TraineeController::class, 'traineeViewFinalExam'])->name('traineeViewFinalExam');
    Route::get('/fetch-final-exam', [TraineeController::class, 'traineeFetchFinalExam'])->name('traineeFetchFinalExam');


    //FETCH FEES
    Route::get('/fetch-fees', [TraineeController::class, 'fetchFeeBalance'])->name('fetchFeeBalance');

    Route::get('/show-class-link', [TraineeController::class, 'showClassLink'])->name('showClassLink');
    Route::get('/show-class-notes', [TraineeController::class, 'showClassNotes'])->name('showClassNotes');


    Route::get('/{id}', [TraineeController::class, 'showTraineeProfile'])->name('showTraineeProfile');

});


Route::prefix('courses')->group(function () {
    Route::get('/show', [CourseController::class, 'index'])->name('showCourses');
    Route::get('/fetch-courses', [CourseController::class, 'fetchCourses'])->name('fetchCourses');
    Route::post('/add', [CourseController::class, 'addCourse'])->name('addCourse');
    Route::post('/update', [CourseController::class, 'updateCourse'])->name('updateCourse');
    Route::post('/delete', [CourseController::class, 'deleteCourse'])->name('deleteCourse');
    Route::post('/suspend', [CourseController::class, 'suspendCourse'])->name('suspendCourse');

   
});



Route::prefix('clases')->group(function () {
    Route::get('/show', [ClasController::class, 'index'])->name('showClases');
    Route::get('/fetch-clases', [ClasController::class, 'fetchClases'])->name('fetchClases');
    Route::post('/add', [ClasController::class, 'addClas'])->name('addClas');
    Route::post('/update', [ClasController::class, 'updateClas'])->name('updateClas');
    Route::post('/delete', [ClasController::class, 'deleteClas'])->name('deleteClas');
    Route::post('/suspend', [ClasController::class, 'suspendClas'])->name('suspendClas');

   
});


Route::prefix('topics')->group(function () {
    Route::get('/show', [TopicController::class, 'index'])->name('showTopics');
    //Route::get('/fetch-topics', [TopicController::class, 'fetchTopics'])->name('fetchTopics');
    Route::post('/add', [TopicController::class, 'addTopics'])->name('addTopics');
    Route::post('/update', [TopicController::class, 'updateTopics'])->name('updateTopics');
    Route::post('/delete', [TopicController::class, 'deleteTopics'])->name('deleteTopics');
    Route::post('/suspend', [TopicController::class, 'suspendTopics'])->name('suspendTopics');

   
});

Route::prefix('school')->group(function () {
    Route::get('/show', [SchoolController::class, 'index'])->name('showSchools');
    Route::get('/fetch-schools', [SchoolController::class, 'fetchSchools'])->name('fetchSchools');
    Route::post('/add', [SchoolController::class, 'addSchools'])->name('addSchools');
    Route::post('/update', [SchoolController::class, 'updateSchools'])->name('updateSchools');
    Route::post('/delete', [SchoolController::class, 'deleteSchools'])->name('deleteSchools');
    Route::post('/suspend', [SchoolController::class, 'suspendSchools'])->name('suspendSchools');

   
});


Route::prefix('Leeds')->group(function () {
    Route::get('/show', [LeedController::class, 'index'])->name('showLeeds');
    Route::get('/fetch-leeds', [LeedController::class, 'fetchLeeds'])->name('fetchLeeds');
    Route::post('/add', [LeedController::class, 'addLeeds'])->name('addLeeds');
    Route::post('/update', [LeedController::class, 'updateLeeds'])->name('updateLeeds');
    Route::post('/delete', [LeedController::class, 'deleteLeeds'])->name('deleteLeeds');
    Route::post('/suspend', [LeedController::class, 'suspendLeeds'])->name('suspendLeeds'); 

    //TEACHER MANAGE LEEDS
    Route::get('/T-show', [LeedController::class, 'teacherShowLeeds'])->name('teacherShowLeeds');
    Route::get('/T-fetch-leeds', [LeedController::class, 'teacherFetchLeeds'])->name('teacherFetchLeeds');

    Route::get('/{id}/download-pdf', [LeedController::class, 'downloadShortCourseLetter'])->name('leeds.downloadShortCourseLetter');
});


Route::prefix('exams')->group(function () {
    Route::get('/show/assignment', [ExamController::class, 'index'])->name('showExams');
    Route::get('/fetch-assignments', [ExamController::class, 'fetchAssignments'])->name('fetchAssignments');
    Route::post('/add/assignment', [ExamController::class, 'addAssignment'])->name('addAssignment');

    Route::get('/show/cats', [ExamController::class, 'adminManageCats'])->name('adminManageCats');
    Route::get('/fetch-cats', [ExamController::class, 'fetchCats'])->name('fetchCats');


    Route::get('/show/finalExam', [ExamController::class, 'adminManageFinalExam'])->name('adminManageFinalExam');
    Route::get('/fetch-final-exam', [ExamController::class, 'fetchFinalExam'])->name('fetchFinalExam');


    Route::post('/update', [ExamController::class, 'updateExams'])->name('updateExams');
    Route::post('/delete', [ExamController::class, 'deleteExams'])->name('deleteExams');
    Route::post('/published', [ExamController::class, 'publishedExams'])->name('publishedExams');

    Route::post('/notpublished', [ExamController::class, 'notpublishedExams'])->name('notpublishedExams');

    Route::get('/showExamAttempts', [ExamController::class, 'showExamAttempts'])->name('showExamAttempts');
    Route::get('/fetchExamAttempts/{exam_id}', [ExamController::class, 'fetchExamAttempts'])->name('fetchExamAttempts');




});







Route::prefix('questions')->group(function () {
    Route::get('/adminManageQuestions', [QuestionController::class, 'adminManageQuestions'])->name('adminManageQuestions');
    Route::post('/add', [QuestionController::class, 'addQuestion'])->name('addQuestion');
    //Route::get('/fetch-questions', [QuestionController::class, 'fetchQuestions'])->name('fetchQuestions');
    Route::get('/fetch_questions/{exam_id}', [QuestionController::class, 'fetchQuestions'])->name('fetchQuestions');
    Route::post('/update', [QuestionController::class, 'updateQuestion'])->name('updateQuestion');
    Route::post('/delete', [QuestionController::class, 'deleteQuestion'])->name('deleteQuestion');
});

Route::prefix('course-modules')->group(function () {
    Route::get('/manageCourseModule', [CourseModuleController::class, 'manageCourseModule'])->name('manageCourseModule');
    Route::post('/add', [CourseModuleController::class, 'addModule'])->name('addModule');
    Route::post('/update', [CourseModuleController::class, 'updateModule'])->name('updateModule');
    Route::post('/delete', [CourseModuleController::class, 'deleteModule'])->name('deleteModule');
    Route::get('/fetch_module/{course_id}', [CourseModuleController::class, 'fetchModules'])->name('fetchModules');
    Route::post('/topics', [CourseModuleController::class, 'deleteModule'])->name('deleteModule');

    Route::get('/manageNotes', [CourseModuleController::class, 'adminManageNotes'])->name('adminManageNotes');
    Route::get('/fetch-topics/{id}', [CourseModuleController::class, 'fetchTopics'])->name('fetchTopics');
});

Route::prefix('settings')->group(function () {
    Route::get('/show', [SettingController::class, 'ShowSettings'])->name('ShowSettings');
    Route::post('/update-logo', [SettingController::class, 'updateCompanyLogo'])->name('updateCompanyLogo');
    Route::post('/update-company-deatils', [SettingController::class, 'updateCompanyDetails'])->name('updateCompanyDetails');
    Route::get('/fetch', [SettingController::class, 'fetchCompanyDetails'])->name('fetchCompanyDetails');

    Route::post('/updateComapy-settings', [SettingController::class, 'updatecompanySettings'])->name('updatecompanySettings');

    
   
});


Route::prefix('fees')->group(function () {
    Route::get('/showFees', [FeeController::class, 'showFees'])->name('showFees');
    Route::post('/add', [FeeController::class, 'addFees'])->name('addFees');
    Route::post('/update', [FeeController::class, 'updateFees'])->name('updateFees');
    Route::post('/delete', [FeeController::class, 'deleteFees'])->name('deleteFees');
    
    //TRAINEE DOWNLOADING RECEIPT FOR HERSELF/HIMESELF
    Route::get('/downloadReceipt/{id}', [FeeController::class, 'downloadReceipt'])->name('downloadReceipt');

    //ADMIN DOWNLOAD RECEIPT FOR TRAINEE
    Route::get('/admindownloadReceipt/{id}', [FeeController::class, 'admindownloadReceipt'])->name('admindownloadReceipt');

    Route::get('/traineePrintingReceiptForRegistration', [FeeController::class, 'traineePrintingReceiptForRegistration'])->name('traineePrintingReceiptForRegistration');
});

Route::prefix('Applicants')->group(function () {
    Route::get('/show', [ApplicantController::class, 'index'])->name('showApplicants');
    Route::get('/fetch-applicants', [ApplicantController::class, 'fetchApplicants'])->name('fetchApplicants');
    Route::post('/markedAsPaidRegFee', [ApplicantController::class, 'markedAsPaidRegFee'])->name('markedAsPaidRegFee');
    
});



//WEBSITE CONTROLLER
Route::get('/about_us',[App\Http\Controllers\WebsiteController::class, 'about_us'])->name('about_us');
Route::get('/all_courses',[App\Http\Controllers\WebsiteController::class, 'all_courses'])->name('all_courses');
Route::get('/apply',[App\Http\Controllers\WebsiteController::class, 'apply'])->name('apply');

Route::get('/data-science',[App\Http\Controllers\WebsiteController::class, 'dataScience'])->name('dataScience');
Route::get('/android-application',[App\Http\Controllers\WebsiteController::class, 'androidApplication'])->name('androidApplication');
Route::get('/web-application',[App\Http\Controllers\WebsiteController::class, 'webApplication'])->name('webApplication');
Route::get('/digital-marketing',[App\Http\Controllers\WebsiteController::class, 'digitalMarketing'])->name('digitalMarketing');
Route::get('/cyber-security',[App\Http\Controllers\WebsiteController::class, 'cyberSecurity'])->name('cyberSecurity');
Route::get('/graphic-design',[App\Http\Controllers\WebsiteController::class, 'graphicDesign'])->name('graphicDesign');
Route::get('/software-engineering',[App\Http\Controllers\WebsiteController::class, 'softwareEngineering'])->name('softwareEngineering');

Route::get('/data-analysis',[App\Http\Controllers\WebsiteController::class, 'dataAnalysis'])->name('dataAnalysis');

Route::get('/about',[App\Http\Controllers\WebsiteController::class, 'aboutUs'])->name('aboutUs');
Route::get('/corporate-training',[App\Http\Controllers\WebsiteController::class, 'corporateTraining'])->name('corporateTraining');
Route::get('/indistrial-attachment',[App\Http\Controllers\WebsiteController::class, 'industrialAttachment'])->name('industrialAttachment');
Route::get('/ict-hub',[App\Http\Controllers\WebsiteController::class, 'ictHub'])->name('ictHub');

Route::get('/contact-us',[App\Http\Controllers\WebsiteController::class, 'contactUs'])->name('contactUs');
Route::get('/enrol',[App\Http\Controllers\WebsiteController::class, 'enrol'])->name('enrol');

Route::post('/contact-us/create',[App\Http\Controllers\ContactController::class, 'create'])->name('contact.create');






Route::get('/showLeedsPerSchool', [SchoolController::class, 'showLeedsPerSchool'])->name('showLeedsPerSchool');
Route::post('/adminDeleteLeed', [LeedController::class, 'adminDeleteLeed'])->name('adminDeleteLeed');
Route::get('/downloadLeedsPerSchool', [SchoolController::class, 'downloadLeedsPerSchool'])->name('downloadLeedsPerSchool');
Route::get('/adminshowLeedsPerProgram/{id}', [LeedController::class, 'adminshowLeedsPerProgram'])->name('adminshowLeedsPerProgram');
Route::get('/adminshowLeedsPerSchool/{id}', [LeedController::class, 'adminshowLeedsPerSchool'])->name('adminshowLeedsPerSchool');
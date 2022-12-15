<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Excel;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PDF;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $students=Student::orderBy('id')->paginate(10);

       return view('Students.index',compact('students'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except('_token','file');

       $image=$request->file('file');

       $imageName=time().'.'.$image->extension();
       $image->move(public_path('image'),$imageName);

        Student::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],
            'profileimage'=>$imageName]);


       return redirect()->route('students.index')->with('student_added','Student record has been');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $student=Student::find($id);
        return view('Students.edit',compact('student'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        try
        {

            $student=Student::find($id);

            if(!$student)
             return redirect()->route('students.index')->with('error','هذا الطالب غير موجود أو ربما يكون محذوفا');

            $image=$request->file('file');

            $imageName=time().'.'.$image->extension();
            DB::beginTransaction();

            if($request->has('file'))
            {
                $image->move(public_path('image'),$imageName);
                Student::where('id',$id)->update(['profileimage'=>$imageName]);
            }

            $data=[];
            $data=$request->except('_token','file','_method');

              Student::where('id',$id)->update($data);

              DB::commit();
              return redirect()->route('students.index')->with('success','data has been updated');

        }
        catch(Exception $ex)
        {

            DB::rollBack();
            return redirect()->route('students.index')->with('error','something error happen');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $student=Student::find($id);

            if(!$student)
            {
             return redirect()->route('students.index')->with('error','حدث خطا ما يرجى المحاولة مرة اخرى');
            }
            $profileImage=Str::after($student->profileimage,'localhost:8000/');

            File::delete($profileImage);

           $student->delete();
           return redirect()->route('students.index')->with('success','تم حذف بنجاح');
        }
        catch(Exception $ex)
        {
            return redirect()->route('students.index')->with('error','there is error something happen');
        }

    }

    //In Laravel 9 use composer require psr/simple-cache:^1.0 maatwebsite/excel
    //to export and import from excel
    public function exportIntoExcel()
    {
        //return Excel::export('studentlist.xlsx',\Maatwebsite\Excel\Excel::XLS);
        return Excel::download(new StudentExport,'student.xlsx');


    }

    public function exportIntoCSV()
    {
        return Excel::download(new StudentExport,'student.csv');

    }

    //Export to PDF
    public function ExportPDF()
    {
        $data = Student::get();

        view()->share('students',$data);


        $pdf=PDF::loadView('students.StudentPDF',compact('data'));

        return $pdf->download('15.pdf');
    }

    public function ImportStudent()
    {

        return view('Students.import-student');
    }

    public function import(Request $request)
    {
        Excel::import(new StudentImport,$request->file);

        return "Records are imported Successfully";
    }

    public function autocomplete(Request $request)
    {

          $datas=Student::select('name')->where('name','like','%'.$request->search.'%')->get();

        return response()->json($datas);
    }
}

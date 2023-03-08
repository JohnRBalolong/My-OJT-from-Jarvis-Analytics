<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view ('students.index')->with('students', $students);
    }
    
    public function create()
    {
        return view('students.create');
    }
  
    public function store(Request $request)
    {
        $input = $request->all();
        Student::create($input);
        return redirect('phonebooks')->with('flash_message', 'Contact Addedd!');  
    }
    
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show')->with('students', $student);
    }
    
    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit')->with('students', $student);
    }
  
    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'mobile' => [
                'required',
                'regex:/^(09|\+639)\d{9}$/',
                function ($attribute, $value, $fail) {
                    if (substr($value, 0, 4) !== '+639' && substr($value, 0, 2) !== '09') {
                        $fail('The mobile number must start with +639 or 09.');
                    }
                },
            ],
        ], 
        $messages = [
            'name.required' => "Can't update. You previously cleared name.",
            'address.required' => "Can't update. You previously cleared address.",
            'mobile.regex' => "Can't update. You previously entered invalid mobile number.",
        ]
        
       );
    
        // Update the record in the database
        $students = Student::find($id);
    $input = $request->all();
    $students->update($input);
    return redirect('phonebooks')->with('flash_message', 'Contact updated!');
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('phonebooks')->with('flash_message', 'Contact deleted!');  
    }
}
?>
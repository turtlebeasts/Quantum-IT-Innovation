<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\Employee;

class EmployerController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|unique:employers,name',
        ]);

        Employer::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Employer and Employees added successfully.');
    }

    public function index()
    {
        $employers = Employer::all();
        return view('dashboard', compact('employers'));
    }

    public function employees(Employer $employer)
    {
        return view('employee', compact('employer'));
    }

    public function add_employees(Employer $employer, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the employee data
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->employer_id = $employer->id;

        // Handle the image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('employee_images', 'public');
            $employee->image = $path;
        }

        $employee->save();

        return redirect()->back()->with('success', 'Employee added successfully.');
    }

    public function checkEmail(Request $request)
    {
        $email = $request->input('email');
        $exists = Employee::where('email', $email)->exists();

        return response()->json(['exists' => $exists]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Jobs;
use App\Models\Roles;
use App\Models\Teams;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    // getALL
    public function index(Request $request)
    {
        $employees = Employees::all();
        $employees->makeHidden(['password']);

        return response()->json([
            'status' => 'success',
            'data' => $employees
        ]);

    }
    // get by id
    public function show($id)
    {
        $employees = Employees::find($id);
        $employees->makeHidden(['password']);
        if (!$employees) {
            return response()->json([
                'status' => 'error',
                'message' => 'employee not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $employees
        ]);
    }
    // create
    public function create(Request $request)
    {
        $rules=[
          'role_id' => 'required|integer',
          'jobs_id' => 'required|integer',
          'team_id' => 'required|integer',
          'employee_name' => 'required|string',
          'date_of_birth' => 'required|date',
          'age' => 'required|integer',
          'mobile_number' => 'required|string',
          'email' => 'required|email|unique:SG_EMPLOYEE,email',
          'username' => 'required|string',
          'password' => 'required|string|min:8',
          'gender' => 'required|in:PRIA,WANITA',
          'religion' => 'string',
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }
        $roleId = $request->input('role_id');
        $roleId= Roles::find($roleId);
        if(!$roleId){
            return response()->json([
                'status' => 'error',
                'message' => 'role not found'
            ], 404);
        }
        $jobId = $request->input('jobs_id');
        $jobId= Jobs::find($jobId);
        if(!$jobId){
            return response()->json([
                'status' => 'error',
                'message' => 'job not found'
            ], 404);
        }
        $teamId = $request->input('team_id');
        $teamId= Teams::find($teamId);
        if(!$jobId){
            return response()->json([
                'status' => 'error',
                'message' => 'team not found'
            ], 404);
        }
        $employees = Employees::create($data);
        return response()->json([
            'status' => 'success',
            'data' => $employees
        ], 200);
    }
    // update
    public function update(Request $request, $id){
        $rules=[
          'role_id' => 'integer',
          'jobs_id' => 'integer',
          'team_id' => 'integer',
          'EMPLOYEE_NAME' => 'string',
          'DATE_OF_BIRTH' => 'date',
          'AGE' => 'integer',
          'PHONE_NUMBER' => 'string',
          'MOBILE_NUMBER' => 'string',
          'EMAIL' => 'email',
          'USERNAME' => 'string',
          'PASSWORD' => 'string|min:8',
          'GENDER'=>'in:PRIA,WANITA',
          'RELIGION' => 'string',
        ];
        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }
        $employees = Employees::find($id);
        if (!$employees) {
            return response()->json([
                'status' => 'error',
                'message' => 'Employee not found'
            ], 404);
        }
        $roleId = $request->input('role_id');
        if ($roleId) {
            $roleId = Roles::find($roleId);
            if (!$roleId) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'roles not found'
                ], 404);
            }
        }
        $jobId = $request->input('jobs_id');
        if ($jobId) {
            $jobId = Jobs::find($jobId);
            if (!$jobId) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'jobs not found'
                ], 404);
            }
        }
        $teamId = $request->input('team_id');
        if ($teamId) {
            $teamId = Teams::find($teamId);
            if (!$teamId) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'teams not found'
                ], 404);
            }
        }
         $employees->fill($data);
        $employees->save();

        return response()->json([
            'status' => 'success',
            'data' => $employees
        ]);
    }
    //delete
    public function destroy($id)
    {
        $employees = Employees::find($id);

        if (!$employees) {
            return response()->json([
                'status' => 'error',
                'message' => 'employee not found'
            ]);
        }

        $employees->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'employee deleted'
        ]);
    }
}

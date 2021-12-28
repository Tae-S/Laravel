<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class EmployeesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::table('employees')
        ->get();
        return view('/employees/index',[
            'employees' => $employees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = DB::table('employees')
            ->get();

        return view('/employees/create',[
            'employees' => $employees,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */

    public function error() // redundant
    {
        //return view('/employees/fourofour');
    }

    public function store(Request $request)
    {

        $code = $request->input('parent');
        $searchForSuchUser = Employee::where('username',$code)->get()->toArray();
        //dd($searchForSuchUser);
        if($searchForSuchUser == [])
        {
            //dd($searchForSuchUser);
            //echo "<h2>Error</h2>";

            //EmployeesController::show(404);
            $code = ' ';
        }


        $employeeSingle = Employee::select('*')->where('username',$code)->get()->toArray();
        $employee = Employee::create([
            'username' => $request->input('username'),
            //'parent' => $request->input('parent'),
            'parent' => $code,
            'amount' => 0,
        ]);
        if($employeeSingle != null)
        {
            //call update on parent and update amount

            $param = $employeeSingle[0]['username'];

            EmployeesController::updateSilent($param,0);
        }

        return redirect('/employees');
    }

    public function updateSilent($username,$level)
    {
        //todo check if parent exists for the chain. if a user is encountered with a parent who doesn't exist in the DB , remove parent.
        //base amount earned by parent is taken as 100, 5% of 100 = 5, that is how the $levels table is filled.
        $levels = [5,2,9,5,2,1,5];

        $es = Employee::all();
        $esid = Employee::select('*')->where('username',$username)->first();
        if($esid == null)
        {
            return redirect('/employees');
        }
        $id = $esid->id;
        $es = $es->find($id);

        if($es != null)
        {
            $ess = Employee::where('id',$id)->update([
                'amount' => ($es->amount + $levels[$level]),
            ]);
            $level++;
            if($es->parent != null)
            {
                EmployeesController::updateSilent($es->parent,$level);
            }
            else
            {
                return redirect('/employees');
            }
        }
        else
        {
            return redirect('/employees');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //return view('/employees/show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = Employee::all();
        $employee = $employees->find($id);
        $employeeList = DB::table('employees')
            ->get();

        return view('/employees/edit',[
            'employeeList' => $employeeList
        ],compact('employee'));
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
        $employee = Employee::where('id',$id)->update([
            'username' => $request->input('username'),
            'parent' => $request->input('parent'),
        ]);

        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employeeList = Employee::where('parent',$employee->username)->get();
        //dd($employeeList);
        foreach ($employeeList as $e)
        {
            $es = Employee::where('id',$e->id)->update([
                'parent' => ' ',
            ]);
        }
        $employee->delete();

        return redirect('/employees');
    }
}

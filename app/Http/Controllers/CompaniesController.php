<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = DB::table('companies')
            ->get();
        return view('/companies/index',[
            'companies' => $companies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/companies/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //no file validation
        //$fileName = time().'-'.$request->file->getClientOriginalName;
        //dd($fileName);
        //$fileName = $request->input('logo');
        $fileName = $request->input('name').'.png';
        $url = null;
        if($request->file($request->input('logo')))
        {
            $filePath = $request->file('logo')->storeAs('logo',$fileName,'public');
            $url = Storage::url($filePath);
            //dd($url);
            //('logo')->storeAs('uploads',$request->input('logo'),'public');//('logo')->storeAs('uploads', $request->input('logo'), 'public');
            //dd($filePath);
        }

        $company = Company::create([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
            'email' => $request->input('email'),
            //'logo' => $request->input('logo'),
            'logo' => $url,
        ]);
        return redirect('/companies');//,compact('url'));
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
        $companies = Company::all();
        $company = $companies->find($id);
        return view('/companies/edit',compact('company'));
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
        $company = Company::where('id',$id)->update([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
            'email' => $request->input('email'),
            'logo' => $request->input('logo'),
        ]);
        return redirect('/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect('/companies');
    }
}

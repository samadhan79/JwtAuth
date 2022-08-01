<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DbCompany;
class CompnyController extends Controller
{
   public function __construct()
   {
    $this->middleware('auth:api');
}
public function index()
{
    $company = DbCompany::all();
    return response()->json([
        'status' => 'success',
        'company' => $company,
    ]);
}
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'logo' => 'required|string|max:255',
        'website' => 'required|string|max:255',
    ]);

    $company = DbCompany::create([
        'name' => $request->name,
        'email' => $request->email,
        'logo' => $request->logo,
        'website' => $request->website,
    ]);

    return response()->json([
        'status' => 'success',
        'message' => 'company created successfully',
        'company' => $company,
    ]);
}
public function show($id)
{
    $company = DbCompany::find($id);
    return response()->json([
        'status' => 'success',
        'company' => $company,
    ]);
}
public function destroy($id)
{
    $company = DbCompany::find($id);
    $company->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'company deleted successfully',
        'company' => $company,
    ]);
}
public function update(Request $request, $id)
{
    

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'logo' => 'required|string|max:255',
        'website' => 'required|string|max:255',
    ]);

    $company = DbCompany::find($id);
    $company->name = $request->name;
    $company->email = $request->email;
    $company->logo = $request->logo;
    $company->website = $request->website;
    $company->save();

    return response()->json([
        'status' => 'success',
        'message' => 'company updated successfully',
        'company' => $company,
    ]);
}
}

<?php

namespace App\Http\Controllers;

use App\Company;
use App\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:manager');
    }

    public function index()
    {
        $managerCompanies = auth()->user()->load('companies');
        $managerId = Auth::id();

        return view('manager.index', compact('managerCompanies', 'managerId'));
    }

    public function addCompany(Manager $manager)
    {
        return view('manager.add-company', compact('manager'));
    }

    public function saveCompany(Manager $manager)
    {
        $company = auth()->user()->companies()->create($this->validateRequest());

        return redirect(route('manager.dashboard'));
    }

    public function showCompanies(Manager $manager)
    {
        $managers = auth()->user()->load('companies');

        return view('manager.companies-list', compact('managers'));
    }

    private function validateRequest()
    {
        return tap(request()->validate([
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',

        ]), function () {

                if (request()->hasFile('logo')) {
                    request()->validate([
                       'logo' => 'file|image|max:5000',
                    ]);
                }
        });
    }










    public function logout()
    {
        Auth::logout();

        return view('welcome');
    }
}

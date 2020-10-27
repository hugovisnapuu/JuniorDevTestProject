<?php

namespace App\Http\Controllers;

use App\Company;
use App\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        // show admin dashboard view
        return view('admin.index');
    }

    public function showAllManagers()
    {
        // Add a collection of managers into one variable
        $managers = Manager::all();
        // show all managers in a view, compact $managers variable
        return view('admin.index-managers', compact( 'managers'));
    }

    public function createManager()
    {
        // show manager creation form
        return view('admin.create-managers');
    }

    public function storeManager()
    {
        // save new manager to the database
        $manager = Manager::create($this->validateRequest());
        // redirect back to see all managers
        return redirect(route('admin.managers'));
    }

    public function showManager(Manager $manager)
    {
        // load companies on the manager to access companies through relationship
        $manager->load('companies');
        // return managers profile page, compact manager variable
        return view('admin.show-manager', compact('manager'));
    }

    public function attemptToDeleteManager(Manager $manager)
    {
        // load companies to manager
        $manager->load('companies');
        // check if manager has any companies
        if ($manager->companies->isEmpty())
        {
            // because does not have companies, call delete function
            // and delete immediately
            $this->destroyManager($manager);
            // redirect back to all managers page
            return redirect(route('admin.managers'))
                ->with('message', 'Manager '.$manager->name. ' has been deleted');
        }
        // if has companies, new manager must be added before deleting is possible
        else
        {
            return redirect()->back()
                ->with('warning', 'This manager has active companies.
                Please update company managers in order to delete this manager');
        }
    }

    public function ()
    {
        
    }

    public function destroyManager(Manager $manager)
    {
        $manager->delete();
    }

    public function showAllCompanies()
    {
        // add all companies to $companies variable
        $companies = Company::all();
        // return view, which show all existing companies, compact $companies
        return view('admin.index-companies', compact('companies'));
    }

    public function showCompany(Manager $manager, Company $company)
    {
        // return company show view, compact variables
        return view('admin.show-company', compact('manager', 'company'));
    }

    public function editCompanyManager(Manager $manager, Company $company)
    {
        // return edit view to update manager
        return view('admin.edit-company', compact('manager', 'company'));
    }

    public function updateCompanyManager(Manager $manager, Company $company)
    {
        // validate data and update company manager
        $manager->update($this->validateRequest());
        // redirect back to index-companies view
        return redirect(route('admin.companies'));
    }

    private function validateRequest()
    {
        return request()->validate([
            // validate data
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'password' => 'required'
        ]);
    }
}

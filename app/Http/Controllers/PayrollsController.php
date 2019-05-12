<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Payroll;
use App\Employee;
use Illuminate\Http\Request;

class PayrollsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $payrolls = Payroll::where('firstName', 'LIKE', "%$keyword%")
                ->orWhere('lastName', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $payrolls = Payroll::latest()->paginate($perPage);
        }

        return view('payrolls.index', compact('payrolls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // get all employees
        $employees_obg = new Employee;
        $employees = $employees_obg::all();

        $return = array('employees' => $employees );
        return view('payrolls.create',$return);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        //dd($requestData);
        Payroll::create($requestData);

        return redirect('payrolls')->with('flash_message', 'payroll added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $payroll = Payroll::findOrFail($id);

        return view('payrolls.show', compact('payroll'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $payroll = Payroll::findOrFail($id);
        // get all employees
        $employees_obg = new Employee;
        $employees = $employees_obg::all();

        $return = array('employees' => $employees );

        return view('payrolls.edit', compact('payroll'),$return);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $payroll = Payroll::findOrFail($id);
        $payroll->update($requestData);

        return redirect('payrolls')->with('flash_message', 'payroll updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Payroll::destroy($id);

        return redirect('payrolls')->with('flash_message', 'payroll deleted!');
    }
}

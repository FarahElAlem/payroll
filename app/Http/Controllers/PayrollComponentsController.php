<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF;
use App\Payroll;
use App\Component;
use App\PayrollComponent;

use Illuminate\Http\Request;

class PayrollComponentsController extends Controller
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
            $payrollComponents = PayrollComponent::where('firstName', 'LIKE', "%$keyword%")
                ->orWhere('lastName', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $payrollComponents = PayrollComponent::latest()->paginate($perPage);
            //dd($payrollComponents);

        }

        return view('payroll_components.index', compact('payrollComponents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // get all employees
        $components_obg = new Component;
        $components = $components_obg::all();

        $payrolls_obg = new Payroll;
        $payrolls = $payrolls_obg::all();

        $allComponents = array('components' => $components );
        $allPayrolls = array('payrolls' => $payrolls );
        return view('payroll_components.create',$allComponents,$allPayrolls);
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
        PayrollComponent::create($requestData);

        return redirect('payrollcomponents')->with('flash_message', 'payroll component added!');
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
        $payroll = PayrollComponent::findOrFail($id);
       dd($payroll);
        return view('payroll_components.show', compact('payroll'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $id = Payroll::find($id);
        $requestData = $request->all();
        //dd($id);
        //dd($requestData);
        // get all employees
        $components_obg = new Component;
        $components = $components_obg::all();

        $payrolls_obg = new Payroll;
        $payrolls = $payrolls_obg::all();

        $allComponents = array('components' => $components );
        $allPayrolls = array('payrolls' => $payrolls );
        return view('payroll_components.create',$allComponents,$allPayrolls);
    }

    public function payment($id)
    {
        // get all employees
        $components_obg = new Component;
        $components = $components_obg::all();

        $payrolls_obg = new Payroll;
        $payrolls = $payrolls_obg::all();

        $allComponents = array('components' => $components );
        $allPayrolls = array('payrolls' => $payrolls );
        return view('payroll_components.create',$allComponents,$allPayrolls);
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

    public function demoGeneratePDF()
    {
        $data = ['title' => 'Welcome to My Blog'];
        $pdf = PDF::loadView('demoPDF', $data);

        return $pdf->download('demo.pdf');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ComponentType;
use Illuminate\Http\Request;
use App\Operation;

class ComponentTypesController extends Controller
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
            $componenttypes = ComponentType::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $componenttypes = ComponentType::latest()->paginate($perPage);
        }


        return view('componenttypes.index', compact('componenttypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // get all oprations
        $operations_obg = new Operation;
        $operations = $operations_obg::all();

        $return = array('operations' => $operations );
        return view('componenttypes.create',$return);
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

        
        
        ComponentType::create($requestData);

        return redirect('componenttypes')->with('flash_message', 'componenttypes added!');
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
        $componenttype = ComponentType::findOrFail($id);

        return view('componenttypes.show', compact('componenttype'));
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
        $componenttype = ComponentType::findOrFail($id);
        // get all oprations
        $operations_obg = new Operation;
        $operations = $operations_obg::all();

        $return = array('operations' => $operations );

        return view('componenttypes.edit', compact('componenttype'),$return);
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
        
        $componenttype = ComponentType::findOrFail($id);
        $componenttype->update($requestData);

        return redirect('componenttypes')->with('flash_message', 'componenttypes updated!');
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
        ComponentType::destroy($id);

        return redirect('componenttypes')->with('flash_message', 'ComponentType deleted!');
    }
}

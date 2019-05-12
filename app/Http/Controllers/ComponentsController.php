<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ComponentType;
use Illuminate\Http\Request;
use App\Component;

class ComponentsController extends Controller
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
            $components = Component::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $components = Component::latest()->paginate($perPage);
        }


        return view('components.index', compact('components'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        // get all oprations
        $component_types_obg = new ComponentType;
        $componenttypes = $component_types_obg::all();

        $return = array('componenttypes' => $componenttypes );
        return view('components.create',$return);
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

        Component::create($requestData);

        return redirect('components')->with('flash_message', 'component added!');
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
        $component = Component::findOrFail($id);

        return view('components.show', compact('component'));
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
        $component = Component::findOrFail($id);

        $componenttypes_obg = new ComponentType;
        $componenttypes = $componenttypes_obg::all();

        $return = array('componenttypes' => $componenttypes );

        return view('components.edit', compact('component'),$return);
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

        $componenttype = Component::findOrFail($id);
        $componenttype->update($requestData);

        return redirect('components')->with('flash_message', 'Component updated!');
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
        Component::destroy($id);

        return redirect('components')->with('flash_message', 'Component deleted!');
    }
}

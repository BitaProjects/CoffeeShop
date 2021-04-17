<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Option;

class optionsController extends Controller
{
    public function index()
    {
        $options = Option::all();
        return view('admin.option.options',compact('options'));
    }

    public function create()
    {
        return view('admin.option.create');
    }

    public function store(Request $request)
    {
        $choices = $request->choices;
        $choices =implode(" ",$choices);
        $choices = explode(',',$choices);
        $option = Option::create(
            [
                'option'=>$request->option,
                'choices'=>json_encode($choices),
            ]);
        $options = Option::all();
        return view('admin.option.options',compact('options'));

    }
    public function edit($optionID)
    {
        $option = Option::where('id',$optionID)->first();
        $options = Option::all();
        return view('admin.option.edit',compact('option','options'));
    }
    public function update(Request $request , $optionID)
    {
        $choices = $request->choices;
        $choices =implode(" ",$choices);
        $choices = explode(',',$choices);
        Option::where('id',$optionID)->update(
            [
                'option'=>$request->option,
                'choices'=>json_encode($choices),
            ]);
        $options = Option::all();
        return view('admin.option.options',compact('options'));
    }

}

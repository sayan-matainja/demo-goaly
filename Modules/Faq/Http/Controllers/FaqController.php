<?php

namespace Modules\Faq\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Faq\Http\Requests\Faqrequest;
use Modules\Faq\Http\Requests\Faqedit;
use Modules\Faq\Entities\FaqSetting;

// use Illuminate\Http\Requests\Faqrequest;
use Illuminate\Routing\Controller;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $faqs=FaqSetting::get();
        return view('faq::index',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */

    public function create()
    {
        return view('faq::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    
    public function store(Faqrequest $request)
    {
        $faq=new FaqSetting;
       // $faq=new faq_setting();

       $faq->faq_question=$request->faqtitle;
       $faq->faq_answer=$request->faqanswer;
       $faq->save();
       return redirect()->back()->with('message','created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */

    public function show($id)
    {
        return view('faq::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */

    public function edit(Faqedit $request)
    {
        $faq=FaqSetting::find($request->id);
        // $faq=new faq_setting();
        //  dd($request->faqanswer);
        $faq->faq_question=$request->faqtitle;
        $faq->faq_answer=$request->faqanswer;
        $faq->save();
        return redirect()->back()->with('message','update successfully');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    
    public function destroy($id)
    {
        //
        FaqSetting::find($id)->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Page;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\StorePage;

class PageController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pages = Page::latest()->get(['slug', 'title', 'is_published']);

        return view('page.index', compact('pages'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('page.create');
    }

    public function store(StorePage $request)
    {
        DB::transaction(function () use ($request)
        {
            $page = Page::create($request->pageFillData());

            $this->uploadRequestImage($request, $page);
        });

        return redirect()->route('page.index')->withSuccess(trans('messages.create_success', ['entity' => 'Page']));
    }

    /**
     * @param Page $page
     * @return \Illuminate\View\View
     */
    public function edit(Page $page)
    {
        return view('page.edit', compact('page'));
    }
}

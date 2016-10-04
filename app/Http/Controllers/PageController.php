<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Page;
use App\Http\Requests\StorePage;
use App\Http\Requests\UpdatePage;

class PageController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pages = country()->page()->latest()->get(['slug', 'title', 'is_published']);

        return view('page.index', compact('pages'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('page.create');
    }

    /**
     * @param StorePage $request
     * @return mixed
     */
    public function store(StorePage $request)
    {
        DB::transaction(function () use ($request)
        {
            $page = country()->page()->create($request->pageFillData());

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

    public function update(UpdatePage $request, Page $page)
    {
        DB::transaction(function () use ($request, $page)
        {
            $page->update($request->pageFillData());

            $this->uploadRequestImage($request, $page);
        });

        return back()->withSuccess(trans('messages.update_success', ['entity' => 'Page']));
    }
}

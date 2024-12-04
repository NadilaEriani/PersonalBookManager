<?php

namespace App\Http\Controllers;

use App\Models\bookGenre;
use App\Http\Requests\StorebookGenreRequest;
use App\Http\Requests\UpdatebookGenreRequest;

class BookGenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorebookGenreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(bookGenre $bookGenre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bookGenre $bookGenre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebookGenreRequest $request, bookGenre $bookGenre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bookGenre $bookGenre)
    {
        //
    }
}

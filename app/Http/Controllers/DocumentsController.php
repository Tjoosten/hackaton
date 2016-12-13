<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentValidator;
use App\InfoArticles;
use Illuminate\Http\Request;

/**
 * Class DocumentsController
 *
 * @package App\Http\Controllers
 */
class DocumentsController extends Controller
{
    /**
     * DocumentsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Insert view for a new article.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Insert a new article document.
     *
     * @param  DocumentValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DocumentValidator $input)
    {
        $data['heading']     = $input->heading;
        $data['description'] = $input->description;
        $data['user_id']     = auth()->user()->id;

        if (InfoArticles::create($data)) {
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'The article has been created');
        }

        return redirect()->back(302);
    }
}

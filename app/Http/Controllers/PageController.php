<?php

namespace Clinic\Http\Controllers;

use Clinic\Models\Specialization;

class PageController extends Controller
{
    /**
     * Главная страница
     *
     * @return \Illuminate\Auth\Access\Response|void
     */
    public function __invoke()
    {
        $specializations = Specialization::all('name', 'slug');
        return view('pages.index', [
            'specializations' => $specializations
        ]);
    }

    /**
     *
     * Страница специализации
     * @param string $slug Slug специализации
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(string $slug)
    {
        $specializations = Specialization::all('name', 'slug');

        $doctors = Specialization::where('slug', $slug)->firstOrFail()->doctors();
        $doctors = $doctors->select('surname', 'name', 'specialization_id')->get();

        return view('pages.index', [
            'specializations' => $specializations,
            'doctors' => $doctors,
            'activeSlug' => $slug
        ]);
    }
}

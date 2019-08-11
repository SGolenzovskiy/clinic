<?php

namespace Clinic\Http\Controllers;

use Carbon\Carbon;
use Clinic\Models\Specialization;
use Clinic\Models\Visit;

/**
 * Контроллер страниц.
 *
 * Class PageController
 * @package Clinic\Http\Controllers
 */
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
     * Страница специализации
     * @param string $slug Slug специализации
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(string $slug)
    {
        $specializations = Specialization::all('name', 'slug');

        $doctors = Specialization::where('slug', $slug)->firstOrFail()->doctors();
        $doctors = $doctors->select('id', 'surname', 'name', 'photo', 'specialization_id')->get();

        $today = Carbon::now()->format('Y-m-d');
        $visit = new Visit();
        $visit->setSlotsPerDay($today);
        $slots = [];
        foreach ($doctors as $doctor) {
            $busySlots = $visit->getSlotsByDayByDoctor($today, $doctor->id);
            $freeSlots = $visit->getFreeSlots($busySlots);
            $slots[$doctor->id] = $freeSlots;
        }

        return view('pages.index', [
            'specializations' => $specializations,
            'doctors' => $doctors,
            'activeSlug' => $slug,
            'slots' => $slots
        ]);
    }
}

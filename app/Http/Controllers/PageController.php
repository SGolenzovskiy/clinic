<?php

namespace Clinic\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Clinic\Models\Specialization;
use Clinic\Models\Visit;

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
        $doctors = $doctors->select('id', 'surname', 'name', 'photo', 'specialization_id')->get();

        $visits = new Visit();
        $slots = [];
        $today = Carbon::now()->format('Y-m-d');
        foreach ($doctors as $doctor) {
            $busySlots = $visits->getSlotsByDayByDoctor($today, $doctor->id);
            $freeSlots = $visits->getFreeSlots($busySlots);
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

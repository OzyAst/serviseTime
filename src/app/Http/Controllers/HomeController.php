<?php

namespace App\Http\Controllers;

use App\Services\Records\RecordService;
use App\Services\Statistic\StatisticService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * @var RecordService
     */
    private $recordService;
    /**
     * @var StatisticService
     */
    private $statisticService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        RecordService $recordService,
        StatisticService $statisticService
    )
    {
        $this->recordService = $recordService;
        $this->statisticService = $statisticService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect('/home');
        }

        return view('home.landing');
    }

    /**
     * Главная страница, зарегистрированный пользователь
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        $statisticToday = $this->statisticService->getStatusToday();
        $records = $this->recordService->getUserRecords(Auth::user());

        return view('home.index', [
            'records' => $records,
            'statistic' => $statisticToday,
        ]);
    }
}

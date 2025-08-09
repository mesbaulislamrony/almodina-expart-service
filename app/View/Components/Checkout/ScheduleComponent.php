<?php

namespace App\View\Components\Checkout;

use App\Services\ScheduleService;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ScheduleComponent extends Component
{
    public $service;

    /**
     * Create a new component instance.
     */
    public function __construct(ScheduleService $service)
    {
        $this->service = $service;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data['weekes'] = $this->service->getAvailableDates();
        $data['hours'] = $this->service->getAvailableHours();
        $data['scheduled_at'] = Carbon::now()->addDay(1)->addMinute(30)->format('l M Y h:i A');

        return view('components.checkout.schedule-component', $data);
    }
}

<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Composers;

use CachetHQ\Cachet\Models\Metric;
use CachetHQ\Cachet\Repositories\Metric\MetricRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Config;

class MetricsComposer
{
    /**
     * @var \CachetHQ\Cachet\Repositories\Metric\MetricRepository
     */
    protected $metricRepository;

    /**
     * Construct a new home controller instance.
     *
     * @param \CachetHQ\Cachet\Repositories\Metric\MetricRepository $metricRepository
     *
     * @return void
     */
    public function __construct(MetricRepository $metricRepository)
    {
        $this->metricRepository = $metricRepository;
    }

    /**
     * Metrics view composer.
     *
     * @param \Illuminate\Contracts\View\View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $metrics = null;
        $metricData = [];
        if ($displayMetrics = Config::get('setting.display_graphs')) {
            $metrics = Metric::where('display_chart', 1)->orderBy('id')->get();

            $metrics->map(function ($metric) use (&$metricData) {
                $metricData[$metric->id] = [
                    'last_hour' => $this->metricRepository->listPointsLastHour($metric),
                    'today'     => $this->metricRepository->listPointsToday($metric),
                    'week'      => $this->metricRepository->listPointsForWeek($metric),
                    'month'     => $this->metricRepository->listPointsForMonth($metric),
                ];
            });
        }

        $view->withDisplayMetrics($displayMetrics)
            ->withMetrics($metrics)
            ->withMetricData($metricData);
    }
}

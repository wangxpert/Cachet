<?php

namespace CachetHQ\Cachet\Http\Controllers\Api;

use CachetHQ\Cachet\Repositories\Metric\MetricRepository;
use GrahamCampbell\Binput\Facades\Binput;
use Illuminate\Http\Request;

class MetricController extends AbstractApiController
{
    /**
     * The metric repository instance.
     *
     * @var \CachetHQ\Cachet\Repositories\Metric\MetricRepository
     */
    protected $metric;

    /**
     * Create a new metric controller instance.
     *
     * @param \CachetHQ\Cachet\Repositories\Metric\MetricRepository $metric
     *
     * @return void
     */
    public function __construct(MetricRepository $metric)
    {
        $this->metric = $metric;
    }

    /**
     * Get all metrics.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getMetrics(Request $request)
    {
        $metrics = $this->metric->paginate(Binput::get('per_page', 20));

        return $this->paginator($metrics, $request);
    }

    /**
     * Get a single metric.
     *
     * @param int $id
     *
     * @return \CachetHQ\Cachet\Models\Metric
     */
    public function getMetric($id)
    {
        return $this->metric->findOrFail($id);
    }

    /**
     * Get all metric points.
     *
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getMetricPoints($id)
    {
        return $this->metric->points($id);
    }

    /**
     * Create a new metric.
     *
     * @return \CachetHQ\Cachet\Models\Metric
     */
    public function postMetrics()
    {
        return $this->metric->create(Binput::all());
    }

    /**
     * Update an existing metric.
     *
     * @param int $id
     *
     * @return \CachetHQ\Cachet\Models\Metric
     */
    public function putMetric($id)
    {
        return $this->metric->update($id, Binput::all());
    }

    /**
     * Delete an existing metric.
     *
     * @param int $id
     *
     * @return \Dingo\Api\Http\Response
     */
    public function deleteMetric($id)
    {
        $this->metric->destroy($id);

        return $this->noContent();
    }
}

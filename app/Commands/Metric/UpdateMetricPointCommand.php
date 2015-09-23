<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Commands\Metric;

use CachetHQ\Cachet\Models\Metric;
use CachetHQ\Cachet\Models\MetricPoint;

class UpdateMetricPointCommand
{
    /**
     * The metric point.
     *
     * @var \CachetHQ\Cachet\Models\MetricPoint
     */
    public $point;

    /**
     * The metric.
     *
     * @var \CachetHQ\Cachet\Models\Metric
     */
    public $metric;

    /**
     * The metric point value.
     *
     * @var int
     */
    public $value;

    /**
     * The metric point created at.
     *
     * @var string
     */
    public $createdAt;

    /**
     * Create a new update metric point command instance.
     *
     * @param \CachetHQ\Cachet\Models\MetricPoint $point
     * @param \CachetHQ\Cachet\Models\Metric      $metric
     * @param int                                 $value
     * @param string                              $createdAt
     *
     * @return void
     */
    public function __construct(MetricPoint $point, Metric $metric, $value, $createdAt)
    {
        $this->point = $point;
        $this->metric = $metric;
        $this->value = $value;
        $this->createdAt = $createdAt;
    }
}

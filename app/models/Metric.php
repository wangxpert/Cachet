<?php

use Watson\Validating\ValidatingTrait;

class Metric extends Eloquent implements \Dingo\Api\Transformer\TransformableInterface
{
    use ValidatingTrait;

    protected $rules = [
        'name'          => 'required',
        'suffix'        => 'required',
        'display_chart' => 'boolean',
    ];

    protected $fillable = ['name', 'suffix', 'description', 'display_chart'];

    /**
     * Metrics contain many metric points.
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function points()
    {
        return $this->hasMany('MetricPoint', 'metric_id', 'id');
    }

    /**
     * Determines whether a chart should be shown.
     *
     * @return bool
     */
    public function getShouldDisplayAttribute()
    {
        return $this->display_chart === 1;
    }

    /**
     * Get the transformer instance.
     *
     * @return CachetHQ\Cachet\Transformers\MetricTransformer
     */
    public function getTransformer()
    {
        return new CachetHQ\Cachet\Transformers\MetricTransformer();
    }
}

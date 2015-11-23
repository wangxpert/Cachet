<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Presenters;

use Illuminate\Contracts\Support\Arrayable;
use McCool\LaravelAutoPresenter\BasePresenter as BaseLaravelAutoPresenter;

abstract class AbstractPresenter extends BaseLaravelAutoPresenter implements Arrayable
{
    /**
     * The setting repository.
     *
     * @var \CachetHQ\Cachet\Config\Repository
     */
    protected $setting;

    /**
     * Create an abstract presenter instance.
     *
     * @param \Illuminate\Database\Eloquent\Model $resource
     *
     * @return void
     */
    public function __construct($resource)
    {
        parent::__construct($resource);

        $this->setting = app('setting');
    }
}

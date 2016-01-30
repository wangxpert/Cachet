<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Presenters\Traits;

use Illuminate\Support\Facades\Config;
use Jenssegers\Date\Date;

trait TimestampsTrait
{
    /**
     * Present formatted date time.
     *
     * @return string
     */
    public function created_at()
    {
        return (new Date($this->wrappedObject->created_at))
            ->setTimezone(Config::get('cachet.timezone'))->toDateTimeString();
    }

    /**
     * Present formatted date time.
     *
     * @return string
     */
    public function updated_at()
    {
        return (new Date($this->wrappedObject->updated_at))
            ->setTimezone(Config::get('cachet.timezone'))->toDateTimeString();
    }

    /**
     * Present formatted date time.
     *
     * @return string
     */
    public function deleted_at()
    {
        return (new Date($this->wrappedObject->deleted_at))
            ->setTimezone(Config::get('cachet.timezone'))->toDateTimeString();
    }
}

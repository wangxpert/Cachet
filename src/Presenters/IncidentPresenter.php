<?php

namespace CachetHQ\Cachet\Presenters;

use CachetHQ\Cachet\Facades\Setting;
use CachetHQ\Cachet\Models\Incident;
use GrahamCampbell\Markdown\Facades\Markdown;
use Jenssegers\Date\Date;
use McCool\LaravelAutoPresenter\BasePresenter;

class IncidentPresenter extends BasePresenter
{
    /**
     * Time zone setting.
     *
     * @var string
     */
    protected $tz;

    /**
     * Create a incident presenter instance.
     *
     * @param \CachetHQ\Cachet\Models\Incident $incident
     */
    public function __construct(Incident $incident)
    {
        $this->resource = $incident;
        $this->tz = Setting::get('app_timezone');
    }

    /**
     * Renders the message from Markdown into HTML.
     *
     * @return string
     */
    public function formattedMessage()
    {
        return Markdown::render($this->resource->message);
    }

    /**
     * Present diff for humans date time.
     *
     * @return string
     */
    public function created_at_diff()
    {
        return (new Date($this->resource->created_at))
            ->setTimezone($this->tz)
            ->diffForHumans();
    }

    /**
     * Present formatted date time.
     *
     * @return string
     */
    public function created_at_formatted()
    {
        return ucfirst((new Date($this->resource->created_at))
            ->setTimezone($this->tz)
            ->format('l j F Y H:i:s'));
    }

    /**
     * Present formatted date time.
     *
     * @return string
     */
    public function created_at_iso()
    {
        return $this->resource->created_at->setTimezone($this->tz)->toISO8601String();
    }

    /**
     * Present the status with an icon.
     *
     * @return string
     */
    public function icon()
    {
        switch ($this->resource->status) {
            case 1:
                return 'icon ion-flag';
            case 2:
                return 'icon ion-alert';
            case 3:
                return 'icon ion-eye';
            case 4:
                return 'icon ion-checkmark';
            default:
                return '';
        }
    }
}

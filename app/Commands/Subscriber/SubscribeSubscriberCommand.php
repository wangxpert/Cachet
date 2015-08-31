<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Commands\Subscriber;

class SubscribeSubscriberCommand
{
    /**
     * The subscriber email.
     *
     * @var string
     */
    public $email;

    /**
     * The subscriber auto verification.
     *
     * @var string
     */
    public $verified;

    /**
     * The validation rules.
     *
     * @var array
     */
    public $rules = [
        'email' => 'required|email',
    ];

    /**
     * Create a new subscribe subscriber command instance.
     *
     * @param string $email
     * @param bool   $verified
     *
     * @return void
     */
    public function __construct($email, $verified = false)
    {
        $this->email = $email;
        $this->verified = $verified;
    }
}

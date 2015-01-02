<?php

namespace CachetHQ\Cachet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Watson\Validating\ValidatingTrait;

/**
 * @property int            $id
 * @property string         $email
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class Subscriber extends Model
{
    use SoftDeletingTrait, ValidatingTrait;

    /**
     * The validation rules.
     *
     * @var string[]
     */
    protected $rules = [
        'email' => 'required|email',
    ];

    /**
     * The fillable properties.
     *
     * @var string[]
     */
    protected $fillable = ['email'];
}

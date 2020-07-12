<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Bin[] $bins
 * @property-read int|null $bins_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Bin
 *
 * @property int $id
 * @property int $user_id
 * @property string $uuid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\BinItem[] $binItems
 * @property-read int|null $bin_items_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bin query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bin whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bin whereUuid($value)
 */
	class Bin extends \Eloquent {}
}

namespace App{
/**
 * App\BinItem
 *
 * @property int $id
 * @property int $bin_id
 * @property string $ip_address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Bin $bin
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BinItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BinItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BinItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BinItem whereBinId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BinItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BinItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BinItem whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BinItem whereUpdatedAt($value)
 */
	class BinItem extends \Eloquent {}
}


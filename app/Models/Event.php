<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 * 
 * @property int $event_id
 * @property string $title
 * @property Carbon $start
 * @property Carbon $end
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Event extends Model
{
	protected $table = 'events';
	protected $primaryKey = 'event_id';

	protected $casts = [
		'start' => 'datetime',
		'end' => 'datetime'
	];

	protected $fillable = [
		'title',
		'start',
		'end'
	];
}

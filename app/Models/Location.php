<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Location
 * 
 * @property int $location_id
 * @property string $location
 *
 * @package App\Models
 */
class Location extends Model
{
	protected $table = 'locations';
	protected $primaryKey = 'location_id';
	public $timestamps = false;

	protected $fillable = [
		'location'
	];
}

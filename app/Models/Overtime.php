<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Overtime
 * 
 * @property int $ot_id
 * @property int|null $employee_id
 * @property Carbon|null $ot_date
 * @property float|null $ot_hours
 *
 * @package App\Models
 */
class Overtime extends Model
{
	protected $table = 'overtime';
	protected $primaryKey = 'ot_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ot_id' => 'int',
		'employee_id' => 'int',
		'ot_date' => 'datetime',
		'ot_hours' => 'float'
	];

	protected $fillable = [
		'employee_id',
		'ot_date',
		'ot_hours'
	];
}

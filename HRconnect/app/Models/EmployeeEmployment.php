<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeeEmployment
 * 
 * @property int|null $employee_id
 * @property int $record_no
 * @property Carbon|null $from_year
 * @property Carbon|null $to_year
 * @property string|null $position
 * @property string|null $employeer
 * @property string|null $experience
 * @property int|null $monthly_salary
 *
 * @package App\Models
 */
class EmployeeEmployment extends Model
{
	protected $table = 'employee_employments';
	protected $primaryKey = 'record_no';
	public $timestamps = false;

	protected $casts = [
		'employee_id' => 'int',
		'from_year' => 'datetime',
		'to_year' => 'datetime',
		'monthly_salary' => 'int'
	];

	protected $fillable = [
		'employee_id',
		'from_year',
		'to_year',
		'position',
		'employeer',
		'experience',
		'monthly_salary'
	];
}

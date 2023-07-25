<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeeEducation
 * 
 * @property int $record_no
 * @property int|null $level
 * @property string|null $school
 * @property string|null $course
 * @property Carbon|null $year_from
 * @property Carbon|null $year_to
 * @property int $employee_id
 *
 * @package App\Models
 */
class EmployeeEducation extends Model
{
	protected $table = 'employee_educations';
	protected $primaryKey = 'record_no';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'record_no' => 'int',
		'level' => 'int',
		'year_from' => 'datetime',
		'year_to' => 'datetime',
		'employee_id' => 'int'
	];

	protected $fillable = [
		'level',
		'school',
		'course',
		'year_from',
		'year_to',
		'employee_id'
	];
}

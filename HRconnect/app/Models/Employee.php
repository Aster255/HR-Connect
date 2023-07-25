<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 * 
 * @property int $employee_id
 * @property int|null $position_id
 * @property int|null $department_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property Carbon|null $hire_date
 * @property float|null $salary
 * @property Carbon $employee_timestamp
 * @property string|null $employee_status
 * @property string|null $title
 * @property string|null $middle_name
 * @property string|null $maiden_name
 * @property string|null $nick_name
 * @property string $picture
 * @property int|null $schedule_id
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Employee extends Model
{
	protected $table = 'employees';
	protected $primaryKey = 'employee_id';
	public $timestamps = false;

	protected $casts = [
		'position_id' => 'int',
		'department_id' => 'int',
		'hire_date' => 'datetime',
		'salary' => 'float',
		'employee_timestamp' => 'datetime',
		'schedule_id' => 'int'
	];

	protected $fillable = [
		'position_id',
		'department_id',
		'first_name',
		'last_name',
		'hire_date',
		'salary',
		'employee_timestamp',
		'employee_status',
		'title',
		'middle_name',
		'maiden_name',
		'nick_name',
		'picture',
		'schedule_id'
	];

	public function users()
	{
		return $this->hasMany(User::class);
	}
}

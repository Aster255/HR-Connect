<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Department
 * 
 * @property int $department_id
 * @property string $department_name
 * @property string $department_status
 * @property Carbon $department_timestamp
 * 
 * @property Collection|Employee[] $employees
 * @property Collection|Position[] $positions
 *
 * @package App\Models
 */
class Department extends Model
{
	protected $table = 'departments';
	protected $primaryKey = 'department_id';
	public $timestamps = false;

	protected $casts = [
		'department_timestamp' => 'datetime'
	];

	protected $fillable = [
		'department_name',
		'department_status',
		'department_timestamp'
	];

	public function employees()
	{
		return $this->hasMany(Employee::class);
	}

	public function positions()
	{
		return $this->hasMany(Position::class);
	}
}

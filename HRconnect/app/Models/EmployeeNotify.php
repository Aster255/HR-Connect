<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeeNotify
 * 
 * @property int $employee_id
 * @property string|null $name
 * @property string|null $relationship
 * @property int|null $mobile_no
 * @property string|null $address
 *
 * @package App\Models
 */
class EmployeeNotify extends Model
{
	protected $table = 'employee_notifies';
	protected $primaryKey = 'employee_id';
	public $timestamps = false;

	protected $casts = [
		'mobile_no' => 'int'
	];

	protected $fillable = [
		'name',
		'relationship',
		'mobile_no',
		'address'
	];
}

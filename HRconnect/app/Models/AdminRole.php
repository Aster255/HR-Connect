<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminRole
 * 
 * @property int $role_id
 * @property string $role_name
 *
 * @package App\Models
 */
class AdminRole extends Model
{
	protected $table = 'admin_roles';
	protected $primaryKey = 'role_id';
	public $timestamps = false;

	protected $fillable = [
		'role_name'
	];
}

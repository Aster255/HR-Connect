<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PayrollTransaction
 * 
 * @property int $transaction_no
 * @property int|null $employee_id
 * @property string|null $tax_code
 * @property int|null $payroll_period
 * @property float|null $basic_salary
 * @property float|null $gross_income
 * @property float|null $withholding_tax
 * @property float|null $sss_cont
 * @property float|null $pf_cont
 * @property float|null $pag_ibig_cont
 * @property float|null $philhealth_cont
 * @property float|null $total_deduction
 * @property float|null $net_pay
 * @property float|null $year_to_date_basic
 * @property float|null $year_to_date_non_basic
 * @property float|null $taxable_bonus
 * @property float|null $taxable_income
 * @property float|null $tax_exemption
 * @property float|null $tax_withheld
 * @property float|null $vacation_leave_hours
 * @property float|null $sick_leave_hours
 * @property Carbon|null $last_leave_availed
 * @property float|null $leave_balance
 * @property Carbon|null $pay_date
 * @property float|null $overtime_pay
 * @property float|null $attendance_deductions
 * @property float|null $leave_deductions
 *
 * @package App\Models
 */
class PayrollTransaction extends Model
{
	protected $table = 'payroll_transactions';
	protected $primaryKey = 'transaction_no';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'transaction_no' => 'int',
		'employee_id' => 'int',
		'payroll_period' => 'int',
		'basic_salary' => 'float',
		'gross_income' => 'float',
		'withholding_tax' => 'float',
		'sss_cont' => 'float',
		'pf_cont' => 'float',
		'pag_ibig_cont' => 'float',
		'philhealth_cont' => 'float',
		'total_deduction' => 'float',
		'net_pay' => 'float',
		'year_to_date_basic' => 'float',
		'year_to_date_non_basic' => 'float',
		'taxable_bonus' => 'float',
		'taxable_income' => 'float',
		'tax_exemption' => 'float',
		'tax_withheld' => 'float',
		'vacation_leave_hours' => 'float',
		'sick_leave_hours' => 'float',
		'last_leave_availed' => 'datetime',
		'leave_balance' => 'float',
		'pay_date' => 'datetime',
		'overtime_pay' => 'float',
		'attendance_deductions' => 'float',
		'leave_deductions' => 'float'
	];

	protected $fillable = [
		'employee_id',
		'tax_code',
		'payroll_period',
		'basic_salary',
		'gross_income',
		'withholding_tax',
		'sss_cont',
		'pf_cont',
		'pag_ibig_cont',
		'philhealth_cont',
		'total_deduction',
		'net_pay',
		'year_to_date_basic',
		'year_to_date_non_basic',
		'taxable_bonus',
		'taxable_income',
		'tax_exemption',
		'tax_withheld',
		'vacation_leave_hours',
		'sick_leave_hours',
		'last_leave_availed',
		'leave_balance',
		'pay_date',
		'overtime_pay',
		'attendance_deductions',
		'leave_deductions'
	];
}

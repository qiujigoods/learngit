<?php 
namespace Modules\Admin\Models\Type;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\DB;

class Activity extends Model
{
	protected $table = 'activity';
	public $timestamps = false;

	public static function show()
	{
		$res = Activity::paginate(5);
		return $res;
	}

	public function getStatusAttribute($value)
	{
		$arr = ['未启用','已启用'];

		return $arr[$value];
	}
}
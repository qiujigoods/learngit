<?php

namespace Modules\Admin\Models\Menu;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    protected $table = 'menu';
    public  $timestamps = false;
    public static function showType()
    {
        $info = Menu::orderBy('parent_id', 'asc')->get();
    	$result = self::list_level($info, $parent_id = 0, $level = 0);

    	return $result;
    }

    public static function list_level($data,$parent_id,$level)
    {
        static $array = array();

        foreach ($data as $k => $v) {
            # code...
            if($parent_id == $v->parent_id){
                $v->level = $level;

                $array[] = $v;

                self::list_level($data,$v->id,$level+1);
            }
        }
        return $array;
    }

    public function del($id)
    {
        // $id = $_GET['id'];
        $category = $this->where('id',$id);

        return $category->delete();
    }

    public function find($id)
    {
        // $id = $_GET['id'];
        $category = $this->where('id',$id);

        return $category;
    }

}

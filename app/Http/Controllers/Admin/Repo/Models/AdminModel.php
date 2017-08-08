<?php
/**
 * Created by PhpStorm.
 * User: evan likhvar
 * Date: 08.08.17
 * Time: 12:07
 */

namespace App\Http\Controllers\Admin\Repo\Models;


use Illuminate\Support\Facades\Config;

abstract class AdminModel
{
    protected $model = FALSE;

    public function get($select = '*', $take = FALSE, $pagination = FALSE, $where = FALSE, $order = FALSE)
    {
        $builder = $this->model->select($select);
        //   dd(__METHOD__, $where, $builder);
        if ($take) {
            $builder->take($take);
        }
        if ($where) {
            foreach (array_chunk($where, 3) as $value) {
                //
                $builder->where($value[0],$value[1], $value[2]);
            }
        }
        //return dd($builder);
        if ($order) {
            $builder->orderBy($order[0], $order[1]);
        }
        if ($pagination) {
            return $builder->paginate(Config::get('settings.AdminUserPagination'));
        }
        return $builder->get();
        //return $this->check($builder->get());
    }



}
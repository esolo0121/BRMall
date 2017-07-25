<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\AdminRepository;
use App\Models\Admin;
use App\Repositories\Validators\AdminsValidator;

/**
 * Class AdminRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class AdminRepositoryEloquent extends BaseRepository implements AdminRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Admin::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * 管理员列表
     * @Author Echo
     * @Date   2017-07-25T16:09:52+0800
     * @param  integer                  $count 每页显示条数
     * @return object                   数据集
     */
    public function getlist($count = 10){
        return $this->model->paginate($count);
    }

    public function destroy($id){
        return $this->model->destroy($id);
    }
}

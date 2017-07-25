<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\AdminPermissionRepository;
use App\Models\AdminPermission;
use App\Repositories\Validators\AdminPermissionValidator;

/**
 * Class AdminPermissionRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class AdminPermissionRepositoryEloquent extends BaseRepository implements AdminPermissionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AdminPermission::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

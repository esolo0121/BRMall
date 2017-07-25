<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\AdminAdminRoleRepository;
use App\Models\AdminAdminRole;
use App\Repositories\Validators\AdminAdminRoleValidator;

/**
 * Class AdminAdminRoleRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class AdminAdminRoleRepositoryEloquent extends BaseRepository implements AdminAdminRoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AdminAdminRole::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

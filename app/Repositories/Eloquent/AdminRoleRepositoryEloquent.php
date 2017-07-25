<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\AdminRoleRepository;
use App\Models\AdminRole;
use App\Repositories\Validators\AdminRoleValidator;

/**
 * Class AdminRoleRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class AdminRoleRepositoryEloquent extends BaseRepository implements AdminRoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AdminRole::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

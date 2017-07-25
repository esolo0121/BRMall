<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\AdminLoginLogRepository;
use App\Models\AdminLoginLog;
use App\Repositories\Validators\AdminLoginLogValidator;

/**
 * Class AdminLoginLogRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class AdminLoginLogRepositoryEloquent extends BaseRepository implements AdminLoginLogRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AdminLoginLog::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

<?php

namespace App\Repositories\Presenters;

use App\Repositories\Transformers\AdminPresenterTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AdminPresenterPresenter
 *
 * @package namespace App\Repositories\Presenters;
 */
class AdminPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AdminPresenterTransformer();
    }

    /**
     * 管理员锁定状态
     * @Author Echo
     * @Date   2017-07-25T16:06:33+0800
     * @param  int                   $is_block [1:锁定 0:正常]
     * @return string
     */
    public function getState($is_block){
        if ($is_block == 0){
            $state = trans('admin/system.no');
        }elseif ($is_block == 1){
            $state = trans('admin/system.yes');
        }
        return $state;
    }
}

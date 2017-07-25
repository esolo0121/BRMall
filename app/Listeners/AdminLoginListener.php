<?php

namespace App\Listeners;

use App\Events\AdminLoginEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\AdminLoginLog;
use App\Models\Admin;
class AdminLoginListener
{

    /**
     * [handle description]
     * @Author Echo
     * @Date   2017-07-24T16:20:44+0800
     * @param  AdminLoginEvent          $event [description]
     * @return [type]                          [description]
     */
    public function handle(AdminLoginEvent $event)
    {

        //获取事件中保存的信息
        $user = $event->getUser();
        $agent = $event->getAgent();
        $ip = $event->getIp();
        $timestamp = $event->getTimestamp();

        //登录信息
        $login_info = [
          'ip' => $ip,
          'login_time' => $timestamp,
          'aid' => $user->id,
        ];

        // zhuzhichao/ip-location-zh 包含的方法获取ip地理位置
        $addresses = \Ip::find($ip);
        $login_info['address'] = implode(' ', $addresses);

        // jenssegers/agent 的方法来提取agent信息
        $login_info['device'] = $agent->device();    //设备名称
        $browser = $agent->browser();
        $login_info['browser'] = $browser . ' ' . $agent->version($browser); //浏览器
        $platform = $agent->platform();
        $login_info['platform'] = $platform . ' ' . $agent->version($platform); //操作系统
        $login_info['language'] = implode(',', $agent->languages());    //语言
        //设备类型
        if ($agent->isTablet()) {
          // 平板
          $login_info['device_type'] = 'tablet';
        } else if ($agent->isMobile()) {
          // 便捷设备
          $login_info['device_type'] = 'mobile';
        } else if ($agent->isRobot()) {
          // 爬虫机器人
          $login_info['device_type'] = 'robot';
          $login_info['device'] = $agent->robot(); //机器人名称
        } else {
          // 桌面设备
          $login_info['device_type'] = 'desktop';
        }

        //插入日志
        AdminLoginLog::create($login_info);
        $admin = [
            'last_login' => $login_info['login_time'],
            'last_ip' => $login_info['ip']
        ];
        //更新管理员登录信息
        $admin = Admin::find($login_info['aid']);
        $admin->last_login = $login_info['login_time'];
        $admin->last_ip = $login_info['ip'];
        $admin->save();
    }
}

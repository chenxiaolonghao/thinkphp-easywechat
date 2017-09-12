<?php
namespace Wechat\Controller;

use Think\Controller;
use EasyWeChat\Foundation\Application;
class IndexController extends Controller
{
	public function index()
	{
		$options = [
		    'debug'     => true,
		    'app_id'    => 'wx5be0ef8a6f12a155',
		    'secret'    => '9dc1c9af72a8b806ffa24dfa21a5b9a3',
		    'token'     => 'mly',
		    'log' => [
		        'level' => 'debug',
		        'file'  => '/tmp/easywechat.log',
		    ],
		];

		$app = new Application($options);

		$server = $app->server;
		$user = $app->user;

		$server->setMessageHandler(function($message) use ($user) {
		    $fromUser = $user->get($message->FromUserName);

		    return "{$fromUser->nickname} 您好！欢迎关注 overtrue!";
		});

		$server->serve()->send();

	}
}
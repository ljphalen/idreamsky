<?php
if (!defined('BASE_PATH')) exit('Access Denied!');
/**
 * Created by PhpStorm.
 * User: kyle.ke
 * Date: 2018/3/19
 * Time: 14:40
 */
class MobgiMarket_Dao_UserAuthModel extends Common_Dao_Base {
    public $adapter = 'mobgiMarket';
    protected $_name = 'market_user_auth';
    protected $_primary = 'id';
}
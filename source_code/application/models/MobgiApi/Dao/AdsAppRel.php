<?php
if (!defined('BASE_PATH')) exit('Access Denied!');
/**
 * 
 * MobgiApi_Dao_AdsAppRelModel
 * @author rock.luo
 *
 */
class MobgiApi_Dao_AdsAppRelModel extends Common_Dao_Base{
    public  $adapter = 'mobgiApi';
	protected $_name = 'ads_app_rel';
	protected $_primary = 'id';
	
	
}

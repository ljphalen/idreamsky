<?php
if (!defined('BASE_PATH')) exit('Access Denied!');
/**
 * Created by PhpStorm.
 * User: kyle.ke
 * Date: 2017/8/11
 * Time: 19:20
 */
class MobgiWww_Service_SdkVersionModel{


    /**
     *
     * Enter description here ...
     */
    public static function getAll() {
        return array(self::_getDao()->count(), self::_getDao()->getAll());
    }


    /**
     *
     * Enter description here ...
     * @param unknown_type $params
     * @param unknown_type $page
     * @param unknown_type $limit
     */
    public static function getList($page = 1, $limit = 10, $params = array(),$orderBy = array('id'=>'DESC')) {
        if ($page < 1) $page = 1;
        $start = ($page - 1) * $limit;
        $ret = self::_getDao()->getList($start, $limit, $params, $orderBy);
        $total = self::_getDao()->count($params);
        return array($total, $ret);
    }

    /**
     *
     * Enter description here ...
     * @param unknown_type $id
     */
    public static function getByID($id) {
        if (!intval($id)) return false;
        return self::_getDao()->get(intval($id));
    }


    /**
     *
     * @param unknown_type $page
     * @param unknown_type $limit
     * @param unknown_type $params
     * @return multitype:unknown multitype:
     */

    public static function getBy($params = array(),$orderBy = array('id'=>'DESC')){
        $ret = self::_getDao()->getBy($params, $orderBy);
        if(!$ret) return false;
        return $ret;

    }

    /**
     *
     * @param unknown_type $page
     * @param unknown_type $limit
     * @param unknown_type $params
     * @return multitype:unknown multitype:
     */

    public static function getsBy($params = array(),$orderBy = array('id'=>'DESC')){
        $ret = self::_getDao()->getsBy($params, $orderBy);
        if(!$ret) return false;
        return $ret;

    }
    /**
     *
     * Enter description here ...
     * @param unknown_type $data
     * @param unknown_type $id
     */
    public static function updateByID($data, $id) {
        if (!is_array($data)) return false;
        $data = self::_cookData($data);
        return self::_getDao()->update($data, intval($id));
    }

    public static function updateBy($data, $params){
        if (!is_array($data) || !is_array($params)) return false;
        $data = self::_cookData($data);
        return self::_getDao()->updateBy($data, $params);
    }
    /**
     *
     * @param unknown_type $data
     * @param unknown_type $sorts
     * @return boolean
     */
    public static function sortAd($sorts) {
        foreach($sorts as $key=>$value) {
            self::_getDao()->update(array('sort'=>$value), $key);
        }
        return true;
    }

    /**
     *
     * @param unknown_type $data
     * @return boolean
     */
    public static function deleteGameAd($data) {
        foreach($data as $key=>$value) {
            $v = explode('|', $value);
            self::_getDao()->deleteBy(array('id'=>$v[0]));
        }
        return true;
    }
    /**
     *
     * Enter description here ...
     * @param unknown_type $id
     */
    public static function deleteById($id) {
        return self::_getDao()->delete(intval($id));
    }


    public static function deleteBy($params) {
        return self::_getDao()->deleteBy($params);
    }

    /**
     *
     * Enter description here ...
     * @param unknown_type $data
     */
    public static function add($data) {
        if (!is_array($data)) return false;
        $data = self::_cookData($data);
        $data['create_time'] = Common::getTime();
        $ret = self::_getDao()->insert($data);
        if (!$ret) return $ret;
        return self::_getDao()->getLastInsertId();
    }




    /**
     *
     * Enter description here ...
     * @param unknown_type $data
     */
    private static function _cookData($data) {
        $tmp = array();
        if(isset($data['id'])) $tmp['id'] = intval($data['id']);
        if(isset($data['sdk_type'])) $tmp['sdk_type'] = $data['sdk_type'];
        if(isset($data['sdk_id'])) $tmp['sdk_id'] = $data['sdk_id'];
        if(isset($data['version'])) $tmp['version'] = $data['version'];
        if(isset($data['sdk_update_time'])) $tmp['sdk_update_time'] = $data['sdk_update_time'];
        if(isset($data['update_log'])) $tmp['update_log'] = $data['update_log'];
        if(isset($data['sdk_url'])) $tmp['sdk_url'] = $data['sdk_url'];
        if(isset($data['document_url'])) $tmp['document_url'] = $data['document_url'];
        if(isset($data['status'])) $tmp['status'] = $data['status'];
        if(isset($data['create_time'])) $tmp['create_time'] = $data['create_time'];
        $tmp['update_time'] = Common::getTime();
        return $tmp;
    }

    /**
     *
     * @return MobgiWww_Dao_SdkVersionModel
     */
    private static function _getDao() {
        return Common::getDao("MobgiWww_Dao_SdkVersionModel");
    }
}
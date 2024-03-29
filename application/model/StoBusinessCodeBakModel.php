<?php
/**
* 实体商家表类
*
*
* @copyright  Copyright (c) 2010-2014 雲牛匯(深圳)科技有限公司
* @version    $Id: 2017-03-09 15:55:44Z robert zhao $
*/

namespace app\model;
use app\lib\Db;

class StoBusinessCodeBakModel {

	protected $_id 	= null;
	
	protected $_business_code= null;

	protected $_isuse = null;

	protected $_businessid = null;

	protected $_businessname = null;

	protected $_customerid = null;

	protected $_addtime = null;

	protected $_usetime = null;

	protected $_totalPage = null;
	
	protected $_dataInfo = null;

	public function __construct() {
		$this->_modelObj = Db::Table('StoBusinessCodeBak');
	}

	/**
	 *
	 * 添加实体商家表
	 */
	public function add() {
	 //    $this->_modelObj->_business_code          = $this->_business_code;
		// $this->_modelObj->_isuse  		= $this->_isuse;
		return $this->_modelObj->add();
	}

	/**
	 *
	 * 更新实体商家表
	 */
	public function modify($data, $where) {
// 	    $this->_modelObj->_customerid = $this->_customerid;
// 		$this->_modelObj->_businessname  = $this->_businessname;
// 		$this->_modelObj->_addtime  = $this->_addtime;
// 		$this->_modelObj->_ischeck  = $this->_ischeck;
// 		$this->_modelObj->_nopasstype  = $this->_nopasstype;
// 		$this->_modelObj->_enable  = $this->_enable;
		return $this->_modelObj->update($data, $where);
	}

	/**
	 *
	 * 详细
	 */
	public function getById($id = null) {
		$this->_id = is_null($id)? $this->_id : $id;
		$this->_dataInfo = $this->_modelObj->getById($this->_id);
		return $this->_dataInfo;
	}
	
	/*
	 * 获取单条数据
	 * $where 可以是字符串 也可以是数组
	 */
	public function getRow($where, $fields='*', $order='', $otherstr='') {
	    return $this->_modelObj->getRow($where, $fields, $order, $otherstr);
	}

	/*
    * 写入数据
    * $insertData = array() 如果ID是自增 返回生成主键ID
    */
    public function insert($insertData) {
    	return $this->_modelObj->insert($insertData);
    }


    /*
    * 更新数据
    * $updateData = array()
    */
    public function update($updateData,$where,$limit=''){
    	return $this->_modelObj->update($updateData,$where,$limit);
    }

	   /*
    * 分页列表
    * $flag = 0 表示不返回总条数
    */
    public function pageList($where,$field='',$order='',$flag=1){
    	return $this->_modelObj->pageList($where,$field,$order,$flag);
    }

    public function getList($where,$field='*',$order='',$limit=0,$offset=0,$otherstr=''){
        return $this->_modelObj->getList($where,$field,$order,$limit,$offset,$otherstr);
    }

	/**
	 * 获取所有实体商家表
	 */
	public function getAll() {
		return $this->_modelObj->getAll();
	}



	/**
	 *
	 * 删除实体商家表
	 */
	public function del($id) {
		return $this->_modelObj->del($id);
	}


	/**
	 * 设置主键id
	 *
	 */
	public function setId($id) {
		$this->_id = $id;
		return $this;
	}
	
	public function setCustomerid($customerid) {
	    $this->_customerid = $customerid;
	    return $this;
	}

	/**
	 * 设置商家名称
	 *
	 */
	public function setBusinessname($businessname) {
		$this->_businessname = $businessname;
		return $this;
	}

	/**
	 * 设置添加时间
	 *
	 */
	public function setAddtime($addtime) {
		$this->_addtime = $addtime;
		return $this;
	}

	/**
	 * 设置审核状态（0为待审核1为通过2为未通过）
	 *
	 */
	public function setIscheck($ischeck) {
		$this->_ischeck = $ischeck;
		return $this;
	}

	/**
	 * 设置审核不通过的类型:内容含有敏感信息 = 1,信息不明确 = 2,图片不合规格 = 3,内容排版不合理 = 4,其它原因 = 5
	 *
	 */
	public function setNopasstype($nopasstype) {
		$this->_nopasstype = $nopasstype;
		return $this;
	}

	/**
	 * 设置商家状态1为启用2为禁用
	 *
	 */
	public function setEnable($enable) {
		$this->_enable = $enable;
		return $this;
	}

	public static function getModelObj() {
		return new StoBusinessCodeDB();
	}

	public function getTotalPage() {
		return intval($this->_modelObj->_totalPage);
	}
}
?>
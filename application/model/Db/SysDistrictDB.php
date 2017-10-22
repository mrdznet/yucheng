<?php
/**
*
* 系统商圈表类
*
* @copyright  Copyright (c) 2010-2014 雲牛匯(深圳)科技有限公司
* @version    $Id: SysDistrict.php 10319 2017-03-24 14:17:42Z robert $
*/
namespace app\Model\Db;
use app\lib\Db\MysqlDb;

class SysDistrictDB extends MysqlDb {

	protected $_tableName = "sys_district";

	protected $_primary = "id";

	protected $_id 	= null;

	protected $_districtName 	= null;

	protected $_areaid 	= null;

	protected $_sort 	= null;

	protected $_enable 	= null;

	protected $_totalPage = null;

	protected $_db = "nnh_db";

	protected $_table_prefix = "";


	/**
	 *
	 * 插入系统商圈表
	 */
	public function add() {
		! is_null($this->_districtName) && $data['district_name'] = $this->_districtName;
		! is_null($this->_areaid) && $data['areaid'] = $this->_areaid;
		! is_null($this->_sort) && $data['sort'] = $this->_sort;
		! is_null($this->_enable) && $data['enable'] = $this->_enable;
	    return $this->insert($data);
	}

	/**
	 *
	 * 更新系统商圈表
	 */
	public function modify($id) {
		$data[$this->_primary] = $this->_id = intval($id);
		if (empty($this->_id)) {
			throw new \Exception('要删除的ID不能为空');
			return ;
		}
		! is_null($this->_districtName) && $data['district_name'] = $this->_districtName;
		! is_null($this->_areaid) && $data['areaid'] = $this->_areaid;
		! is_null($this->_sort) && $data['sort'] = $this->_sort;
		! is_null($this->_enable) && $data['enable'] = $this->_enable;
		return $this->update($data);
	}

	/**
	 * 删除系统商圈表
	 */
	public function del($id) {
		$data[$this->_primary] = $this->_id = intval($id);
		if (empty($this->_id)) {
			throw new \Exception('要删除的ID不能为空');
			return ;
		}
		return $this->delete($data);
	}

	/**
	 *
	 * 根据ID获取一行
	 * @param interger $id
	 */
	public function getById($id) {
		$this->_id = is_null($id)? $this->_id : $id;
		return $this->getRow(array($this->_primary => $this->_id));
	}

	/**
	 *
	 * 获取所有系统商圈表--分页
	 * @param interger $status
	 */
	public function getAllForPage($page = 0, $pagesize = 20) {
		$where = null; ## TODO
		if (! is_null($where)) {
			$this->where($where);
		}
		$this->_totalPage = $this->count();
		return $this->page($page, $pagesize)->order("{$this->_primary} desc")->select();
	}

	/**
	 * 获取所有系统商圈表
	 * @return Ambigous 
	 */
	public function getAll() {
		$where = null; ## TODO
		if (! is_null($where)) {
			$this->where($where);
		}
		return $this->select();
	}
	
	public function cleanAll() {
				$this->_id 	= null;

				$this->_districtName 	= null;

				$this->_areaid 	= null;

				$this->_sort 	= null;

				$this->_enable 	= null;

			}
}
?>
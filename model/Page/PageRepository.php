<?php
namespace Model\Page;

use Engine\Model;

class PageRepository extends Model
{

	/**
	 * getPages Взять все страницы
	 *
	 * @return pages
	 */
	public function getPages()
	{
		$sql = $this->queryBuilder->select()
			->from('page')
			->orderBy('time', 'DESC')
			->sql();

		return $this->db->query($sql);
	}


	/**
	 * getPageData
	 * @param mixed $id 
	 * @return mixed 
	 */
	public function getPageData($id)
	{
		$page = new Page($id);

		return $page->findOne();
	}



	/**
	 * @param $params
	 * @return mixed
	 */
	public function createPage($params = [])
	{
		$page = new Page;
		$page->setTitle($params['title']);
		$page->setContent($params['content']);
		$pageId = $page->save();

		return $pageId;
	}


	public function updatePage($params = [])
	{
		if (isset($params['page_id'])) {
			$page = new Page($params['page_id']);
			$page->setTitle($params['title']);
			$page->setContent($params['content']);
			$page->save();
		}
	}

	public function parseArray()
	{
		foreach ($this->db->query($sql) as $data) {
			foreach ($data as $key => $value) {
				return "
                <h1 class='title'>$key</h1>
                <p class='content'>$value</p>
                ";
			}
		}
	}

}

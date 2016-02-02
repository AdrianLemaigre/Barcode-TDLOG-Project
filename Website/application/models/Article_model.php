<?php

class Article_Model extends CI_Model {
	protected $table = 'articles';

	/**
	 * Adds an article to the database
	 * @param string $barcode : barcode of the article
	 * @param string $name : name of the article
	 * @param int $price : price of the article
	 * @param int $disponibility : number of disponible items
	 **/
	public function post_article($name, $barcode, $price, $disponibility, $description = null, $data = null) {
		if ($name == null || !is_string($name) ||
			$barcode == null || !is_string($barcode) || strlen($barcode) != 13 || !is_numeric($barcode) ||
			$price == null || !is_int($price) ||
			$disponibility == null || !is_int($disponibility)) {
			return false;
		}

		$this->db->set('name', $name)
			->set('barcode', $barcode)
			->set('description', $description)
			->set('data', $data)
			->set('price', $price)
			->set('disponibility', $disponibility)
			->insert($this->table);
	}

	/**
	 * Modifies the article in the database
	 * @param string $barcode : barcode of the article
	 * @param string $name : name of the article
	 * @param int $price : price of the article
	 * @param string $description : description of the article
	 * @param string $data : data on the article
	 */
	public function patch($barcode, $name = null, $price = null, $disponibility = null, $description = null, $data = null) {
		if ($barcode == null || !is_string($barcode) || strlen($barcode) != 13) {
			return false;
		}

		if ($name == null && $price == null && $disponibility == null && $description == null && $data == null) {
			return false;
		}

		if ($name != null) {
			$this->db->set('name', (string) $name);
		}

		if ($price != null) {
			$this->db->set('price', (int) $price);
		}

		if ($disponibility != null) {
			$this->db->set('disponibility', (int) $disponibility);
		}

		if ($description != null) {
			$this->db->set('description', (string) $description);
		}

		if ($data != null) {
			$this->db->set('data', (string) $data);
		}

		$this->db->where('barcode', (string) $barcode);
		return $this->db->update($this->table);
	}

	/**
	 * Returns the article with the matching barcode
	 * @param string $barcode : barcode of the article
	 */
	public function search($barcode) {
		if ($barcode == null || !is_string($barcode) || strlen($barcode) != 13) {
			return false;
		}

		$query = $this->db->get_where('articles', array('barcode' => $barcode));
		return $query->result();
	}


	/**
	 * Deletes the article from database
	 * @param string $barcode : barcode of the article
	 */
	public function deleteArticles($barcode) {
		if ($barcode == null || !is_string($barcode) || strlen($barcode) != 13) {
			return false;
		}

		return $this->db->where('barcode', (string) $barcode)->delete($this->table);
	}
}

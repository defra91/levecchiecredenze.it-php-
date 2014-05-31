<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "resources/library/model/NewsModel.php");

/**
* Provides controller functions for news
* @author Luca De Franceschi <luca.defranceschi.91@gmail.com>
*/
class NewsController {
	
	/**
	* Public class constructor
	* @access public
	*/
	public function __construct() {}

	/**
	* Returns all news in the database
	* @access public
	* @return Array returns array with all news in the database
	* @static 
	*/
	public static function getAllNews() {
		$model = new NewsModel();
		$news = $model->selectAll();
		return $news;
	}

}

/**
* Provides description for news
* @author Luca De Franceschi <luca.defranceschi.91@gmail.com>
*/
class News {
	/**
	* Public class constructor
	* @param Integer $_id news identifier, default value is null
	* @param String $title news title
	* @param String $text news text
	* @param String $lang news language
	* @access public
	*/
	public function __construct($_id, $title, $text, $lang) {
		if (isset($_id)) {
			$this->_id = $_id;
		}
		else {
			$this->_id = null;
		}
		$this->title = $title;
		$this->text = $text;
		$this->lang = $lang;
	}

	/**
	* Returns the identifier of the news
	* @return Integer news id
	* @access public
	*/
	public function getId() {
		return $this->_id;
	}

	/**
	* Returns the title of the news
	* @return String news title
	* @access public
	*/
	public function getTitle() {
		return $this->title;
	}

	/**
	* Returns the text of the news
	* @return String news text
	* @access public
	*/
	public function getText() {
		return $this->text;
	}

	/**
	* Returns the language of the news
	* @return String news language
	* @access public
	*/
	public function getLanguage() {
		return $this->language;
	}

	/**
	* Sets news title
	* @param String $title news title
	* @access public
	*/
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	* Sets news text
	* @param String $text news text
	* @access public
	*/
	public function setText($text) {
		$this->text = $text;
	}

	/**
	* Sets news language
	* @param String $language news language
	* @access public
	*/
	public function setLanguage($lang) {
		$this->lang = $lang;
	}

}

?>
<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "resources/library/model/ImageModel.php");

/**
* This class is provided to describe an image and manage it, invoking methods to model and send it to the front-end
* @author Luca De Franceschi <luca.defranceschi.91@gmail.com>
*/
class ImageController {
	
	/**
	* Public class constructor
	* @param string $name image name
	* @param string $path image path
	* @param string $alt image alternative text
	* @param string $title image title
	* @access public
	*/
	public function __construct($name, $path, $alt, $title) {
		$this->name = $name;
		$this->path = $path;
		$this->alt = $alt;
		$this->title = $title;
	}

	/**
	* Returns name datafield
	* @return string image name
	* @access public
	*/
	public function getImageName() {
		return $this->name;
	}

	/**
	* Returns path datafield
	* @return string image path
	* @access public
	*/
	public function getImagePath() {
		return $this->path;
	}

	/**
	* Returns alt datafield
	* @return string image alternative text
	* @access public
	*/
	public function getImageAlt() {
		return $this->alt;
	}

	/**
	* Returns title datafield
	* @param string image title
	* @access public
	*/
	public function getImageTitle() {
		return $this->title;
	}

	/**
	* Sets image name
	* @param string $name image name
	* @access public
	*/
	public function setImageName($name) {
		$this->name = $name;
	}

	/**
	* Sets image path
	* @param string $path image path
	* @access public
	*/
	public function setImagePath($path) {
		$this->path = $path;
	}

	/**
	* Sets image alternative text
	* @param string $alt image alternative text
	* @access public
	*/
	public function setImageAlt($alt) {
		$this->alt = $alt;
	}

	/**
	* Sets image title
	* @param string $title image title
	* @access public
	*/
	public function setImageTitle($title) {
		$this->title = $title;
	}

	/**
	* Get and returns all images in the model
	* @return hash hash of all images
	* @static
	*/
	public static function getAllImages() {
		$images = ImageModel::selectAll();
		return $images;
	}

}	

?>
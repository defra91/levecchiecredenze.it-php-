<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "resources/library/model/AccessModel.php");
require($_SERVER['DOCUMENT_ROOT'] . "resources/library/vendor/autoload.php");
use Carbon\Carbon;
include_once($_SERVER['DOCUMENT_ROOT'] . "resources/library/utils/Error.php");

/*'providers' => array(
    // ...
    'hisorange\BrowserDetect\Provider\BrowserDetectService',
    // ...
);

'aliases' => array(
    // ...
    'BrowserDetect' => 'hisorange\BrowserDetect\Facade\Parser',
);*/


/**
* Provides controller for user's access on the website, it detects ip, broser, os and language
* @author Luca De Francechi <luca.defranceschi.91@gmail.com>
*/
class AccessController {
	/**
	* Public class constructor
	* @access public
	* @throws Exception when user has already been registered
	*/
	public function __construct() {
		if (isset($_SESSION['visitor']) && $_SESSION['visitor'] == "accessed") {
			throw new Exception("User already registered", 1);
		}
		else {
			$this->dateTime = Carbon::now();

			$this->browser = BrowserDetect::browserFamily();

			$this->OS = BrowserDetect::osName();

			if (BrowserDetect::isMobile()) {
				$this->deviceType = "mobile";
			}
			elseif (Browser::isTablet()) {
				$this->deviceType = "tablet";
			}
			elseif (Browser::isDesktop()) {
				$this->deviceType = "desktop";
			}
			elseif (Browser::isBot()) {
				$this->deviceType = "bot";
			}
			else {
				$this->deviceType = "unknown";
			}

			$this->deviceFamily = Broswer::deviceFamily();

			$this->deviceModel = Browser::deviceModel();

			$this->broadcastAddress = $_SERVER["REMOTE_ADDR"];

			$this->model = new AccessModel($this);
		}
	}

	/**
	* Returns the date and time of the access
	* @return datetime date and time of access
	* @access public
	*/
	public function getAccessDatetime() {
		return $this->dateTime;
	}

	/**
	* Returns the browser of the access
	* @return string browser of access
	* @access public
	*/
	public function getAccessBrowser() {
		return $this->browser;
	}

	/**
	* Returns the os of the access
	* @return string os of the access
	* @access public
	*/
	public function getAccessOS() {
		return $this->OS;
	}

	/**
	* Returns the broadcast address of the access
	* @return string broadcast address of the access
	* @access public
	*/
	public function getAccessBroadcastLanguage() {
		return $this->broadcastAddress;
	}

	/**
	* Returns device type information
	* @return string device type
	* @access public
	*/
	public function getAccessDeviceType() {
		return $this->deviceType();
	}

	/**
	* Returns device family information
	* @return string device family
	* @access public
	*/
	public function getAccessDeviceFamily() {
		return $this->deviceFamily;
	}

	/**
	* Returns device model information
	* @return string device model
	* @access public
	*/
	public function getAccessDeviceModel() {
		return $this->deviceModel;
	}

	/**
	* Register Access within model class
	* @access public
	*/
	public function registerAccess() {
		$this->model->registerAccess();
	}


}

?>
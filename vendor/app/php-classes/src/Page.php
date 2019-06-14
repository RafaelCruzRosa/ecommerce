<?php 

namespace App;

use \Rain\Tpl;

class Page {

	private $options = [];
	private $tpl;
	private $defaults = [
		"data" =>[]
	];

	public function __construct($opts = array()) {

		$this->options = array_merge($this->defaults, $opts);

		$config = array(
					"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/",
					"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
					"debug"         => false
				);

		Tpl::configure($config);

		$this->tpl = new Tpl;

		$this->setData($this->options["data"]);

		$this->tpl->draw("header");
	}

	private function setData($data = array()) {
		foreach ($data as $key => $value) {
			$this->tpl->assing($key, $value);
		}
	}

	public function setTpl($nameTpl, $options = array(), $returnHTML = false) {

		$this->setData($options);

		return $this->tpl->draw($nameTpl, $returnHTML);
	}

	public function __destruct() {

		$this->tpl->draw("footer");
	}
}
 ?>

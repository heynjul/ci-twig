<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * undocumented class
 *
 * @package default
 * @author 
 **/
class MY_Controller extends CI_Controller
{
	protected $data = array();
	public $theme;
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	function __construct()
	{
		parent::__construct();

	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	function render($view, $data = array())
	{
		$v = explode(".", $view);

		$view = $v[0].'.html';

		$loaderpath = array();
		$loaderpath['admin'] = FCPATH.'public/themes/admin/views/';
		$loaderpath['public'] = FCPATH.'public/themes/public/views/';

		if(isset($loaderpath[$this->theme])) $loaderpath = $loaderpath[$this->theme];

		$loader = new Twig_Loader_Filesystem($loaderpath);
		$twig = new Twig_Environment($loader, array(
		    'cache' => APPPATH . 'cache/twig/',
		));

		$functions = array(
			'site_url', 
			'base_url', 
			'anchor', 
			'form_open', 
			'form_input', 
			'form_dropdown', 
			'form_multiselect', 
			'form_close',
			'json_encode',
			'word_limiter',
		);
		foreach ($functions as $function) {
			if(function_exists($function)){
				$twig->addFunction(new Twig_SimpleFunction(
					$function, 
					$function,
					array(
						'pre_escape'=>'html', 
						'is_safe'=>array('html'), 
					)
				));
			}
		}

		try {
			echo $twig->render($view, $data);
		}catch(Twig_Error_Loader $e){
			show_error($e->getMessage(), 500, 'Error Loading Page');
		}
	}
} // END class 

/**
 * undocumented class
 *
 * @package default
 * @author 
 **/
class AdminController extends MY_Controller
{
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	function __construct()
	{
		parent::__construct();
		$this->theme = 'admin';
	}
} // END class 

/**
 * undocumented class
 *
 * @package default
 * @author 
 **/
class PublicController extends MY_Controller
{
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	function __construct()
	{
		parent::__construct();
		$this->theme = 'public';
	}
} // END class 
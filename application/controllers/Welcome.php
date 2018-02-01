<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends PublicController {

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	function index()
	{
		$model = new stdClass;
		$model->id = 100;
		$model->name = 'Kampret';
		$model->age = 20;
		$model->hobby = ['running'];

		$ages = array(
			10, 15, 20, 25, 30, 35, 40
		);

		$hobbies = array(
			'fishing' => 'Fishing',
			'running' => 'Running',
			'soccer' => 'Soccer',
		);

		$this->data['ages'] = $ages;
		$this->data['hobbies'] = $hobbies;
		$this->data['model'] = $model;
		$this->data['jsondata'] = json_encode($hobbies);

		$this->render('welcome/public.html', $this->data);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	function detail()
	{
		$this->data['longtext'] = '<p>asdkjsahdkhasdshdkasd sakdhsakdsd</p><p>asdkjsahdkhasdshdkasd sakdhsakdsd</p><p>asdkjsahdkhasdshdkasd sakdhsakdsd</p><p>asdkjsahdkhasdshdkasd sakdhsakdsd</p><p>asdkjsahdkhasdshdkasd sakdhsakdsd</p><p>asdkjsahdkhasdshdkasd sakdhsakdsd</p><p>asdkjsahdkhasdshdkasd sakdhsakdsd</p><p>asdkjsahdkhasdshdkasd sakdhsakdsd</p><p>asdkjsahdkhasdshdkasd sakdhsakdsd</p><p>asdkjsahdkhasdshdkasd sakdhsakdsd</p><p>asdkjsahdkhasdshdkasd sakdhsakdsd</p><p>asdkjsahdkhasdshdkasd sakdhsakdsd</p><p>asdkjsahdkhasdshdkasd sakdhsakdsd</p><p>asdkjsahdkhasdshdkasd sakdhsakdsd</p><p>asdkjsahdkhasdshdkasd sakdhsakdsd</p>';
		$this->render('welcome/detail.html', $this->data);
	}
}
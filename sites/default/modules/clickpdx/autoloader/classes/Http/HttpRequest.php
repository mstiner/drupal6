<?php
namespace Request;


class HtmlRequest
{


	public function __construct()
	{
		$this->globals = $_SERVER;
		$this->action = 'sendMail';
	}




}
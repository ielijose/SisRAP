<?php

class PanelController extends BaseController {


	public function dashboard()
	{		
		return View::make('panel.dashboard');
	}

	public function logout()
	{		
		return View::make('panel.logout');
	}

}

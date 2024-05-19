<?php
include_once 'BaseController.php';

class Backup_db extends BaseController {

	public function __construct()
    {
        parent::__construct();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->library('zip');
    }



    public function index()
    {
		$this->load->dbutil();
		$db_format=array('format'=>'zip','filename'=>'service_tracking.sql');
		$backup= $this->dbutil->backup($db_format);
		$dbname='st-backup-on-'.date('Y-m-d').'.zip';
		$save='assets/db_backup/'.$dbname;
		write_file($save,$backup);
		force_download($dbname,$backup);
   }

    protected function _commonPageLayout($viewName, $cacheIt = FALSE)
	{
		$view = $this->layout->view($viewName, $this->data, TRUE);
		$replaces = array(
			'{SITE_BACKEND_TOP_HEADER}' => $this->load->view('backend/site_top_header', $this->data, TRUE),
			'{SITE_BACKEND_LEFT_MENU}' => $this->load->view('backend/site_left_menu', NULL, TRUE),
			'{SITE_BACKEND_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE)
		);
		$this->load->view('view', array('view' => $view, 'replaces' => $replaces));
	}
}
?>
<?php
class Dashboard extends BaseController {
    public function index() {
        $this->layout->view('dashboard/index');
    }
}
?>

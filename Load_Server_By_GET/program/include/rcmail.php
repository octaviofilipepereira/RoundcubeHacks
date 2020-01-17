// Inside public function load_gui
// Paste this following line

// set compose mode for session storage_host
$this->output->set_env('imap_host', $_SESSION['storage_host']);

# After Line 2125
# Paste the following line
$available_hosts = $this->config->get('available_hosts');

# Find: else if (empty($default_host)) {
# Comment the code inside this if
# Paste the follwing code inside this if
// MagicBrain Hack 2020-01-14
// Octavio Filipe Goncalves
// Check if Client Server exists in Available Hosts
if (in_array($_GET["clienthost"], $available_hosts)) {
    $input_host = new html_inputfield(array('name' => '_host', 'id' => 'rcmloginhost', 'value' => $_GET["clienthost"]) + $attrib + $host_attrib);
} else {
    $input_host = new html_inputfield(array('name' => '_host', 'id' => 'rcmloginhost', 'value' => 'servidor desconhecido') + $attrib + $host_attrib);
}

# Find: if (rcube_utils::get_boolean($attrib['submit'])) {
# Comment the code inside this if
# Paste the follwing code inside this if
// MagicBrain Hack 2020-01-14
// Octavio Filipe Goncalves
// Check if Client Server exists in Available Hosts
if (in_array($_GET["clienthost"], $available_hosts)) {
    $button_attr = array('type' => 'submit', 'id' => 'rcmloginsubmit', 'class' => 'button mainaction submit');
    $out .= html::p('formbuttons', html::tag('button', $button_attr, $this->app->gettext('login')));
} else {
    $button_attr = array('type' => 'submit', 'id' => 'rcmloginsubmit', 'class' => 'button mainaction submit', 'disabled' => 'disabled');
    $out .= html::p('formbuttons', html::tag('button', $button_attr, $this->app->gettext('login')));
}

# After Line 2125
# Paste the following line
// Roundcube Hack 2020-01-14
// Octavio Filipe Goncalves
// Declare variable $available_hosts
$available_hosts = $this->config->get('available_hosts');
$show_login_button = $this->config->get('show_login_button');

# Find: else if (empty($default_host)) {
# Comment the code inside this if
# Paste the follwing code inside this if
// Roundcube Hack 2020-01-14
// Octavio Filipe Goncalves
// Check if we have server host by $GET
if (in_array($_GET["myclienthost"], $available_hosts)) {
    $input_host = new html_inputfield(array('name' => '_host', 'id' => 'rcmloginhost', 'value' => $_GET["myclienthost"]) + $attrib + $host_attrib);
} else {
    $input_host = new html_inputfield(array('name' => '_host', 'id' => 'rcmloginhost', 'value' => 'unknown server') + $attrib + $host_attrib);
}

# Find: if (rcube_utils::get_boolean($attrib['submit'])) {
# Comment the code inside this if
# Paste the follwing code inside this if
// Roundcube Hack 2020-01-14
// Octavio Filipe Goncalves
// Check if Server Host exists in Available Hosts and perform needed actions
if (in_array($_GET["myclienthost"], $available_hosts)) {
    $button_attr = array('type' => 'submit', 'id' => 'rcmloginsubmit', 'class' => 'button mainaction submit');
    $out .= html::p('formbuttons', html::tag('button', $button_attr, $this->app->gettext('login')));
} else {
    if ($show_login_button == '1') {
         $button_attr = array('type' => 'submit', 'id' => 'rcmloginsubmit', 'class' => 'button mainaction submit', 'disabled' => 'disabled');
         $out .= html::p('formbuttons', html::tag('button', $button_attr, $this->app->gettext('login')));
    }
}

# Find: $host_attrib = $autocomplete > 0 ? array() : array('autocomplete' => 'off');
# Change the line to:
// Roundcube Hack 2020-01-14
// Octavio Filipe Goncalves
// Readonly the server input field
$host_attrib = $autocomplete > 0 ? array() : array('autocomplete' => 'off', 'readonly' => 'readonly');

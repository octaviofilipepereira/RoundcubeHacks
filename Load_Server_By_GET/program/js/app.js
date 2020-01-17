// Search for: if (task == 'mail')
// Cut the all if (task == 'mail') and paste the following code

if (task == 'mail')
  url += '&_mbox=INBOX';
else if (task == 'logout') {
  // Load user imap host after logout
  var imap_host = this.env.imap_host;

  url = this.secure_url(url);
  // Add user imap host to URL after logout
  url += '&omeumail=' + imap_host;

  this.clear_compose_data();
}

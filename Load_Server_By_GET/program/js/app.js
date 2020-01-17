// Inside if (task == 'logout')
// Paste the following line

// Load user imap host to URL after logout
var imap_host = this.env.imap_host;

// Inside if (task == 'logout'), after url = this.secure_url(url);
// Paste the following line

// Add user imap host to URL after logout
url += '&omeumail=' + imap_host;

# RoundcubeHacks
RoundcubeHacks is intended to be a set of Roundcube hacks that I implemented, either for personal needs or for customer requests.

# Remote Virtualmin Password Driver [Roundcube v1.4.2]

Driver that adds functionality to change the user/email password connecting to a remote Virtualmin server, using Virtualmin API.

# Load Server Imap Server Host By $GET [Roundcube v1.4.2]

We need to centralize our customers access to webmail.

Roundcube already includes multiple host functionality, however it only allows you to select a particular host via the selection box.

What was done was to change the behavior of Roundcube so as to accept input from a particular host via $ GET, where the host is passed by URL.

Additionally a validation has been created to check if the host is allowed or not, causing a certain login behavior.

1. If the host is allowed, the "server" field is filled in, allowing the user to authenticate to the desired server.
2. If the host does not exist and is not allowed, the "server" field and the "login" button are automatically inactivated, prevent attacks.

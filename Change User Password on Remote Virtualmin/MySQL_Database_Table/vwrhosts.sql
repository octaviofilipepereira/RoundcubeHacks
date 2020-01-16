--
-- Table structure for table `vwrhosts`
--

CREATE TABLE `vwrhosts` (
  `rhosts_id` int(10) UNSIGNED NOT NULL COMMENT 'ID Auto-Increment',
  `rhosts_uhost` varchar(50) NOT NULL COMMENT 'User Login Imap Host (ie: mail.server.com)',
  `rhosts_vhost` varchar(50) NOT NULL COMMENT 'Virtual Host Registered in Remote Virtualmin (ie: server.com)',
  `rhosts_auth` varbinary(100) NOT NULL COMMENT 'Root password of the remote visrtual server (AES Encrypted)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for table `vwrhosts`
--
ALTER TABLE `vwrhosts`
  ADD PRIMARY KEY (`rhosts_id`);

--
-- AUTO_INCREMENT for table `vwrhosts`
--
ALTER TABLE `vwrhosts`
  MODIFY `rhosts_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID Auto-Increment', AUTO_INCREMENT=1;
COMMIT;

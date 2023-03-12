

CREATE TABLE `mytable` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salt` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mytable`
--

INSERT INTO `mytable` (`id`, `username`, `birthday`, `email`, `password`, `salt`) VALUES
(1, 'tochecksalted', '2022-12-08', 'weds@kj.bq', '24da57b30c67cf9dd4900cedb4212f78', '12910c8967c4dbc87b2e0c170b7235538ea7b118fd31095dfad190ef3148236a'),
(2, 'toconfirmmybeauty', '2022-12-08', 'dfgh@df.com', 'b448da38cb5e0c54d33b7798c456b7da', '9344aa2fb7c8fd2fe5a68812f7d1cefa253c4a7f913bf0cf14ecc01022bfc5aa'),
(3, 'username', '2022-12-08', 'ycjhsfh@hfh.xp', 'cc007226da335c1bcab37f844b99a63d', '8e6346767940f4cb1f41737919fd08187095de3c0ff90d14cce230a7667e2057');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mytable`
--
ALTER TABLE `mytable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--




-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `cafe_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `comment`, `cafe_id`) VALUES
(11, 'tochecksalted', 'It\'s really cozy cafe with authetic style and charming athmosphere. I recommend it to everyone who enjoy elegance!\r\n', 2),
(12, 'tochecksalted', 'It\'s really cozy cafe with authetic style and charming athmosphere. I recommend it to everyone who enjoy elegance!', 1),
(13, 'tochecksalted', '$result = mysqli_query($conn,&quot;SELECT * FROM `cafestable` WHERE id=\'$id\' &quot;);\r\n        $resultarray=mysqli_fetch_assoc($result);\r\n        $title=$resultarray[&quot;title&quot;];\r\n        $description=$resultarray[&quot;description&quot;];\r\n        $photo=$resultarray[&quot;photo&quot;];\r\n        $string =$resultarray[&quot;link&quot;];\r\n        $array=  explode(&quot; &quot;, $string );', 6),
(14, 'tochecksalted', 'if (isset($_POST[\'submit\'])) {\r\n    // Validate the CSRF token\r\n        if ($_POST[\'csrf_token\'] != $_SESSION[\'csrf_token\']) {\r\n            die(\'Invalid CSRF token\');\r\n        }\r\n        $username = htmlspecialchars($_POST[\'name\']);\r\n        $comment = htmlspecialchars($_POST[\'comment\']);\r\n\r\n        // Insert the comment into the database\r\n        $stmt = $conn-&gt;prepare(&quot;insert into `comments`(username, comment,cafe_id)\r\n                       values(?, ?, ?)&quot;);\r\n        $stmt-&gt;bind_param(&quot;ssi&quot;, $username, $comment, $id);\r\n        $stmt-&gt;execute();\r\n        $stmt-&gt;close();\r\n        $conn-&gt;close();\r\n    }', 6),
(15, 'tochecksalted', '$_SESSION[\'csrf_token\'] = bin2hex(random_bytes(32));\r\n// Retrieve the list of comments from the database\r\n    $stmt = $conn-&gt;prepare(&quot;SELECT * FROM comments WHERE cafe_id = $id ORDER BY id DESC&quot;);\r\n    $stmt-&gt;execute();\r\n    $result = $stmt-&gt;get_result();\r\n    $comments = $result-&gt;fetch_all(MYSQLI_ASSOC);\r\n', 6),
(16, 'tochecksalted', '$stmt-&gt;bind_param(&quot;ssi&quot;, $username, $comment, $id);\r\n$stmt-&gt;bind_param(&quot;ssi&quot;, $username, $comment, $id);\r\n$stmt-&gt;bind_param(&quot;ssi&quot;, $username, $comment, $id);\r\n$stmt-&gt;bind_param(&quot;ssi&quot;, $username, $comment, $id);', 6),
(17, 'tochecksalted', '$stmt-&gt;bind_param(\'i\', $id);\r\n$stmt-&gt;bind_param(\'i\', $id);\r\n$stmt-&gt;bind_param(\'i\', $id);\r\n$stmt-&gt;bind_param(\'i\', $id);\r\n$stmt-&gt;bind_param(\'i\', $id);\r\n$stmt-&gt;bind_param(\'i\', $id);\r\n$stmt-&gt;bind_param(\'i\', $id);\r\n$stmt-&gt;bind_param(\'i\', $id);\'\r\n$stmt-&gt;bind_param(\'i\', $id);', 6),
(18, 'tochecksalted', 'footer {\r\n    font-size: 20px; \r\n    color:var(--third-color);\r\n    height:200px;\r\n    width: 100%;\r\n    display: grid;\r\n    grid-template-columns: auto auto;\r\n    padding-top: 250px;\r\n}\r\np.left {\r\n    text-align:left; \r\n    margin: 20px;\r\n    padding: 20px;\r\n    width:420px;\r\n    \r\n}\r\np.right {\r\n    text-align: left; \r\n    width:350px;\r\n    margin: 20px;\r\n    padding: 20px;\r\n    padding-left: 35px;\r\n}\r\n.word_footer{\r\n    text-decoration-line: none;\r\n    color:#754a23;\r\n}\r\n.email-text{\r\n    text-decoration-line: none;\r\n    color:#754a23;\r\n}\r\n.word_footer:hover{\r\n    text-shadow: 0.5px 0.5px 1px #5d3813;\r\n}\r\n.email-text:hover{\r\n    text-shadow: 0.5px 0.5px 1px #5d3813;\r\n}\r\n/* --------------------print------------------------------------ */\r\n@media print{\r\n    nav, .button {\r\n        display:none;\r\n    }\r\n}\r\n/* ------------theme change------------------------------------------ */\r\n#theme{\r\n    padding: 2px;\r\n    margin-top:10px;\r\n    margin-right:50px;\r\n    font-size: 16px;\r\n    backgrou', 6),
(19, 'tochecksalted', '☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️☺️', 5),
(20, 'tochecksalted', '$stmt = $conn-&gt;prepare(&quot;SELECT * FROM comments WHERE field = ?&quot;);\r\n$stmt-&gt;bind_param(\'s\', $field);\r\n$stmt-&gt;execute();\r\n$result = $stmt-&gt;get_result();\r\n$comments = $result-&gt;fetch_all(MYSQLI_ASSOC);', 6),
(21, 'tochecksalted', '$stmt = $conn-&gt;prepare(&quot;SELECT * FROM comments WHERE field = ?&quot;);\r\n$stmt-&gt;bind_param(\'s\', $field);\r\n$stmt-&gt;execute();\r\n$result = $stmt-&gt;get_result();\r\n$comments = $result-&gt;fetch_all(MYSQLI_ASSOC);', 6),
(22, 'tochecksalted', 'NEW ONE $stmt = $conn-&amp;gt;prepare(&amp;quot;SELECT * FROM comments WHERE field = ?&amp;quot;); $stmt-&amp;gt;bind_param(\'s\', $field); $stmt-&amp;gt;execute(); $result = $stmt-&amp;gt;get_result(); $comments = $result-&amp;gt;fetch_all(MYSQLI_ASSOC);', 6),
(23, 'tochecksalted', 'NEW ONE $stmt = $conn-&amp;gt;prepare(&amp;quot;SELECT * FROM comments WHERE field = ?&amp;quot;); $stmt-&amp;gt;bind_param(\'s\', $field); $stmt-&amp;gt;execute(); $result = $stmt-&amp;gt;get_result(); $comments = $result-&amp;gt;fetch_all(MYSQLI_ASSOC);', 6),
(24, 'tochecksalted', 'NEW ONE $stmt = $conn-&amp;amp;gt;prepare(&amp;amp;quot;SELECT * FROM comments WHERE field = ?&amp;amp;quot;); $stmt-&amp;amp;gt;bind_param(\'s\', $field); $stmt-&amp;amp;gt;execute(); $result = $stmt-&amp;amp;gt;get_result(); $comments = $result-&amp;amp;gt;fetch_all(MYSQLI_ASSOC);\r\n', 6),
(25, 'tochecksalted', 'NEW ONE $stmt = $conn-&amp;amp;amp;gt;prepare(&amp;amp;amp;quot;SELECT * FROM comments WHERE field = ?&amp;amp;amp;quot;); $stmt-&amp;amp;amp;gt', 6),
(26, 'tochecksalted', 'NEW ONE $stmt = $conn-&amp;amp;amp;gt;prepare(&amp;amp;amp;quot;SELECT * FROM comments WHERE field = ?&amp;amp;amp;quot;); $stmt-&amp;amp;amp;gt;bind_param(\'s\', $field); $stmt-&amp;amp;amp;gt;execute(); $result = $stmt-&amp;amp;amp;gt;get_result(); $comments = $result-&amp;amp;amp;gt;fetch_all(MYSQLI_ASSOC);', 6),
(27, 'tochecksalted', '$stmt-&gt;execute();\r\n            $result = $stmt-&gt;get_result();\r\n            $comments = $result-&gt;fetch_all(MYSQLI_ASSOC);\r\n', 6),
(28, 'tochecksalted', 'RuntimeException', 6),
(29, 'tochecksalted', 'cfcfc', 6),
(30, 'tochecksalted', '$stmt-&gt;execute();', 6),
(31, 'tochecksalted', '$stmt-&gt;execute();', 6),
(32, 'tochecksalted', '$stmt-&gt;execute();1', 6),
(33, 'tochecksalted', '$stmt-&gt;execute();22', 6),
(34, 'tochecksalted', 'for me\r\n', 6),
(35, 'tochecksalted', 'for me\r\n', 6),
(36, 'tochecksalted', '$_SESSION[\'csrf_token\'] = bin2hex(random_bytes(32));', 6),
(37, 'tochecksalted', '$_SESSION[\'csrf_token\'] = bin2hex(random_bytes(32));', 6),
(38, 'tochecksalted', '$_SESSION[\'csrf_token\'] = bin2hex(random_bytes(32));', 6),
(39, 'tochecksalted', 'мпмпмпмпм', 6),
(40, 'tochecksalted', 'this comment is created to the the comments system', 6),
(41, 'tochecksalted', 'this comment is created to the the comments system.', 6),
(42, 'tochecksalted', 'tftf', 6),
(43, 'tochecksalted', 'this comment is created to test the comments system.', 6),
(44, 'tochecksalted', 'Люблю тебе!', 6),
(45, 'tochecksalted', 'тест', 6),
(46, 'tochecksalted', 'cfcfcfcfcf', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

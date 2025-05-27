-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2025 at 02:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_dir`
--

CREATE TABLE `admin_dir` (
  `a_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_dir`
--

INSERT INTO `admin_dir` (`a_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', 'admin123', '2025-05-27 10:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `commentbar`
--

CREATE TABLE `commentbar` (
  `id` bigint(255) NOT NULL,
  `user_id` int(222) NOT NULL,
  `text` text NOT NULL,
  `date_time` varchar(222) NOT NULL,
  `recipy_id` int(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `commentbar`
--

INSERT INTO `commentbar` (`id`, `user_id`, `text`, `date_time`, `recipy_id`) VALUES
(39, 3, ' great', ' 07:35PM 7-Nov-2017 ', 58),
(42, 12, ' good', ' 08:10PM 7-Nov-2017 ', 58),
(43, 12, 'nice', ' 09:59PM 7-Nov-2017 ', 56),
(44, 19, ' amazing', ' 04:18PM 27-May-2025 ', 59),
(45, 19, ' kok error mas?', ' 04:19PM 27-May-2025 ', 62),
(46, 19, ' #malas', ' 04:19PM 27-May-2025 ', 58);

-- --------------------------------------------------------

--
-- Table structure for table `full_recipy`
--

CREATE TABLE `full_recipy` (
  `id` int(11) NOT NULL,
  `title` varchar(222) NOT NULL,
  `title_text` text NOT NULL,
  `image` varchar(222) NOT NULL,
  `ing_text` text NOT NULL,
  `disc` text NOT NULL,
  `rid` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `full_recipy`
--

INSERT INTO `full_recipy` (`id`, `title`, `title_text`, `image`, `ing_text`, `disc`, `rid`) VALUES
(10, 'lemon dizzy cake', 'its delicious, perfect as it is, and never fails to impress all :-)... personal preference is granulated sugar in the topping, and a of spoonful of lemon juice in the in the batter too to make it more lemony... ', '59d9ded79cbf9.jpg', '225g unsalted butter, softened, 225g caster sugar, eggs, finely grated lemon zest 225g self-raising flour.\r\nFor the drizzle topping juice: lemons, 85g caster sugar', 'Heat oven to 180C/fan 160C/gas, Beat together 225g softened unsalted butter and 225g caster sugar until pale and creamy, then add 4 eggs, one at a time, slowly mixing through. Sift in 225g flour, then add the finely grated zest of 1 lemon and mix until well combined. Line a loaf tin (8 x 21cm) with greaseproof paper, then spoon in the mixture and level the top with a spoon.\r\n\r\nBake for 45-50 mins until a thin skewer inserted into the centre of the cake comes out clean. While the cake is cooling in its tin, mix together the juice of 1 1/2 lemons and 85g caster sugar to make the drizzle. Prick the warm cake all over with a skewer or fork, then pour over the drizzle – the juice will sink in and the sugar will form a lovely, crisp topping. Leave in the tin until completely cool, then remove and serve. Will keep in an airtight container for 3-4 days, or freeze for up to 1 month.\r\n', '52'),
(11, 'crunchy bran french toast', 'a definite winner at the breakfast table. One of the best breakfast sandwiches that can be made with simple and healthy ingredients. A bit of a tangy taste due to the orange juice and orange zest but the crunchy cereal helped it come all together. This will be a staple at the breakfast in the future.', '59d9e3051ecf3.jpg', '8 slices whole-grain bread\r\n4 tablespoons light cream cheese\r\n4 teaspoons low-sugar orange marmalade\r\n2 large eggs plus 2 egg whites\r\nZest and juice of 1 orange\r\n1 teaspoon vanilla extract\r\n1 1/2 cups bran flakes cereal\r\n1 to 2 tablespoons vegetable oil\r\n1 to 2 tablespoons unsalted butter\r\n2 tablespoons confectioners\' sugar (optional)', 'Spread 4 bread slices with 1 tablespoon cream cheese each; spread the other 4 slices with 1 teaspoon marmalade each. Combine to make 4 sandwiches.Whisk the whole eggs, egg whites, orange zest and juice, and vanilla in a shallow bowl. Place the bran flakes in a resealable plastic bag and crush with a rolling pin or your hands. Pour the crumbs onto a plate. Dip both sides of each sandwich in the egg mixture, then in the crumbs, gently pressing the crumbs onto the bread.Heat 1 tablespoon each oil and butter in a skillet or griddle over medium heat. Add the sandwiches in batches and cook until the outsides are golden and the insides are melted, 3 to 4 minutes per side. (Add more oil and butter, if needed.)Slice the French toast sandwiches into triangles. Let cool before serving to little ones, as the cream cheese can get quite hot. Sprinkle with confectioners\' sugar, if desired, and the kids won\'t even ask for syrup!', '55'),
(12, 'Easy Garlic-Herb Salad Croutons', '<ul><li>Learn how to make your own croutons to perk up that lunch salad! Perfectly crisp and crunchy and filled with garlicky-herb flavors.</li></ul> ', '59d9e7d3342b7.jpg', '<ul><li>4 cups 1-in dry bread cubes</li><li>4 garlic cloves, minced</li><li>1 teaspoon Italian seasoning</li><li>1 teaspoon salt</li><li>1/2 teaspoon pepper</li><li>3 tablespoons olive oil</li><li>Salad for serving</li></ul>', '<ol><li>Preheat oven to 300F. Lightly grease a baking sheet. Set aside.</li><li>In a medium bowl, toss bread cubes with seasonings, Drizzle with olive oil and toss to coat. Spread in a single layer on baking sheet. Bake croutons at 300F 40 minutes or until a deep golden brown, stirring every 10 minutes.</li><li>Cool croutons slightly then serve with salad.</li></ol>', '56'),
(13, ' LEMON FIRE BRIGADE french onion soup', '<ul><li>Combine the onions, olive oil, butter, and salt in a 4-quart sauté pan or Dutch oven. Cook, stirring occasionally.</li></ul> ', '59d9e9bcb6285.jpg', '<ul><li>7 large yellow onions, cut into 1/4 inch thick slices</li><li>1 tablespoon extra-virgin olive oil</li><li>1 tablespoon unsalted butter</li><li>1 1/2 teaspoons kosher salt</li><li>2 1/2 cups dry white wine</li><li>2 tablespoons mushroom bouillon (I used better than bouillon organic mushroom base)</li><li>2 quarts water</li><li>4-6 slices day-old sourdough bread or whole-wheat bread, each sliced 1/2 to 1-inch thick, toasted</li><li>7 ounces Gruyère cheese, grated or sliced thin</li><li>Freshly ground black pepper</li></ul>', '<ul><li>Combine the onions, olive oil, butter, and salt in a 4-quart sauté pan or Dutch oven. Cook, stirring occasionally, over medium heat until the onions are soft and translucent, about 10 minutes. Adjust the heat to medium-high, spread the onions over the bottom of the pot, and cook without stirring until the bottom of the pot begins to turn brown, about 5 minutes. Stir the onions with a non-abrasive spoon or spatula to scrape up the browned bits. Add 1/2 cup of the wine and deglaze the pot, stirring to pick up any remaining browned bits. Continue cooking until the browned fond forms again. Scrape and deglaze the pot with another 1/2 cup wine and repeat the process 3 more times until the onions have slowly turned a deep caramel hue.Add the bouillon to the onions and stir until evenly coated. Pour in the water, bring the pot to a simmer over medium-low heat, and cook until the soup is seasoned well from the caramelized onions, about 20 minutes. Taste to adjust for seasonings.Preheat the oven to 400º. Arrange ovenproof bowls over a rimmed baking sheet and ladle the soup into the bowls filling them almost to the rims. Place a slice of toasted bread onto each serving and top with the Gruyère. Bake until the cheese is bubbling, about 15 to 20 minutes, season with ground black pepper and serve.</li></ul>', '58'),
(14, 'Bourbon Glazed Meatloaf', 'To make fresh breadcrumbs just tear up a slice or two of bread and whiz in a food processor.', '59d9eb11888ba.jpg', '1 lb ground beef\r\n1 lb ground pork\r\n1 egg, beaten\r\n1/2 cup fresh breadcrumbs (you can also use dried)\r\n1/2 yellow onion, peeled and minced\r\n1 tsp salt\r\nlots of fresh cracked pepper\r\nBourbon glaze\r\n1 cup fruit jam or preserves, I like to use apricot or cherry\r\n1/4 cup dark brown sugar (use regular brown sugar if you don\'t have dark)\r\n1 Tbsp hot chili sauce or Sriracha (use more if you like things hotter)\r\n1/2 cup bourbon (or any kind of whiskey or cognac)\r\n1/2 cup of your favorite barbecue sauce\r\n1/4 cup water', 'Set oven to 350F\r\nTo make the sauce, put all the ingredients in a sauce pan and stir to combine. Bring to a boil lower the heat and simmer/boil gently, uncovered, for about 10 minutes until thickened. If you used a chunky jam you may want to use an immersion blender to puree the glaze.\r\nPut the meats in a large mixing bowl, breaking them apart into small pieces as you add them.\r\nAdd the egg, breadcrumbs, onion and salt and pepper to the bowl. Mix everything well with your fingertips. You want to thoroughly incorporate all the elements without over-doing it.\r\nForm the meat into a loaf, not too tall and not too wide. You want it to cook evenly, so try to get it even from end to end.\r\nYou can set it directly in a pan or on a baking sheet, or set it on a rack if you have one. Whatever you do, be sure to line the pan with foil since the glaze will drip and make a mess.\r\nSpread a layer of glaze all over the meatloaf and bake it for about 60 minutes, or until a thermometer inserted in the center reads 160F. I baste another layer of sauce on the meat halfway through the cooking.\r\nRemove the meat and let it rest for a few minutes before slicing. Slather on a final coat of glaze just before serving, (heat it up on the stove so it is hot) and serve extra sauce on the side.', '59'),
(16, 'real error message', 'umm lorem ipsum real error from tugu lorem ipsum ', '683599751aaab.jpg', 'cabut RAM pas pc nyala', '#safe', '62');

-- --------------------------------------------------------

--
-- Table structure for table `post_rating`
--

CREATE TABLE `post_rating` (
  `rating_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating_number` int(11) NOT NULL,
  `total_points` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Block, 0 = Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_rating`
--

INSERT INTO `post_rating` (`rating_id`, `post_id`, `rating_number`, `total_points`, `created`, `modified`, `status`) VALUES
(12, 1, 5, 24, '2017-11-07 16:32:12', '2025-05-27 13:22:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `rid` int(222) NOT NULL,
  `rimage` varchar(222) NOT NULL,
  `resname` varchar(222) NOT NULL,
  `rtext` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`rid`, `rimage`, `resname`, `rtext`) VALUES
(55, '59d9e3051ecf3.jpg', 'crunchy bran french toast', 'a definite winner at the breakfast table. One of the best breakfast sandwiches that can be made with simple and healthy ingredients. A bit of a tangy taste due to the orange juice and orange zest but the crunchy cereal helped it come all together. This will be a staple at the breakfast in the future'),
(56, '59d9e6ba87bef.jpg', 'Easy Garlic-Herb Salad Croutons', 'Learn how to make your own croutons to perk up that lunch salad! Perfectly crisp and crunchy and filled with garlicky-herb flavors.'),
(58, '59d9e94d7ef4f.jpg', ' french onion soup', 'Combine the onions, olive oil, butter, and salt in a 4-quart sauté pan or Dutch oven. Cook, stirring occasionally, over medium heat until the onions are soft and translucent, about 10 minutes. Adjust the heat to medium-high, spread the onions over the bottom of the pot, and cook without stirring until the bottom of the pot begins to turn brown'),
(59, '59d9eac3c4a56.jpg', 'Bourbon Glazed Meatloaf', 'To make fresh breadcrumbs just tear up a slice or two of bread and whiz in a food processor.'),
(62, '683597c49ee2e.jpg', 'error', 'totally real error message');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(244) NOT NULL,
  `lastname` varchar(244) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`user_id`, `firstname`, `lastname`, `email`, `password`) VALUES
(17, 'Dan', 'Dan', 'tes@gmail.com', 'password'),
(19, 'asdf', 'qwerty', 'realmail@email.com', 'um');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_dir`
--
ALTER TABLE `admin_dir`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `commentbar`
--
ALTER TABLE `commentbar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `full_recipy`
--
ALTER TABLE `full_recipy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_rating`
--
ALTER TABLE `post_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_dir`
--
ALTER TABLE `admin_dir`
  MODIFY `a_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `commentbar`
--
ALTER TABLE `commentbar`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `full_recipy`
--
ALTER TABLE `full_recipy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `post_rating`
--
ALTER TABLE `post_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `rid` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

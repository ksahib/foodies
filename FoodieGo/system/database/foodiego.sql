SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(9, 'foodiego', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `image_name` VARCHAR(255) NOT NULL,
  `featured` ENUM('Yes', 'No') NOT NULL DEFAULT 'No',
  `active` ENUM('Yes', 'No') NOT NULL DEFAULT 'Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(4, 'Burger', 'Food_Category_482.jpeg', 'Yes', 'Yes'),
(5, 'Pizza', 'Food_Category_584.jpg', 'Yes', 'Yes'),
(6, 'Stir Fry', 'Food_Category_211.jpg', 'Yes', 'Yes'),
(7, 'Steak', 'Food_Category_5.jpg', 'Yes', 'Yes'),
(8, 'Pasta', 'Food_Category_952.jpg', 'Yes', 'Yes'),
(9, 'Sandwich', 'Food_Category_634.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `description` TEXT NOT NULL,
  `price` DECIMAL(10, 0) NOT NULL,
  `image_name` VARCHAR(255) NOT NULL,
  `category_id` INT(10) UNSIGNED NOT NULL,
  `featured` ENUM('Yes', 'No') NOT NULL DEFAULT 'No',
  `active` ENUM('Yes', 'No') NOT NULL DEFAULT 'Yes',
  PRIMARY KEY (`id`),
  FOREIGN KEY (`category_id`) REFERENCES `category`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(5, 'BBQ Burger', 'BBQ Chicken, vegetable \r\n<br>\r\nRestaurant: Burger Lab', 300, 'Food-Name-3231.jpg', 4, 'Yes', 'Yes'),
(6, 'Double Layer Vegetable Burger', 'This burger is made by Lettuce, Tomato, Potato patty\r\n<br>\r\nRestaurant: Burger Lab', 150, 'Food-Name-6989.jpg', 4, 'Yes', 'Yes'),
(7, 'Jumbo Burger', 'This Burger is made by two chicken patties with different vegetables\r\n<br>\r\nRestaurant : Burger King', 400, 'Food-Name-5444.jpg', 4, 'Yes', 'Yes'),
(8, 'Lamb Burger', 'This burger is made with lamb meat\r\n<br>\r\nRestaurant: KFC', 350, 'Food-Name-3324.jpg', 4, 'Yes', 'Yes'),
(9, 'Crispy Burger', 'This Burger has a crispy layer with chicken patty\r\n<br>\r\nRestaurant: Tasty Treat', 200, 'Food-Name-6173.jpg', 4, 'Yes', 'Yes'),
(10, 'Beef Burger', 'This burger is made with Beef meat.\r\n<br>\r\nRestaurant : KFC', 300, 'Food-Name-9807.jpg', 4, 'Yes', 'Yes'),
(11, 'White Pasta', 'This pasta is made with White sauce.\r\n<br>\r\nRestaurant: MR. King', 250, 'Food-Name-3654.jpg', 8, 'Yes', 'Yes'),
(12, 'Spicy Pasta', 'This pasta is made with hot chili tomato sauce.\r\n<br>\r\nRestaurant: Secret Recipe', 200, 'Food-Name-2720.jpg', 8, 'Yes', 'Yes'),
(13, 'Sea Food Pasta', 'This pasta is made with different kind of sea food.\r\n<br>\r\nRestaurant: Pasta Club', 400, 'Food-Name-2361.jpg', 8, 'Yes', 'Yes'),
(14, 'Beans Pasta', 'This Pasta is mixed with beans.\r\n<br>\r\nRestaurant: Kashundi', 250, 'Food-Name-7868.jpg', 8, 'Yes', 'Yes'),
(15, 'Totalini Pasta', 'This pasta have chicken filling.\r\n<br>\r\nRestaurant: Secret Recepie', 300, 'Food-Name-4776.jpg', 8, 'Yes', 'Yes'),
(16, 'Cheese Pasta', 'This Pasta is made with cheese\r\n<br>\r\nRestaurant: Pasta Club', 220, 'Food-Name-7863.jpg', 8, 'Yes', 'Yes'),
(17, 'Vegetable Pasta', 'This pasta is made by different kinds of vegetable.\r\n<br>\r\nRestaurant: Pasta House', 250, 'Food-Name-2327.jpg', 8, 'Yes', 'Yes'),
(18, 'Vegetable Stir Fry', 'There are lots of vegetables.\r\n<br>\r\nRestaurant: Old School', 200, 'Food-Name-9821.jpg', 6, 'Yes', 'Yes'),
(19, 'Mushroom Stir Fry', 'Mushroom is mixed up with this Stir Fry.\r\n<br>\r\nRestaurant: Petok', 250, 'Food-Name-2757.jpg', 6, 'Yes', 'Yes'),
(20, 'Chicken Stir Fry', 'Chicken is mixed up with different vegetables.\r\n<br>\r\nRestaurant: Blue Sky Lounge', 250, 'Food-Name-9089.jpg', 6, 'Yes', 'Yes'),
(21, 'Beef Stir Fry', 'Beef is mixed up with a little amount of vegetable.\r\n<br>\r\nRestaurant: Da Rooftop', 350, 'Food-Name-4832.jpg', 6, 'Yes', 'Yes'),
(22, 'Korean Stir Fry', 'This Stir Fry is made in original Korean style.\r\n<br>\r\nRestaurant: The Green Lounge', 200, 'Food-Name-6934.jpg', 6, 'Yes', 'Yes'),
(23, 'Cheese Pizza', 'This Pizza is made with Cheese\r\n<br>\r\nRestaurant: Pizza Burg', 400, 'Food-Name-1748.jpg', 5, 'Yes', 'Yes'),
(24, 'Pepperoni Pizza', 'There is a layer of Pepperoni on top of the Pizza.\r\n<br>\r\nRestaurant: Pizza House', 500, 'Food-Name-8281.jpg', 5, 'Yes', 'Yes'),
(26, 'Sea Food Pizza', 'Seafood is used in here.\r\n<br>\r\nRestaurant: Pizza Hut', 600, 'Food-Name-6074.jpg', 5, 'Yes', 'Yes'),
(27, 'Italian Cheese Pizza', 'Here Italian white cheese is used.\r\n<br>\r\nRestaurant: Pizza Burg', 550, 'Food-Name-2957.jpg', 5, 'Yes', 'Yes'),
(28, 'Rib Eye Steak', 'Rib eye cut is used here\r\n<br>\r\nRestaurant: Steak House', 400, 'Food-Name-3263.jpg', 7, 'Yes', 'Yes'),
(29, 'Council Oak Steak', 'This steak has a lot of fat\r\n<br>\r\nRestaurant: Da Rooftop', 550, 'Food-Name-9028.jpg', 7, 'Yes', 'Yes'),
(30, 'Steak With Mushroom', 'Steak is mixed with mushrooms\r\n<br>\r\nRestaurant: BBQ Grill', 450, 'Food-Name-2538.jpg', 7, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `food` VARCHAR(150) NOT NULL,
  `price` DECIMAL(10, 0) NOT NULL,
  `qty` INT(11) NOT NULL,
  `total` DECIMAL(10, 0) NOT NULL,
  `order_date` DATETIME NOT NULL,
  `status` VARCHAR(50) NOT NULL,
  `customer_name` VARCHAR(150) NOT NULL,
  `customer_contact` VARCHAR(20) NOT NULL,
  `customer_email` VARCHAR(150) NOT NULL,
  `customer_address` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'BBQ Burger', 300, 2, 600, '2023-10-30 14:30:00', 'Pending', 'John Doe', '1234567890', 'john.doe@example.com', '123 Elm Street, NY'),
(2, 'Cheese Pizza', 400, 1, 400, '2023-10-30 14:45:00', 'Completed', 'Jane Smith', '0987654321', 'jane.smith@example.com', '456 Oak Avenue, NY');

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

-- Indexes for table `admin`
-- Already set by PRIMARY KEY

-- Indexes for table `category`
-- Already set by PRIMARY KEY

-- Indexes for table `food`
-- Already set by PRIMARY KEY

-- Indexes for table `order`
-- Already set by PRIMARY KEY

--
-- AUTO_INCREMENT for dumped tables
--

-- AUTO_INCREMENT for table `admin`
ALTER TABLE `admin` MODIFY `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

-- AUTO_INCREMENT for table `category`
ALTER TABLE `category` MODIFY `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

-- AUTO_INCREMENT for table `food`
ALTER TABLE `food` MODIFY `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

-- AUTO_INCREMENT for table `order`
ALTER TABLE `order` MODIFY `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

COMMIT;
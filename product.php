<?php
$host = 'localhost';
$dbname = 'new1';
$username = 'root';
$password = '';

try {
    $con = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Initialize an empty array to store search results
    $searchResults = array();

if (isset($_POST['save'])) {
    if (!empty($_POST['search'])) {
        $search = $_POST['search'];
$tables = ['perfume', 'electronics1', 'electronics2', 'books'];

        $searchResults = array(); // Initialize an empty array to store search results

        // Loop through the tables and search in each one
        foreach ($tables as $table) {
            $stmt = $con->prepare("SELECT *, '$table' as table_name FROM $table WHERE id LIKE '%$search%' OR name LIKE '%$search%'");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Append the results to the main searchResults array
            $searchResults = array_merge($searchResults, $results);
        }
    } else {
        $searchErr = "Please enter the information";
    }
}


    // Fetch all data from the 'electronics1' table
    $stmt = $con->prepare("SELECT * FROM electronics1");
    $stmt->execute();
    $car_detail = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

  <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="product.css">
  <link rel="stylesheet" href="bootstrap.css">
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
</head>

<body>
  <header>
    <div class="logo" id="logoo">
      <a href="#"><Span>Daraz</Span>X<span>shop</span></a>
    </div>
    <div class="menu">
      <a href="#">
        <ion-icon name="close" class="close"></ion-icon>
      </a>
    </div>

    
    <div class="heading">
      <ul>
        <li><a href="#" class="under">HOME</a></li>
        <li><a href="products.html" class="under">PRODUCTS</a></li>
        <li><a href="contact.html" class="under">CONTACT</a></li>
        <li><a href="about.html" class="under">ABOUT US</a></li>
      </ul>
    </div>
    <div class="heading1">
      <ion-icon name="menu" class="ham"></ion-icon>
    </div>
  </header>
  <section>
    <div class="container-fluid section">



   

    <div class="container" id="category">
    <h2 class="d-block">Category</h2>
  <div class="button-container">
    <button class="button2 mx-md-2 my-3"><a href="#Laptop">Laptops</a></button>
    <button class="button2 mx-md-2 my-3"><a href="#Books">Books</a></button>
    <button class="button2 mx-md-2 my-3"><a href="#Perfume">Perfumes</a></button>
    <button class="button2 mx-md-2 my-3"><a href="#other">Others</a></button>
  </div>
</div>

   <!---------- Banner HTML Code Starts --------->

  <div class="container-fluid" id="banner-collection">
  
      <div class="banner-list">
        <a href="#">
          <img class="wimg100" src="images/ban1.jpg">
        </a>
    </div>
 
      <div class="banner-list">
        <a href="#">
          <img class="wimg100" src="images/ban2.jpg">
        </a>
    </div>
  
      <div class="banner-list">
        <a href="#">
          <img class="wimg100" src="images/ban3.jpg">
        </a>
    </div>
  </div>
<!---------- Banner HTML Code Ends --------->



      <div class="section2" id="products">
        <h2 class="col-12 ">Our products </h2>
        
<!---------- search form --------->
      <form action="" method="POST">
        <input type="text" name="search">
        <button type="submit" onclick=toggle() name="save">Search</button>
    </form>
        <div class="container-fluid my-5 mx-5">
          <div class="product-container">

             <div class="sidebar col-md-2">
              
            <h5 class="font-monospace ">Items:</h5>
            <div class="category">
               <input type="checkbox" id="books">
                <label for="books">Books</label>
               
            </div>
            <div class="category">
                <input type="checkbox" id="perfume">
                <label for="perfume">Perfume</label>

            </div>
            <div class="category">
                <input type="checkbox" id="phones">
                <label for="phones">Phones</label>
      
            </div>
            <div class="category">
                <input type="checkbox" id="laptop">
                <label for="laptop">Laptop</label>
              
            </div>
            <hr><br>


             <h5>Pricing:</h5>
            <div class="pricing">
                  <input type="checkbox" id="under100">
                <label for="under100">$0 - $100</label>
            
            </div>
            <div class="pricing">
              <input type="checkbox" id="under200">
                <label for="under200">$101 - $200</label>
                
            </div>
            <div class="pricing">
               <input type="checkbox" id="under500">
                <label for="under500">$201 - $500</label>
               
            </div>
            <div class="pricing">
                  <input type="checkbox" id="under1000">
                <label for="under1000">$501 - $1000</label>
            
            </div>
            <div class="pricing">
                <input type="checkbox" id="under1500">
                <label for="under1500">$1001 - $1500</label>
              
            </div>
            <div class="pricing">
              <input type="checkbox" id="under2000">
                <label for="under2000">$1501 - $2000</label>
                
            </div>
        </div>


<div class="card-container1 view col-md-9">
    <div class="row">
        <?php
        if (!empty($searchResults)) {
            foreach ($searchResults as $result) {
                echo '<div class="col-md-4">'; // Create columns for 3 cards in a row
                echo '<div class="product-card">';
                echo '<div class="product-card-img">';
                echo '<img src="' . $result["img"] . '" alt="' . $result["name"] . '">';
                echo '</div>';
                echo '<div class="product-card-info">';
                $name = $result["name"];
                $nameWords = explode(' ', $name);
                $shortName = implode(' ', array_slice($nameWords, 0, 5));
                echo '<p class="product-card-title">' . $shortName . '</p>';
                $description = $result["description"];
                $descriptionWords = explode(' ', $description);
                $shortDescription = implode(' ', array_slice($descriptionWords, 0, 20));
                echo '<p class="product-card-description">' . $shortDescription . '</p>';
                echo '</div>';
                echo '<div class="product-card-footer">';
                echo '<span class="product-card-price">$' . $result["price"] . '</span>';
                echo '<div class="product-card-button">';
                echo '<a href="#" >Add to Cart</a>'; // You can add a link or button for adding to cart
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } elseif (empty($searchResults) && isset($_POST['save'])) {
            echo '<p class="col-md-12">No matching data found</p>';
        } elseif (!$car_detail) {
            echo '<p class="col-md-12">No data found</p>';
        }
        ?>
    </div>
</div>



          <!--Card start-->

<div class="card-container  col-md-9">
<div class="row">
<?php

$host = 'localhost';
$dbname = 'new1';
$username = 'root';
$password = '';

try {
    $con = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    
    $stmt = $con->prepare("SELECT * FROM perfume");
    $stmt->execute();
    $productData = $stmt->fetchAll(PDO::FETCH_ASSOC);


    $stmt = $con->prepare("SELECT * FROM electronics1");
    $stmt->execute();
    $electronics1Data = $stmt->fetchAll(PDO::FETCH_ASSOC);

   
    $stmt = $con->prepare("SELECT * FROM electronics2");
    $stmt->execute();
    $electronics2Data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch data from the 'books' table including the image URL
    $stmt = $con->prepare("SELECT * FROM books");
    $stmt->execute();
    $booksData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Loop through each data set and generate HTML cards
    $allData = [$productData, $electronics1Data, $electronics2Data, $booksData];

   
    foreach ($allData as $data) {
        foreach ($data as $item) {
            echo '<div class="card card-all">';
            echo '<div class="card-img">';
            echo '<img src="' . $item["img"] . '" alt="' . $item["name"] . '">';
            echo '</div>';
            echo '<div class="card-info">';
           $name = $item["name"];
        $nameWords = explode(' ', $name);
        $shortName = implode(' ', array_slice($nameWords, 0, 5));

        echo '<p class="text-title">' . $shortName . '</p>';
        
        $description = $item["description"];
        $descriptionWords = explode(' ', $description);
        $shortDescription = implode(' ', array_slice($descriptionWords, 0, 20));

        echo '<p class="text-body">' . $shortDescription . '</p>';
            echo '</div>';
            echo '<div class="card-footer">';
            echo '<span class="text-title">$' . $item["price"] . '</span>';
            echo '<div class="card-button">';
            echo '<a href="#" >Add to Cart</a>'; // You can add a link or button for adding to cart
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
   </div>



        <!--Card end-->
          </div>
           
        </div>
         



        </div>

      </div>
    </div>

  </section>
  <footer>
    <div class="footer0">
      <h1><Span>Daraz</Span>X<span>shop</span></h1>
    </div>
    <div class="footer1 ">
      Connect with us at<div class="social-media">
        <a href="#">
          <ion-icon name="logo-facebook"></ion-icon>
        </a>
        <a href="#">
          <ion-icon name="logo-linkedin"></ion-icon>
        </a>
        <a href="#">
          <ion-icon name="logo-youtube"></ion-icon>
        </a>
        <a href="#">
          <ion-icon name="logo-instagram"></ion-icon>
        </a>
        <a href="#">
          <ion-icon name="logo-twitter"></ion-icon>
        </a>
      </div>
    </div>
    <div class="footer2">
      <div class="product">
        <div class="heading">Products</div>
        <div class="div">Sell your Products</div>
        <div class="div">Product Advertise</div>
        <div class="div">Price Range</div>
        <div class="div">Product Analyze</div>

      </div>
      <div class="services">
        <div class="heading">Services</div>
        <div class="div">Return product</div>
        <div class="div">Cash Back</div>
        <div class="div">Affiliate Marketing</div>
        <div class="div">More</div>
      </div>
      <div class="Company">
        <div class="heading">Company</div>
        <div class="div">Complaint</div>
        <div class="div">Careers</div>
        <div class="div">Affiliate Marketing</div>
        <div class="div">Support Us</div>
      </div>
      <div class="Get Help">
        <div class="heading">Get Help</div>
        <div class="div">Help Center</div>
        <div class="div">Legal Policy</div>
        <div class="div">Legal Terms</div>
        <div class="div">Login</div>
      </div>
    </div>
    <div class="footer3">Copyright © <h4>Daraz</h4> 2024-2028</div>
  </footer>
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <script src="app.js"></script>

</body>




</html>

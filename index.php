<?php
@include 'config.php';
@include 'authentication_functions.php'; 
session_start();
if (!isUserLoggedIn()) {
  
   header('Location:login.php');
    exit(); 
}


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $userID = $_SESSION['u_id'];

    
} else {
    
}



if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    
    $insert = "INSERT INTO contract_t (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
    if (mysqli_query($con, $insert)) {
        echo "<script>alert('Successfully submitted');</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
    

}


 

$sql = "SELECT * FROM dishes LIMIT 6"; 
$result = mysqli_query($con, $sql);

$sql1 = "SELECT * FROM restaurant"; 
$result1 = mysqli_query($con, $sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Showpno</title>

</head>
<body>
    <div class="container">
        <div class="header">
            
            <div class="logo">
                <img src="images/logo.png" alt="">
            </div>
            <div class="nav">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="restaurant.php">Branches</a></li>
                    <li><a href="#contract">Contract Us</a></li>
                    <li><a href="login.php">LogIn</a></li>
                    <li><a href="logout.php">LogOut</a></li>
                    
                </ul>

            </div>
        </div>
        <div class="home">
     <img src="images/img/back1.jpg" alt="">
     <div class="overlay">
        <p>Quality Meets Affordability</p>
        <ul>
            
        </ul>
    </div>
  </div>
    
  <div class="about" id="about">
    <h1>About Us</h1>

            <div class="content1">
   
               <p>This is the best online Glossory website<br>
               Welcome to Showpno, your ultimate destination for an unparalleled shopping experience that seamlessly blends style, convenience, and affordability. At Showpno, we pride ourselves on being more than just a marketplace; we are a curated haven for fashion enthusiasts and lifestyle aficionados.

Dive into a world of endless possibilities as you explore our meticulously curated selection of the latest trends in fashion, accessories, and home essentials. Our mission is to empower you to express your unique style effortlessly, offering a diverse range of items that cater to every taste and occasion. Whether you're a trendsetter or a classic connoisseur, we have the perfect pieces to elevate your wardrobe and living spaces.

What sets Showpno apart is our unwavering commitment to quality without compromise on cost. We believe that everyone should have access to high-quality products without the hefty price tag. Revel in the joy of discovering exceptional items that not only look good but also stand the test of time.

Our dedication to customer satisfaction extends beyond the virtual storefront. Experience the convenience of fast and reliable delivery, ensuring that your coveted purchases reach your doorstep in impeccable condition. Our user-friendly interface makes navigating our website a breeze, and our efficient customer support team is always ready to assist you with any queries or concerns.

As a valued member of the Showpno family, you can look forward to exclusive offers and rewards. We believe in showing appreciation to our loyal customers through special discounts, member-only promotions, and seasonal surprises. Your journey with us goes beyond a transaction; it's a partnership built on trust and shared passion for style and quality.
               </p><br>
                
            </div>
            <div class="sidebar">
                <img src="images/aaboutus.jpg" alt="">

            </div>
        </div>

       <div class="menu" id="menu">
        <div class="heading">
            <h1>Popular Products of the Month</h1>
            <p>Easiest way to order your Products among these top 6 Products</p>

        </div>
        <div class="items">
    <?php
   
    while ($row = mysqli_fetch_assoc($result)) {
     
     echo '<div class="menu1">';
     echo '<div class="des">';
     echo '<img src="dishes/' . $row['img'] . '" alt="">';
     echo '<p>' . $row['slogan'] . '</p>';
     echo '<p style="font-size: 26px;">' .  $row['price'] . '</p>';
     echo '<button>Order</button>';
     echo '</div>';
     echo '</div>';
   

    }
    ?>
  </div>
      
       </div>
       
      <div class="restaurant">
        <div class="txt2">
            <div class="logo">
                <h1>Featured BRANCHES</h1>

            </div>
            <div class="nav">
                <ul>
                </ul>

            </div>

        </div>
        <div class="list">
    <?php
    while ($row1 = mysqli_fetch_assoc($result1)) {
        echo '<div class="res">';
        echo '<div class="pic">';
        echo '<img src="' . $row1['image'] . '" alt="Restaurant Image">';
        echo '</div>';
        echo '<div class="info">';
        echo '<p>' . $row1['title'] . '</p>';
        echo '<p>' . $row1['address'] . '</p>';
        echo '</div>';
        echo '</div>';
    }
    ?>
</div>


        
     
        </div>

        <div class="contract" id="contract">
            <div class="content3">
                <h1>Contract Us</h1>
                <form action="" method="post">
                    Name <input type="text" name="name"><br><br>
                    Email  <input type="email" name="email"><br><br>
                    Phone  <input type="number" name="phone"><br><br>
                    Message <textarea name="message" rows="5" cols="30"></textarea>
                    <br><br>
                    <input type="submit" value="submit" name="submit">
                </form>
            </div>
        </div>

        <div class="footer">
            <p>&copy;SHOWPNO</p>
        </div>

      </div>

</div>
</body>
</html>

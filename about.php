<?php  session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ABOUT US</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="nav.css" />
</head>

<body>
  <div class="container">
  <?php include './includes/landing_nav.php'; ?>

    <section class="about">
      <div class="about-container">
        <h1>ABOUT THE LIBRARY STORE</h1>

        <p>
          The Online Library Store is a unique, non-profit platform dedicated to
          book lovers everywhere. We offer a carefully curated collection of
          books across a wide range of genres, ensuring there's something for
          every reader. As part of our mission to support literacy and
          education, our proceeds help fund initiatives that enhance access to
          books and promote a love of reading. Our inventory is thoughtfully
          sourced from independent publishers, local authors, and socially
          conscious organizations, making each purchase not only a gift for
          yourself or a loved one but also a contribution to a greater cause.
          Whether you're searching for a timeless classic, a contemporary
          bestseller, or a hidden gem, The Online Library Store is your go-to
          destination for inspiring reads. Browse our collection today and join
          us in celebrating the joy of books!
        </p>
        <div class="first-image">
          <img src="./images/first-image.jpg" alt="" />
        </div>
      </div>

    </section>

    <section class="second-about">
      <div class="second-image">
        <img src="./images/second-image.jpg" alt="" />
      </div>

      <div class="second-about-container">
        <h1>ABOUT THE LIBRARY FOUNDATION</h1>
        <p>
          The Pristina Library Foundation is an independent organization
          committed to enhancing access to quality books, resources, and
          educational materials. Through its online store, the Foundation offers
          a carefully curated selection of books, literary gifts, and
          educational products for purchase. Proceeds from the store are
          reinvested to support the growth of the library network, expand
          collections, and promote a culture of reading and learning. By
          blending commerce with a mission to foster knowledge, the Pristina
          Library Foundation serves as a vital resource for readers and learners
          across the region.
        </p>
      </div>
    </section>

    <section class="third-about">
      <div class="third-about-container">
        <h1>ABOUT THE LIBRARY CREATORS</h1>
        <p>
          Two passionate book lovers, driven by their shared love for
          literature, created an innovative online library store. Their platform
          offers a curated selection of books, educational materials, and unique
          literary gifts, aiming to inspire readers and support learning. With a
          mission to make quality reading accessible, their store has become a
          hub for book enthusiasts seeking inspiration and knowledge. Their
          platform not only celebrates the joy of reading but also encourages
          personal growth through knowledge and creativity. With a strong focus
          on customer experience, they’ve built a space where every book
          purchase feels like a step toward a greater journey of discovery.
        </p>
      </div>

      <div class="third-image">
        <img src="./images/third-photo.jpg" alt="" />
      </div>
    </section>
  </div>

  <footer class="footer">
    <div class="container">
      <div class="footer-info">
        <div class="left-side">
          <h1>THE LIBRARY STORE</h1>
          <a href="">About Us</a>
          <a href="">Contact Us</a>
          <a href="">Library Foundation</a>
          <a href="">Privacy Policy</a>
          <a href="">Terms of Service</a>
          <a href="">Refund policy</a>
        </div>

        <div class="middle-side">

          <p>The Library Store is part of the Library Foundation of Pristina, which supports the Pristinas Public
            Library</p>
        </div>

        <div class="right-side">
          <h1>Keep in touch</h1>
          <p>Never Miss a Beat! Sign up for our newsletter and be the first to hear about new products, professional
            resources, limited edition merchandise, discounts and more when you sign up for our emails</p>
          <input type="email" placeholder="email@example.com" class="email">
        </div>
      </div>
    </div>
  </footer>

</body>

</html>
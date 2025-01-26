<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CONTACT</title>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="sstyle.css" />
  </head>
  <body>
    <div class="back-arrow">
      <a href="./library.php"><i class="bx bx-arrow-back"></i></a>
    </div>
    <div class="contact-form-container">
      <h1>Contact Us</h1>
      <form action="#" method="POST" class="contact-form">
        <label for="name">Full Name:</label>
        <input
          type="text"
          id="name"
          name="name"
          placeholder="Your full name"
          required
        />

        <label for="email">Email Address:</label>
        <input
          type="email"
          id="email"
          name="email"
          placeholder="Your email address"
          required
        />

        <label for="message">Message:</label>
        <textarea
          id="message"
          name="message"
          rows="5"
          placeholder="Your message"
          required
        ></textarea>

        <button type="submit">Send Message</button>
      </form>
    </div>
  </body>
</html>

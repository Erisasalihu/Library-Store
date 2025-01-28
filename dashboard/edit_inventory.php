<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Inventory</title>
    <link rel="stylesheet" href="../dashboard.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
  </head>

  <body>
    <main>
    <?php include '../includes/sidebar.php'; ?>

      <section class="content add_book">
        <div class="content_wrapper">
          <h1 class="content_title">Edit Inventory</h1>
          <form method="post" class="add_book_form">
            <input type="hidden" id="id" name="id" type="text" />

            <div class="form_input_wrapper">
              <label for="book_id">Book Id</label>
              <input
                id="book_id"
                name="book_id"
                type="text"
                placeholder="Book Id"
                disabled
                value="1"
              />
            </div>
            <div class="form_input_wrapper">
              <label for="isbn">ISBN</label>
              <input
                id="isbn"
                name="isbn"
                type="text"
                placeholder="ISBN"
                disabled
                value="#1234"
              />
            </div>
            <div class="form_input_wrapper">
              <label for="title">Title</label>
              <input
                id="title"
                name="title"
                type="text"
                placeholder="Title"
                disabled
                value="Kronike ne gure"
              />
            </div>
            <div class="form_input_wrapper">
              <label for="author">Author</label>
              <input
                id="author"
                name="author"
                type="text"
                placeholder="Author"
                disabled
                value="Ismail Kadare"
              />
            </div>
            <div class="form_input_wrapper">
              <label for="copies">Copies</label>
              <input
                id="copies"
                name="copies"
                type="text"
                placeholder="Copies"
                value="20"
              />
            </div>
            <div class="form_input_wrapper">
              <label for="available_copies">Available Copies</label>
              <input
                id="available_copies"
                name="available_copies"
                type="text"
                placeholder="Available Copies"
                value="15"
              />
            </div>
            <button type="submit" class="submit_button">Submit</button>
          </form>
        </div>
      </section>
    </main>
    <script src="../dashboard.js"></script>
  </body>
</html>

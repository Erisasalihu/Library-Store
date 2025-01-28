<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventory</title>
    <link rel="stylesheet" href="../dashboard.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
  </head>

  <body>
    <main>
    <?php include '../includes/sidebar.php'; ?>

      <section class="content">
        <div class="content_wrapper">
          <h2 class="content_title">Inventory</h2>

          <div class="content_wrapper_top">
            <input type="text" class="input_search" placeholder="Search" />
          </div>

          <table>
            <thead>
              <tr>
                <th class="table_id">Id</th>
                <th class="table_id">Book Id</th>
                <th>Book ISBN</th>
                <th>Book Name</th>
                <th>Total Copies</th>
                <th>Available Copies</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>1</td>
                <td>#1234</td>
                <td>Kronike ne gure</td>
                <td>20</td>
                <td>15</td>
                <td>
                  <div class="table_actions">
                    <a href="./edit_inventory.php">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                    <button>
                      <i class="bi bi-trash3" style="color: red"></i>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
    </main>
    <script src="../dashboard.js"></script>
  </body>
</html>

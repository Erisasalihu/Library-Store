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
      <nav>
        <div class="nav_header">
          <h3>Library Store</h3>
          <i class="bi bi-list"></i>
        </div>
        <div class="nav_items">
          <ul>
            <li>
              <a href="./users.html">
                <i class="bi bi-person"></i>
                <p>Users</p>
              </a>
            </li>
            <li>
              <a href="./books.html">
                <i class="bi bi-book"></i>
                <p>Books</p>
              </a>
            </li>
            <li class="active">
              <a href="./inventory.html">
                <i class="bi bi-box"></i>
                <p>Inventory</p>
              </a>
            </li>
            <li>
              <a href="./loans.html">
                <i class="bi bi-card-checklist"></i>
                <p>Loans</p>
              </a>
            </li>
          </ul>
          <ul>
            <li>
              <a href="../library.html">
                <i class="bi bi-arrow-left"></i>
                <p>Web</p>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="bi bi-box-arrow-right"></i>
                <p>Log out</p>
              </a>
            </li>
          </ul>
        </div>
      </nav>

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
                    <a href="./edit_inventory.html">
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

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Users</title>
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
            <li class="active">
              <a href="./users.php">
                <i class="bi bi-person"></i>
                <p>Users</p>
              </a>
            </li>
            <li>
              <a href="./books.php">
                <i class="bi bi-book"></i>
                <p>Books</p>
              </a>
            </li>
            <li>
              <a href="./inventory.php">
                <i class="bi bi-box"></i>
                <p>Inventory</p>
              </a>
            </li>
            <li>
              <a href="./loans.php">
                <i class="bi bi-card-checklist"></i>
                <p>Loans</p>
              </a>
            </li>
          </ul>
          <ul>
            <li>
              <a href="../library.php">
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
          <h2 class="content_title">Users</h2>
          <div class="content_wrapper_top">
            <form>
              <input
                type="text"
                name="search"
                class="input_search"
                placeholder="Search"
              />
            </form>
          </div>

          <table>
            <thead>
              <tr>
                <th class="table_id">Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Borrowed Books</th>
                <th>Returned Books</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
          <div class="table_no_data">No data</div>
        </div>
      </section>
    </main>
    <script src="../dashboard.js"></script>
  </body>
</html>

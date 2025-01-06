<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="student.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li>
          <a href="#" class="logo">
            <img src="user.jpg" alt="Logo">
            <span class="nav-item">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-book"></i>
            <span class="nav-item">Books</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-bars"></i>
            <span class="nav-item">Category</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-user"></i>
            <span class="nav-item">Authors</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-book-reader"></i>
            <span class="nav-item">Issue Book</span>
          </a>
        </li>
        <li>
          <a href="#" class="logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">Log out</span>
          </a>
        </li>
      </ul>
    </nav>

    <section class="main">
      <div class="main-top">
        <h1>Admin Dashboard</h1>
      </div>
      <div class="main-skills">
        <div class="card">
          <i class="fas fa-user"></i>
          <h3>Registered User</h3>
          <p>Total no. of user</p>
          <button>View Here</button>
        </div>
        <div class="card">
          <i class="fas fa-book"></i>
          <h3>Total Book</h3>
          <p>No. of books available</p>
          <button>View Here</button>
        </div>
        <div class="card">
          <i class="fas fa-bars"></i>
          <h3>Categories</h3>
          <p>No. of books categories</p>
          <button>Get Started</button>
        </div>
        <div class="card">
          <i class="fas fa-user-tie"></i>
          <h3>Authors</h3>
          <p>No. of Author available</p>
          <button>Get Started</button>
        </div>
        <div class="card">
          <i class="fas fa-book"></i>
          <h3>Book Issued</h3>
          <p>No. of book issued</p>
          <button>Get Started</button>
        </div>
        <div class="card">
          <i class="fas fa-book-dead"></i>
          <h3>Book Not Returned</h3>
          <p>No. of books not returned</p>
          <button>Get Started</button>
        </div>
        <div class="card">
          <i class="fas fa-id-card"></i>
          <h3>Issue ID Card</h3>
          <p>Issue ID card online</p>
          <button>Get Started</button>
        </div>
      </div>
    </section>
  </div>
</body>
</html>

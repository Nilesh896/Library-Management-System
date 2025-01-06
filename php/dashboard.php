<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="student.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  </head>
  <body>
    <div class="container">
      <nav>
        <ul>
          <li><a href="#" class="logo">
            <img src="user.jpg" alt="">
            <span class="nav-item">DashBoard</span>
          </a></li>
          <li><a href="#">
            <i class="fas fa-home"></i>
            <span class="nav-item">Home</span>
          </a></li>
          <li><a href="">
            <i class="fas fa-user"></i>
            <span class="nav-item">Profile</span>
          </a></li>
          <li><a href="" class="logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">Log out</span>
          </a></li>
        </ul>
      </nav>
  
      <section class="main">
        <div class="main-top">
          <h1>Student Dashboard</h1>
        </div>
        <div class="main-skills">
          <div class="card">
            <i class="fas fa-book"></i>
            <h3>Book Issued</h3>
            <p>See here which books issued to you</p>
            <button>View Here</button>
          </div>
          <div class="card">
            <i class="fas fa-book-dead"></i>
            <h3>Book not returned</h3>
            <p>Books which are not returned</p>
            <button>View Here</button>
          </div>
          <div class="card">
            <i class="fas fa-id-card"></i>
            <h3>E-ID Card</h3>
            <p>Apply for ID card online</p>
            <button>Apply Here</button>
          </div>
          <div class="card">
            <i class="fas fa-address-book"></i>
            <h3>Rail Concession</h3>
            <p>Apply for concession form</p>
          <a href="rail.php"><button>Apply Here</button></a> 
          </div>
        </div>
      </section>
    </div>
  </body>
  </html></span>
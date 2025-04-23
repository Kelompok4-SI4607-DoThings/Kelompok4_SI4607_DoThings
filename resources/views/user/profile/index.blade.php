<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Do Things - Profile</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    body {
      background-color: #f5f5f5;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 40px;
      background-color: white;
      border-bottom: 1px solid #ccc;
    }

    .logo {
      font-weight: bold;
      color: #007bff;
      line-height: 1;
    }

    nav a {
      margin-right: 20px;
      text-decoration: none;
      color: black;
      border-bottom: 2px solid transparent;
    }

    nav a.active {
      border-color: #007bff;
    }

    .profile-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-left: 10px;
    }

    .container {
      max-width: 800px;
      margin: 40px auto;
      background-color: white;
      padding: 30px;
      border: 2px solid #000;
      border-radius: 8px;
    }

    .profile-header {
      display: flex;
      align-items: center;
      margin-bottom: 30px;
    }

    .profile-header img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin-right: 20px;
    }

    .profile-header .info h2 {
      margin-bottom: 5px;
    }

    .edit-btn {
      margin-left: auto;
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .form-box {
      background-color: #cde1f3;
      padding: 20px;
      border-radius: 5px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
    }

    .dot {
      width: 10px;
      height: 10px;
      background-color: ;
      border-radius: 50%;
      margin: 10px auto 0;
    }

    footer {
      background-color: #111;
      color: white;
      padding: 40px;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    footer div {
      flex: 1;
      min-width: 200px;
      margin-bottom: 20px;
    }

    footer h4 {
      margin-bottom: 10px;
    }

    footer a {
      display: block;
      color: white;
      text-decoration: none;
      margin-bottom: 5px;
    }

    .footer-bottom {
      background-color: #222;
      color: white;
      text-align: center;
      padding: 20px;
    }

    .social-icons img {
      margin: 0 10px;
      vertical-align: middle;
    }
  </style>
</head>
<body>

<header>
  <div class="logo">DO <br> THINGS</div>
  <div style="display: flex; align-items: center;">
    <nav>
      <a href="#" class="active">Home</a>
    </nav>
    <button style="margin-left: 20px;">Log Out</button>
    <img class="profile-icon" src="https://via.placeholder.com/40" alt="Profile Icon">
  </div>
</header>

  <div class="container">
    <div class="profile-header">
      <img src="https://via.placeholder.com/100" alt="Profile Picture">
      <div class="info">
        <h2>Ramesh</h2>
        <p>97054321180</p>
      </div>
      <button class="edit-btn">Edit</button>
    </div>

    <div class="form-box">
      <div class="form-group">
        <label>Name</label>
        <input type="text" value="Ramesh" disabled>
      </div>
      <div class="form-group">
        <label>Phone Number</label>
        <input type="text" value="9876540321" disabled>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" value="resash@gmail.com" disabled>
      </div>
      <div class="form-group">
        <label>Role</label>
        <input type="text" value="User" disabled>
        <div class="dot"></div>
      </div>
    </div>
  </div>

  <footer>
    <div>
      <h4>Open Designers</h4>
      <p>Open source is source code that is made freely available for modification and redistribution. Products include permission to use the source code, design documents, or content of the product.</p>
    </div>
    <div>
      <h4>Explore</h4>
      <a href="#">Go pro</a>
      <a href="#">Explore Designs</a>
      <a href="#">Create Designs</a>
      <a href="#">Playoffs</a>
    </div>
    <div>
      <h4>Innovate</h4>
      <a href="#">Tags</a>
      <a href="#">API</a>
      <a href="#">Places</a>
      <a href="#">Creative Markets</a>
    </div>
    <div>
      <h4>About</h4>
      <a href="#">Community</a>
      <a href="#">Designers</a>
      <a href="#">Support</a>
      <a href="#">Terms of service</a>
    </div>
  </footer>

  <div class="footer-bottom">
    <div class="social-icons">
      <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/2111/2111432.png" alt="Discord" width="24" height="24"></a>
      <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Instagram" width="24" height="24"></a>
      <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter" width="24" height="24"></a>
    </div>
    <p>All Rights Reserved</p>
  </div>

</body>
</html>

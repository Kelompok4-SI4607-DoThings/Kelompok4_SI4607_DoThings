<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Do Things - Donation Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            text-align: center;
            padding: 20px;
        }
        .donation-card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 15px;
            padding: 10px;
            margin: 10px;
        }
        .donation-card img {
            border-radius: 10px;
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .top-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }
        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        footer {
            margin-top: 40px;
            font-style: italic;
        }
    </style>
</head>
<body>

    <div class="top-nav">
        <div><img src="logo.png" alt="Do Things Logo" height="40"></div>
        <div>
            <a href="#" class="btn btn-outline-secondary me-2">Home</a>
            <a href="#" class="btn btn-outline-danger">Log Out</a>
            <img src="profile.jpg" alt="Profile Picture" class="profile-pic ms-3">
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">

            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="donation-card">
                    <img src="https://example.com/school.jpg" alt="Sekolah SDN 2">
                    <h5 class="mt-2">Sekolah Rusak SDN 2<br>Bandung</h5>
                    <a href="#" class="btn btn-primary mt-2">Donate Now</a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="donation-card">
                    <img src="https://example.com/sumur.jpg" alt="Sumur Resapan">
                    <h5 class="mt-2">Membuat Sumur<br>Resapan</h5>
                    <a href="#" class="btn btn-primary mt-2">Donate Now</a>
                </div>
            </div>

        </div>
    </div>

    <footer>
        <p>"More Giving, More Living"</p>
    </footer>

</body>
</html>
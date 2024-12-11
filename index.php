<?php
// Include necessary files
include 'includes/config.php'; // Database connection
include 'includes/navbar.php'; // Navigation bar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winning Picks Network</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <!-- Hero Section -->
    <header class="bg-dark text-white text-center py-5">
        <div class="container">
            <h1>Winning Picks Network</h1>
            <p>Your trusted source for expert predictions and insights!</p>
            <a href="predictions.php" class="btn btn-primary">View Predictions</a>
            <a href="register.php" class="btn btn-success">Sign Up for Free</a>
        </div>
    </header>

    <!-- How It Works Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center">How It Works</h2>
            <div class="row mt-4">
                <div class="col-md-4 text-center">
                    <h4>Expert Analysis</h4>
                    <p>Our team of experts provides accurate predictions based on in-depth analysis.</p>
                </div>
                <div class="col-md-4 text-center">
                    <h4>Track Record</h4>
                    <p>We provide transparency with past performance statistics to help you make informed decisions.</p>
                </div>
                <div class="col-md-4 text-center">
                    <h4>Win More</h4>
                    <p>Leverage our insights to increase your chances of winning!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Predictions Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center">Recent Predictions</h2>
            <div class="table-responsive mt-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Game</th>
                            <th>Home</th>
                            <th>Away</th>
                            <th>Prediction</th>
                            <th>Odds</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch recent predictions from the database
                        $sql = "SELECT * FROM predictions ORDER BY created_at DESC LIMIT 5";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>{$row['game']}</td>
                                    <td>{$row['team_a']}</td>
                                    <td>{$row['team_b']}</td>
                                    <td>{$row['prediction']}</td>
                                    <td>{$row['odds']}</td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No predictions available yet.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <a href="predictions.php" class="btn btn-primary">View All Predictions</a>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center">Latest Articles</h2>
            <div class="row mt-4">
                <?php
                // Fetch blog posts from the database
                $sql = "SELECT * FROM blog_posts ORDER BY created_at DESC LIMIT 3";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='col-md-4 mb-4'>
                            <div class='card'>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$row['title']}</h5>
                                    <p class='card-text'>" . substr($row['content'], 0, 100) . "...</p>
                                    <a href='blog.php?id={$row['id']}' class='btn btn-primary'>Read More</a>
                                </div>
                            </div>
                        </div>";
                    }
                } else {
                    echo "<p class='text-center'>No blog posts available yet.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>

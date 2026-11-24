<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$stmt = $pdo->query("SELECT id, username, email, created_at FROM users ORDER BY created_at ASC");
$users = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Group1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container wide">
        <div class="card">
            <div class="header-row">
                <div>
                    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
                    <p class="subtitle">You are successfully logged in</p>
                </div>
                <a href="logout.php" class="btn btn-secondary">Logout</a>
            </div>

            <div class="info-box">
                <p><strong>Your Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
                <p><strong>User ID:</strong> <?php echo (int)$_SESSION['user_id']; ?></p>
            </div>

            <h2>Group Members</h2>
            <p class="subtitle">All registered members in the GROUP1 database</p>

            <?php if (count($users) > 0): ?>
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Registered At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?php echo (int)$user['id']; ?></td>
                                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                                    <td><?php echo htmlspecialchars($user['created_at']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p>No users found yet.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

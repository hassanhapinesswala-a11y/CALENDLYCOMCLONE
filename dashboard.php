<?php
include 'config.php';
session_start();
 
if (!isset($_SESSION['userid'])) {
    echo "<script>alert('Please login first!'); window.location.href='login.php';</script>";
    exit();
}
 
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
 
$sql = "SELECT * FROM appointments WHERE user_id='$userid' ORDER BY date, time";
$result = $conn->query($sql);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - Calendly Clone</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f6f7fb;
      margin: 0; padding: 0;
    }
    header {
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: #fff; padding: 20px;
      display: flex; justify-content: space-between; align-items: center;
    }
    header h1 { margin: 0; font-size: 24px; }
    header a {
      color: #fff; text-decoration: none; padding: 10px 20px;
      background: rgba(255,255,255,0.2); border-radius: 8px; transition: 0.3s;
    }
    header a:hover { background: rgba(255,255,255,0.4); }
    .container { padding: 30px; }
    h2 { margin-bottom: 20px; color: #333; }
    table {
      width: 100%; border-collapse: collapse; margin-top: 20px;
    }
    table, th, td { border: 1px solid #ddd; }
    th, td { padding: 12px; text-align: center; }
    th { background: #667eea; color: #fff; }
    tr:nth-child(even) { background: #f2f2f2; }
    .btn {
      padding: 6px 12px; border: none; border-radius: 6px; cursor: pointer;
    }
    .btn-cancel { background: #e74c3c; color: #fff; }
    .btn-cancel:hover { background: #c0392b; }
  </style>
</head>
<body>
  <header>
    <h1>Welcome, <?php echo $username; ?>!</h1>
    <a href="logout.php">Logout</a>
  </header>
 
  <div class="container">
    <h2>Your Appointments</h2>
    <?php if ($result->num_rows > 0) { ?>
      <table>
        <tr>
          <th>Date</th>
          <th>Time</th>
          <th>With</th>
          <th>Action</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $row['date']; ?></td>
          <td><?php echo $row['time']; ?></td>
          <td><?php echo $row['client_name']; ?></td>
          <td><a href="cancel.php?id=<?php echo $row['id']; ?>" class="btn btn-cancel">Cancel</a></td>
        </tr>
        <?php } ?>
      </table>
    <?php } else { ?>
      <p>No appointments yet.</p>
    <?php } ?>
  </div>
</body>
</html>
 

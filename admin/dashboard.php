<?php
include 'includes/header.php';
include '../includes/db.php';

// Stats Queries
$total_users = $conn->query("SELECT COUNT(*) as count FROM users")->fetch_assoc()['count'];
$verified_users = $conn->query("SELECT COUNT(*) as count FROM users WHERE is_verified = 1")->fetch_assoc()['count'];
$admins = $conn->query("SELECT COUNT(*) as count FROM users WHERE role = 'admin'")->fetch_assoc()['count'];

// Recent Users
$recent = $conn->query("SELECT * FROM users ORDER BY created_at DESC LIMIT 5");
?>

    <h2 class="fw-bold mb-4">Dashboard Overview</h2>
    
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card card-stat bg-primary text-white p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50">Total Users</h6>
                        <h2 class="fw-bold mb-0"><?php echo $total_users; ?></h2>
                    </div>
                    <i class="bi bi-people display-4 text-white-50"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stat bg-success text-white p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50">Verified Accounts</h6>
                        <h2 class="fw-bold mb-0"><?php echo $verified_users; ?></h2>
                    </div>
                    <i class="bi bi-check-circle display-4 text-white-50"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stat bg-dark text-white p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50">Admins</h6>
                        <h2 class="fw-bold mb-0"><?php echo $admins; ?></h2>
                    </div>
                    <i class="bi bi-shield-lock display-4 text-gold"></i>
                </div>
            </div>
        </div>
    </div>

    <h4 class="fw-bold mb-3">Recent Registrations</h4>
    <div class="card card-stat p-0 overflow-hidden">
        <table class="table table-hover mb-0">
            <thead class="bg-light">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">User</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Role</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Joined</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $recent->fetch_assoc()): ?>
                <tr>
                    <td class="px-4 border-bottom">#<?php echo $row['id']; ?></td>
                    <td class="px-4 border-bottom fw-bold">
                        <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($row['username']); ?>&size=24&rounded=true" class="me-2">
                        <?php echo htmlspecialchars($row['username']); ?>
                    </td>
                    <td class="px-4 border-bottom"><?php echo htmlspecialchars($row['email']); ?></td>
                    <td class="px-4 border-bottom">
                        <span class="badge <?php echo $row['role'] == 'admin' ? 'bg-dark' : 'bg-secondary'; ?>">
                            <?php echo ucfirst($row['role']); ?>
                        </span>
                    </td>
                    <td class="px-4 border-bottom">
                         <?php if($row['is_verified']): ?>
                            <span class="badge bg-success">Verified</span>
                         <?php else: ?>
                            <span class="badge bg-warning text-dark">Pending</span>
                         <?php endif; ?>
                    </td>
                    <td class="px-4 border-bottom text-muted small"><?php echo date("M d, Y", strtotime($row['created_at'])); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</div> <!-- Open in Header, Closed here -->
</div> <!-- Open in Header, Closed here -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

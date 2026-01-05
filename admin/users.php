<?php
include 'includes/header.php';
include '../includes/db.php';

// Fetch users
$query = "SELECT * FROM users ORDER BY id DESC";
$result = $conn->query($query);
?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold m-0">User Management</h2>
        <button class="btn btn-gold rounded-pill px-4"><i class="bi bi-plus-lg me-2"></i> Add User</button>
    </div>

    <?php if(isset($_SESSION['admin_msg'])): ?>
        <div class="alert alert-<?php echo $_SESSION['admin_msg_type']; ?> alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['admin_msg']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['admin_msg']); unset($_SESSION['admin_msg_type']); ?>
    <?php endif; ?>

    <div class="card card-stat p-0 overflow-hidden shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4 py-3">User</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td class="px-4 border-bottom">
                            <div class="d-flex align-items-center">
                                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($row['username']); ?>&size=40&rounded=true" class="me-3">
                                <div>
                                    <div class="fw-bold"><?php echo htmlspecialchars($row['username']); ?></div>
                                    <div class="text-muted small"><?php echo htmlspecialchars($row['email']); ?></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 border-bottom">
                            <form action="user_actions.php" method="POST" class="d-flex align-items-center gap-2">
                                <input type="hidden" name="action" value="change_role">
                                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                <select name="new_role" class="form-select form-select-sm border-0 bg-light" onchange="this.form.submit()" style="width: 100px;">
                                    <option value="student" <?php echo $row['role'] == 'student' ? 'selected' : ''; ?>>Student</option>
                                    <option value="instructor" <?php echo $row['role'] == 'instructor' ? 'selected' : ''; ?>>Instructor</option>
                                    <option value="admin" <?php echo $row['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                </select>
                            </form>
                        </td>
                        <td class="px-4 border-bottom">
                            <?php if($row['is_verified']): ?>
                                <span class="badge bg-success-subtle text-success border border-success px-3 rounded-pill">Active</span>
                            <?php else: ?>
                                <span class="badge bg-warning-subtle text-warning border border-warning px-3 rounded-pill">Pending</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 border-bottom">
                            <form action="user_actions.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-sm btn-outline-danger border-0"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination (Mock) -->
        <div class="px-4 py-3 border-top bg-light d-flex justify-content-between align-items-center">
            <span class="text-muted small">Showing all users</span>
            <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link bg-dark border-dark" href="#">1</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>

</div> <!-- Open in Header, Closed here -->
</div> <!-- Open in Header, Closed here -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

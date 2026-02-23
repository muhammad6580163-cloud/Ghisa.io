<div class="sidebar">

<?php if(isset($_SESSION['ghisa_admin_id'])){ ?>

    <a href="GhisaAdminDashboard.php">Dashboard</a>
    <a href="GhisaApproveUsers.php">Approve Members</a>
    <a href="GhisaAddEvent.php">Add Event</a>
    <a href="GhisaViewUsers.php">View Users</a>
    <a href="GhisaAdminLogout.php">Logout</a>
    <a href="GhisaActivityLogs.php">Activity Logs</a>

<?php } elseif(isset($_SESSION['ghisa_user_id'])){ ?>

    <a href="GhisaMemberDashboard.php">Dashboard</a>
    <a href="#">Events</a>
    <a href="#">Meetings</a>
    <a href="#">Profile</a>
    <a href="GhisaLogout.php">Logout</a>

<?php } ?>

</div>
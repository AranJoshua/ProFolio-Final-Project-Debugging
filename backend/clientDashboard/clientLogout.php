<?php
// Prevent caching of the page
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

session_start();
if (!isset($_SESSION['id'])) {
  // If not logged in, redirect to login page
  header("Location: ../PHP/login.php");
  exit();  // Make sure the script stops executing after the redirection
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ProFolio - Logout</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- COMPLETELY ISOLATED LOGOUT CSS -->
  <style>
    /* MODERNIZED LOGOUT CSS */
/* Using namespace prefix to avoid conflicts */
.pf-logout-body {
background: linear-gradient(135deg, #f6f9fc 0%, #edf2f7 100%);
display: flex;
justify-content: center;
align-items: center;
min-height: 100vh;
margin: 0;
font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
color: #1a202c;
}

.pf-logout-container {
width: 100%;
max-width: 480px;
padding: 24px;
transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
}

.pf-logout-card {
background-color: #ffffff;
border-radius: 16px;
box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08), 
            0 2px 6px rgba(0, 0, 0, 0.04);
padding: 40px;
text-align: center;
position: relative;
overflow: hidden;
transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.pf-logout-card:hover {
transform: translateY(-2px);
box-shadow: 0 14px 30px rgba(0, 0, 0, 0.1), 
            0 4px 8px rgba(0, 0, 0, 0.05);
}

.pf-logout-logo {
display: flex;
justify-content: center;
align-items: center;
margin-bottom: 32px;
}

.pf-logo-icon {
color: #2563eb;
font-size: 28px;
margin-right: 12px;
}

.pf-logo-text {
font-size: 28px;
font-weight: 800;
color: #2563eb;
margin: 0;
letter-spacing: -0.5px;
}

.pf-logo-text .pf-accent {
color: #3b82f6;
background: linear-gradient(90deg, #2563eb, #3b82f6);
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;
}

.pf-logout-content {
padding: 16px 0 24px;
}

.pf-logout-icon {
font-size: 56px;
color: #2563eb;
margin-bottom: 24px;
transition: all 0.5s ease;
}

.pf-logout-title {
font-size: 28px;
font-weight: 700;
color: #111827;
margin-bottom: 16px;
letter-spacing: -0.5px;
}

.pf-logout-message {
color: #4b5563;
margin-bottom: 32px;
font-size: 16px;
line-height: 1.6;
font-weight: 400;
}

.pf-logout-buttons {
display: flex;
justify-content: center;
gap: 16px;
margin-bottom: 24px;
}

.pf-btn-logout {
padding: 12px 28px;
border-radius: 12px;
font-weight: 600;
font-size: 15px;
text-decoration: none;
transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
cursor: pointer;
border: none;
display: inline-flex;
align-items: center;
justify-content: center;
box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
}

.pf-btn-logout.pf-primary {
background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
color: white;
}

.pf-btn-logout.pf-primary:hover {
background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
transform: translateY(-1px);
box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
}

.pf-btn-logout.pf-primary:active {
transform: translateY(1px);
}

.pf-btn-logout.pf-secondary {
background-color: #f9fafb;
color: #374151;
border: 1px solid #e5e7eb;
}

.pf-btn-logout.pf-secondary:hover {
background-color: #f3f4f6;
border-color: #d1d5db;
transform: translateY(-1px);
box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.pf-btn-logout.pf-secondary:active {
transform: translateY(1px);
}

.pf-logout-footer {
padding-top: 24px;
border-top: 1px solid #f1f5f9;
font-size: 14px;
color: #6b7280;
line-height: 1.6;
}

/* Enhanced microinteractions */
.button-clicked {
transform: scale(0.95);
opacity: 0.9;
}

.logging-out {
box-shadow: 0 10px 40px rgba(37, 99, 235, 0.2);
}

.fade-out {
opacity: 0 !important;
transform: translateY(-20px) !important;
transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1) !important;
}

@keyframes pulse {
0% { transform: scale(1); opacity: 1; }
50% { transform: scale(1.05); opacity: 0.8; }
100% { transform: scale(1); opacity: 1; }
}

.logging-out .pf-logout-icon {
animation: pulse 1.8s infinite cubic-bezier(0.4, 0, 0.6, 1);
}

/* Subtle accent effect on card */
.pf-logout-card:before {
content: '';
position: absolute;
top: 0;
left: 0;
right: 0;
height: 6px;
background: linear-gradient(90deg, #2563eb, #3b82f6);
border-radius: 6px 6px 0 0;
}

/* Adding responsive adjustments */
@media (max-width: 640px) {
.pf-logout-container {
  padding: 16px;
}

.pf-logout-card {
  padding: 32px 24px;
}

.pf-logout-title {
  font-size: 24px;
}

.pf-logout-buttons {
  flex-direction: column;
  gap: 12px;
}

.pf-btn-logout {
  width: 100%;
}
}
.info-value.non-editable {
    color: white;
    font-weight: bold;}
  </style>
</head>
<body class="pf-logout-body">
  <div class="pf-logout-container">
    <div class="pf-logout-card">
      <div class="pf-logout-logo">
        <i class="fas fa-briefcase pf-logo-icon"></i>
        <h1 class="pf-logo-text">Pro<span class="pf-accent">Folio</span></h1>
      </div>
      
      <div class="pf-logout-content">
        <div class="pf-logout-icon">
          <i class="fas fa-sign-out-alt"></i>
        </div>
        
        <h2 class="pf-logout-title">Logging Out</h2>
        <p class="pf-logout-message">Are you sure you want to end your session?</p>
        
        <div class="pf-logout-buttons">
          <a href="#" id="pf-confirm-logout" class="pf-btn-logout pf-primary">Yes, Log Out</a>
          <a href="clientDashboard.php" id="pf-cancel-logout" class="pf-btn-logout pf-secondary">Cancel</a>
        </div>
      </div>
      
      <div class="pf-logout-footer">
        <p>Thank you for using ProFolio</p>
      </div>
    </div>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="JS/clientLogout.js"></script>
  
</body>
</html>
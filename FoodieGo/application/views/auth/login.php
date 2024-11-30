<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="login-container">
    <div class="login-box">
        <h2>Login to FoodieGo</h2>
        
        <?php if (!empty($error)): ?>
            <div class="error-message">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="login" method="POST" class="login-form">
            <div class="form-group">
                <label for="username">Username/Email:</label>
                <input type="text" 
                       name="username" 
                       id="username" 
                       required 
                       placeholder="Enter your username or email">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" 
                       name="password" 
                       id="password" 
                       required 
                       placeholder="Enter your password">
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>

        <div class="login-info">
            <p>Admin Login: Use your admin credentials</p>
            <p>Customer Login: Use your email address</p>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>
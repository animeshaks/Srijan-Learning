<nav class="navbar navbar-expand-sm navbar-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo $base_url;?>">$R!JAN</a>
        <small class="navbar-text">Learn and Implement</small>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav custom-nav">
                <li class="nav-item custom-nav-item"><a href="<?php echo $base_url;?>" class="nav-link">Home</a></li>
                <li class="nav-item custom-nav-item"><a href="<?php echo $base_url;?>courses" class="nav-link">Courses</a></li>
                <li class="nav-item custom-nav-item"><a href="<?php echo $base_url;?>payment-status" class="nav-link">Payment Status</a></li>
                <?php
                    if(isset($_SESSION['is_login'])) {
                ?>
                <li class="nav-item custom-nav-item"><a href="<?php echo $base_url;?>student-profile" class="nav-link">My Profile</a></li>
                <li class="nav-item custom-nav-item"><a href="<?php echo $base_url;?>logout" class="nav-link">Logout</a></li>
                <?php  
                    }else{
                ?>
                <li class="nav-item custom-nav-item"><a href="#" data-toggle="modal" data-target="#StudentLoginModal" class="nav-link">Login</a></li>
                <li class="nav-item custom-nav-item"><a href="#" data-toggle="modal" data-target="#StudentRegstrationModal" class="nav-link">Sign Up</a></li>
                <?php  
                    }
                ?>
                <li class="nav-item custom-nav-item"><a href="<?php echo $base_url;?>" class="nav-link">Testimonial</a></li>
                <li class="nav-item custom-nav-item"><a href="<?php echo $base_url;?>" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
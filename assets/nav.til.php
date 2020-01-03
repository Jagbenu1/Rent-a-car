
                <nav class="navbar navbar-dark bg-dark navbar-expand-lg col-12">
                    <div class="d-flex container-fluid">
                        <button class="navbar-toggler"
                            type="button"
                            data-toggle="collapse"
                            data-target="#myTogglerNav"
                            aria-controls="myTogglerNav"
                            aria-expanded="false"
                            aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="myTogglerNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"> 
                                    <a class="nav-link nav-all content" href="../index.til.php">
                                    Home</a>
                                </li>
                                
                                
                                <li class="nav-item">
                                                <a class="nav-link nav-all content" href="./inventory.php">
                                            Inventory</a>
                                </li>
                                     
                                <?php if(isset($_SESSION["u_id"]) && !empty($_SESSION["u_id"])): ?>
                                <li class="nav-item">
                                    <a class="nav-link nav-all content" href="./inc/logout.til.php">
                                    Logout</a>
                                </li>

                                <?php else:  ?>

                                <li class="nav-item">
                                    <a class="nav-link nav-all content" href="./sign-up.til.php">
                                    Sign Up</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link nav-all content" href="./login.til.php">
                                    Login</a>
                                </li>

                                <?php  endif; ?>
                                
                                <li class="nav-item">
                                    <div class="nav-link nav-all content">
                                        <?php if(isset($_SESSION["u_id"]) && !empty($_SESSION["u_id"])):?>
                                        <div> Hello, <a href="assets/profile.php"><?php echo($_SESSION["u_name"]);?></a></div>
                                        <?php else: ?>
                                            Hello, User
                                        <?php endif;?>
                                    </div>
                                </li>   

                            </ul><!-- navbar-nav -->
                        </div><!-- collapse -->
                    </div><!-- container -->
                </nav><!-- nav -->
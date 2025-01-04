<?php include_once 'includes/header.inc.php'; ?>
    <div class="dash_container">
        <div class="dash_content_container">
            <?php
                if(isset($_SESSION['useremail'])){
                    $useremail = $_SESSION['useremail'];
                    echo "<p style='color:white;font-size:13px;'> You're logged in as $useremail </p>";
                }else{
                    header("Location: index.php?err=nosession");
                    exit();
                }

            ?>
            <div class="dash_heading">
                <h2>Feeds</h2>
                <a href="actions/signOut.php"><button>Logout</button></a>
            </div>
            <div class="feed_container">
                <div class="feed_item">
                    <h2>UAE Bans Russia Visa</h2>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet voluptatem eligendi labore itaque.
                        Similique, natus?</p>
                    <a href="#">Keep Reading</a>
                </div>
                <div class="feed_item">
                    <h2>UAE Bans Russia Visa</h2>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet voluptatem eligendi labore itaque.
                        Similique, natus?</p>
                    <a href="#">Keep Reading</a>
                </div>
                <div class="feed_item">
                    <h2>UAE Bans Russia Visa</h2>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet voluptatem eligendi labore itaque.
                        Similique, natus?</p>
                    <a href="#">Keep Reading</a>
                </div>
                <div class="feed_item">
                    <h2>UAE Bans Russia Visa</h2>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet voluptatem eligendi labore itaque.
                        Similique, natus?</p>
                    <a href="#">Keep Reading</a>
                </div>
                <div class="feed_item">
                    <h2>UAE Bans Russia Visa</h2>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet voluptatem eligendi labore itaque.
                        Similique, natus?</p>
                    <a href="#">Keep Reading</a>
                </div>
            </div>
        </div>
    </div>
<?php include_once 'includes/footer.inc.php'; ?>
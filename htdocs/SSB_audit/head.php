<header>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <div class="head">
        <div></div>
        <div><h2>SSB audit system</h2></div>
        <div class="logout_icon">
            <form action='#' method='post'>
                <button class="exit_btn" name='logout' type='submit'>
                    <i class='fa-sharp fa-solid fa-arrow-right-from-bracket'></i>
                </button>
            </form>
        </div>

        <?php
        session_start();
        if(isset($_POST['logout'])){
            session_destroy();
            header("location:../index.php");
        }
        ?>
    </div>
</header>
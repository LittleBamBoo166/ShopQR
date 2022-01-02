<main class="px-3 cover-center-loginSucess">
    <h1>Xin chào <?php echo $_SESSION['login'][0]['HoTen']; ?></h1>
    <p class="lead">Chúc bạn có một ngày làm việc an toàn!</p>
    <div class="lead">
        <?php if ($_SESSION['login'][0]['Role'] == 1) { ?>
            <img src="Public\images\img1.png" width="275" height="275" alt="">
            <p>Nhớ quét mã mỗi khi đi mua hàng bạn nhé!</p>
        <?php } else { ?>
            <img src="<?php echo $_SESSION['qr']; ?>" class="img-thumbnail" width="300" height="300" alt="">
        <?php } ?>
    </div>
    <div class="lead my-5">
        <a href="?mod=login&act=account&case=account-info" class="text-decoration-none text-light fw-bold my-account me-3">Hồ sơ cá nhân</a>
        <a href="?mod=login&act=account&case=logout" class="text-decoration-none text-light fw-bold my-account ms-3">Đăng xuất</a>
    </div>
</main>
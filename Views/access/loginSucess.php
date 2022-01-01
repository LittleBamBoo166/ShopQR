<main class="px-3 cover-center-loginSucess">
    <h1>Xin chào <?php echo $_SESSION['login'][0]['HoTen']; ?></h1>
    <p class="lead">Tạo mã QR. Lưu thông tin tiếp xúc giữa người mua và người bán.</p>
    <div class="lead">
        <!-- <button href="#" class="btn btn-lg text-dark btn-secondary fw-bold border-white bg-light">
            Tạo QR
        </button>
        <button href="#" class="btn btn-lg text-dark btn-secondary fw-bold border-white bg-light">
            Quét QR
        </button> -->
        <img src="<?php echo $_SESSION['qr']; ?>" class="img-thumbnail" width="300" height="300" alt="">
        <!-- <p><?php print_r($_SESSION['login']); ?></p> -->
        <!-- <p><?php echo $_SESSION['qr']; ?></p> -->
    </div>
    <div class="lead my-5">
        <a href="?mod=login&act=account&case=account-info" class="text-decoration-none text-light fw-bold my-account me-3">Hồ sơ cá nhân</a>
        <a href="?mod=login&act=account&case=logout" class="text-decoration-none text-light fw-bold my-account ms-3">Đăng xuất</a>
    </div>
</main>
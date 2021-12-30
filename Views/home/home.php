<main class="px-3 cover-center">
    <h1>ShopQR</h1>
    <p class="lead">Tạo mã QR. Lưu thông tin tiếp xúc giữa người mua và người bán.</p>
    <div class="lead">
        <button href="#" class="btn btn-lg text-dark btn-secondary fw-bold border-white bg-light" data-bs-toggle="modal" data-bs-target="#logInModal">Đăng nhập
        </button>
        <button href="#" class="btn btn-lg text-dark btn-secondary fw-bold border-white bg-light" data-bs-toggle="modal" data-bs-target="#signUpModal">Đăng ký
        </button>
    </div>
</main>
<div class="modal fade py-5" id="logInModal">
    <div class="modal-dialog">
        <div class="modal-content text-dark">
            <div class="modal-header p-5 pb-5 border-bottom-0">
                <h2 class="fw-bold mb-0">Đăng nhập</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form action="#" method="post">
                    <div class="form-floating mb-3">
                        <input id="logTel" type="tel" name="logTel" class="form-control" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]">
                        <label for="logTel">Số điện thoại</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="logPass" id="logPass" class="form-control">
                        <label for="logPass">Mật khẩu</label>
                    </div>
                    <button type="submit" class="w-100 btn btn-lg text-light btn-secondary fw-bold border-dark bg-dark">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade py-5" id="signUpModal">
    <div class="modal-dialog">
        <div class="modal-content text-dark">
            <div class="modal-header p-5 pb-5 border-bottom-0">
                <h2 class="fw-bold mb-0">Đăng ký</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form action="#" method="post">
                    <div class="form-floating mb-3">
                        <input id="logTel" type="tel" name="logTel" class="form-control" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]">
                        <label for="logTel">Số điện thoại</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="logPass" id="logPass" class="form-control">
                        <label for="logPass">Mật khẩu</label>
                    </div>
                    <button type="submit" class="w-100 btn btn-lg text-light btn-secondary fw-bold border-dark bg-dark">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
</div>
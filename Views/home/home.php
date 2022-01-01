<main class="px-3 cover-center-home">
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
                <form action="?act=account&case=login" method="post" id="login">
                    <div class="form-floating mb-3">
                        <input id="logTel" type="text" name="logTel" class="form-control">
                        <label for="logTel">Số điện thoại</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="logPass" id="logPass" class="form-control">
                        <label for="logPass">Mật khẩu</label>
                    </div>
                    <button type="submit" form="login" class="w-100 btn btn-lg text-light btn-secondary fw-bold border-dark bg-dark">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade py-5" id="signUpModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content text-dark">
            <div class="modal-header p-5 pb-5 border-bottom-0">
                <h2 class="fw-bold mb-0">Đăng ký</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form action="#" method="post">
                    <select name="role" id="role" class="form-select mb-3">
                        <option value="">Chủ cửa hàng</option>
                        <option value="">Khách hàng</option>
                    </select>
                    <div class="form-floating mb-3">
                        <input id="dob" type="date" name="dob" class="form-control">
                        <label for="logTel">Ngày tháng năm sinh</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="gender" id="gender" class="form-select">
                            <option value="">Nam</option>
                            <option value="">Nữ</option>
                        </select>
                        <label for="gender" class="form-label">Giới tính</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="logTel" type="tel" name="logTel" class="form-control" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]">
                        <label for="logTel">Số điện thoại</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="idNumber" type="text" name="idNumber" class="form-control">
                        <label for="logTel">Số hộ chiếu/CMND/CCCD</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="address" type="text" name="address" class="form-control">
                        <label for="logTel">Thôn/Xóm/Số nhà</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="pro" id="pro" class="form-select" onchange="quanhuyen(this)">
                            <!-- <option value="">-- Chọn tỉnh / thành phố --</option> -->
                        </select>
                        <label for="pro" class="form-label">Tỉnh/Thành phố</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="dis" id="dis" class="form-select" onchange="xaphuong(this)">
                        </select>
                        <label for="dis" class="form-label">Quận/Huyện</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="town" id="town" class="form-select">
                        </select>
                        <label for="town" class="form-label">Xã/Phường</label>
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
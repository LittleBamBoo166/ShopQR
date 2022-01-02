<main class="py-5">
    <h1>
        <img src="Public\images\avatar\demo.jpg" width="100" height="100" class="img-thumbnail" alt="" srcset="">
    </h1>
    <div class="lead my-3 mx-5">
        <h2><?php echo $userInfo['HoTen']; ?></h2>
        <p class="lead"><?php 
        if ($userInfo['Role'] == 0) {
            echo "Chủ cửa hàng";
        } else {
            echo "Khách hàng";
        }
        ?></p>
        <div class="d-flex flex-row text-start">
            <div class="w-75 ps-5">
                <p>Ngày tháng năm sinh:</p>
                <!-- <p>Giới tính:</p> -->
                <p>Số điện thoại:</p>
                <p>Số hộ chiếu/CMND/CCCD:</p>
                <p>Thôn/Xóm/Số nhà:</p>
            </div>
            <div class="w-25">
                <p><?php
                    $date = strtotime($userInfo['NgaySinh']);
                    echo date('m/d/Y', $date); ?></p>
                <p><?php echo $userInfo['SDT']; ?></p>
                <p><?php echo $userInfo['CMND']; ?></p>
                <p><?php echo $userInfo['DiaChi']; ?></p>
            </div>
        </div>
        <hr>
        <div class="d-flex flex-row justify-content-between">
            <div>
                <p class="fs-6 sun">Tỉnh/Thành phố</p>
                <p id="idtt" data-address-id="<?php echo $addressInfoId['IdTinhThanh']; ?>">
                    <?php echo $addressInfo['TenTinhThanh']; ?>
                </p>
            </div>
            <div>
                <p class="fs-6 sun">Quận/Huyện</p>
                <p id="idqh" data-address-id="<?php echo $addressInfoId['IdQuanHuyen']; ?>"><?php echo $addressInfo['TenQuanHuyen']; ?></p>
            </div>
            <div>
                <p class="fs-6 sun">Xã/Phường</p>
                <p id="idpx" data-address-id="<?php echo $addressInfoId['IdPhuongXa']; ?>"><?php echo $addressInfo['TenPhuongXa']; ?></p>
            </div>
        </div>
        <hr>
        <div class="d-flex flex-row justify-content-between mt-4">
            <div>
                <a href="#" class="btn py-2 rounded bg-light" data-bs-toggle="modal" data-bs-target="#editAccount">
                    <i class="fas fa-pen me-2"></i> Chỉnh sửa thông tin cá nhân
                </a>
            </div>
            <div>
                <a href="?mod=login&act=touchHis" class="btn py-2 rounded bg-light">
                    <i class="fas fa-history me-2"></i> Lịch sử tiếp xúc
                </a>
            </div>
        </div>
    </div>
</main>
<div class="modal fade py-5" id="editAccount">
    <div class="modal-dialog modal-lg">
        <div class="modal-content text-dark">
            <div class="modal-header p-5 pb-5 border-bottom-0">
                <h2 class="fw-bold mb-0">Chỉnh sửa thông tin cá nhân</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form action="?mod=login&act=account&case=account-update" method="post">
                    <!-- <div class="form-floating mb-3"> -->
                    <select name="role" id="role" class="form-select mb-3">
                        <option value="0" selected>Chủ cửa hàng</option>
                        <option value="1">Khách hàng</option>
                    </select>
                    <!-- <label for="gender" class="form-label">Giới tính</label> -->
                    <!-- </div> -->
                    <!-- <div class="form-floating mb-3">
                        <input id="dob" type="date" name="dob" class="form-control">
                        <label for="logTel">Ngày tháng năm sinh</label>
                    </div> -->
                    <div class="form-floating mb-3">
                        <input id="tel" value="<?php echo $userInfo['SDT']; ?>" type="tel" name="tel" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" class="form-control">
                        <label for="tel">Số điện thoại</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="idNumber" value="<?php echo $userInfo['CMND']; ?>" type="text" name="idNumber" class="form-control">
                        <label for="logTel">Số hộ chiếu/CMND/CCCD</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="address" value="<?php echo $userInfo['DiaChi']; ?>" type="text" name="address" class="form-control">
                        <label for="logTel">Thôn/Xóm/Số nhà</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="pro" id="pro" class="form-select" onchange="quanhuyen(this)">
                            <option selected value="<?php echo $addressInfoId['IdTinhThanh']; ?>">
                                <?php echo $addressInfo['TenTinhThanh']; ?></option>
                        </select>
                        <label for="pro" class="form-label">Tỉnh/Thành phố</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="dis" id="dis" class="form-select" onchange="xaphuong(this)">
                            <option selected value="<?php echo $addressInfoId['IdQuanHuyen']; ?>">
                                <?php echo $addressInfo['TenQuanHuyen']; ?></option>
                        </select>
                        <label for="dis" class="form-label">Quận/Huyện</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="town" id="town" class="form-select">
                            <option selected value="<?php echo $addressInfoId['IdPhuongXa']; ?>">
                                <?php echo $addressInfo['TenPhuongXa']; ?></option>
                        </select>
                        <label for="town" class="form-label">Xã/Phường</label>
                    </div>
                    <button type="submit" class="w-100 btn btn-lg text-light btn-secondary fw-bold border-dark bg-dark">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>
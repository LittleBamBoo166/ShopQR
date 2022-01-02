<main class="py-5">
    <h1>
        <img src="Public\images\avatar\demo.jpg" width="100" height="100" class="img-thumbnail" alt="" srcset="">
    </h1>
    <div class="lead my-3">
        <h2><?php echo $_SESSION['login'][0]['HoTen']; ?></h2>
        <p class="lead">Lịch sử tiếp xúc</p>
        <?php if (count($touchHis) > 0) { ?>
            <div class="btn-toolbar mt-4 justify-content-center">
                <div class='input-group date' id='datetimepicker'>
                    <input type="date" class="form-control" id="calendar" name="calendar" oninput="touchHis(<?php echo $_SESSION['login'][0]['IdNguoiDung']; ?>)">
                </div>
            </div>
            <div class="table-container">
                <table class="table table-dark mt-4">
                    <thead class="fw-bold fs-6 sun">
                        <tr>
                            <td>Ngày</td>
                            <td>Thời gian</td>
                            <td>Người tiếp xúc</td>
                            <td>Địa chỉ</td>
                            <td>Số điện thoại</td>
                        </tr>
                    </thead>
                    <tbody id="touch">
                        <?php
                        foreach ($touchHis as $th) {
                            $idNguoiMua = $th['IdNguoiMua'];
                            $idNguoiBan = $th['IdNguoiBan'];
                            $date = strtotime($th['ThoiGian']); // timestamp
                            $parts = getdate($date);
                            $col1 = $parts['mday'] . "/" . $parts['mon'] . "/" . $parts['year'];
                            $col2 = $parts['hours'] . ":" . $parts['minutes'];
                            if (strcmp($_SESSION['login'][0]['IdNguoiDung'], $idNguoiBan) == 0) {
                                $nguoiTiepXuc = $userMd->getUserById($idNguoiMua);
                            } else {
                                $nguoiTiepXuc = $userMd->getUserById($idNguoiBan);
                            }
                            $col3 = $nguoiTiepXuc['HoTen'];
                            $add = $addMd->getAddress($nguoiTiepXuc['IdPhuongXa']);
                            $col4 = $nguoiTiepXuc['DiaChi'] . ", " . $add['TenPhuongXa'] . ", " . $add['TenQuanHuyen'] . ", " . $add['TenTinhThanh'];
                            $col5 = $nguoiTiepXuc['SDT'];
                        ?>
                            <tr>
                                <td><?php echo $col1; ?></td>
                                <td><?php echo $col2; ?></td>
                                <td><?php echo $col3; ?></td>
                                <td><?php echo $col4; ?></td>
                                <td><?php echo $col5; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <div class="table-container lead">
                <p><span class="fs-4 fw-bold sun">Oops!</span> Bạn chưa có một lịch sử tiếp xúc nào.</p>
                <img src="Public\images\s3.png" height="300" alt="">
                <p>Tiếp tục làm việc an toàn bạn nhé!</p>
            </div>
        <?php } ?>
    </div>
</main>
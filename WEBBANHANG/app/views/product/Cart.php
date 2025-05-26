<?php include 'app/views/shares/header.php'; ?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-4"><i class="fas fa-shopping-cart"></i> Giỏ hàng</h1>
        <a href="/webbanhang/Product" class="btn btn-outline-primary">
            <i class="fas fa-arrow-left"></i> Tiếp tục mua sắm
        </a>
    </div>

    <?php if (!empty($cart)): ?>
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" width="120">Ảnh</th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col" class="text-center">Đơn giá</th>
                            <th scope="col" class="text-center">Số lượng</th>
                            <th scope="col" class="text-center">Thành tiền</th>
                            <th scope="col" width="50"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $total = 0;
                        foreach ($cart as $id => $item): 
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        ?>
                        <tr>
                            <td>
                                <?php if ($item['image']): ?>
                                <img src="/webbanhang/<?php echo $item['image']; ?>" class="img-thumbnail" alt="<?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>">
                                <?php else: ?>
                                <div class="img-thumbnail d-flex align-items-center justify-content-center bg-light" style="width: 80px; height: 80px;">
                                    <i class="fas fa-image fa-2x text-muted"></i>
                                </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <h5 class="mb-1"><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h5>
                            </td>
                            <td class="text-center">
                                <?php echo number_format($item['price'], 0, ',', '.'); ?> VND
                            </td>
                            <td class="text-center">
                                <div class="input-group input-group-sm mx-auto" style="width: 100px;">
                                    <a href="/webbanhang/Product/decreaseCart/<?php echo $id; ?>" class="btn btn-outline-secondary">-</a>
                                    <input type="text" class="form-control text-center" value="<?php echo $item['quantity']; ?>" readonly>
                                    <a href="/webbanhang/Product/addToCart/<?php echo $id; ?>" class="btn btn-outline-secondary">+</a>
                                </div>
                            </td>
                            <td class="text-center fw-bold">
                                <?php echo number_format($subtotal, 0, ',', '.'); ?> VND
                            </td>
                            <td class="text-center">
                                <a href="/webbanhang/Product/removeFromCart/<?php echo $id; ?>" class="btn btn-sm btn-outline-danger" title="Xóa">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-end">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Tổng cộng</h5>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Tạm tính:</span>
                        <span class="fw-bold"><?php echo number_format($total, 0, ',', '.'); ?> VND</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Phí vận chuyển:</span>
                        <span class="fw-bold">0 VND</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="h5">Tổng tiền:</span>
                        <span class="h5 text-danger fw-bold"><?php echo number_format($total, 0, ',', '.'); ?> VND</span>
                    </div>
                    <a href="/webbanhang/Product/checkout" class="btn btn-danger btn-lg w-100">
                        <i class="fas fa-credit-card"></i> Thanh toán
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="text-center py-5">
        <div class="mb-4">
            <i class="fas fa-shopping-cart fa-5x text-muted"></i>
        </div>
        <h3 class="mb-3">Giỏ hàng của bạn đang trống</h3>
        <p class="text-muted mb-4">Hãy thêm sản phẩm vào giỏ hàng để bắt đầu mua sắm</p>
        <a href="/webbanhang/Product" class="btn btn-primary btn-lg">
            <i class="fas fa-store"></i> Mua sắm ngay
        </a>
    </div>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<style>
    .img-thumbnail {
        width: 80px;
        height: 80px;
        object-fit: cover;
    }
    .input-group .form-control {
        border-left: 0;
        border-right: 0;
    }
    .input-group .btn {
        border-radius: 0;
    }
</style>
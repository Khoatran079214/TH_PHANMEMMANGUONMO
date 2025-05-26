<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-4">Danh sách sản phẩm</h1>
        <a href="/webbanhang/Product/add" class="btn btn-success">
            <i class="fas fa-plus"></i> Thêm sản phẩm mới
        </a>
    </div>

    <div class="row">
        <?php foreach ($products as $product): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <?php if ($product->image): ?>
                <img src="/webbanhang/<?php echo $product->image; ?>" class="card-img-top product-image" alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>">
                <?php else: ?>
                <div class="card-img-top product-image bg-light d-flex align-items-center justify-content-center">
                    <i class="fas fa-image fa-3x text-muted"></i>
                </div>
                <?php endif; ?>
                
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" class="text-decoration-none text-dark">
                            <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    </h5>
                    <p class="card-text text-muted">
                        <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                    </p>
                    
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-info text-dark">
                            <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?>
                        </span>
                        <h5 class="text-danger fw-bold">
                            <?php echo number_format(htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'), 0, ',', '.'); ?> VND
                        </h5>
                    </div>
                </div>
                
                <div class="card-footer bg-white border-top-0">
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" class="btn btn-sm btn-outline-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                        <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-sm btn-primary">
                            <i class="fas fa-cart-plus"></i> Thêm vào giỏ
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    .product-image {
        height: 200px;
        object-fit: cover;
    }
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .badge {
        font-size: 0.9rem;
    }
</style>

<?php include 'app/views/shares/footer.php'; ?>
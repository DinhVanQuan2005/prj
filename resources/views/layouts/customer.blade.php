<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="store thời trang và mỹ phẩm" />
        <title>@yield('title')</title>
        <!-- Biểu tượng yêu thích của trang -->
        <!-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- CSS (cả Bootstrap) ở folder public/backend/-->
        <link href="public/backend/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">
                    <img src="https://files.oaiusercontent.com/file-NxJE2twPT2g9xw1TZ2CVEh?se=2024-12-22T11%3A10%3A06Z&sp=r&sv=2024-08-04&sr=b&rscc=max-age%3D604800%2C%20immutable%2C%20private&rscd=attachment%3B%20filename%3Dc5c0ebf9-da06-4169-94d3-90287d3cd907.webp&sig=fnP015y8Ox1mMetN0%2B6RP5cPa7sRHiKST8pxZn6ZqZQ%3D" alt="LOGO" width="50" />
                    Grow & Up
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <-- Nội dung thanh điều hướng -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    </ul>
                    <-- Thanh tìm kiếm sản phẩm -->
                    <form class="d-flex me-2">
                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                        <button class="btn btn-outline-dark" type="submit">Tìm</button>
                    </form>
                    <div class="dropdown">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                            Tài khoản
                       </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                            <li><a class="dropdown-item" href="#!">Thông tin tài khoản</a></li>
                            <li><a class="dropdown-item" href="#!">Giỏ hàng của tôi</a></li>
                            <li><a class="dropdown-item" href="#!">Đơn hàng</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a></li> <-- Thêm đường dẫn đăng xuất -->
                        </ul>
                 </div>
            </div>
        </nav>

        <header class="bg-dark py-5 text-center text-white">
            <div class="container px-4 px-lg-5">
                <h1 class="display-4 fw-bolder">Grow & Up</h1>
                <p class="lead fw-normal text-white-50 mb-0">Mang đến vẻ đẹp toàn diện</p>
            </div>
        </header>

        <!-- nội dung trang -->
        <main>
            <div id="bodyContainer">
                <?php echo $content; ?>
            </div>
        </main>
                        
        <footer class="py-5 bg-dark">
            <div class="container text-center text-white">
                <p>Cảm ơn vì chọn cửa hàng của chúng mình là nơi đặt chân và tìm hiểu để nâng tầm vẻ đẹp của bạn!</p>
                <p>&copy; 2024 Grow & Up</p>
            </div>
        </footer>
                        
        <!-- Bootstrap <JS> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- JS chính -->
        <script src="public/backend/js/scripts.js"></script>
    </body>
</html>

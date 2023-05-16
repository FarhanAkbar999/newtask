<nav class="navbar navbar-dark bg-dark fixed-top d-md-none d-block ">
    <div class="container-fluid">
        <a class="navbar-brand bg-dark text-white" href="#">All Users</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-white"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Sidebar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body bg-dark">
                <!-- <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                </ul> -->
                

                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                    <a href="#" class="nav-link text-white" aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                        <i class="fa-solid fa-house"></i>
                        Dashboard
                    </a>
                    </li>
                    <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                        <i class="fa-regular fa-newspaper"></i>
                        Catalog
                    </a>
                    </li>
                    <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                        <i class="fa-solid fa-blog"></i>
                        Blogs
                    </a>
                    </li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                        <i class="fa-regular fa-paste"></i>
                        Pages
                    </a>
                    </li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                        <i class="fa-regular fa-credit-card"></i>
                        Payments
                    </a>
                    </li>
                    <li>
                    <a href="/" class="nav-link text-white" data-bs-target="#target" data-bs-toggle="collapse">
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                        <i class="fa-solid fa-user"></i>
                        User
                    </a>
                    <ul class="collapse list-unstyled ms-5" id="target">
                        <li><a class="link-dark d-inline-flex text-decoration-none rounded text-white" href="/userdetails"><i class="fa-regular fa-square-plus"></i>user details</a></li>
                        
                    </ul>
                    </li>      
                </ul> 
            </div>
        </div>
    </div>
</nav>


<div class="row bg-dark m-2 p-2 text-white">
    All Users      
</div>
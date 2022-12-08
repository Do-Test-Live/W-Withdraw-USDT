<!--**********************************
       Sidebar start
   ***********************************-->
<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="dropdown header-profile">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                    <?php $data = $db_handle->runQuery("SELECT * FROM admin_login where id={$_SESSION['userid']}"); ?>
                    <img src="../<?php echo $data[0]["image"]; ?>" width="20" alt=""/>
                    <div class="header-info ms-3">
                        <span class="font-w600 "><b><?php echo $data[0]["name"]; ?></b></span>
                        <small class="text-end font-w400"><?php echo $data[0]["email"]; ?></small>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="Profile" class="dropdown-item ai-icon">
                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18"
                             height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span class="ms-2">Profile </span>
                    </a>
                    <a href="Logout" class="dropdown-item ai-icon">
                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
                             height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                        <span class="ms-2">Logout </span>
                    </a>
                </div>
            </li>
            <li>
                <a class="ai-icon" href="Dashboard" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-041-graph"></i>
                    <span class="nav-text">Category</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="Add-Category">Add Category</a></li>
                    <li><a href="Category">Category</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-050-info"></i>
                    <span class="nav-text">Store</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="Add-Store">Add Store</a></li>
                    <li><a href="Store">Store</a></li>
                    <li><a href="Rating-Store">Store Rating</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-086-star"></i>
                    <span class="nav-text">Trending Deal</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="Add-Trending-Deal">Add Trending Deal</a></li>
                    <li><a href="Trending-Deal">Trending Deal</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-045-heart"></i>
                    <span class="nav-text">Offer</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="Add-Offer">Add Offer</a></li>
                    <li><a href="Offer">Offer</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)" class="has-arrow ai-icon" aria-expanded="false">
                    <i class="flaticon-013-checkmark"></i>
                    <span class="nav-text">Store Offer</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="Data-Add-Offer">Add Store Offer</a></li>
                    <li><a href="Data-Offer">Store Offer</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-022-copy"></i>
                    <span class="nav-text">Blog Category</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="Add-Blog-Category">Add Blog Category</a></li>
                    <li><a href="Blog-Category">Blog Category</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-072-printer"></i>
                    <span class="nav-text">Blog</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="Add-Blog">Add Blog</a></li>
                    <li><a href="Blog">Blog</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-043-menu"></i>
                    <span class="nav-text">Others</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="Newsletter">Newsletter</a></li>
                    <li><a href="Admin">Admin</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->

<style>
body {
    background: linear-gradient(to right, #d4eaff, #f3e7ff);
    font-family: 'Inter', sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
    animation: fadeIn 0.8s ease-in-out;
}

/* Hiệu ứng mở trang */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

.card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    animation: slideUp 0.6s ease-in-out;
    padding: 20px;
    transition: transform 0.3s ease-in-out;
}

@keyframes slideUp {
    from { transform: translateY(20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.card:hover {
    transform: scale(1.02);
}

/* Header */
.card-header {
    background: linear-gradient(to right, #7bc6ff, #b39cff);
    color: white;
    font-size: 1.5rem;
    font-weight: bold;
    text-align: center;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    padding: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
}

/* Bảng câu hỏi */
.table {
    border-radius: 10px;
    overflow: hidden;
    width: 100%;
    background: rgba(255, 255, 255, 0.9);
}

.table th {
    background: linear-gradient(to right, #b39cff, #7bc6ff) !important;
    color: #fff;
    padding: 14px;
    text-align: center;
    font-size: 1.1rem;
}

.table td {
    padding: 14px;
    text-align: center;
    color: #333;
    font-weight: 500;
    transition: background 0.3s ease-in-out;
}

.table-hover tbody tr:hover {
    background: rgba(255, 255, 255, 0.6);
    transform: scale(1.02);
    transition: all 0.3s ease-in-out;
}

/* Nút bấm */
.btn-primary {
    background: linear-gradient(to right, #7bc6ff, #b39cff);
    border: none;
    transition: all 0.3s ease-in-out;
    padding: 12px 16px;
    border-radius: 10px;
    font-size: 1rem;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    font-weight: 600;
}

/* Hiệu ứng nút bấm nhún */
.btn-primary:active {
    transform: scale(0.95);
}

.btn-primary:hover {
    background: linear-gradient(to right, #b39cff, #7bc6ff);
    transform: scale(1.05);
}

/* Header chính */
.dashboard-header {
    font-size: 2rem;
    font-weight: bold;
    color: #4b4b4b;
    text-align: center;
    margin-bottom: 20px;
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
}

/* Hiệu ứng khi chuyển trang */
@keyframes fadeInScale {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}

.content {
    animation: fadeInScale 0.6s ease-in-out;
}
</style>
<div class="app-main__outer">
    <div id="refreshData">
    <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-car icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Analytics Dashboard
                            <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                            </div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                            <i class="fa fa-star"></i>
                        </button>
                        <div class="d-inline-block dropdown">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-business-time fa-w-20"></i>
                                </span>
                                Buttons
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            <i class="nav-link-icon lnr-inbox"></i>
                                            <span>
                                                Inbox
                                            </span>
                                            <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            <i class="nav-link-icon lnr-book"></i>
                                            <span>
                                                Book
                                            </span>
                                            <div class="ml-auto badge badge-pill badge-danger">5</div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            <i class="nav-link-icon lnr-picture"></i>
                                            <span>
                                                Picture
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a disabled href="javascript:void(0);" class="nav-link disabled">
                                            <i class="nav-link-icon lnr-file-empty"></i>
                                            <span>
                                                File Disabled
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>   
                 </div>
            </div>            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-midnight-bloom">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Total Course</div>
                                <div class="widget-subheading" style="color:transparent;">.</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    <span><?php echo $totalCourse = $selCourse['totCourse']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-arielle-smile">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Total Exam</div>
                                <div class="widget-subheading" style="color:transparent;">.</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    <span><?php echo $totalCourse = $selExam['totExam']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-grow-early">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Total Examinee</div>
                                <div class="widget-subheading" style="color:transparent;">.</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>46%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-premium-dark">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Products Sold</div>
                                <div class="widget-subheading">Revenue streams</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-warning"><span>$14M</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Total Orders</div>
                                    <div class="widget-subheading">Last year expenses</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-success">1896</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Products Sold</div>
                                    <div class="widget-subheading">Revenue streams</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-warning">$3M</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Followers</div>
                                    <div class="widget-subheading">People Interested</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-danger">45,9%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Income</div>
                                    <div class="widget-subheading">Expected totals</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-focus">$147</div>
                                </div>
                            </div>
                            <div class="widget-progress-wrapper">
                                <div class="progress-bar-sm progress-bar-animated-alt progress">
                                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
                                </div>
                                <div class="progress-sub-label">
                                    <div class="sub-label-left">Expenses</div>
                                    <div class="sub-label-right">100%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <?php include("includes/graph.php"); ?> -->
      
        
        </div>
         
    </div>

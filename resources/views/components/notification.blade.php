<div class="right-sidebar" id="notifications">
    <div class="right-sidebar-header">
        <span class="right-sidebar-title">Thông báo</span>
        <a data-right-sidebar="settings" title="Settings" href="#">
            <i class="mdi mdi-cog"></i>
        </a>
        <a href="#" class="right-sidebar-close">
            <i class="mdi mdi-close"></i>
        </a>
    </div>
    <div class="right-sidebar-content">
        <ul class="list-group list-group-flush list-notify" ng-repeat="notify in listNotify">
            <li class="list-group-item py-3 px-0 d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <figure class="avatar avatar-state-warning mr-3">
                            <span class="avatar-title bg-info-bright text-info rounded-circle">
                                <i class="ti-user"></i>
                            </span>
                    </figure>
                    <div>
                        <div>
                            <span class="text-primary">Phạm Hùng</span> đã gửi kb! <br>
                            👉xin chào bạn hiện
                        </div>
                        <span class="text-muted small">
                                <i class="mdi mdi-clock-outline small mr-1"></i> 16:24 12-7-2020
                            </span>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" data-toggle="dropdown">
                        <i class="mdi mdi-dots-horizontal"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">Xóa</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

<div class="modal fade" id="intiveUsers" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="mdi mdi-account-plus-outline"></i> Thêm bạn bè
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <div class="form-group">
                        <label for="invite_emails" class="col-form-label">Địa chỉ email</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" ng-model="email" id="invite_emails"
                                   placeholder="Email...">
                            <div class="input-group-append">
                                <button ng-click="searchFriend()" type="button" class="btn btn-success">
                                    <i class="mdi mdi-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="invite_topic" class="col-form-label">Lời mở đẩu</label>
                        <input type="text" class="form-control" ng-model="message" id="invite_topic"
                               placeholder="Viết gì đó về bạn....">
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Người dùng</span>
                    <span class="text-muted small">Tổng 6 người dùng</span>
                </div>
                <hr>
                <div>
                    <ul class="list-group list-group-unlined">
                        <li class="list-group-item px-0 d-flex">
                            <figure class="avatar mr-3">
                                <img src="" class="rounded-circle" alt="image">
                            </figure>
                            <div>
                                <div>Phạm Văn Hùng</div>
                                <div class="small text-muted">azhung08102004@@gmail.com</div>
                            </div>
                            <button type="button"
                                    class="text-danger btn text-center d-flex align-items-center ml-auto"
                                    data-toggle="tooltip" title="Delete" href="#">
                                <i class="mdi mdi-delete-outline border"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Thêm bạn bè</button>
            </div>
        </form>
    </div>
</div>

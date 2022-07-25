<template>
    <!-- Page Content -->
    <div class="content bookmark">
        <div class="container-fluid">
            <div class="row">

                <!-- sidebar -->
                <Sidebar />
                <!-- /sidebar -->

                <div class="col-xl-7 col-md-7">
                    <div class="d-flex justify-content-center">
                        <!-- project list -->
                        <div class="col-12 my-projects-view">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="card-title">Bookmarked Freelancers</h5>
                                                <a data-bs-toggle="modal" href="#bookmark" class="btn btn-primary btn-invite">
                                                    Add
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive table-box">
                                                <table class="table table-hover table-center mb-0 datatable">
                                                    <thead class="thead-pink">
                                                    <tr>
                                                        <th>Empolyee</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="freelancer-profile.html" class="avatar avatar-md tab-imgcircle me-2">
                                                                    <img class="avatar-img rounded-circle" src="/web/img/img-02.jpg" alt="User Image">
                                                                </a>
                                                                <a href="freelancer-profile.html">
                                                                    <span class="profile-name">Andrew Glover</span><span>Software Developer</span>
                                                                </a>
                                                            </h2>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="table-action">
                                                                <div class="action">
                                                                    <a data-bs-toggle="modal" href="#edit-empolyee"  class="file-circle me-2"><i class="fas fa-pen"></i></a>
                                                                    <a href="javascript:void(0);" class="file-circle"><i class="fas fa-trash-alt"></i></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- project list -->
                    </div>
                </div>
            </div>
        </div>

        <!-- The Modal ADD-->
        <div class="modal fade" id="bookmark">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">ADD EMPLOYEE</h4>
                        <span class="modal-close"><a href="#" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle orange-text"></i></a></span>
                    </div>
                    <div class="modal-body">
                        <form action="invited-freelancer.html">
                            <div class="modal-info">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name (Arbic)</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name (English)</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Job Name (Arbic)</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Job Name (English)</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-row pro-pad pt-0">
                                        <div class="form-group col-md-6 pro-pic">
                                            <label>Profile Picture</label>
                                            <div class="d-flex align-items-center">
                                                <div class="upload-images">
                                                    <img src="/web/img/img-02.jpg" alt="Image">
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                                </div>
                                                <label class="file-upload image-upbtn ms-3">
                                                    Change Image <input type="file">
                                                </label>
                                            </div>
                                            <p>Image size 300*300</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="submit-section text-end">
                                <button type="submit" class="btn btn-primary submit-btn">Send Invite</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /The Modal -->

        <!-- The Modal EDIT-->
        <div class="modal fade" id="edit-empolyee">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit EMPLOYEE</h4>
                        <span class="modal-close"><a href="#" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle orange-text"></i></a></span>
                    </div>
                    <div class="modal-body">
                        <form action="invited-freelancer.html">
                            <div class="modal-info">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name (Arbic)</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name (English)</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Job Name (Arbic)</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Job Name (English)</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-row pro-pad pt-0">
                                        <div class="form-group col-md-6 pro-pic">
                                            <label>Profile Picture</label>
                                            <div class="d-flex align-items-center">
                                                <div class="upload-images">
                                                    <img src="/web/img/img-02.jpg" alt="Image">
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                                </div>
                                                <label class="file-upload image-upbtn ms-3">
                                                    Change Image <input type="file">
                                                </label>
                                            </div>
                                            <p>Image size 300*300</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="submit-section text-end">
                                <button type="submit" class="btn btn-primary submit-btn">Send Invite</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content edit -->
</template>

<script>
import Sidebar from "../../../components/web/sidebar";

export default {
    name: "companyEmpolyee",
    setup(){

        return {};
    },
    components: {
        Sidebar
    }
}
</script>

<style scoped>
.content {
    padding: 200px 0 30px;
    position: relative;
    min-height: 100vh;
}
</style>

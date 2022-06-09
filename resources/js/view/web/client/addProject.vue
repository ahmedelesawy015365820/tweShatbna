<template>
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- sidebar -->
                <Sidebar />
                <!-- /sidebar -->
                <div class="col-xl-9 col-md-8">
                    <div class="select-project mb-4">
                        <form>
                            <div class="title-box widget-box">

                                <!-- Project Title -->
                                <div class="title-content">
                                    <div class="title-detail">
                                        <h3>Project Name</h3>
                                        <div class="form-group mb-0">
                                            <input type="text" class="form-control" placeholder="Enter Project title">
                                        </div>
                                    </div>
                                </div>
                                <!-- /Project Title -->

                                <!-- Category Content -->
                                <div class="title-content">
                                    <div class="title-detail">
                                        <h3>Category Type</h3>
                                        <div class="form-group mb-0">
                                            <select  class="form-control select">
                                                <option value="0">Select</option>
                                                <option value="1" >Apps Development</option>
                                                <option value="2">UI Development</option>
                                                <option value="3">Jaa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Category Content -->

                                <!-- Price Content -->
                                <div class="title-content">
                                    <div class="title-detail">
                                        <h3>Pricing Type</h3>
                                        <div class="form-group price-cont mb-0" id="price_type">
                                            <select name="price" class="form-control select">
                                                <option value="0">Select</option>
                                                <option value="1" >Fixed Budget Price</option>
                                                <option value="2">Hourly Pricing</option>
                                                <option value="3">Biding Price</option>
                                            </select>
                                        </div>
                                        <div class="form-group mt-3" id="price_id" style="display: none;">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-white dropdown-toggle" data-bs-toggle="dropdown">$</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Dollars</a>
                                                        <a class="dropdown-item" href="#">Euro</a>
                                                        <a class="dropdown-item" href="#">Bitcoin</a>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="20.00">
                                            </div>
                                        </div>
                                        <div class="form-group mt-3" id="hour_id" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-6 mb-2">
                                                    <div class="input-group form-inline">
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="btn btn-white dropdown-toggle" data-bs-toggle="dropdown">$</button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">Dollars</a>
                                                                <a class="dropdown-item" href="#">Euro</a>
                                                                <a class="dropdown-item" href="#">Bitcoin</a>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control mr-2" placeholder="20.00"> <label> / hr</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group form-inline">
                                                        <label>For </label> <input type="text" class="form-control ml-2" placeholder=" ( eg: 2 Weeks)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Price Content -->

                                <!-- Skills Content -->
                                <div class="title-content">
                                    <div class="title-detail">
                                        <h3>Desired areas of expertise </h3>
                                        <div class="form-group mb-0">
                                            <input type="text" data-role="tagsinput" class="input-tags form-control" name="services" value="Web Design" id="services" placeholder="UX, UI, App Design, Wireframing, Branding">
                                            <p class="text-muted mb-0">Enter skills for needed for project</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Skills Content -->

                                <!-- Project Period Content -->
                                <div class="title-content">
                                    <div class="title-detail">
                                        <h3>Period of Project</h3>
                                        <div class="form-group mb-0" id="pro_period">
                                            <div class="radio">
                                                <label class="custom_radio">
                                                    <input type="radio" value="period" name="period">
                                                    <span class="checkmark"></span>  Start  immediately  after the  candidate is selected
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label class="custom_radio">
                                                    <input type="radio" value="job" name="period" checked>
                                                    <span class="checkmark"></span>  Job will Start On
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="filter-widget mb-0" id="period_date">
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control datetimepicker" placeholder="Select Date">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Project Period Content -->

                                <!-- /Add Document -->
                                <div class="title-content">
                                    <div class="title-detail">
                                        <h3>Add Documents</h3>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input">
                                            <label class="custom-file-label"></label>
                                        </div>
                                        <p class="mb-0">Size of the Document should be Below 2MB</p>
                                    </div>
                                </div>
                                <!-- /Add Document -->

                                <!-- Add Links -->
                                <div class="title-content">
                                    <div class="title-detail">
                                        <h3>Add Links</h3>
                                        <div class="links-info">
                                            <div class="row form-row links-cont">
                                                <div class="col-12 col-md-11">
                                                    <div class="form-group mb-0">
                                                        <input type="text" class="form-control">
                                                        <p class="mb-0">Add Reference links if any</p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-1">
                                                    <a href="javascript:void(0);" class="btn add-links"><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Add Links -->

                                <!-- Project Title -->
                                <div class="title-content pb-0">
                                    <div class="title-detail">
                                        <h3>Write Description of Projects </h3>
                                        <div class="form-group mb-0">
                                            <textarea class="form-control summernote" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Project Title -->

                                <div class="row">
                                    <div class="col-md-12 text-end">
                                        <div class="btn-item">
                                            <button type="submit" class="btn next-btn">Submit</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Project Title -->

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
</template>

<script>
import Sidebar from "../../../components/web/sidebar";

export default {
    name: "addProject",
    components: {
        Sidebar
    },
    beforeRouteEnter(to, from,next) {
        let trust = parseInt(JSON.parse(localStorage.getItem('partner')).trust);
        if(trust){
            return next();
        }else{
            return next({name:'dashboardClient',params:{lang:localStorage.getItem('langWeb') || 'ar'}});
        }
    }
}
</script>

<style scoped>

</style>

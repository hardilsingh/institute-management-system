<div class="sidebar" data-color="black" data-active-color="danger">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo myDIV">
        <!-- <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="/img/logo.png">
            </div>
        </a> -->
        <a href="http://cbainfotech.com" class="simple-text logo-normal">
            <div class="logo-image-big">
                <img src="/img/logo.png">
            </div>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li>
                <a href="/admin">
                    <i class="fas fa-user-shield"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="/enquiry">
                    <i class="fas fa-question"></i>
                    <p>Enquiries</p>
                </a>
            </li>
            <li>
                <a href="/students">
                    <i class="fas fa-user-graduate"></i>
                    <p>Students</p>
                </a>
            </li>



            <li>
                <a href="{{route('course.index')}}">
                    <i class="fas fa-book"></i>
                    <p>Courses</p>
                </a>
            </li>
            <li>
                <a href="/feemanager">
                    <i class="fas fa-rupee-sign"></i>
                    <p>Fee Manager</p>
                </a>
            </li>
            <li class="">
                <a href="/profile">
                    <i class="fas fa-user-circle"></i>
                    <p>Search Profile</p>
                </a>
            </li>
            <li class="">
                <a href="/searchenquiry">
                    <i class="nc-icon nc-bank"></i>
                    <p>Search Enquiry</p>
                </a>
            </li>

        </ul>
    </div>

</div>
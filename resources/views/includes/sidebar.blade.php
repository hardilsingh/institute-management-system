<div class="sidebar" data-color="red" data-active-color="danger">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo myDIV">
        <!-- <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="/img/logo.png">
            </div>
        </a> -->
        <a href="/admin" class="simple-text logo-normal">
            <div class="logo-image-big">
                <img src="/img/logo.png">
            </div>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li>
                <a href="{{route('admin.index')}}">
                    <i class="fas fa-user-shield"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{route('enquiry.index')}}">
                    <i class="fas fa-question"></i>
                    <p>Enquiries</p>
                </a>
            </li>
            <li>
                <a href="{{route('students.index')}}">
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
                <a href="{{route('feemanager.index')}}">
                    <i class="fas fa-rupee-sign"></i>
                    <p>Fee Manager</p>
                </a>
            </li>
            <li>
                <a href="{{route('invoice.index')}}">
                    <i class="fas fa-receipt"></i>
                    <p>Reciepts</p>
                </a>
            </li>
            <li class="">
                <a href="{{route('profile.index')}}">
                    <i class="fas fa-user-circle"></i>
                    <p>Search Profile</p>
                </a>
            </li>
            <li class="">
                <a href="{{route('searchenquiry.index')}}">
                    <i class="nc-icon nc-bank"></i>
                    <p>Search Enquiry</p>
                </a>
            </li>
            <li class="">
                <a href="{{route('inventory.index')}}">
                    <i class="fas fa-cogs"></i>
                    <p>Inventory</p>
                </a>
            </li>
            <li class="">
                <a href="{{route('docs.index')}}">
                    <i class="fas fa-file-alt"></i>
                    <p>Issued Docs</p>
                </a>
            </li>
            <li class="">
                <a href="{{route('bulk_sms.index')}}">
                    <i class="fas fa-sms"></i>
                    <p>Bulk SMS</p>
                </a>
            </li>
            <li class="">
                <a href="{{route('books.index')}}">
                    <i class="fas fa-atlas"></i>
                    <p>Books</p>
                </a>
            </li>

        </ul>
    </div>

</div>
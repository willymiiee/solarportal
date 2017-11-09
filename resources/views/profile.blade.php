@extends('layouts.main')

@section('style')
<style>
/* Style the tab */
div.tab {
    float: left;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    width: 30%;
    height: 300px;
}

/* Style the buttons inside the tab */
div.tab button {
    display: block;
    background-color: inherit;
    color: black;
    padding: 22px 16px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current "tab button" class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    float: left;
    padding: 0px 12px;
    border: 1px solid #ccc;
    width: 70%;
    border-left: none;
    height: 300px;
}
</style>
@endsection

@section('menu')
@include('includes.frontend.menu', ['menus' => $data['menu']])
@endsection

@section('content')
<!--Page Section Start-->
<section class="tl-properties-section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'profile')">Profile</button>
                    <button class="tablinks" onclick="openCity(event, 'reset-password')">Reset Password</button>
                </div>

                <div id="profile" class="tabcontent">
                    <h3>Profile</h3>
                    <p>London is the capital city of England.</p>
                </div>

                <div id="reset-password" class="tabcontent">
                    <h3>Reset Password</h3>
                    <p>Paris is the capital of France.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Page Section End-->
@endsection

@section('script')
<script>
    function openCity(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the link that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

</script>
@endsection
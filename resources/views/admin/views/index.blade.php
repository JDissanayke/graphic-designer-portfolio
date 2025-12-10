@extends('admin.adminlayout.admin')

@section('title', 'Dashboard')

@section('content')


<div class="container-fluid pt-4 px-4">


    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <!-- Today User -->
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Today User</p>
                        <h6 class="mb-0">{{ $todayUsersCount }}</h6>
                    </div>
                </div>
            </div>

            <!-- Total Post -->
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Post</p>
                        <h6 class="mb-0">{{ $totalPostsCount }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

@endsection

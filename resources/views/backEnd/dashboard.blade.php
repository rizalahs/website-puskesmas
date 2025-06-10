@extends('layouts.backEnd.app')

@section('title')
{{ A_DASHBOARD }}
@endsection

@section('content')
<!-- Begin Page Content -->
	<div class="container-fluid">

	  <!-- Page Heading -->
	  <div class="d-sm-flex align-items-center justify-content-between mb-4">
	    <h1 class="h3 mb-0 text-gray-800">{{ A_DASHBOARD }}</h1>
	  </div>

	  <!-- Content Row -->
	  <div class="row">
	    <!-- Earnings (Monthly) Card Example -->
	    <div class="col-xl-4 col-md-6 mb-4">
	      <div class="card border-left-primary shadow h-100 py-2">
	        <div class="card-body">
	          <div class="row no-gutters align-items-center">
	            <div class="col mr-2">
	              <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
					  {{ A_TOTAL_NEWS_CATEGORIES }}
				  </div>
	              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count_categories }}</div>
	            </div>
	            <div class="col-auto">
	              <i class="fas fa-arrows-alt fa-2x text-gray-300"></i>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	    <!-- Earnings (Monthly) Card Example -->
	    <div class="col-xl-4 col-md-6 mb-4">
	      <div class="card border-left-success shadow h-100 py-2">
	        <div class="card-body">
	          <div class="row no-gutters align-items-center">
	            <div class="col mr-2">
	              <div class="text-sm font-weight-bold text-success text-uppercase mb-1">
				  	{{ A_TOTAL_NEWS }}
				  </div>
	              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count_news }}</div>
	            </div>
	            <div class="col-auto">
	              <i class="fas fa-book-open fa-2x text-gray-300"></i>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	    <!-- Earnings (Monthly) Card Example -->
	    <div class="col-xl-4 col-md-6 mb-4">
	      <div class="card border-left-info shadow h-100 py-2">
	        <div class="card-body">
	          <div class="row no-gutters align-items-center">
	            <div class="col mr-2">
	              <div class="text-sm font-weight-bold text-info text-uppercase mb-1">{{ A_TOTAL_EVENTS }}</div>
	              <div class="row no-gutters align-items-center">
	                <div class="col-auto">
	                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $count_events }}</div>
	                </div>
	              </div>
	            </div>
	            <div class="col-auto">
	              <i class="fas fa-receipt fa-2x text-gray-300"></i>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>


	    <!-- Earnings (Monthly) Card Example -->
	    <div class="col-xl-4 col-md-6 mb-4">
	      <div class="card border-left-primary shadow h-100 py-2">
	        <div class="card-body">
	          <div class="row no-gutters align-items-center">
	            <div class="col mr-2">
	              <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">{{ A_TOTAL_TEAM_MEMBERS }}</div>
	              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count_team_members }}</div>
	            </div>
	            <div class="col-auto">
	              <i class="fas fa-user-friends fa-2x text-gray-300"></i>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	    <!-- Earnings (Monthly) Card Example -->
	    <div class="col-xl-4 col-md-6 mb-4">
	      <div class="card border-left-success shadow h-100 py-2">
	        <div class="card-body">
	          <div class="row no-gutters align-items-center">
	            <div class="col mr-2">
	              <div class="text-sm font-weight-bold text-success text-uppercase mb-1">{{ A_TOTAL_CLIENTS }}</div>
	              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count_clients }}</div>
	            </div>
	            <div class="col-auto">
	              <i class="fas fa-user-tie fa-2x text-gray-300"></i>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	    <!-- Earnings (Monthly) Card Example -->
	    <div class="col-xl-4 col-md-6 mb-4">
	      <div class="card border-left-info shadow h-100 py-2">
	        <div class="card-body">
	          <div class="row no-gutters align-items-center">
	            <div class="col mr-2">
	              <div class="text-sm font-weight-bold text-info text-uppercase mb-1">{{ A_TOTAL_SERVICES }}</div>
	              <div class="row no-gutters align-items-center">
	                <div class="col-auto">
	                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $count_services }}</div>
	                </div>
	              </div>
	            </div>
	            <div class="col-auto">
	              <i class="fas fa-cubes fa-2x text-gray-300"></i>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>


	    <!-- Earnings (Monthly) Card Example -->
	    <div class="col-xl-4 col-md-6 mb-4">
	      <div class="card border-left-primary shadow h-100 py-2">
	        <div class="card-body">
	          <div class="row no-gutters align-items-center">
	            <div class="col mr-2">
	              <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">{{ A_TOTAL_TESTIMONIALS }}</div>
	              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count_testimonials }}</div>
	            </div>
	            <div class="col-auto">
	              <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	    <!-- Earnings (Monthly) Card Example -->
	    <div class="col-xl-4 col-md-6 mb-4">
	      <div class="card border-left-success shadow h-100 py-2">
	        <div class="card-body">
	          <div class="row no-gutters align-items-center">
	            <div class="col mr-2">
	              <div class="text-sm font-weight-bold text-success text-uppercase mb-1">{{ A_TOTAL_PHOTOS }}</div>
	              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count_photo_galleries }}</div>
	            </div>
	            <div class="col-auto">
	              <i class="fas fa-camera fa-2x text-gray-300"></i>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	    <!-- Earnings (Monthly) Card Example -->
	    <div class="col-xl-4 col-md-6 mb-4">
	      <div class="card border-left-info shadow h-100 py-2">
	        <div class="card-body">
	          <div class="row no-gutters align-items-center">
	            <div class="col mr-2">
	              <div class="text-sm font-weight-bold text-info text-uppercase mb-1">{{ A_TOTAL_PRICING_TABLES }}</div>
	              <div class="row no-gutters align-items-center">
	                <div class="col-auto">
	                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $count_pricing_tables }}</div>
	                </div>
	              </div>
	            </div>
	            <div class="col-auto">
	              <i class="fas fa-table fa-2x text-gray-300"></i>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	  </div>
	</div>
<!-- /.container-fluid -->
@endsection
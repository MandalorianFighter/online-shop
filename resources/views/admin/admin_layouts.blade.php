<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Meta -->
    <meta name="description" content="Admin Dashboard For OneSport E-Commerce">
    <meta name="author" content="OneSport Company">

    <title>Starlight Admin Panel For OneSport Ecommerce</title>
    @livewireStyles
    @vite('resources/js/admin-panel.js')
  </head>

  <body>

  @guest

  @else
  <!-- ########## START: LEFT PANEL ########## -->
  <div class="sl-logo"><a href="{{ route('admin.dashboard') }}"><i class="icon ion-android-star-outline"></i> starlight</a></div>
    <div class="sl-sideleft">
            
      <div class="sl-sideleft-menu">
        <div class="scrollable-content">
          <a href="{{ route('admin.dashboard') }}" class="sl-menu-link active">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
              <span class="menu-item-label">{{ __('Dashboard') }}</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->

          @if(auth()->user()->category == 1)
          <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
              <span class="menu-item-label">{{ __('Category') }}</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link">{{ __('Category') }}</a></li>
            <li class="nav-item"><a href="{{ route('subcategories.index') }}" class="nav-link">{{ __('SubCategory') }}</a></li>
            <li class="nav-item"><a href="{{ route('brands.index') }}" class="nav-link">{{ __('Brand') }}</a></li>
          </ul>
          @endif
          @if(auth()->user()->coupon == 1)
          <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
              <span class="menu-item-label">{{ __('Coupons') }}</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('coupons.index') }}" class="nav-link">{{ __('Coupon') }}</a></li>
          </ul>
          @endif
          @if(auth()->user()->product == 1)
          <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
              <span class="menu-item-label">{{ __('Products') }}</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('products.create') }}" class="nav-link">{{ __('Add Product') }}</a></li>
            <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link">{{ __('All Products') }}</a></li>
          </ul>
          @endif

          @if(auth()->user()->stock == 1)
          <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
              <span class="menu-item-label">{{ __('Product Stocks') }}</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('products.stock') }}" class="nav-link">{{ __('Stock') }}</a></li>
          </ul>
          @endif

          @if(auth()->user()->orders == 1)
          <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
              <span class="menu-item-label">{{ __('Orders') }}</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.new_orders') }}" class="nav-link">{{ __('New Orders') }}</a></li>
            <li class="nav-item"><a href="{{ route('admin.accept_payment_orders') }}" class="nav-link">{{ __('Accept Payment') }}</a></li>
            <li class="nav-item"><a href="{{ route('admin.canceled_orders') }}" class="nav-link">{{ __('Canceled Orders') }}</a></li>
            <li class="nav-item"><a href="{{ route('admin.process_delivery_orders') }}" class="nav-link">{{ __('Process Delivery') }}</a></li>
            <li class="nav-item"><a href="{{ route('admin.delivery_success_orders') }}" class="nav-link">{{ __('Delivery Success') }}</a></li>
          </ul>
          @endif

          @if(auth()->user()->return_orders == 1)
          <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
              <span class="menu-item-label">{{ __('Orders Return') }}</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.return_requests') }}" class="nav-link">{{ __('Return Requests') }}</a></li>
            <li class="nav-item"><a href="{{ route('admin.all_returns') }}" class="nav-link">{{ __('All Requests') }}</a></li>
          </ul>
          @endif

          @if(auth()->user()->report == 1)
          <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
              <span class="menu-item-label">{{ __('Reports') }}</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.today_orders') }}" class="nav-link">{{ __('Today`s Orders') }}</a></li>
            <li class="nav-item"><a href="{{ route('admin.today_deliveries') }}" class="nav-link">{{ __('Today`s Deliveries') }}</a></li>
            <li class="nav-item"><a href="{{ route('admin.this_month') }}" class="nav-link">{{ __('This Month') }}</a></li>
            <li class="nav-item"><a href="{{ route('admin.filter_reports') }}" class="nav-link">{{ __('Filter Reports') }}</a></li>
          </ul>
          @endif
          @if(auth()->user()->role == 1)
          <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
              <span class="menu-item-label">{{ __('User Roles') }}</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('admins.create') }}" class="nav-link">{{ __('Create User') }}</a></li>
            <li class="nav-item"><a href="{{ route('admins.index') }}" class="nav-link">{{ __('All Users') }}</a></li>
          </ul>
          @endif
          
          @if(auth()->user()->blog == 1)
          <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
              <span class="menu-item-label">{{ __('Blog') }}</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('blog-categories.index') }}" class="nav-link">{{ __('Blog Categories') }}</a></li>
            <li class="nav-item"><a href="{{ route('posts.create') }}" class="nav-link">{{ __('Add Post') }}</a></li>
            <li class="nav-item"><a href="{{ route('posts.index') }}" class="nav-link">{{ __('Articles List') }}</a></li>
          </ul>
          @endif
          
          @if(auth()->user()->contact == 1)
          <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
              <span class="menu-item-label">{{ __('Contact Messages') }}</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('messages.index') }}" class="nav-link">{{ __('All Messages') }}</a></li>
          </ul>
          @endif
          
          @if(auth()->user()->setting == 1)
          <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
              <span class="menu-item-label">{{ __('Settings') }}</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          @if($contact)
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('contacts.edit', $contact) }}" class="nav-link">{{ __('Company Info') }}</a></li>
          </ul>
          @else
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('contacts.create') }}" class="nav-link">{{ __('Company Info') }}</a></li>
          </ul>
          @endif
          @endif
          @if(auth()->user()->other == 1)
          <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
              <span class="menu-item-label">{{ __('Others') }}</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('newsletters.index') }}" class="nav-link">{{ __('Newsletters') }}</a></li>
            <li class="nav-item"><a href="{{ route('admin.seo.index') }}" class="nav-link">{{ __('SEO Settings') }}</a></li>
          </ul>
          @endif
        </div>
      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" role="button" class="nav-link nav-link-profile" data-bs-toggle="dropdown">
              <span class="logged-name">{{ auth()->user()->name }}</span>
              <img src="{{ asset('default/admin-avatar.jpg') }}" class="wd-32 rounded-circle" alt="admin">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a class="dropdown-item" href="{{ route('admin.password.change') }}"><i class="icon ion-ios-gear-outline"></i> {{ __('Settings') }}</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="icon ion-power"></i> {{ __('Sign Out') }}</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    
  @endguest

  @yield('admin_content')

  <script async src="{{ asset('backend/js/ckeditor.js') }}"></script>

    <script type="module">
      document.addEventListener("DOMContentLoaded", function () {
        const scrollableElement = document.querySelector(".scrollable-content");
        if (scrollableElement) {
          new PerfectScrollbar(scrollableElement);
        }
      });
    </script>

    <script type="module">
      $(function() {
        $('.summernote').each(function(i, obj) {
          ClassicEditor.create(obj)
            .then(editor => {
                console.log('CKEditor 5 is initialized for element:', obj);
              })
              .catch(error => {
                console.error('Error initializing CKEditor 5 for element:', obj, error);
              });
        }); 
      });
    </script>

    @stack('admin-scripts')
    
    <script type="module">
        @if(Session::has('message'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('message') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('message') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('message') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('message') }}");
                  break;
          }
        @endif
    </script>
     
    <script>
      window.addEventListener('alert', event => { 
             toastr[event.detail.type](event.detail.message, 
             event.detail.title ?? '')
            });
    </script>
    
  <script type="module">
  $('.toggle-status').on('change', function(e) {
    var status = $(this).prop('checked') == true ? 1 : 0;
    var prod_id = $(this).data('id');
    
    $.ajax({
        type: 'POST',
        url: '{{ route('change.status') }}',
        data: {
          _token: '{{ csrf_token() }}',
          status: status,
          id: prod_id
        },
        success: function(response){
          var data = $.parseJSON(response);
          
          toastr.warning(data.message);
          var row = $(e.target).parents('tr');
          if(data.status == true) {
            row.find('#status').html('').append('<span class="badge badge-success">{{__('Active')}}</span>');
          } else {
            row.find('#status').html('').append('<span class="badge badge-danger">{{__('Inactive')}}</span>');
          }
        }
    });
  });
</script>


<script type="module">
    $(document).ready(function() {
        $("#page_url").on("change", function() {
            var customOptionInput = $("#custom_option");
            if ($(this).val() === "custom") {
                customOptionInput.show();
            } else {
                customOptionInput.hide();
            }
        });
    });
</script>
@livewireScripts
  </body>
</html>

<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center" href="{{ route('admin_dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        @php
          $setting = \App\Models\Setting::orderBy('id','desc')->first();
        @endphp
        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      
      <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin_dashboard') }}">
          <i class="fas fa-tachometer-alt"></i>
          <span>{{ A_DASHBOARD }}</span></a>
      </li>

      
      <li class="nav-item {{ Request::is('admin/settings') || Request::is('admin/settings/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('settings.index') }}">
          <i class="fas fa-cog"></i>
          <span>{{ A_SETTINGS }}</span></a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/page-homes') || Request::is('admin/page-homes/*') || Request::is('admin/page-abouts') || Request::is('admin/page-abouts/*') || Request::is('admin/page-faqs') || Request::is('admin/page-faqs/*') || Request::is('admin/page-services') || Request::is('admin/page-services/*') || Request::is('admin/page-testimonials') || Request::is('admin/page-testimonials/*') || Request::is('admin/page-news') || Request::is('admin/page-news/*') || Request::is('admin/page-events') || Request::is('admin/page-events/*') || Request::is('admin/page-contacts') || Request::is('admin/page-contacts/*') || Request::is('admin/page-searchs') || Request::is('admin/page-searchs/*') || Request::is('admin/page-teams') || Request::is('admin/page-teams/*') || Request::is('admin/page-portfolios') || Request::is('admin/page-portfolios/*') || Request::is('admin/page-photo-gallerys') || Request::is('admin/page-photo-gallerys/*') || Request::is('admin/page-pricings') || Request::is('admin/page-pricings/*') || Request::is('admin/page-terms') || Request::is('admin/page-terms/*') || Request::is('admin/page-privacys') || Request::is('admin/page-privacys/*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#pageSection" aria-expanded="true" aria-controls="pageSection">
          <i class="fas fa-newspaper"></i>
          <span>{{ A_PAGE_SECTION }}</span>
        </a>
        <div id="pageSection" class="collapse {{ Request::is('admin/page-homes') || Request::is('admin/page-homes/*') || Request::is('admin/page-abouts') || Request::is('admin/page-abouts/*') || Request::is('admin/page-faqs') || Request::is('admin/page-faqs/*') || Request::is('admin/page-services') || Request::is('admin/page-services/*') || Request::is('admin/page-testimonials') || Request::is('admin/page-testimonials/*') || Request::is('admin/page-news') || Request::is('admin/page-news/*') || Request::is('admin/page-events') || Request::is('admin/page-events/*') || Request::is('admin/page-contacts') || Request::is('admin/page-contacts/*') || Request::is('admin/page-searchs') || Request::is('admin/page-searchs/*') || Request::is('admin/page-teams') || Request::is('admin/page-teams/*') || Request::is('admin/page-portfolios') || Request::is('admin/page-portfolios/*') || Request::is('admin/page-photo-gallerys') || Request::is('admin/page-photo-gallerys/*') || Request::is('admin/page-pricings') || Request::is('admin/page-pricings/*') || Request::is('admin/page-terms') || Request::is('admin/page-terms/*') || Request::is('admin/page-privacys') || Request::is('admin/page-privacys/*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Request::is('admin/page-homes') || Request::is('admin/page-homes/*') ? 'active' : '' }}" href="{{ route('page-homes.index') }}">{{ A_HOME_PAGE }}</a>

            <a class="collapse-item {{ Request::is('admin/page-abouts') || Request::is('admin/page-abouts/*') ? 'active' : '' }}" href="{{ route('page-abouts.index') }}">{{ A_ABOUT_PAGE }}</a>

            <a class="collapse-item {{ Request::is('admin/page-faqs') || Request::is('admin/page-faqs/*') ? 'active' : '' }}" href="{{ route('page-faqs.index') }}">{{ A_FAQ_PAGE }}</a>

            <a class="collapse-item {{ Request::is('admin/page-services') || Request::is('admin/page-services/*') ? 'active' : '' }}" href="{{ route('page-services.index') }}">{{ A_SERVICE_PAGE }}</a>

            <a class="collapse-item {{ Request::is('admin/page-testimonials') || Request::is('admin/page-testimonials/*') ? 'active' : '' }}" href="{{ route('page-testimonials.index') }}">{{ A_TESTIMONIAL_PAGE }}</a>

            <a class="collapse-item {{ Request::is('admin/page-news') || Request::is('admin/page-news/*') ? 'active' : '' }}" href="{{ route('page-news.index') }}">{{ A_NEWS_PAGE }}</a>

            <a class="collapse-item {{ Request::is('admin/page-events') || Request::is('admin/page-events/*') ? 'active' : '' }}" href="{{ route('page-events.index') }}">{{ A_EVENT_PAGE }}</a>

            <a class="collapse-item {{ Request::is('admin/page-contacts') || Request::is('admin/page-contacts/*') ? 'active' : '' }}" href="{{ route('page-contacts.index') }}">{{ A_CONTACT_PAGE }}</a>

            <a class="collapse-item {{ Request::is('admin/page-searchs') || Request::is('admin/page-searchs/*') ? 'active' : '' }}" href="{{ route('page-searchs.index') }}">{{ A_SEARCH_PAGE }}</a>

            <a class="collapse-item {{ Request::is('admin/page-teams') || Request::is('admin/page-teams/*') ? 'active' : '' }}" href="{{ route('page-teams.index') }}">{{ A_TEAM_PAGE }}</a>

            <a class="collapse-item {{ Request::is('admin/page-portfolios') || Request::is('admin/page-portfolios/*') ? 'active' : '' }}" href="{{ route('page-portfolios.index') }}">{{ A_PORTFOLIO_PAGE }}</a>

            <a class="collapse-item {{ Request::is('admin/page-photo-gallerys') || Request::is('admin/page-photo-gallerys/*') ? 'active' : '' }}" href="{{ route('page-photo-gallerys.index') }}">{{ A_PHOTO_GALLERY_PAGE }}</a>

            <a class="collapse-item {{ Request::is('admin/page-pricings') || Request::is('admin/page-pricings/*') ? 'active' : '' }}" href="{{ route('page-pricings.index') }}">{{ A_PRICING_PAGE }}</a>

            <a class="collapse-item {{ Request::is('admin/page-terms') || Request::is('admin/page-terms/*') ? 'active' : '' }}" href="{{ route('page-terms.index') }}">{{ A_TERM_PAGE }}</a>

            <a class="collapse-item {{ Request::is('admin/page-privacys') || Request::is('admin/page-privacys/*') ? 'active' : '' }}" href="{{ route('page-privacys.index') }}">{{ A_PRIVACY_PAGE }}</a>
          </div>
        </div>
      </li>


      
      <li class="nav-item {{ Request::is('admin/dynamic-pages') || Request::is('admin/dynamic-pages/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dynamic-pages.index') }}">
          <i class="fas fa-chart-area"></i>
          <span>{{ A_DYNAMIC_PAGES }}</span></a>
      </li>

      
      <li class="nav-item {{ Request::is('admin/footers') || Request::is('admin/footers/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('footers.index') }}">
          <i class="fas fa-chart-area"></i>
          <span>{{ A_FOOTER_SECTION }}</span></a>
      </li>


      <li class="nav-item {{ Request::is('admin/menus') || Request::is('admin/menus/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('menus.index') }}">
          <i class="fas fa-file"></i>
          <span>{{ A_MENU }}</span></a>
      </li>


      <li class="nav-item {{ Request::is('admin/languages') || Request::is('admin/languages/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('languages.index') }}">
          <i class="fas fa-language"></i>
          <span>{{ A_LANGUAGE_FRONT }}</span></a>
      </li>

      <li class="nav-item {{ Request::is('admin/languages') || Request::is('admin/languages/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin_language') }}">
          <i class="fas fa-language"></i>
          <span>{{ A_LANGUAGE_ADMIN }}</span></a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/categories') || Request::is('admin/categories/*') || Request::is('admin/news') || Request::is('admin/news/*') || Request::is('admin/fb/comment') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseNews" aria-expanded="true" aria-controls="collapseNews">
          <i class="fas fa-newspaper"></i>
          <span>{{ A_NEWS_SECTION }}</span>
        </a>
        <div id="collapseNews" class="collapse {{ Request::is('admin/categories') || Request::is('admin/categories/*') || Request::is('admin/news') || Request::is('admin/news/*') || Request::is('admin/fb/comment') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Request::is('admin/categories') || Request::is('admin/categories/*') ? 'active' : '' }}" href="{{ route('categories.index') }}">{{ A_CATEGORY }}</a>
            <a class="collapse-item {{ Request::is('admin/news') || Request::is('admin/news/*') ? 'active' : '' }}" href="{{ route('news.index') }}">{{ A_NEWS }}</a>
            <a class="collapse-item {{ Request::is('admin/fb/comment') ? 'active' : '' }}" href="{{ route('news.comment') }}">{{ A_COMMENT }}</a>
          </div>
        </div>
      </li>

      
      <li class="nav-item {{ Request::is('admin/events') || Request::is('admin/events/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('events.index') }}">
          <i class="fas fa-calendar"></i>
          <span>{{ A_EVENT }}</span></a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/portfolio-categories') || Request::is('admin/subscribers/send-email')  ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#subscriber" aria-expanded="true" aria-controls="subscriber">
          <i class="fas fa-comment"></i>
          <span>{{ A_SUBSCRIBER }}</span>
        </a>
        <div id="subscriber" class="collapse {{ Request::is('admin/subscribers') || Request::is('admin/subscribers/send-email') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Request::is('admin/subscribers') ? 'active' : '' }}" href="{{ route('subscribers.index') }}">{{ A_ALL_SUBSCRIBERS }}</a>

            <a class="collapse-item {{ Request::is('admin/subscribers/send-email') ? 'active' : '' }}" href="{{ route('subscribers.send.email') }}">{{ A_EMAIL_TO_SUBSCRIBERS }}</a>
          </div>
        </div>
      </li>

      
      <li class="nav-item {{ Request::is('admin/team-members') || Request::is('admin/team-members/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('team-members.index') }}">
          <i class="fas fa-users"></i>
          <span>{{ A_TEAM_MEMBER }}</span></a>
      </li>

      
      <li class="nav-item {{ Request::is('admin/sliders') || Request::is('admin/sliders/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('sliders.index') }}">
          <i class="fas fa-image"></i>
          <span>{{ A_SLIDER }}</span></a>
      </li>

      
      <li class="nav-item {{ Request::is('admin/testimonials') || Request::is('admin/testimonials/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('testimonials.index') }}">
          <i class="fas fa-user-plus"></i>
          <span>{{ A_TESTIMONIAL }}</span></a>
      </li>

      
      <li class="nav-item {{ Request::is('admin/photo-gallerys') || Request::is('admin/photo-gallerys/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('photo-gallerys.index') }}">
          <i class="fas fa-camera"></i>
          <span>{{ A_PHOTO_GALLERY }}</span></a>
      </li>

      
      <li class="nav-item {{ Request::is('admin/pricing-tables') || Request::is('admin/pricing-tables/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pricing-tables.index') }}">
          <i class="fas fa-dollar-sign"></i>
          <span>{{ A_PRICING_TABLE }}</span></a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/portfolio-categories') || Request::is('admin/portfolio-categories/*') || Request::is('admin/portfolios') || Request::is('admin/portfolios/*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#portfolio" aria-expanded="true" aria-controls="portfolio">
          <i class="fas fa-bars"></i>
          <span>{{ A_PORTFOLIO }}</span>
        </a>
        <div id="portfolio" class="collapse {{ Request::is('admin/portfolio-categories') || Request::is('admin/portfolio-categories/*') || Request::is('admin/portfolios') || Request::is('admin/portfolios/*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Request::is('admin/portfolio-categories') || Request::is('admin/portfolio-categories/*') ? 'active' : '' }}" href="{{ route('portfolio-categories.index') }}">{{ A_PORTFOLIO_CATEGORY }}</a>
            <a class="collapse-item {{ Request::is('admin/portfolios') || Request::is('admin/portfolios/*') ? 'active' : '' }}" href="{{ route('portfolios.index') }}">{{ A_PORTFOLIO }}</a>
          </div>
        </div>
      </li>

      
      <li class="nav-item {{ Request::is('admin/clients') || Request::is('admin/clients/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('clients.index') }}">
          <i class="fas fa-clone"></i>
          <span>{{ A_CLIENT }}</span></a>
      </li>

      
      <li class="nav-item {{ Request::is('admin/services') || Request::is('admin/services/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('services.index') }}">
          <i class="fas fa-life-ring"></i>
          <span>{{ A_SERVICE }}</span></a>
      </li>
      

      <li class="nav-item {{ Request::is('admin/features') || Request::is('admin/features/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('features.index') }}">
          <i class="fas fa-cube"></i>
          <span>{{ A_FEATURE }}</span></a>
      </li>

      
      <li class="nav-item {{ Request::is('admin/why-chooses') || Request::is('admin/why-chooses/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('why-chooses.index') }}">
          <i class="fas fa-paper-plane"></i>
          <span>{{ A_WHY_CHOOSE_US }}</span></a>
      </li>

     
      <li class="nav-item {{ Request::is('admin/faqs') || Request::is('admin/faqs/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('faqs.index') }}">
          <i class="fas fa-bolt"></i>
          <span>{{ A_FAQ }}</span></a>
      </li>

      
      <li class="nav-item {{ Request::is('admin/social-medias') || Request::is('admin/social-medias/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('social-medias.create') }}">
          <i class="fas fa-address-book"></i>
          <span>{{ A_SOCIAL_MEDIA }}</span></a>
      </li>

      
      <li class="nav-item {{ Request::is('admin/files') || Request::is('admin/files/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('files.index') }}">
          <i class="fas fa-clone"></i>
          <span>{{ A_FILE }}</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
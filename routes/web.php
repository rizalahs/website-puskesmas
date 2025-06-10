<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\FrontEnd\SearchController;
use App\Http\Controllers\FrontEnd\LangController;
use App\Http\Controllers\FrontEnd\TermAndConditionController;
use App\Http\Controllers\FrontEnd\PrivacyPolicyController;
use App\Http\Controllers\FrontEnd\AboutController;
use App\Http\Controllers\FrontEnd\TeamController;
use App\Http\Controllers\FrontEnd\EventController;
use App\Http\Controllers\FrontEnd\TestimonialController;
use App\Http\Controllers\FrontEnd\FaqController;
use App\Http\Controllers\FrontEnd\PricingController;
use App\Http\Controllers\FrontEnd\PhotoGalleryController;
use App\Http\Controllers\FrontEnd\ServiceController;
use App\Http\Controllers\FrontEnd\PortfolioController;
use App\Http\Controllers\FrontEnd\NewsController;
use App\Http\Controllers\FrontEnd\ContactController;
use App\Http\Controllers\FrontEnd\SubscriberController;

use App\Http\Controllers\BackEnd\AuthController as AuthControllerForBackEnd;
use App\Http\Controllers\BackEnd\DashboardController as DashboardControllerForBackEnd;
use App\Http\Controllers\BackEnd\SettingController as SettingControllerForBackEnd;
use App\Http\Controllers\BackEnd\ProfileController as ProfileControllerForBackEnd;
use App\Http\Controllers\BackEnd\CaptchaController as CaptchaControllerForBackEnd;
use App\Http\Controllers\BackEnd\PageHomeController as PageHomeControllerForBackEnd;
use App\Http\Controllers\BackEnd\PageAboutController as PageAboutControllerForBackEnd;
use App\Http\Controllers\BackEnd\PageFaqController as PageFaqControllerForBackEnd;
use App\Http\Controllers\BackEnd\PageServiceController as PageServiceControllerForBackEnd;
use App\Http\Controllers\BackEnd\PageTestimonialController as PageTestimonialControllerForBackEnd;
use App\Http\Controllers\BackEnd\PageNewsController as PageNewsControllerForBackEnd;
use App\Http\Controllers\BackEnd\PageEventController as PageEventControllerForBackEnd;
use App\Http\Controllers\BackEnd\PageContactController as PageContactControllerForBackEnd;
use App\Http\Controllers\BackEnd\PageSearchController as PageSearchControllerForBackEnd;
use App\Http\Controllers\BackEnd\PageTeamController as PageTeamControllerForBackEnd;
use App\Http\Controllers\BackEnd\PagePortfolioController as PagePortfolioControllerForBackEnd;
use App\Http\Controllers\BackEnd\PagePhotoGalleryController as PagePhotoGalleryControllerForBackEnd;
use App\Http\Controllers\BackEnd\PagePricingController as PagePricingControllerForBackEnd;
use App\Http\Controllers\BackEnd\PageTermController as PageTermControllerForBackEnd;
use App\Http\Controllers\BackEnd\PagePrivacyController as PagePrivacyControllerForBackEnd;
use App\Http\Controllers\BackEnd\DynamicPagesController as DynamicPagesControllerForBackEnd;
use App\Http\Controllers\BackEnd\FooterController as FooterControllerForBackEnd;
use App\Http\Controllers\BackEnd\MenuController as MenuControllerForBackEnd; 
use App\Http\Controllers\BackEnd\LanguageController as LanguageControllerForBackEnd;
use App\Http\Controllers\BackEnd\LangDetailController as LangDetailControllerForBackEnd;
use App\Http\Controllers\BackEnd\LanguageAdminController as LanguageAdminControllerForBackEnd;
use App\Http\Controllers\BackEnd\CategoryController as CategoryControllerForBackEnd;
use App\Http\Controllers\BackEnd\NewsController as NewsControllerForBackEnd;
use App\Http\Controllers\BackEnd\EventController as EventControllerForBackEnd;
use App\Http\Controllers\BackEnd\SubscriberController as SubscriberControllerForBackEnd;
use App\Http\Controllers\BackEnd\TeamMemberController as TeamMemberControllerForBackEnd;
use App\Http\Controllers\BackEnd\SliderController as SliderControllerForBackEnd;
use App\Http\Controllers\BackEnd\TestimonialController as TestimonialControllerForBackEnd;
use App\Http\Controllers\BackEnd\PhotoGalleryController as PhotoGalleryControllerForBackEnd;
use App\Http\Controllers\BackEnd\PricingTableController as PricingTableControllerForBackEnd;
use App\Http\Controllers\BackEnd\PortfolioCategoryController as PortfolioCategoryControllerForBackEnd;
use App\Http\Controllers\BackEnd\PortfolioController as PortfolioControllerForBackEnd;
use App\Http\Controllers\BackEnd\ClientController as ClientControllerForBackEnd;
use App\Http\Controllers\BackEnd\ServiceController as ServiceControllerForBackEnd;
use App\Http\Controllers\BackEnd\FeatureController as FeatureControllerForBackEnd;
use App\Http\Controllers\BackEnd\WhyChooseController as WhyChooseControllerForBackEnd;
use App\Http\Controllers\BackEnd\FaqController as FaqControllerForBackEnd;
use App\Http\Controllers\BackEnd\SocialMediaController as SocialMediaControllerForBackEnd; 
use App\Http\Controllers\BackEnd\FileController as FileControllerForBackEnd;



Route::get('/', [HomeController::class,'index'])->name('home.page');
Route::get('/home/page/{slug}', [HomeController::class,'dynamicPage'])->name('home.dynamic.page');
Route::post('/home/send-email', [HomeController::class,'sendEmail'])->name('home.send.email');
Route::post('/search', [SearchController::class,'getData'])->name('home.search');
Route::post('/lang-change', [LangController::class,'change'])->name('lang.change');
Route::get('/terms-and-conditions', [TermAndConditionController::class,'index'])->name('term.and.condition');
Route::get('/privacy-policy', [PrivacyPolicyController::class,'index'])->name('privacy.policy');
Route::get('/about', [AboutController::class,'index'])->name('home.about');
Route::get('/team', [TeamController::class,'index'])->name('home.team');
Route::get('/team-member/{id}/{slug}', [TeamController::class,'teamMember'])->name('home.team.member');
Route::get('/event', [EventController::class,'index'])->name('home.event');
Route::get('/event/{slug}', [EventController::class,'view'])->name('event.view');
Route::get('/testimonial', [TestimonialController::class,'index'])->name('home.testimonial');
Route::get('/faq', [FaqController::class,'index'])->name('home.faq');
Route::get('/pricing', [PricingController::class,'index'])->name('home.pricing');
Route::get('/photo-gallery', [PhotoGalleryController::class,'index'])->name('home.photo.gallery');
Route::get('/service', [ServiceController::class,'index'])->name('home.service');
Route::get('/service/{slug}', [ServiceController::class,'view'])->name('service.view');
Route::post('/service/send-email', [ServiceController::class,'sendEmail'])->name('service.send.email');
Route::get('/portfolio', [PortfolioController::class,'index'])->name('home.portfolio');
Route::get('/portfolio/{slug}', [PortfolioController::class,'view'])->name('portfolio.view');
Route::post('/portfolio/send-email', [PortfolioController::class,'sendEmail'])->name('portfolio.send.email');
Route::get('/news', [NewsController::class,'index'])->name('home.news');
Route::get('/news/{slug}', [NewsController::class,'view'])->name('news.view');
Route::get('/news-category/{slug}', [NewsController::class,'categoryWiseview'])->name('news.category.view');
Route::get('/contact', [ContactController::class,'index'])->name('home.contact');
Route::post('/contact/send-email', [ContactController::class,'sendEmail'])->name('contact.send.email');
Route::post('/subscriber', [SubscriberController::class,'store'])->name('home.subscriber');
Route::get('/subscriber/verify/{token}', [SubscriberController::class,'verify'])->name('verify.subscriber');
Route::get('/subscriber/remove-pending', [SubscriberController::class,'pending'])->name('remove.subscriber.pending');
Route::get('/subscriber/export-csv', [SubscriberController::class,'exportIntoCSV'])->name('subscriber.export.csv');


Route::get('admin', function () {return redirect('admin/login');});

// Admin - No middleware
Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthControllerForBackEnd::class, 'login'])->name('admin_login');
    Route::post('/login', [AuthControllerForBackEnd::class, 'login_submit'])->name('admin_login_submit');
    Route::get('/logout', [AuthControllerForBackEnd::class, 'logout'])->name('admin_logout');
    Route::get('/forget-password', [AuthControllerForBackEnd::class, 'forget_password'])->name('admin_forget_password');
    Route::post('/forget-password', [AuthControllerForBackEnd::class, 'forget_password_submit'])->name('admin_forget_password_submit');
    Route::get('/reset-password/{token}/{email}', [AuthControllerForBackEnd::class, 'reset_password'])->name('admin_reset_password');
    Route::post('/reset-password-submit/{token}/{email}', [AuthControllerForBackEnd::class, 'reset_password_submit'])->name('admin_reset_password_submit');
});

// Admin - With middleware
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardControllerForBackEnd::class, 'index'])->name('admin_dashboard');

    Route::get('settings',[SettingControllerForBackEnd::class,'index'])->name('settings.index');
    Route::put('settings/{id}/logo',[SettingControllerForBackEnd::class,'logoUpdate'])->name('setting.logo.update');
    Route::put('settings/{id}/favicon',[SettingControllerForBackEnd::class,'faviconUpdate'])->name('setting.favicon.update');
    Route::put('settings/{id}/banner',[SettingControllerForBackEnd::class,'bannerUpdate'])->name('setting.banner.update');
    Route::put('settings/{id}/text-items',[SettingControllerForBackEnd::class,'textItemsUpdate'])->name('setting.text.items.update');

    Route::get('profile',[ProfileControllerForBackEnd::class,'index'])->name('admin_profile');
    Route::put('profile/info-update',[ProfileControllerForBackEnd::class,'infoUpdate'])->name('admin_profile_update');
    Route::put('profile/password-update',[ProfileControllerForBackEnd::class,'passwordUpdate'])->name('admin_password_update');

    Route::resource('page-homes',PageHomeControllerForBackEnd::class);
    Route::post('page-homes-indep/{id}/update', [PageHomeControllerForBackEnd::class,'pageIndpUpdate'])->name('page.home.indp.update');
    Route::post('page-homes-welcome/{id}/update', [PageHomeControllerForBackEnd::class,'pageIndpUpdate2'])->name('page.home.welcome.update');
    Route::post('page-homes-counter/{id}/update', [PageHomeControllerForBackEnd::class,'pageIndpUpdate3'])->name('page.home.counter.update');
    Route::post('page-homes-booking/{id}/update', [PageHomeControllerForBackEnd::class,'pageIndpUpdate4'])->name('page.home.booking.update');
    Route::post('page-homes-testimonial/{id}/update', [PageHomeControllerForBackEnd::class,'pageIndpUpdate5'])->name('page.home.testimonial.update');

    Route::resource('page-abouts',PageAboutControllerForBackEnd::class)->only('index','edit','update');
    Route::resource('page-faqs',PageFaqControllerForBackEnd::class)->only('index','edit','update');
    Route::resource('page-services',PageServiceControllerForBackEnd::class)->only('index','edit','update');
    Route::resource('page-testimonials',PageTestimonialControllerForBackEnd::class)->only('index','edit','update');
    Route::resource('page-news',PageNewsControllerForBackEnd::class)->only('index','edit','update');
    Route::resource('page-events',PageEventControllerForBackEnd::class)->only('index','edit','update');
    Route::resource('page-contacts',PageContactControllerForBackEnd::class)->only('index','edit','update');
    Route::resource('page-searchs',PageSearchControllerForBackEnd::class)->only('index','edit','update');
    Route::resource('page-teams',PageTeamControllerForBackEnd::class)->only('index','edit','update');
    Route::resource('page-portfolios',PagePortfolioControllerForBackEnd::class)->only('index','edit','update');
    Route::resource('page-photo-gallerys',PagePhotoGalleryControllerForBackEnd::class)->only('index','edit','update');
    Route::resource('page-pricings',PagePricingControllerForBackEnd::class)->only('index','edit','update');
    Route::resource('page-terms',PageTermControllerForBackEnd::class)->only('index','edit','update');
    Route::resource('page-privacys',PagePrivacyControllerForBackEnd::class)->only('index','edit','update');

    Route::resource('dynamic-pages',DynamicPagesControllerForBackEnd::class)->except('show');
    Route::resource('footers',FooterControllerForBackEnd::class)->only('index','edit','update');
    Route::post('footer-independent/update', [FooterControllerForBackEnd::class,'independentUpdate'])->name('footer.independent.update');

    Route::get('menus', [MenuControllerForBackEnd::class,'index'])->name('menus.index');
    Route::put('menus/update', [MenuControllerForBackEnd::class,'update'])->name('menus.update');

    Route::resource('languages',LanguageControllerForBackEnd::class)->except('show');
    Route::get('languages/{id}/detail', [LangDetailControllerForBackEnd::class,'detail'])->name('languages.detail');
    Route::post('languages/detail-update', [LangDetailControllerForBackEnd::class,'Update'])->name('languages.detail.update');

    Route::resource('categories',CategoryControllerForBackEnd::class)->except('show');
    Route::resource('news',NewsControllerForBackEnd::class)->except('show');
    Route::get('fb/comment', [NewsControllerForBackEnd::class,'comment'])->name('news.comment');
    Route::put('fb/{id}/comment-update', [NewsControllerForBackEnd::class,'commentUpdate'])->name('comment.update');
    
    Route::resource('events',EventControllerForBackEnd::class)->except('show');
    
    Route::get('subscribers', [SubscriberControllerForBackEnd::class,'index'])->name('subscribers.index');
    Route::delete('subscriber/{id}/destroy', [SubscriberControllerForBackEnd::class,'destroy'])->name('subscribers.destroy');

    Route::get('subscribers/send-email', [SubscriberControllerForBackEnd::class,'view'])->name('subscribers.send.email');
    Route::post('subscribers/send-email', [SubscriberControllerForBackEnd::class,'sendEmail'])->name('subscribers.email.send');

    Route::resource('team-members',TeamMemberControllerForBackEnd::class)->except('show');
    Route::resource('sliders',SliderControllerForBackEnd::class)->except('show');
    Route::resource('testimonials',TestimonialControllerForBackEnd::class)->except('show');
    Route::resource('photo-gallerys',PhotoGalleryControllerForBackEnd::class)->except('show');
    Route::resource('pricing-tables',PricingTableControllerForBackEnd::class)->except('show');
    Route::resource('portfolio-categories',PortfolioCategoryControllerForBackEnd::class)->except('show');
    Route::resource('portfolios',PortfolioControllerForBackEnd::class);
    Route::resource('clients',ClientControllerForBackEnd::class)->except('show');
    Route::resource('services',ServiceControllerForBackEnd::class)->except('show');
    Route::resource('features',FeatureControllerForBackEnd::class)->except('show');
    Route::resource('why-chooses',WhyChooseControllerForBackEnd::class)->except('show');
    Route::resource('faqs',FaqControllerForBackEnd::class)->except('show');
    Route::get('social-medias',[SocialMediaControllerForBackEnd::class,'create'])->name('social-medias.create');
    Route::put('social-medias/update',[SocialMediaControllerForBackEnd::class,'update'])->name('social-medias.update');
    Route::resource('files',FileControllerForBackEnd::class)->except('show');
    Route::get('files/{id}/download', [FileControllerForBackEnd::class,'download'])->name('files.download');
    Route::get('portfolios/other-photo-delete/{id}', [PortfolioControllerForBackEnd::class,'delete_other_photo'])->name('portfolio.other_photo_delete');
    Route::get('language/admin/view', [LanguageAdminControllerForBackEnd::class,'index'])->name('admin_language');
    Route::post('language/admin/update', [LanguageAdminControllerForBackEnd::class,'update'])->name('admin_language_update');
});
<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\{
    AboutController,
    AccommodationController,
    AdministrationController,
    AdmissionController,
    AdmissionPagecontroller,
    AffairsController,
    AlumniController,
    DepartmentController,
    BackendController,
    BoardMemberController,
    CalenderController,
    CareerController,
    ChancellorController,
    ClubController,
    ContactController,
    ContentController,
    CouncilController,
    CounterController,
    CourseCreditController,
    CustomController,
    CustomizeController,
    DepartmentGalleryController,
    DepartmentSliderController,
    EventController,
    FacultyController,
    ForeignFeeController,
    ForeignHeadController,
    HomeGalleryController,
    HomeSliderController,
    InstituteController,
    IqacController,
    LogoController,
    MailController,
    ManagementController,
    MarqueeController,
    MenuController,
    MessageController,
    NoticeController,
    PageController,
    PartnerController,
    PermisssionController,
    ProfileController,
    ProgramCategoryController,
    ProgramCurriculumController,
    ProgramListController,
    ProgramScheduleController,
    RndGalleryController,
    RndHeadController,
    RndPostController,
    RoleController,
    SeminarController,
    SeoController,
    SocialController,
    SubjectDetailController,
    SubscriberController,
    SyndicateController,
    TuitionFeeController,
    UserController,
    WaiverController,
};
use App\Http\Controllers\Frontend\{FrontContactController, FrontendController};
use App\Http\Controllers\User\{
    UserAlumniController,
    UserCoCreController,
    UserDashboardController,
    UserFacultyController,
    UserGalleryController,
    UserNoticeController,
    UserProfileController,
    UserProgramCurriController,
    UserProgramListController,
    UserProScheController,
    UserRndController,
    UserSliderController,
    UserSubDeController,
    UserTuiFeeController
};
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/******************Auth Routes**********************/
/***************************************************/
Route::controller(AuthController::class)->middleware('guest')->group(function () {
    Route::get('admin/login', 'index')->name('login');
    Route::post('login/access', 'access')->name('access');
    Route::get('forgot-password', 'forgot')->name('forgot');
    Route::get('new-password/{link}', 'newPass')->name('new.password');
    Route::post('forgot-password/search', 'search')->name('search');
    Route::post('update/password/{id}', 'updatePass')->name('update.password');
});

/******************Frontend Routes******************/
/***************************************************/
Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('department/{slug}', 'department')->name('department');
    Route::get('research-&-development/{slug}', 'rnd')->name('rnd');
    Route::get('research-&-development', 'rndAll')->name('rnd.all');
    Route::get('r&d/details/{slug}', 'rndDetails')->name('rnd.details');
    Route::get('program/{name}/{slug}', 'program')->name('program');
    Route::get('notice/{id}', 'notice')->name('notice');
    Route::get('programs', 'programList')->name('program.list');
    Route::get('admission', 'admission')->name('admission');
    Route::get('accommodation', 'accommodation')->name('accommodation');
    Route::get('calender', 'calender')->name('calender');
    Route::get('tuition-fee', 'tuition')->name('tuition');
    Route::get('foreign-student-tuition-fee', 'foreign')->name('foreign');
    Route::get('schoolarship-&-waiver', 'waiver')->name('waiver');
    Route::post('waiver/feedback/store', 'waiverStore')->name('waiver.store');
    Route::get('board-of-trustees', 'board')->name('board');
    Route::get('syndicate', 'syndicate')->name('syndicate');
    Route::get('council', 'council')->name('council');
    Route::get('vice-chancellor', 'vice')->name('vice');
    Route::get('pro-vice-chancellor', 'pro')->name('pro');
    Route::get('administration/{slug}', 'admini')->name('admini');
    Route::get('administration', 'administration')->name('administration');
    Route::get('seminar', 'seminar')->name('seminar');
    Route::get('event', 'event')->name('event');
    Route::get('club', 'club')->name('club');
    Route::get('seminar/{slug}', 'seminarDetails')->name('seminar.details');
    Route::get('event/{slug}', 'eventDetails')->name('event.details');
    Route::get('club/{slug}', 'clubDetails')->name('club.details');
    Route::get('international-affairs', 'affairs')->name('affairs');
    Route::get('page/{slug}', 'page')->name('page');
    Route::get('about', 'about')->name('about');
    Route::get('faculty', 'faculty')->name('faculty');
    Route::get('alumni', 'alumni')->name('alumni');
    Route::get('career', 'career')->name('career');
    Route::post('career/store', 'careerStore')->name('career.store');
    Route::get('career/{slug}', 'careerDetails')->name('career.details');
    Route::get('institute-of-school/{slug}', 'institute')->name('institute');
    Route::get('institutional-quality-assurance-cell', 'iqac')->name('iqac');
});

Route::controller(FrontContactController::class)->group(function () {
    Route::get('contact', 'contact')->name('contact');
    Route::post('contact/store', 'store')->name('contact.store');
    Route::post('sub/store', 'subs')->name('sub.store');
});




/******************Backend Routes*******************/
/***************************************************/
Route::prefix('admin')->middleware('auth', 'admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('dashboard', [BackendController::class, 'index'])->name('dashboard');
    Route::get('logout', [BackendController::class, 'logout'])->name('logout');

    // Academics
    Route::prefix('academics')->name('academics.')->group(function () {
        // Department
        Route::prefix('department')->name('department.')->controller(DepartmentController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('institute')->name('institute.')->controller(InstituteController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        // Slider
        Route::prefix('slider')->name('slider.')->controller(DepartmentSliderController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        // Gallery
        Route::prefix('gallery')->name('gallery.')->controller(DepartmentGalleryController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });
    });

    // Program
    Route::prefix('program')->name('program.')->group(function () {
        // Category
        Route::prefix('category')->name('category.')->controller(ProgramCategoryController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        // Program list
        Route::prefix('list')->name('list.')->controller(ProgramListController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        // Program curriculum
        Route::prefix('curriculum')->name('curriculum.')->controller(ProgramCurriculumController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        // Program schedule
        Route::prefix('schedule')->name('schedule.')->controller(ProgramScheduleController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        // Course credit & hour
        Route::prefix('course')->name('course.')->controller(CourseCreditController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        // Subject detail
        Route::prefix('subject')->name('subject.')->controller(SubjectDetailController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        // Tuition fee
        Route::prefix('tuition')->name('tuition.')->controller(TuitionFeeController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });
    });

    // Research & Development
    Route::prefix('rnd')->name('rnd.')->group(function () {
        // R&D Head
        Route::prefix('head')->name('head.')->controller(RndHeadController::class)->group(function () {
            Route::get('edit', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });

        // R&D Post
        Route::prefix('post')->name('post.')->controller(RndPostController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        // R&D Gallery
        Route::prefix('gallery')->name('gallery.')->controller(RndGalleryController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });
    });

    // Falculty Team
    Route::prefix('faculty')->name('faculty.')->controller(FacultyController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // Admission
    Route::prefix('admission')->name('admission.')->group(function () {
        Route::controller(AdmissionController::class)->group(function () {
            Route::get('thumbnail', 'thumbnail')->name('thumbnail');
            Route::put('thumbnail/update', 'update')->name('update');
        });

        // Admission Page
        Route::controller(AdmissionPagecontroller::class)->group(function () {
            Route::get('edit', 'edit')->name('page.edit');
            Route::put('update/page', 'update')->name('page.update');
        });

        // Foreign Student
        Route::prefix('foreign')->name('foreign.')->group(function () {
            // Foreign Head
            Route::controller(ForeignHeadController::class)->group(function () {
                Route::get('head', 'edit')->name('head');
                Route::put('head/update/{id}', 'update')->name('head.update');
            });
            // Foreign Fee
            Route::prefix('fee')->name('fee.')->controller(ForeignFeeController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::put('update/{id}', 'update')->name('update');
                Route::get('destroy/{id}', 'destroy')->name('destroy');
            });
        });

        // Foreign Student
        Route::prefix('waiver')->name('waiver.')->controller(WaiverController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('head', 'head')->name('head');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
            Route::get('feedback', 'feedback')->name('feedback');
            Route::get('feedback/view/{id}', 'view')->name('view');
            Route::get('feedback/delete/{id}', 'feedbackDelete')->name('feedbackDelete');
            Route::put('head/update/{id}', 'headUpdate')->name('head.update');
        });

        // Calender
        Route::prefix('calender')->name('calender.')->controller(CalenderController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::post('event/store', 'eventStore')->name('event.store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::put('event/update/{id}', 'eventUpdate')->name('event.update');
            Route::get('event/delete/{id}', 'eventDestroy')->name('event.delete');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        // Calender
        Route::prefix('accommodation')->name('accommodation.')->controller(AccommodationController::class)->group(function () {
            Route::get('edit', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });
    });

    // Management
    Route::prefix('management')->name('management.')->group(function () {
        Route::controller(ManagementController::class)->group(function () {
            Route::get('edit', 'edit')->name('edit');
            Route::put('update', 'update')->name('update');
        });

        // Board of Trustees
        Route::prefix('member')->name('member.')->controller(BoardMemberController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        // Syndicate
        Route::prefix('syndicate')->name('syndicate.')->controller(SyndicateController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::get('head/edit', 'head')->name('head');
            Route::put('update/{id}', 'update')->name('update');
            Route::put('head/update', 'headUpdate')->name('head.update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        // Academic Council
        Route::prefix('council')->name('council.')->controller(CouncilController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::get('head/edit', 'head')->name('head');
            Route::put('update/{id}', 'update')->name('update');
            Route::put('head/update', 'headUpdate')->name('head.update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        // Chancellor
        Route::prefix('chancellor')->name('chancellor.')->controller(ChancellorController::class)->group(function () {
            Route::get('edit/vice', 'viceEdit')->name('vice.edit');
            Route::put('update/vice/{id}', 'viceUpdate')->name('vice.update');
            Route::get('edit/pro', 'proEdit')->name('pro.edit');
            Route::put('update/pro/{id}', 'proUpdate')->name('pro.update');
        });


        // Administration
        Route::prefix('administration')->name('administration.')->controller(AdministrationController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });
    });

    // Alulmni Student
    Route::prefix('alumni')->name('alumni.')->controller(AlumniController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // Notice
    Route::prefix('notice')->name('notice.')->controller(NoticeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // Event & News
    Route::prefix('event')->name('event.')->controller(EventController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // Seminar
    Route::prefix('seminar')->name('seminar.')->controller(SeminarController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // Clubs
    Route::prefix('club')->name('club.')->controller(ClubController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // Partners
    Route::prefix('partner')->name('partner.')->controller(PartnerController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // International Affairs
    Route::prefix('affairs')->name('affairs.')->controller(AffairsController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // International Affairs
    Route::prefix('counter')->name('counter.')->controller(CounterController::class)->group(function () {
        Route::get('edit', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
    });

    // International Affairs
    Route::prefix('iqac')->name('iqac.')->controller(IqacController::class)->group(function () {
        Route::get('edit', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
    });

    // Subscriber
    Route::prefix('subscriber')->name('subscriber.')->controller(SubscriberController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // Contact Message
    Route::prefix('message')->name('message.')->controller(MessageController::class)->group(function () {
        Route::get('inbox', 'inbox')->name('inbox');
        Route::get('read/{id}', 'read')->name('read');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // About
    Route::prefix('about')->name('about.')->controller(AboutController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('head', 'head')->name('head');
        Route::put('head/update/{id}', 'headUpdate')->name('head.update');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // Career
    Route::prefix('career')->name('career.')->controller(CareerController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('list', 'list')->name('list');
        Route::get('list/delete/{id}', 'listDelete')->name('list.destroy');
        Route::get('view/{id}', 'view')->name('view');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // Logo
    Route::prefix('logo')->name('logo.')->controller(LogoController::class)->group(function () {
        Route::get('edit', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
    });

    // Home Slider
    Route::prefix('slider')->name('slider.')->controller(HomeSliderController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // Home Slider
    Route::prefix('gallery')->name('gallery.')->controller(HomeGalleryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // Marquee
    Route::prefix('marquee')->name('marquee.')->controller(MarqueeController::class)->group(function () {
        Route::get('edit', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
    });

    // Content
    Route::prefix('content')->name('content.')->controller(ContentController::class)->group(function () {
        Route::get('edit', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
    });

    // SEO
    Route::prefix('seo')->name('seo.')->controller(SeoController::class)->group(function () {
        Route::get('edit', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
    });

    // Custom JS
    Route::prefix('custom')->name('custom.')->controller(CustomController::class)->group(function () {
        Route::get('edit', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
    });

    // Contact & Address
    Route::prefix('contact')->name('contact.')->controller(ContactController::class)->group(function () {
        Route::get('edit', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
    });

    // Social Link
    Route::prefix('social')->name('social.')->controller(SocialController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // Other Page
    Route::prefix('page')->name('page.')->controller(PageController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // Menu
    Route::prefix('menu')->name('menu.')->controller(MenuController::class)->group(function () {
        Route::get('edit', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
    });

    // Home Page Customize
    Route::prefix('customize')->name('customize.')->controller(CustomizeController::class)->group(function () {
        Route::get('edit', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
    });

    // Mail Config
    Route::prefix('mail')->name('mail.')->controller(MailController::class)->group(function () {
        Route::get('edit', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
    });

    // User
    Route::prefix('user')->name('user.')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('login/{id}', 'login')->name('login');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // User
    Route::prefix('permission')->name('permission.')->controller(PermisssionController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // User
    Route::prefix('role')->name('role.')->controller(RoleController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // Profile eidt
    Route::prefix('profile')->name('profile.')->controller(ProfileController::class)->group(function () {
        Route::get('edit', 'edit')->name('edit');
        Route::get('password/edit', 'passwordEdit')->name('password.edit');
        Route::put('update', 'update')->name('update');
        Route::put('password/update', 'passwordUpdate')->name('password.update');
    });

    // Application cache clear
    Route::get('cache-clear', function () {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Toastr::success('System Cache Has Been Removed.');
        return redirect()->back();
    })->name('cache');
});


/******************User Routes****************/
/***************************************************/
Route::prefix('user')->middleware('auth', 'user')->name('user.')->group(function () {
    // Dashboard
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('logout', [UserDashboardController::class, 'logout'])->name('logout');

    // Academics
    Route::prefix('academics')->name('academics.')->group(function () {
        // Slider
        Route::prefix('slider')->name('slider.')->controller(UserSliderController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        // Gallery
        Route::prefix('gallery')->name('gallery.')->controller(UserGalleryController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });
    });

    // Program
    Route::prefix('program')->name('program.')->group(function () {
        // Program list
        Route::prefix('list')->name('list.')->controller(UserProgramListController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        // Program curriculum
        Route::prefix('curriculum')->name('curriculum.')->controller(UserProgramCurriController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        // Program schedule
        Route::prefix('schedule')->name('schedule.')->controller(UserProScheController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        // Course credit & hour
        Route::prefix('course')->name('course.')->controller(UserCoCreController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        // Subject detail
        Route::prefix('subject')->name('subject.')->controller(UserSubDeController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        // Tuition fee
        Route::prefix('tuition')->name('tuition.')->controller(UserTuiFeeController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });
    });

    // Research & Development
    Route::prefix('rnd')->name('rnd.')->group(function () {
        // R&D Post
        Route::prefix('post')->name('post.')->controller(UserRndController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });
    });

    // Falculty Team
    Route::prefix('faculty')->name('faculty.')->controller(UserFacultyController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // Alulmni Student
    Route::prefix('alumni')->name('alumni.')->controller(UserAlumniController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // Notice
    Route::prefix('notice')->name('notice.')->controller(UserNoticeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    // Profile eidt
    Route::prefix('profile')->name('profile.')->controller(UserProfileController::class)->group(function () {
        Route::get('edit', 'edit')->name('edit');
        Route::get('password/edit', 'passwordEdit')->name('password.edit');
        Route::put('update', 'update')->name('update');
        Route::put('password/update', 'passwordUpdate')->name('password.update');
    });

    // Application cache clear
    Route::get('cache-clear', function () {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Toastr::success('System Cache Has Been Removed.');
        return redirect()->back();
    })->name('cache');
});

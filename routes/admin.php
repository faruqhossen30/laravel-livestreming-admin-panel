<?php

use App\Http\Controllers\Admin\AgoraController;
use App\Http\Controllers\Admin\BlockuserController;
use App\Http\Controllers\Admin\CacheflushController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\GiftController;
use App\Http\Controllers\Admin\HelplineController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\LabelController;
use App\Http\Controllers\Admin\MembershipController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\PaymentgatewayController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserupdateController;
use App\Http\Controllers\Admin\VipController;
use App\Http\Controllers\Admin\WithdrawController;
use App\Http\Controllers\Admin\WithdrawsettingController;
use App\Http\Controllers\Firebase\UserController as FirebaseUserController;
use App\Http\Controllers\TransactionadminController;
use App\Models\BlockUser;
use App\Models\User;
use App\Models\WithdrawSetting;
use Carbon\Carbon;
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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::resource('gift', GiftController::class);
    Route::resource('label', LabelController::class);
    Route::resource('membership', MembershipController::class);
    Route::resource('paymentgateway', PaymentgatewayController::class);
    Route::resource('agora', AgoraController::class);
    Route::resource('user', UserController::class);
    Route::resource('blockuser', BlockuserController::class);
    Route::resource('transaction', TransactionadminController::class);
    Route::resource('history', HistoryController::class);
    Route::resource('deposit', DepositController::class);
    Route::resource('helpline', HelplineController::class);
    Route::resource('notice', NoticeController::class);
    Route::resource('withdraw', WithdrawController::class);
    Route::post('vip/update/{id}', [VipController::class, 'addVip'])->name('user.addvip');
    Route::get('vip/update/disable/{id}', [VipController::class, 'disableVip'])->name('user.disableVip');

    Route::post('user/delete/{id}', [UserController::class, 'userDelete'])->name('adminuser.delete');

    Route::get('flush/giftapi',[CacheflushController::class, 'giftApiFlush'])->name('flush.giftapi');
    Route::get('flush/helpline',[CacheflushController::class, 'helplineFlush'])->name('flush.helpline');

    Route::get('overview', [DashboardController::class, 'overview'])->name('dashboard');
    Route::get('users', [FirebaseUserController::class, 'userList'])->name('userlist');
    Route::get('user/stoplive/{id}', [UserupdateController::class, 'stopLive'])->name('user.stoplive');
    Route::get('user/deactive/{id}', [UserupdateController::class, 'deactiveUser'])->name('user.deactive');
    Route::post('user/diviceblock/{id}', [UserupdateController::class, 'deviceBlock'])->name('user.deviceblock');
    Route::post('user/diviceunblock/{id}', [UserupdateController::class, 'deviceUnBlock'])->name('user.deviceunblock');
    Route::get('user/active/{id}', [UserupdateController::class, 'activeUser'])->name('user.active');
    Route::post('user/changepassword/{id}', [UserupdateController::class, 'changePassword'])->name('user.changepassword');
    Route::post('user/change/name/{id}', [UserupdateController::class, 'changeName'])->name('user.changeName');


    // Settings
    Route::get('/settings', [SettingController::class, 'settingPage'])->name('admin.settings');
    Route::post('/setting/websitename', [SettingController::class, 'websiteName'])->name('admin.setting.websitename');
    Route::post('/setting/daimond-commission', [SettingController::class, 'daimondCommission'])->name('admin.setting.daimondcommission');
    Route::post('/setting/daimond-price', [SettingController::class, 'daimondRate'])->name('admin.setting.daimondrate');
    Route::post('/setting/withdraw-rate', [SettingController::class, 'withdrawRate'])->name('admin.setting.withdrawrate');
    Route::resource('withdrawsetting', WithdrawsettingController::class);

    Route::get('/dashboard', function () {
        $activUser = User::where('is_user', 1)->where('status',1)->count();
        $deactiveUser = User::where('is_user', 1)->where('status',0)->count();
        $blockUsers = BlockUser::get()->count();
        $todayUser = User::whereDate('created_at', Carbon::today())->count();
        // return $todayUser;
        return view('admin.dashboard', compact('activUser', 'deactiveUser','blockUsers', 'todayUser'));
    });

    Route::group(['prefix' => 'email'], function () {
        Route::get('inbox', function () {
            return view('admin.pages.email.inbox');
        });
        Route::get('read', function () {
            return view('admin.pages.email.read');
        });
        Route::get('compose', function () {
            return view('admin.pages.email.compose');
        });
    });

    Route::group(['prefix' => 'apps'], function () {
        Route::get('chat', function () {
            return view('admin.pages.apps.chat');
        });
        Route::get('calendar', function () {
            return view('admin.pages.apps.calendar');
        });
    });

    Route::group(['prefix' => 'ui-components'], function () {
        Route::get('accordion', function () {
            return view('admin.pages.ui-components.accordion');
        });
        Route::get('alerts', function () {
            return view('admin.pages.ui-components.alerts');
        });
        Route::get('badges', function () {
            return view('admin.pages.ui-components.badges');
        });
        Route::get('breadcrumbs', function () {
            return view('admin.pages.ui-components.breadcrumbs');
        });
        Route::get('buttons', function () {
            return view('admin.pages.ui-components.buttons');
        });
        Route::get('button-group', function () {
            return view('admin.pages.ui-components.button-group');
        });
        Route::get('cards', function () {
            return view('admin.pages.ui-components.cards');
        });
        Route::get('carousel', function () {
            return view('admin.pages.ui-components.carousel');
        });
        Route::get('collapse', function () {
            return view('admin.pages.ui-components.collapse');
        });
        Route::get('dropdowns', function () {
            return view('admin.pages.ui-components.dropdowns');
        });
        Route::get('list-group', function () {
            return view('admin.pages.ui-components.list-group');
        });
        Route::get('media-object', function () {
            return view('admin.pages.ui-components.media-object');
        });
        Route::get('modal', function () {
            return view('admin.pages.ui-components.modal');
        });
        Route::get('navs', function () {
            return view('admin.pages.ui-components.navs');
        });
        Route::get('navbar', function () {
            return view('admin.pages.ui-components.navbar');
        });
        Route::get('pagination', function () {
            return view('admin.pages.ui-components.pagination');
        });
        Route::get('popovers', function () {
            return view('admin.pages.ui-components.popovers');
        });
        Route::get('progress', function () {
            return view('admin.pages.ui-components.progress');
        });
        Route::get('scrollbar', function () {
            return view('admin.pages.ui-components.scrollbar');
        });
        Route::get('scrollspy', function () {
            return view('admin.pages.ui-components.scrollspy');
        });
        Route::get('spinners', function () {
            return view('admin.pages.ui-components.spinners');
        });
        Route::get('tabs', function () {
            return view('admin.pages.ui-components.tabs');
        });
        Route::get('tooltips', function () {
            return view('admin.pages.ui-components.tooltips');
        });
    });

    Route::group(['prefix' => 'advanced-ui'], function () {
        Route::get('cropper', function () {
            return view('admin.pages.advanced-ui.cropper');
        });
        Route::get('owl-carousel', function () {
            return view('admin.pages.advanced-ui.owl-carousel');
        });
        Route::get('sortablejs', function () {
            return view('admin.pages.advanced-ui.sortablejs');
        });
        Route::get('sweet-alert', function () {
            return view('admin.pages.advanced-ui.sweet-alert');
        });
    });

    Route::group(['prefix' => 'forms'], function () {
        Route::get('basic-elements', function () {
            return view('admin.pages.forms.basic-elements');
        });
        Route::get('advanced-elements', function () {
            return view('admin.pages.forms.advanced-elements');
        });
        Route::get('editors', function () {
            return view('admin.pages.forms.editors');
        });
        Route::get('wizard', function () {
            return view('admin.pages.forms.wizard');
        });
    });

    Route::group(['prefix' => 'charts'], function () {
        Route::get('apex', function () {
            return view('admin.pages.charts.apex');
        });
        Route::get('chartjs', function () {
            return view('admin.pages.charts.chartjs');
        });
        Route::get('flot', function () {
            return view('admin.pages.charts.flot');
        });
        Route::get('morrisjs', function () {
            return view('admin.pages.charts.morrisjs');
        });
        Route::get('peity', function () {
            return view('admin.pages.charts.peity');
        });
        Route::get('sparkline', function () {
            return view('admin.pages.charts.sparkline');
        });
    });

    Route::group(['prefix' => 'tables'], function () {
        Route::get('basic-tables', function () {
            return view('admin.pages.tables.basic-tables');
        });
        Route::get('data-table', function () {
            return view('admin.pages.tables.data-table');
        });
    });

    Route::group(['prefix' => 'icons'], function () {
        Route::get('feather-icons', function () {
            return view('admin.pages.icons.feather-icons');
        });
        Route::get('flag-icons', function () {
            return view('admin.pages.icons.flag-icons');
        });
        Route::get('mdi-icons', function () {
            return view('admin.pages.icons.mdi-icons');
        });
    });

    Route::group(['prefix' => 'general'], function () {
        Route::get('blank-page', function () {
            return view('admin.pages.general.blank-page');
        });
        Route::get('faq', function () {
            return view('admin.pages.general.faq');
        });
        Route::get('invoice', function () {
            return view('admin.pages.general.invoice');
        });
        Route::get('profile', function () {
            return view('admin.pages.general.profile');
        });
        Route::get('pricing', function () {
            return view('admin.pages.general.pricing');
        });
        Route::get('timeline', function () {
            return view('admin.pages.general.timeline');
        });
    });
});

Route::group(['prefix' => 'auth'], function () {
    Route::get('login', function () {
        return view('admin.pages.auth.login');
    });
    Route::get('register', function () {
        return view('admin.pages.auth.register');
    });
});

Route::group(['prefix' => 'error'], function () {
    Route::get('404', function () {
        return view('admin.pages.error.404');
    });
    Route::get('500', function () {
        return view('admin.pages.error.500');
    });
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}', function () {
    return View::make('admin.pages.error.404');
})->where('page', '.*');

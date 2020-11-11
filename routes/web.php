<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Add Blocks
    Route::delete('add-blocks/destroy', 'AddBlockController@massDestroy')->name('add-blocks.massDestroy');
    Route::resource('add-blocks', 'AddBlockController');

    // Add Units
    Route::delete('add-units/destroy', 'AddUnitController@massDestroy')->name('add-units.massDestroy');
    Route::post('add-units/parse-csv-import', 'AddUnitController@parseCsvImport')->name('add-units.parseCsvImport');
    Route::post('add-units/process-csv-import', 'AddUnitController@processCsvImport')->name('add-units.processCsvImport');
    Route::resource('add-units', 'AddUnitController');

    // Unit Managements
    Route::delete('unit-managements/destroy', 'UnitManagementController@massDestroy')->name('unit-managements.massDestroy');
    Route::post('unit-managements/media', 'UnitManagementController@storeMedia')->name('unit-managements.storeMedia');
    Route::post('unit-managements/ckmedia', 'UnitManagementController@storeCKEditorImages')->name('unit-managements.storeCKEditorImages');
    Route::resource('unit-managements', 'UnitManagementController');

    // Add Family Members
    Route::resource('add-family-members', 'AddFamilyMemberController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Activity Logs
    Route::resource('activity-logs', 'ActivityLogController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Facility Categories
    Route::delete('facility-categories/destroy', 'FacilityCategoryController@massDestroy')->name('facility-categories.massDestroy');
    Route::post('facility-categories/parse-csv-import', 'FacilityCategoryController@parseCsvImport')->name('facility-categories.parseCsvImport');
    Route::post('facility-categories/process-csv-import', 'FacilityCategoryController@processCsvImport')->name('facility-categories.processCsvImport');
    Route::resource('facility-categories', 'FacilityCategoryController');

    // Facility Managements
    Route::delete('facility-managements/destroy', 'FacilityManagementController@massDestroy')->name('facility-managements.massDestroy');
    Route::post('facility-managements/media', 'FacilityManagementController@storeMedia')->name('facility-managements.storeMedia');
    Route::post('facility-managements/ckmedia', 'FacilityManagementController@storeCKEditorImages')->name('facility-managements.storeCKEditorImages');
    Route::resource('facility-managements', 'FacilityManagementController');

    // Add Tenants
    Route::resource('add-tenants', 'AddTenantController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Family Settings
    Route::resource('family-settings', 'FamilySettingController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Tenant Settings
    Route::resource('tenant-settings', 'TenantSettingController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Facility Books
    Route::delete('facility-books/destroy', 'FacilityBookController@massDestroy')->name('facility-books.massDestroy');
    Route::resource('facility-books', 'FacilityBookController');

    // Check Facilities
    Route::resource('check-facilities', 'CheckFacilityController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Add Visitors
    Route::delete('add-visitors/destroy', 'AddVisitorController@massDestroy')->name('add-visitors.massDestroy');
    Route::resource('add-visitors', 'AddVisitorController');

    // Locations
    Route::delete('locations/destroy', 'LocationController@massDestroy')->name('locations.massDestroy');
    Route::resource('locations', 'LocationController');

    // Gates
    Route::delete('gates/destroy', 'GateController@massDestroy')->name('gates.massDestroy');
    Route::resource('gates', 'GateController');

    // Histories
    Route::delete('histories/destroy', 'HistoryController@massDestroy')->name('histories.massDestroy');
    Route::resource('histories', 'HistoryController');

    // Qrs
    Route::delete('qrs/destroy', 'QrController@massDestroy')->name('qrs.massDestroy');
    Route::resource('qrs', 'QrController');

    // Defect Categories
    Route::delete('defect-categories/destroy', 'DefectCategoryController@massDestroy')->name('defect-categories.massDestroy');
    Route::resource('defect-categories', 'DefectCategoryController');

    // Status Controls
    Route::delete('status-controls/destroy', 'StatusControlController@massDestroy')->name('status-controls.massDestroy');
    Route::resource('status-controls', 'StatusControlController');

    // Add Defects
    Route::delete('add-defects/destroy', 'AddDefectController@massDestroy')->name('add-defects.massDestroy');
    Route::post('add-defects/media', 'AddDefectController@storeMedia')->name('add-defects.storeMedia');
    Route::post('add-defects/ckmedia', 'AddDefectController@storeCKEditorImages')->name('add-defects.storeCKEditorImages');
    Route::resource('add-defects', 'AddDefectController');

    // Payment Methods
    Route::delete('payment-methods/destroy', 'PaymentMethodController@massDestroy')->name('payment-methods.massDestroy');
    Route::resource('payment-methods', 'PaymentMethodController');

    // Maintenances Payments
    Route::delete('maintenances-payments/destroy', 'MaintenancesPaymentController@massDestroy')->name('maintenances-payments.massDestroy');
    Route::post('maintenances-payments/media', 'MaintenancesPaymentController@storeMedia')->name('maintenances-payments.storeMedia');
    Route::post('maintenances-payments/ckmedia', 'MaintenancesPaymentController@storeCKEditorImages')->name('maintenances-payments.storeCKEditorImages');
    Route::resource('maintenances-payments', 'MaintenancesPaymentController');

    // Facility Payments
    Route::delete('facility-payments/destroy', 'FacilityPaymentController@massDestroy')->name('facility-payments.massDestroy');
    Route::post('facility-payments/media', 'FacilityPaymentController@storeMedia')->name('facility-payments.storeMedia');
    Route::post('facility-payments/ckmedia', 'FacilityPaymentController@storeCKEditorImages')->name('facility-payments.storeCKEditorImages');
    Route::resource('facility-payments', 'FacilityPaymentController');

    // Notice Boards
    Route::delete('notice-boards/destroy', 'NoticeBoardController@massDestroy')->name('notice-boards.massDestroy');
    Route::resource('notice-boards', 'NoticeBoardController');

    // Event Categories
    Route::delete('event-categories/destroy', 'EventCategoryController@massDestroy')->name('event-categories.massDestroy');
    Route::resource('event-categories', 'EventCategoryController');

    // Event Controls
    Route::delete('event-controls/destroy', 'EventControlController@massDestroy')->name('event-controls.massDestroy');
    Route::resource('event-controls', 'EventControlController');

    // Event Enrolls
    Route::delete('event-enrolls/destroy', 'EventEnrollController@massDestroy')->name('event-enrolls.massDestroy');
    Route::resource('event-enrolls', 'EventEnrollController');

    // Add Feedbacks
    Route::delete('add-feedbacks/destroy', 'AddFeedbackController@massDestroy')->name('add-feedbacks.massDestroy');
    Route::post('add-feedbacks/media', 'AddFeedbackController@storeMedia')->name('add-feedbacks.storeMedia');
    Route::post('add-feedbacks/ckmedia', 'AddFeedbackController@storeCKEditorImages')->name('add-feedbacks.storeCKEditorImages');
    Route::resource('add-feedbacks', 'AddFeedbackController');

    // Feedback Categories
    Route::delete('feedback-categories/destroy', 'FeedbackCategoryController@massDestroy')->name('feedback-categories.massDestroy');
    Route::resource('feedback-categories', 'FeedbackCategoryController');

    // Form Categories
    Route::delete('form-categories/destroy', 'FormCategoryController@massDestroy')->name('form-categories.massDestroy');
    Route::resource('form-categories', 'FormCategoryController');

    // Membe Card Managements
    Route::delete('membe-card-managements/destroy', 'MembeCardManagementController@massDestroy')->name('membe-card-managements.massDestroy');
    Route::resource('membe-card-managements', 'MembeCardManagementController');

    // Membership Managements
    Route::delete('membership-managements/destroy', 'MembershipManagementController@massDestroy')->name('membership-managements.massDestroy');
    Route::resource('membership-managements', 'MembershipManagementController');

    // User Groups
    Route::resource('user-groups', 'UserGroupController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Merchant Categories
    Route::delete('merchant-categories/destroy', 'MerchantCategoryController@massDestroy')->name('merchant-categories.massDestroy');
    Route::resource('merchant-categories', 'MerchantCategoryController');

    // Merchant Sub Categories
    Route::delete('merchant-sub-categories/destroy', 'MerchantSubCategoryController@massDestroy')->name('merchant-sub-categories.massDestroy');
    Route::resource('merchant-sub-categories', 'MerchantSubCategoryController');

    // Order Types
    Route::delete('order-types/destroy', 'OrderTypeController@massDestroy')->name('order-types.massDestroy');
    Route::resource('order-types', 'OrderTypeController');

    // Merchant Levels
    Route::delete('merchant-levels/destroy', 'MerchantLevelController@massDestroy')->name('merchant-levels.massDestroy');
    Route::resource('merchant-levels', 'MerchantLevelController');

    // Merchant Managements
    Route::delete('merchant-managements/destroy', 'MerchantManagementController@massDestroy')->name('merchant-managements.massDestroy');
    Route::resource('merchant-managements', 'MerchantManagementController');

    // Member Card Settings
    Route::delete('member-card-settings/destroy', 'MemberCardSettingController@massDestroy')->name('member-card-settings.massDestroy');
    Route::post('member-card-settings/media', 'MemberCardSettingController@storeMedia')->name('member-card-settings.storeMedia');
    Route::post('member-card-settings/ckmedia', 'MemberCardSettingController@storeCKEditorImages')->name('member-card-settings.storeCKEditorImages');
    Route::resource('member-card-settings', 'MemberCardSettingController');

    // Item Cateogries
    Route::delete('item-cateogries/destroy', 'ItemCateogryController@massDestroy')->name('item-cateogries.massDestroy');
    Route::resource('item-cateogries', 'ItemCateogryController');

    // Item Managements
    Route::delete('item-managements/destroy', 'ItemManagementController@massDestroy')->name('item-managements.massDestroy');
    Route::post('item-managements/media', 'ItemManagementController@storeMedia')->name('item-managements.storeMedia');
    Route::post('item-managements/ckmedia', 'ItemManagementController@storeCKEditorImages')->name('item-managements.storeCKEditorImages');
    Route::resource('item-managements', 'ItemManagementController');

    // Add On Categories
    Route::delete('add-on-categories/destroy', 'AddOnCategoryController@massDestroy')->name('add-on-categories.massDestroy');
    Route::resource('add-on-categories', 'AddOnCategoryController');

    // Addon Managements
    Route::delete('addon-managements/destroy', 'AddonManagementController@massDestroy')->name('addon-managements.massDestroy');
    Route::resource('addon-managements', 'AddonManagementController');

    // Order Statuses
    Route::delete('order-statuses/destroy', 'OrderStatusController@massDestroy')->name('order-statuses.massDestroy');
    Route::resource('order-statuses', 'OrderStatusController');

    // Order Items
    Route::delete('order-items/destroy', 'OrderItemController@massDestroy')->name('order-items.massDestroy');
    Route::resource('order-items', 'OrderItemController');

    // Order Managements
    Route::delete('order-managements/destroy', 'OrderManagementController@massDestroy')->name('order-managements.massDestroy');
    Route::resource('order-managements', 'OrderManagementController');

    // Voucher Categories
    Route::delete('voucher-categories/destroy', 'VoucherCategoryController@massDestroy')->name('voucher-categories.massDestroy');
    Route::resource('voucher-categories', 'VoucherCategoryController');

    // Voucher Managements
    Route::delete('voucher-managements/destroy', 'VoucherManagementController@massDestroy')->name('voucher-managements.massDestroy');
    Route::resource('voucher-managements', 'VoucherManagementController');

    // Reward Catogeries
    Route::delete('reward-catogeries/destroy', 'RewardCatogeryController@massDestroy')->name('reward-catogeries.massDestroy');
    Route::resource('reward-catogeries', 'RewardCatogeryController');

    // Reward Managements
    Route::delete('reward-managements/destroy', 'RewardManagementController@massDestroy')->name('reward-managements.massDestroy');
    Route::resource('reward-managements', 'RewardManagementController');

    // Point Settings
    Route::delete('point-settings/destroy', 'PointSettingController@massDestroy')->name('point-settings.massDestroy');
    Route::resource('point-settings', 'PointSettingController');

    // Point Conditions
    Route::delete('point-conditions/destroy', 'PointConditionController@massDestroy')->name('point-conditions.massDestroy');
    Route::resource('point-conditions', 'PointConditionController');

    // Voucher Wallets
    Route::delete('voucher-wallets/destroy', 'VoucherWalletController@massDestroy')->name('voucher-wallets.massDestroy');
    Route::resource('voucher-wallets', 'VoucherWalletController');

    // Reward Lists
    Route::delete('reward-lists/destroy', 'RewardListController@massDestroy')->name('reward-lists.massDestroy');
    Route::resource('reward-lists', 'RewardListController');

    // Point Logs
    Route::delete('point-logs/destroy', 'PointLogController@massDestroy')->name('point-logs.massDestroy');
    Route::resource('point-logs', 'PointLogController');

    // Vehicle Brands
    Route::delete('vehicle-brands/destroy', 'VehicleBrandController@massDestroy')->name('vehicle-brands.massDestroy');
    Route::resource('vehicle-brands', 'VehicleBrandController');

    // Vehicle Mangements
    Route::delete('vehicle-mangements/destroy', 'VehicleMangementController@massDestroy')->name('vehicle-mangements.massDestroy');
    Route::resource('vehicle-mangements', 'VehicleMangementController');

    // Vehicle Models
    Route::delete('vehicle-models/destroy', 'VehicleModelController@massDestroy')->name('vehicle-models.massDestroy');
    Route::resource('vehicle-models', 'VehicleModelController');

    // Car Park Locations
    Route::delete('car-park-locations/destroy', 'CarParkLocationController@massDestroy')->name('car-park-locations.massDestroy');
    Route::resource('car-park-locations', 'CarParkLocationController');

    // Carpark Logs
    Route::delete('carpark-logs/destroy', 'CarparkLogController@massDestroy')->name('carpark-logs.massDestroy');
    Route::resource('carpark-logs', 'CarparkLogController');

    // Rate Settings
    Route::resource('rate-settings', 'RateSettingController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Event Payments
    Route::delete('event-payments/destroy', 'EventPaymentController@massDestroy')->name('event-payments.massDestroy');
    Route::resource('event-payments', 'EventPaymentController');

    // Carpark Payments
    Route::delete('carpark-payments/destroy', 'CarparkPaymentController@massDestroy')->name('carpark-payments.massDestroy');
    Route::resource('carpark-payments', 'CarparkPaymentController');

    // Shop Rentals
    Route::delete('shop-rentals/destroy', 'ShopRentalController@massDestroy')->name('shop-rentals.massDestroy');
    Route::resource('shop-rentals', 'ShopRentalController');

    // Mall Units
    Route::delete('mall-units/destroy', 'MallUnitController@massDestroy')->name('mall-units.massDestroy');
    Route::resource('mall-units', 'MallUnitController');

    // Voucher Redeems
    Route::delete('voucher-redeems/destroy', 'VoucherRedeemController@massDestroy')->name('voucher-redeems.massDestroy');
    Route::resource('voucher-redeems', 'VoucherRedeemController');

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
    Route::get('user-alerts/read', 'UserAlertsController@read');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Add Blocks
    Route::apiResource('add-blocks', 'AddBlockApiController');

    // Add Units
    Route::apiResource('add-units', 'AddUnitApiController');

    // Unit Managements
    Route::post('unit-managements/media', 'UnitManagementApiController@storeMedia')->name('unit-managements.storeMedia');
    Route::apiResource('unit-managements', 'UnitManagementApiController');

    // Facility Categories
    Route::apiResource('facility-categories', 'FacilityCategoryApiController');

    // Facility Managements
    Route::post('facility-managements/media', 'FacilityManagementApiController@storeMedia')->name('facility-managements.storeMedia');
    Route::apiResource('facility-managements', 'FacilityManagementApiController');

    // Facility Books
    Route::apiResource('facility-books', 'FacilityBookApiController');

    // Add Visitors
    Route::apiResource('add-visitors', 'AddVisitorApiController');

    // Locations
    Route::apiResource('locations', 'LocationApiController');

    // Gates
    Route::apiResource('gates', 'GateApiController');

    // Histories
    Route::apiResource('histories', 'HistoryApiController');

    // Qrs
    Route::apiResource('qrs', 'QrApiController');

    // Defect Categories
    Route::apiResource('defect-categories', 'DefectCategoryApiController');

    // Status Controls
    Route::apiResource('status-controls', 'StatusControlApiController');

    // Add Defects
    Route::post('add-defects/media', 'AddDefectApiController@storeMedia')->name('add-defects.storeMedia');
    Route::apiResource('add-defects', 'AddDefectApiController');

    // Payment Methods
    Route::apiResource('payment-methods', 'PaymentMethodApiController');

    // Maintenances Payments
    Route::post('maintenances-payments/media', 'MaintenancesPaymentApiController@storeMedia')->name('maintenances-payments.storeMedia');
    Route::apiResource('maintenances-payments', 'MaintenancesPaymentApiController');

    // Facility Payments
    Route::post('facility-payments/media', 'FacilityPaymentApiController@storeMedia')->name('facility-payments.storeMedia');
    Route::apiResource('facility-payments', 'FacilityPaymentApiController');

    // Notice Boards
    Route::apiResource('notice-boards', 'NoticeBoardApiController');

    // Event Categories
    Route::apiResource('event-categories', 'EventCategoryApiController');

    // Event Controls
    Route::apiResource('event-controls', 'EventControlApiController');

    // Event Enrolls
    Route::apiResource('event-enrolls', 'EventEnrollApiController');

    // Add Feedbacks
    Route::post('add-feedbacks/media', 'AddFeedbackApiController@storeMedia')->name('add-feedbacks.storeMedia');
    Route::apiResource('add-feedbacks', 'AddFeedbackApiController');

    // Feedback Categories
    Route::apiResource('feedback-categories', 'FeedbackCategoryApiController');

    // Form Categories
    Route::apiResource('form-categories', 'FormCategoryApiController');

    // Membe Card Managements
    Route::apiResource('membe-card-managements', 'MembeCardManagementApiController');

    // Membership Managements
    Route::apiResource('membership-managements', 'MembershipManagementApiController');

    // Merchant Categories
    Route::apiResource('merchant-categories', 'MerchantCategoryApiController');

    // Merchant Sub Categories
    Route::apiResource('merchant-sub-categories', 'MerchantSubCategoryApiController');

    // Order Types
    Route::apiResource('order-types', 'OrderTypeApiController');

    // Merchant Levels
    Route::apiResource('merchant-levels', 'MerchantLevelApiController');

    // Merchant Managements
    Route::apiResource('merchant-managements', 'MerchantManagementApiController');

    // Member Card Settings
    Route::post('member-card-settings/media', 'MemberCardSettingApiController@storeMedia')->name('member-card-settings.storeMedia');
    Route::apiResource('member-card-settings', 'MemberCardSettingApiController');

    // Item Cateogries
    Route::apiResource('item-cateogries', 'ItemCateogryApiController');

    // Item Managements
    Route::post('item-managements/media', 'ItemManagementApiController@storeMedia')->name('item-managements.storeMedia');
    Route::apiResource('item-managements', 'ItemManagementApiController');

    // Add On Categories
    Route::apiResource('add-on-categories', 'AddOnCategoryApiController');

    // Addon Managements
    Route::apiResource('addon-managements', 'AddonManagementApiController');

    // Order Statuses
    Route::apiResource('order-statuses', 'OrderStatusApiController');

    // Order Items
    Route::apiResource('order-items', 'OrderItemApiController');

    // Order Managements
    Route::apiResource('order-managements', 'OrderManagementApiController');

    // Voucher Categories
    Route::apiResource('voucher-categories', 'VoucherCategoryApiController');

    // Voucher Managements
    Route::apiResource('voucher-managements', 'VoucherManagementApiController');

    // Reward Catogeries
    Route::apiResource('reward-catogeries', 'RewardCatogeryApiController');

    // Reward Managements
    Route::apiResource('reward-managements', 'RewardManagementApiController');

    // Point Settings
    Route::apiResource('point-settings', 'PointSettingApiController');

    // Point Conditions
    Route::apiResource('point-conditions', 'PointConditionApiController');

    // Voucher Wallets
    Route::apiResource('voucher-wallets', 'VoucherWalletApiController');

    // Reward Lists
    Route::apiResource('reward-lists', 'RewardListApiController');

    // Point Logs
    Route::apiResource('point-logs', 'PointLogApiController');

    // Vehicle Brands
    Route::apiResource('vehicle-brands', 'VehicleBrandApiController');

    // Vehicle Mangements
    Route::apiResource('vehicle-mangements', 'VehicleMangementApiController');

    // Vehicle Models
    Route::apiResource('vehicle-models', 'VehicleModelApiController');

    // Car Park Locations
    Route::apiResource('car-park-locations', 'CarParkLocationApiController');

    // Carpark Logs
    Route::apiResource('carpark-logs', 'CarparkLogApiController');

    // Event Payments
    Route::apiResource('event-payments', 'EventPaymentApiController');

    // Carpark Payments
    Route::apiResource('carpark-payments', 'CarparkPaymentApiController');

    // Shop Rentals
    Route::apiResource('shop-rentals', 'ShopRentalApiController');

    // Mall Units
    Route::apiResource('mall-units', 'MallUnitApiController');

    // Voucher Redeems
    Route::apiResource('voucher-redeems', 'VoucherRedeemApiController');
});

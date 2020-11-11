<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'notice_access',
            ],
            [
                'id'    => 24,
                'title' => 'resident_access',
            ],
            [
                'id'    => 25,
                'title' => 'unit_access',
            ],
            [
                'id'    => 26,
                'title' => 'facility_access',
            ],
            [
                'id'    => 27,
                'title' => 'family_access',
            ],
            [
                'id'    => 28,
                'title' => 'tenant_access',
            ],
            [
                'id'    => 29,
                'title' => 'visitor_access',
            ],
            [
                'id'    => 30,
                'title' => 'defect_access',
            ],
            [
                'id'    => 31,
                'title' => 'add_block_create',
            ],
            [
                'id'    => 32,
                'title' => 'add_block_edit',
            ],
            [
                'id'    => 33,
                'title' => 'add_block_show',
            ],
            [
                'id'    => 34,
                'title' => 'add_block_delete',
            ],
            [
                'id'    => 35,
                'title' => 'add_block_access',
            ],
            [
                'id'    => 36,
                'title' => 'add_unit_create',
            ],
            [
                'id'    => 37,
                'title' => 'add_unit_edit',
            ],
            [
                'id'    => 38,
                'title' => 'add_unit_show',
            ],
            [
                'id'    => 39,
                'title' => 'add_unit_delete',
            ],
            [
                'id'    => 40,
                'title' => 'add_unit_access',
            ],
            [
                'id'    => 41,
                'title' => 'unit_management_create',
            ],
            [
                'id'    => 42,
                'title' => 'unit_management_edit',
            ],
            [
                'id'    => 43,
                'title' => 'unit_management_show',
            ],
            [
                'id'    => 44,
                'title' => 'unit_management_delete',
            ],
            [
                'id'    => 45,
                'title' => 'unit_management_access',
            ],
            [
                'id'    => 46,
                'title' => 'add_family_member_access',
            ],
            [
                'id'    => 47,
                'title' => 'activity_log_access',
            ],
            [
                'id'    => 48,
                'title' => 'facility_category_create',
            ],
            [
                'id'    => 49,
                'title' => 'facility_category_edit',
            ],
            [
                'id'    => 50,
                'title' => 'facility_category_show',
            ],
            [
                'id'    => 51,
                'title' => 'facility_category_delete',
            ],
            [
                'id'    => 52,
                'title' => 'facility_category_access',
            ],
            [
                'id'    => 53,
                'title' => 'facility_management_create',
            ],
            [
                'id'    => 54,
                'title' => 'facility_management_edit',
            ],
            [
                'id'    => 55,
                'title' => 'facility_management_show',
            ],
            [
                'id'    => 56,
                'title' => 'facility_management_delete',
            ],
            [
                'id'    => 57,
                'title' => 'facility_management_access',
            ],
            [
                'id'    => 58,
                'title' => 'add_tenant_access',
            ],
            [
                'id'    => 59,
                'title' => 'resident_setting_access',
            ],
            [
                'id'    => 60,
                'title' => 'family_setting_access',
            ],
            [
                'id'    => 61,
                'title' => 'tenant_setting_access',
            ],
            [
                'id'    => 62,
                'title' => 'facility_book_create',
            ],
            [
                'id'    => 63,
                'title' => 'facility_book_edit',
            ],
            [
                'id'    => 64,
                'title' => 'facility_book_show',
            ],
            [
                'id'    => 65,
                'title' => 'facility_book_delete',
            ],
            [
                'id'    => 66,
                'title' => 'facility_book_access',
            ],
            [
                'id'    => 67,
                'title' => 'check_facility_access',
            ],
            [
                'id'    => 68,
                'title' => 'add_visitor_create',
            ],
            [
                'id'    => 69,
                'title' => 'add_visitor_edit',
            ],
            [
                'id'    => 70,
                'title' => 'add_visitor_show',
            ],
            [
                'id'    => 71,
                'title' => 'add_visitor_delete',
            ],
            [
                'id'    => 72,
                'title' => 'add_visitor_access',
            ],
            [
                'id'    => 73,
                'title' => 'acess_management_access',
            ],
            [
                'id'    => 74,
                'title' => 'location_create',
            ],
            [
                'id'    => 75,
                'title' => 'location_edit',
            ],
            [
                'id'    => 76,
                'title' => 'location_show',
            ],
            [
                'id'    => 77,
                'title' => 'location_delete',
            ],
            [
                'id'    => 78,
                'title' => 'location_access',
            ],
            [
                'id'    => 79,
                'title' => 'gate_create',
            ],
            [
                'id'    => 80,
                'title' => 'gate_edit',
            ],
            [
                'id'    => 81,
                'title' => 'gate_show',
            ],
            [
                'id'    => 82,
                'title' => 'gate_delete',
            ],
            [
                'id'    => 83,
                'title' => 'gate_access',
            ],
            [
                'id'    => 84,
                'title' => 'history_create',
            ],
            [
                'id'    => 85,
                'title' => 'history_edit',
            ],
            [
                'id'    => 86,
                'title' => 'history_show',
            ],
            [
                'id'    => 87,
                'title' => 'history_delete',
            ],
            [
                'id'    => 88,
                'title' => 'history_access',
            ],
            [
                'id'    => 89,
                'title' => 'qr_create',
            ],
            [
                'id'    => 90,
                'title' => 'qr_edit',
            ],
            [
                'id'    => 91,
                'title' => 'qr_show',
            ],
            [
                'id'    => 92,
                'title' => 'qr_delete',
            ],
            [
                'id'    => 93,
                'title' => 'qr_access',
            ],
            [
                'id'    => 94,
                'title' => 'feedback_access',
            ],
            [
                'id'    => 95,
                'title' => 'defect_category_create',
            ],
            [
                'id'    => 96,
                'title' => 'defect_category_edit',
            ],
            [
                'id'    => 97,
                'title' => 'defect_category_show',
            ],
            [
                'id'    => 98,
                'title' => 'defect_category_delete',
            ],
            [
                'id'    => 99,
                'title' => 'defect_category_access',
            ],
            [
                'id'    => 100,
                'title' => 'status_control_create',
            ],
            [
                'id'    => 101,
                'title' => 'status_control_edit',
            ],
            [
                'id'    => 102,
                'title' => 'status_control_show',
            ],
            [
                'id'    => 103,
                'title' => 'status_control_delete',
            ],
            [
                'id'    => 104,
                'title' => 'status_control_access',
            ],
            [
                'id'    => 105,
                'title' => 'add_defect_create',
            ],
            [
                'id'    => 106,
                'title' => 'add_defect_edit',
            ],
            [
                'id'    => 107,
                'title' => 'add_defect_show',
            ],
            [
                'id'    => 108,
                'title' => 'add_defect_delete',
            ],
            [
                'id'    => 109,
                'title' => 'add_defect_access',
            ],
            [
                'id'    => 110,
                'title' => 'e_billing_access',
            ],
            [
                'id'    => 111,
                'title' => 'maintenance_access',
            ],
            [
                'id'    => 112,
                'title' => 'facility_fee_access',
            ],
            [
                'id'    => 113,
                'title' => 'payment_method_create',
            ],
            [
                'id'    => 114,
                'title' => 'payment_method_edit',
            ],
            [
                'id'    => 115,
                'title' => 'payment_method_show',
            ],
            [
                'id'    => 116,
                'title' => 'payment_method_delete',
            ],
            [
                'id'    => 117,
                'title' => 'payment_method_access',
            ],
            [
                'id'    => 118,
                'title' => 'maintenances_payment_create',
            ],
            [
                'id'    => 119,
                'title' => 'maintenances_payment_edit',
            ],
            [
                'id'    => 120,
                'title' => 'maintenances_payment_show',
            ],
            [
                'id'    => 121,
                'title' => 'maintenances_payment_delete',
            ],
            [
                'id'    => 122,
                'title' => 'maintenances_payment_access',
            ],
            [
                'id'    => 123,
                'title' => 'facility_payment_create',
            ],
            [
                'id'    => 124,
                'title' => 'facility_payment_edit',
            ],
            [
                'id'    => 125,
                'title' => 'facility_payment_show',
            ],
            [
                'id'    => 126,
                'title' => 'facility_payment_delete',
            ],
            [
                'id'    => 127,
                'title' => 'facility_payment_access',
            ],
            [
                'id'    => 128,
                'title' => 'notice_board_create',
            ],
            [
                'id'    => 129,
                'title' => 'notice_board_edit',
            ],
            [
                'id'    => 130,
                'title' => 'notice_board_show',
            ],
            [
                'id'    => 131,
                'title' => 'notice_board_delete',
            ],
            [
                'id'    => 132,
                'title' => 'notice_board_access',
            ],
            [
                'id'    => 133,
                'title' => 'event_access',
            ],
            [
                'id'    => 134,
                'title' => 'event_category_create',
            ],
            [
                'id'    => 135,
                'title' => 'event_category_edit',
            ],
            [
                'id'    => 136,
                'title' => 'event_category_show',
            ],
            [
                'id'    => 137,
                'title' => 'event_category_delete',
            ],
            [
                'id'    => 138,
                'title' => 'event_category_access',
            ],
            [
                'id'    => 139,
                'title' => 'event_control_create',
            ],
            [
                'id'    => 140,
                'title' => 'event_control_edit',
            ],
            [
                'id'    => 141,
                'title' => 'event_control_show',
            ],
            [
                'id'    => 142,
                'title' => 'event_control_delete',
            ],
            [
                'id'    => 143,
                'title' => 'event_control_access',
            ],
            [
                'id'    => 144,
                'title' => 'event_enroll_create',
            ],
            [
                'id'    => 145,
                'title' => 'event_enroll_edit',
            ],
            [
                'id'    => 146,
                'title' => 'event_enroll_show',
            ],
            [
                'id'    => 147,
                'title' => 'event_enroll_delete',
            ],
            [
                'id'    => 148,
                'title' => 'event_enroll_access',
            ],
            [
                'id'    => 149,
                'title' => 'add_feedback_create',
            ],
            [
                'id'    => 150,
                'title' => 'add_feedback_edit',
            ],
            [
                'id'    => 151,
                'title' => 'add_feedback_show',
            ],
            [
                'id'    => 152,
                'title' => 'add_feedback_delete',
            ],
            [
                'id'    => 153,
                'title' => 'add_feedback_access',
            ],
            [
                'id'    => 154,
                'title' => 'feedback_category_create',
            ],
            [
                'id'    => 155,
                'title' => 'feedback_category_edit',
            ],
            [
                'id'    => 156,
                'title' => 'feedback_category_show',
            ],
            [
                'id'    => 157,
                'title' => 'feedback_category_delete',
            ],
            [
                'id'    => 158,
                'title' => 'feedback_category_access',
            ],
            [
                'id'    => 159,
                'title' => 'mall_access',
            ],
            [
                'id'    => 160,
                'title' => 'reward_access',
            ],
            [
                'id'    => 161,
                'title' => 'merchant_access',
            ],
            [
                'id'    => 162,
                'title' => 'point_access',
            ],
            [
                'id'    => 163,
                'title' => 'form_access',
            ],
            [
                'id'    => 164,
                'title' => 'form_category_create',
            ],
            [
                'id'    => 165,
                'title' => 'form_category_edit',
            ],
            [
                'id'    => 166,
                'title' => 'form_category_show',
            ],
            [
                'id'    => 167,
                'title' => 'form_category_delete',
            ],
            [
                'id'    => 168,
                'title' => 'form_category_access',
            ],
            [
                'id'    => 169,
                'title' => 'voucher_access',
            ],
            [
                'id'    => 170,
                'title' => 'membership_access',
            ],
            [
                'id'    => 171,
                'title' => 'item_access',
            ],
            [
                'id'    => 172,
                'title' => 'order_access',
            ],
            [
                'id'    => 173,
                'title' => 'report_access',
            ],
            [
                'id'    => 174,
                'title' => 'security_access',
            ],
            [
                'id'    => 175,
                'title' => 'system_setting_access',
            ],
            [
                'id'    => 176,
                'title' => 'member_card_access',
            ],
            [
                'id'    => 177,
                'title' => 'membe_card_management_create',
            ],
            [
                'id'    => 178,
                'title' => 'membe_card_management_edit',
            ],
            [
                'id'    => 179,
                'title' => 'membe_card_management_show',
            ],
            [
                'id'    => 180,
                'title' => 'membe_card_management_delete',
            ],
            [
                'id'    => 181,
                'title' => 'membe_card_management_access',
            ],
            [
                'id'    => 182,
                'title' => 'membership_management_create',
            ],
            [
                'id'    => 183,
                'title' => 'membership_management_edit',
            ],
            [
                'id'    => 184,
                'title' => 'membership_management_show',
            ],
            [
                'id'    => 185,
                'title' => 'membership_management_delete',
            ],
            [
                'id'    => 186,
                'title' => 'membership_management_access',
            ],
            [
                'id'    => 187,
                'title' => 'user_group_access',
            ],
            [
                'id'    => 188,
                'title' => 'merchant_category_create',
            ],
            [
                'id'    => 189,
                'title' => 'merchant_category_edit',
            ],
            [
                'id'    => 190,
                'title' => 'merchant_category_show',
            ],
            [
                'id'    => 191,
                'title' => 'merchant_category_delete',
            ],
            [
                'id'    => 192,
                'title' => 'merchant_category_access',
            ],
            [
                'id'    => 193,
                'title' => 'merchant_sub_category_create',
            ],
            [
                'id'    => 194,
                'title' => 'merchant_sub_category_edit',
            ],
            [
                'id'    => 195,
                'title' => 'merchant_sub_category_show',
            ],
            [
                'id'    => 196,
                'title' => 'merchant_sub_category_delete',
            ],
            [
                'id'    => 197,
                'title' => 'merchant_sub_category_access',
            ],
            [
                'id'    => 198,
                'title' => 'order_type_create',
            ],
            [
                'id'    => 199,
                'title' => 'order_type_edit',
            ],
            [
                'id'    => 200,
                'title' => 'order_type_show',
            ],
            [
                'id'    => 201,
                'title' => 'order_type_delete',
            ],
            [
                'id'    => 202,
                'title' => 'order_type_access',
            ],
            [
                'id'    => 203,
                'title' => 'merchant_level_create',
            ],
            [
                'id'    => 204,
                'title' => 'merchant_level_edit',
            ],
            [
                'id'    => 205,
                'title' => 'merchant_level_show',
            ],
            [
                'id'    => 206,
                'title' => 'merchant_level_delete',
            ],
            [
                'id'    => 207,
                'title' => 'merchant_level_access',
            ],
            [
                'id'    => 208,
                'title' => 'merchant_management_create',
            ],
            [
                'id'    => 209,
                'title' => 'merchant_management_edit',
            ],
            [
                'id'    => 210,
                'title' => 'merchant_management_show',
            ],
            [
                'id'    => 211,
                'title' => 'merchant_management_delete',
            ],
            [
                'id'    => 212,
                'title' => 'merchant_management_access',
            ],
            [
                'id'    => 213,
                'title' => 'member_card_setting_create',
            ],
            [
                'id'    => 214,
                'title' => 'member_card_setting_edit',
            ],
            [
                'id'    => 215,
                'title' => 'member_card_setting_show',
            ],
            [
                'id'    => 216,
                'title' => 'member_card_setting_delete',
            ],
            [
                'id'    => 217,
                'title' => 'member_card_setting_access',
            ],
            [
                'id'    => 218,
                'title' => 'item_cateogry_create',
            ],
            [
                'id'    => 219,
                'title' => 'item_cateogry_edit',
            ],
            [
                'id'    => 220,
                'title' => 'item_cateogry_show',
            ],
            [
                'id'    => 221,
                'title' => 'item_cateogry_delete',
            ],
            [
                'id'    => 222,
                'title' => 'item_cateogry_access',
            ],
            [
                'id'    => 223,
                'title' => 'item_management_create',
            ],
            [
                'id'    => 224,
                'title' => 'item_management_edit',
            ],
            [
                'id'    => 225,
                'title' => 'item_management_show',
            ],
            [
                'id'    => 226,
                'title' => 'item_management_delete',
            ],
            [
                'id'    => 227,
                'title' => 'item_management_access',
            ],
            [
                'id'    => 228,
                'title' => 'add_on_category_create',
            ],
            [
                'id'    => 229,
                'title' => 'add_on_category_edit',
            ],
            [
                'id'    => 230,
                'title' => 'add_on_category_show',
            ],
            [
                'id'    => 231,
                'title' => 'add_on_category_delete',
            ],
            [
                'id'    => 232,
                'title' => 'add_on_category_access',
            ],
            [
                'id'    => 233,
                'title' => 'addon_management_create',
            ],
            [
                'id'    => 234,
                'title' => 'addon_management_edit',
            ],
            [
                'id'    => 235,
                'title' => 'addon_management_show',
            ],
            [
                'id'    => 236,
                'title' => 'addon_management_delete',
            ],
            [
                'id'    => 237,
                'title' => 'addon_management_access',
            ],
            [
                'id'    => 238,
                'title' => 'order_status_create',
            ],
            [
                'id'    => 239,
                'title' => 'order_status_edit',
            ],
            [
                'id'    => 240,
                'title' => 'order_status_show',
            ],
            [
                'id'    => 241,
                'title' => 'order_status_delete',
            ],
            [
                'id'    => 242,
                'title' => 'order_status_access',
            ],
            [
                'id'    => 243,
                'title' => 'order_item_create',
            ],
            [
                'id'    => 244,
                'title' => 'order_item_edit',
            ],
            [
                'id'    => 245,
                'title' => 'order_item_show',
            ],
            [
                'id'    => 246,
                'title' => 'order_item_delete',
            ],
            [
                'id'    => 247,
                'title' => 'order_item_access',
            ],
            [
                'id'    => 248,
                'title' => 'order_management_create',
            ],
            [
                'id'    => 249,
                'title' => 'order_management_edit',
            ],
            [
                'id'    => 250,
                'title' => 'order_management_show',
            ],
            [
                'id'    => 251,
                'title' => 'order_management_delete',
            ],
            [
                'id'    => 252,
                'title' => 'order_management_access',
            ],
            [
                'id'    => 253,
                'title' => 'voucher_category_create',
            ],
            [
                'id'    => 254,
                'title' => 'voucher_category_edit',
            ],
            [
                'id'    => 255,
                'title' => 'voucher_category_show',
            ],
            [
                'id'    => 256,
                'title' => 'voucher_category_delete',
            ],
            [
                'id'    => 257,
                'title' => 'voucher_category_access',
            ],
            [
                'id'    => 258,
                'title' => 'voucher_management_create',
            ],
            [
                'id'    => 259,
                'title' => 'voucher_management_edit',
            ],
            [
                'id'    => 260,
                'title' => 'voucher_management_show',
            ],
            [
                'id'    => 261,
                'title' => 'voucher_management_delete',
            ],
            [
                'id'    => 262,
                'title' => 'voucher_management_access',
            ],
            [
                'id'    => 263,
                'title' => 'reward_catogery_create',
            ],
            [
                'id'    => 264,
                'title' => 'reward_catogery_edit',
            ],
            [
                'id'    => 265,
                'title' => 'reward_catogery_show',
            ],
            [
                'id'    => 266,
                'title' => 'reward_catogery_delete',
            ],
            [
                'id'    => 267,
                'title' => 'reward_catogery_access',
            ],
            [
                'id'    => 268,
                'title' => 'reward_management_create',
            ],
            [
                'id'    => 269,
                'title' => 'reward_management_edit',
            ],
            [
                'id'    => 270,
                'title' => 'reward_management_show',
            ],
            [
                'id'    => 271,
                'title' => 'reward_management_delete',
            ],
            [
                'id'    => 272,
                'title' => 'reward_management_access',
            ],
            [
                'id'    => 273,
                'title' => 'point_setting_create',
            ],
            [
                'id'    => 274,
                'title' => 'point_setting_edit',
            ],
            [
                'id'    => 275,
                'title' => 'point_setting_show',
            ],
            [
                'id'    => 276,
                'title' => 'point_setting_delete',
            ],
            [
                'id'    => 277,
                'title' => 'point_setting_access',
            ],
            [
                'id'    => 278,
                'title' => 'point_condition_create',
            ],
            [
                'id'    => 279,
                'title' => 'point_condition_edit',
            ],
            [
                'id'    => 280,
                'title' => 'point_condition_show',
            ],
            [
                'id'    => 281,
                'title' => 'point_condition_delete',
            ],
            [
                'id'    => 282,
                'title' => 'point_condition_access',
            ],
            [
                'id'    => 283,
                'title' => 'voucher_wallet_create',
            ],
            [
                'id'    => 284,
                'title' => 'voucher_wallet_edit',
            ],
            [
                'id'    => 285,
                'title' => 'voucher_wallet_show',
            ],
            [
                'id'    => 286,
                'title' => 'voucher_wallet_delete',
            ],
            [
                'id'    => 287,
                'title' => 'voucher_wallet_access',
            ],
            [
                'id'    => 288,
                'title' => 'reward_list_create',
            ],
            [
                'id'    => 289,
                'title' => 'reward_list_edit',
            ],
            [
                'id'    => 290,
                'title' => 'reward_list_show',
            ],
            [
                'id'    => 291,
                'title' => 'reward_list_delete',
            ],
            [
                'id'    => 292,
                'title' => 'reward_list_access',
            ],
            [
                'id'    => 293,
                'title' => 'point_log_create',
            ],
            [
                'id'    => 294,
                'title' => 'point_log_edit',
            ],
            [
                'id'    => 295,
                'title' => 'point_log_show',
            ],
            [
                'id'    => 296,
                'title' => 'point_log_delete',
            ],
            [
                'id'    => 297,
                'title' => 'point_log_access',
            ],
            [
                'id'    => 298,
                'title' => 'car_park_access',
            ],
            [
                'id'    => 299,
                'title' => 'vehicle_brand_create',
            ],
            [
                'id'    => 300,
                'title' => 'vehicle_brand_edit',
            ],
            [
                'id'    => 301,
                'title' => 'vehicle_brand_show',
            ],
            [
                'id'    => 302,
                'title' => 'vehicle_brand_delete',
            ],
            [
                'id'    => 303,
                'title' => 'vehicle_brand_access',
            ],
            [
                'id'    => 304,
                'title' => 'vehicle_mangement_create',
            ],
            [
                'id'    => 305,
                'title' => 'vehicle_mangement_edit',
            ],
            [
                'id'    => 306,
                'title' => 'vehicle_mangement_show',
            ],
            [
                'id'    => 307,
                'title' => 'vehicle_mangement_delete',
            ],
            [
                'id'    => 308,
                'title' => 'vehicle_mangement_access',
            ],
            [
                'id'    => 309,
                'title' => 'vehicle_model_create',
            ],
            [
                'id'    => 310,
                'title' => 'vehicle_model_edit',
            ],
            [
                'id'    => 311,
                'title' => 'vehicle_model_show',
            ],
            [
                'id'    => 312,
                'title' => 'vehicle_model_delete',
            ],
            [
                'id'    => 313,
                'title' => 'vehicle_model_access',
            ],
            [
                'id'    => 314,
                'title' => 'car_park_location_create',
            ],
            [
                'id'    => 315,
                'title' => 'car_park_location_edit',
            ],
            [
                'id'    => 316,
                'title' => 'car_park_location_show',
            ],
            [
                'id'    => 317,
                'title' => 'car_park_location_delete',
            ],
            [
                'id'    => 318,
                'title' => 'car_park_location_access',
            ],
            [
                'id'    => 319,
                'title' => 'carpark_log_create',
            ],
            [
                'id'    => 320,
                'title' => 'carpark_log_edit',
            ],
            [
                'id'    => 321,
                'title' => 'carpark_log_show',
            ],
            [
                'id'    => 322,
                'title' => 'carpark_log_delete',
            ],
            [
                'id'    => 323,
                'title' => 'carpark_log_access',
            ],
            [
                'id'    => 324,
                'title' => 'rate_setting_access',
            ],
            [
                'id'    => 325,
                'title' => 'event_payment_create',
            ],
            [
                'id'    => 326,
                'title' => 'event_payment_edit',
            ],
            [
                'id'    => 327,
                'title' => 'event_payment_show',
            ],
            [
                'id'    => 328,
                'title' => 'event_payment_delete',
            ],
            [
                'id'    => 329,
                'title' => 'event_payment_access',
            ],
            [
                'id'    => 330,
                'title' => 'carpark_payment_create',
            ],
            [
                'id'    => 331,
                'title' => 'carpark_payment_edit',
            ],
            [
                'id'    => 332,
                'title' => 'carpark_payment_show',
            ],
            [
                'id'    => 333,
                'title' => 'carpark_payment_delete',
            ],
            [
                'id'    => 334,
                'title' => 'carpark_payment_access',
            ],
            [
                'id'    => 335,
                'title' => 'shop_rental_create',
            ],
            [
                'id'    => 336,
                'title' => 'shop_rental_edit',
            ],
            [
                'id'    => 337,
                'title' => 'shop_rental_show',
            ],
            [
                'id'    => 338,
                'title' => 'shop_rental_delete',
            ],
            [
                'id'    => 339,
                'title' => 'shop_rental_access',
            ],
            [
                'id'    => 340,
                'title' => 'mall_management_access',
            ],
            [
                'id'    => 341,
                'title' => 'mall_unit_create',
            ],
            [
                'id'    => 342,
                'title' => 'mall_unit_edit',
            ],
            [
                'id'    => 343,
                'title' => 'mall_unit_show',
            ],
            [
                'id'    => 344,
                'title' => 'mall_unit_delete',
            ],
            [
                'id'    => 345,
                'title' => 'mall_unit_access',
            ],
            [
                'id'    => 346,
                'title' => 'voucher_redeem_create',
            ],
            [
                'id'    => 347,
                'title' => 'voucher_redeem_edit',
            ],
            [
                'id'    => 348,
                'title' => 'voucher_redeem_show',
            ],
            [
                'id'    => 349,
                'title' => 'voucher_redeem_delete',
            ],
            [
                'id'    => 350,
                'title' => 'voucher_redeem_access',
            ],
            [
                'id'    => 351,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}

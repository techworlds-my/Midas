<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('resident_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-home c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.resident.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('unit_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/add-units*") ? "c-show" : "" }} {{ request()->is("admin/add-blocks*") ? "c-show" : "" }} {{ request()->is("admin/unit-managements*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-home c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.unit.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('add_unit_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.add-units.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/add-units") || request()->is("admin/add-units/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-plus-circle c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.addUnit.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('add_block_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.add-blocks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/add-blocks") || request()->is("admin/add-blocks/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-plus-circle c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.addBlock.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('unit_management_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.unit-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/unit-managements") || request()->is("admin/unit-managements/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.unitManagement.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('family_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/add-family-members*") ? "c-show" : "" }} {{ request()->is("admin/activity-logs*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-child c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.family.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('add_family_member_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.add-family-members.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/add-family-members") || request()->is("admin/add-family-members/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-plus-circle c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.addFamilyMember.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('activity_log_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.activity-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/activity-logs") || request()->is("admin/activity-logs/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-sign-in-alt c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.activityLog.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('tenant_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/add-tenants*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tenant.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('add_tenant_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.add-tenants.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/add-tenants") || request()->is("admin/add-tenants/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-plus-circle c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.addTenant.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('facility_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/facility-categories*") ? "c-show" : "" }} {{ request()->is("admin/facility-managements*") ? "c-show" : "" }} {{ request()->is("admin/facility-books*") ? "c-show" : "" }} {{ request()->is("admin/check-facilities*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-swimmer c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.facility.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('facility_category_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.facility-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/facility-categories") || request()->is("admin/facility-categories/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.facilityCategory.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('facility_management_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.facility-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/facility-managements") || request()->is("admin/facility-managements/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-link c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.facilityManagement.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('facility_book_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.facility-books.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/facility-books") || request()->is("admin/facility-books/*") ? "c-active" : "" }}">
                                            <i class="fa-fw far fa-calendar-plus c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.facilityBook.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('check_facility_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.check-facilities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/check-facilities") || request()->is("admin/check-facilities/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.checkFacility.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('visitor_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/add-visitors*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.visitor.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('add_visitor_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.add-visitors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/add-visitors") || request()->is("admin/add-visitors/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-plus-circle c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.addVisitor.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('defect_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/add-defects*") ? "c-show" : "" }} {{ request()->is("admin/status-controls*") ? "c-show" : "" }} {{ request()->is("admin/defect-categories*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-unlink c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.defect.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('add_defect_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.add-defects.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/add-defects") || request()->is("admin/add-defects/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-plus-circle c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.addDefect.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('status_control_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.status-controls.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/status-controls") || request()->is("admin/status-controls/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.statusControl.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('defect_category_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.defect-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/defect-categories") || request()->is("admin/defect-categories/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.defectCategory.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('acess_management_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/gates*") ? "c-show" : "" }} {{ request()->is("admin/histories*") ? "c-show" : "" }} {{ request()->is("admin/qrs*") ? "c-show" : "" }} {{ request()->is("admin/locations*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-sign-in-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.acessManagement.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('gate_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.gates.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/gates") || request()->is("admin/gates/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-door-closed c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.gate.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('history_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.histories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/histories") || request()->is("admin/histories/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-history c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.history.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('qr_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.qrs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/qrs") || request()->is("admin/qrs/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.qr.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('location_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.locations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/locations") || request()->is("admin/locations/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-map-marker-alt c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.location.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('form_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/form-categories*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-file-signature c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.form.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('form_category_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.form-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/form-categories") || request()->is("admin/form-categories/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.formCategory.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('e_billing_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/payment-methods*") ? "c-show" : "" }} {{ request()->is("admin/event-payments*") ? "c-show" : "" }} {{ request()->is("admin/carpark-payments*") ? "c-show" : "" }} {{ request()->is("admin/shop-rentals*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-dollar-sign c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.eBilling.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('maintenance_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/maintenances-payments*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-home c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.maintenance.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('maintenances_payment_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.maintenances-payments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/maintenances-payments") || request()->is("admin/maintenances-payments/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-dollar-sign c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.maintenancesPayment.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('facility_fee_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/facility-payments*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-swimming-pool c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.facilityFee.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('facility_payment_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.facility-payments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/facility-payments") || request()->is("admin/facility-payments/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-dollar-sign c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.facilityPayment.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('payment_method_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.payment-methods.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/payment-methods") || request()->is("admin/payment-methods/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.paymentMethod.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('event_payment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.event-payments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/event-payments") || request()->is("admin/event-payments/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-dollar-sign c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.eventPayment.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('carpark_payment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.carpark-payments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/carpark-payments") || request()->is("admin/carpark-payments/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-car c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.carparkPayment.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('shop_rental_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.shop-rentals.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/shop-rentals") || request()->is("admin/shop-rentals/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-dollar-sign c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.shopRental.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('feedback_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/add-feedbacks*") ? "c-show" : "" }} {{ request()->is("admin/feedback-categories*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-comment c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.feedback.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('add_feedback_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.add-feedbacks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/add-feedbacks") || request()->is("admin/add-feedbacks/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-comment c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.addFeedback.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('feedback_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.feedback-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/feedback-categories") || request()->is("admin/feedback-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.feedbackCategory.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('resident_setting_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/family-settings*") ? "c-show" : "" }} {{ request()->is("admin/tenant-settings*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.residentSetting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('family_setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.family-settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/family-settings") || request()->is("admin/family-settings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.familySetting.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tenant_setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tenant-settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tenant-settings") || request()->is("admin/tenant-settings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tenantSetting.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('notice_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/user-alerts*") ? "c-show" : "" }} {{ request()->is("admin/notice-boards*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-calendar-check c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.notice.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('user_alert_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userAlert.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('notice_board_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.notice-boards.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/notice-boards") || request()->is("admin/notice-boards/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-table c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.noticeBoard.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('event_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/event-categories*") ? "c-show" : "" }} {{ request()->is("admin/event-controls*") ? "c-show" : "" }} {{ request()->is("admin/event-enrolls*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-calendar-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.event.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('event_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.event-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/event-categories") || request()->is("admin/event-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.eventCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('event_control_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.event-controls.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/event-controls") || request()->is("admin/event-controls/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.eventControl.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('event_enroll_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.event-enrolls.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/event-enrolls") || request()->is("admin/event-enrolls/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.eventEnroll.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('mall_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-shopping-basket c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.mall.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('merchant_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/merchant-categories*") ? "c-show" : "" }} {{ request()->is("admin/merchant-sub-categories*") ? "c-show" : "" }} {{ request()->is("admin/merchant-managements*") ? "c-show" : "" }} {{ request()->is("admin/merchant-levels*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-user-tie c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.merchant.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('merchant_category_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.merchant-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/merchant-categories") || request()->is("admin/merchant-categories/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.merchantCategory.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('merchant_sub_category_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.merchant-sub-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/merchant-sub-categories") || request()->is("admin/merchant-sub-categories/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.merchantSubCategory.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('merchant_management_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.merchant-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/merchant-managements") || request()->is("admin/merchant-managements/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.merchantManagement.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('merchant_level_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.merchant-levels.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/merchant-levels") || request()->is("admin/merchant-levels/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.merchantLevel.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('member_card_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/membe-card-managements*") ? "c-show" : "" }} {{ request()->is("admin/member-card-settings*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-address-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.memberCard.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('membe_card_management_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.membe-card-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/membe-card-managements") || request()->is("admin/membe-card-managements/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.membeCardManagement.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('member_card_setting_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.member-card-settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/member-card-settings") || request()->is("admin/member-card-settings/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.memberCardSetting.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('membership_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/membership-managements*") ? "c-show" : "" }} {{ request()->is("admin/user-groups*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.membership.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('membership_management_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.membership-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/membership-managements") || request()->is("admin/membership-managements/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.membershipManagement.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('user_group_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.user-groups.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-groups") || request()->is("admin/user-groups/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.userGroup.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('reward_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/reward-catogeries*") ? "c-show" : "" }} {{ request()->is("admin/reward-managements*") ? "c-show" : "" }} {{ request()->is("admin/reward-lists*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-blender c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reward.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('reward_catogery_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.reward-catogeries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reward-catogeries") || request()->is("admin/reward-catogeries/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.rewardCatogery.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('reward_management_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.reward-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reward-managements") || request()->is("admin/reward-managements/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.rewardManagement.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('reward_list_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.reward-lists.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reward-lists") || request()->is("admin/reward-lists/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-history c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.rewardList.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('point_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/point-settings*") ? "c-show" : "" }} {{ request()->is("admin/point-conditions*") ? "c-show" : "" }} {{ request()->is("admin/point-logs*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-award c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.point.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('point_setting_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.point-settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/point-settings") || request()->is("admin/point-settings/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.pointSetting.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('point_condition_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.point-conditions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/point-conditions") || request()->is("admin/point-conditions/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.pointCondition.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('point_log_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.point-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/point-logs") || request()->is("admin/point-logs/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-history c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.pointLog.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('voucher_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/voucher-categories*") ? "c-show" : "" }} {{ request()->is("admin/voucher-managements*") ? "c-show" : "" }} {{ request()->is("admin/voucher-wallets*") ? "c-show" : "" }} {{ request()->is("admin/voucher-redeems*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw far fa-money-bill-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.voucher.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('voucher_category_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.voucher-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/voucher-categories") || request()->is("admin/voucher-categories/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.voucherCategory.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('voucher_management_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.voucher-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/voucher-managements") || request()->is("admin/voucher-managements/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-money-bill-wave-alt c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.voucherManagement.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('voucher_wallet_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.voucher-wallets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/voucher-wallets") || request()->is("admin/voucher-wallets/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-wallet c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.voucherWallet.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('voucher_redeem_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.voucher-redeems.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/voucher-redeems") || request()->is("admin/voucher-redeems/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-history c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.voucherRedeem.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('item_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/item-cateogries*") ? "c-show" : "" }} {{ request()->is("admin/item-managements*") ? "c-show" : "" }} {{ request()->is("admin/add-on-categories*") ? "c-show" : "" }} {{ request()->is("admin/addon-managements*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.item.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('item_cateogry_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.item-cateogries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/item-cateogries") || request()->is("admin/item-cateogries/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.itemCateogry.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('item_management_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.item-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/item-managements") || request()->is("admin/item-managements/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.itemManagement.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('add_on_category_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.add-on-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/add-on-categories") || request()->is("admin/add-on-categories/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.addOnCategory.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('addon_management_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.addon-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/addon-managements") || request()->is("admin/addon-managements/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cart-plus c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.addonManagement.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('order_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/order-statuses*") ? "c-show" : "" }} {{ request()->is("admin/order-items*") ? "c-show" : "" }} {{ request()->is("admin/order-managements*") ? "c-show" : "" }} {{ request()->is("admin/order-types*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-cart-arrow-down c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.order.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('order_status_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.order-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/order-statuses") || request()->is("admin/order-statuses/*") ? "c-active" : "" }}">
                                            <i class="fa-fw far fa-flag c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.orderStatus.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('order_item_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.order-items.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/order-items") || request()->is("admin/order-items/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-shopping-bag c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.orderItem.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('order_management_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.order-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/order-managements") || request()->is("admin/order-managements/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cart-plus c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.orderManagement.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('order_type_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.order-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/order-types") || request()->is("admin/order-types/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.orderType.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('mall_management_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/mall-units*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-archway c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.mallManagement.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('mall_unit_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.mall-units.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/mall-units") || request()->is("admin/mall-units/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-hospital c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.mallUnit.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('car_park_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/vehicle-mangements*") ? "c-show" : "" }} {{ request()->is("admin/vehicle-models*") ? "c-show" : "" }} {{ request()->is("admin/vehicle-brands*") ? "c-show" : "" }} {{ request()->is("admin/car-park-locations*") ? "c-show" : "" }} {{ request()->is("admin/carpark-logs*") ? "c-show" : "" }} {{ request()->is("admin/rate-settings*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-car c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.carPark.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('vehicle_mangement_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.vehicle-mangements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/vehicle-mangements") || request()->is("admin/vehicle-mangements/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-car c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.vehicleMangement.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('vehicle_model_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.vehicle-models.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/vehicle-models") || request()->is("admin/vehicle-models/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.vehicleModel.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('vehicle_brand_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.vehicle-brands.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/vehicle-brands") || request()->is("admin/vehicle-brands/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.vehicleBrand.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('car_park_location_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.car-park-locations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/car-park-locations") || request()->is("admin/car-park-locations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.carParkLocation.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('carpark_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.carpark-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/carpark-logs") || request()->is("admin/carpark-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-history c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.carparkLog.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('rate_setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.rate-settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/rate-settings") || request()->is("admin/rate-settings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.rateSetting.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>
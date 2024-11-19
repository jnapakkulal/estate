@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style type="text/css">
    .form-check-label {
        text-transform: capitalize;
    }
</style>
<div class="page-content">
    <!--  <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('add.roles')}}" class="btn btn-inverse-info">Add Roles</a>
        </ol>
    </nav>-->

    <div class="row profile-body">
        <!-- left wrapper start -->

        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Roles in Permission</h6>

                        <form class="forms-sample" id="myForm" method="post"
                            action="{{ route('role.permission.store') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Roles Name</label>
                                <select name="role_id" class="form-select" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">Select Group</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Main checkbox to select all permissions -->
                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="checkAllPermissions">
                                <label class="form-check-label" for="checkAllPermissions">
                                    Permission All
                                </label>
                            </div>

                            <hr>

                            @foreach ($permission_groups as $group)
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <!-- Use $loop->index to generate unique group IDs -->
                                                                <div class="form-check mb-2">
                                                                    <input type="checkbox" class="form-check-input group-checkbox"
                                                                        id="group_{{ $loop->index }}">
                                                                    <label class="form-check-label" for="group_{{ $loop->index }}">
                                                                        {{ $group->group_name }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-9">
                                                                @php
                                                                    $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                                                @endphp
                                                                @foreach ($permissions as $permission)
                                                                    <div class="form-check mb-2">
                                                                        <input type="checkbox"
                                                                            class="form-check-input permission-checkbox group_{{ $loop->parent->index }}"
                                                                            name="permission[]" id="permission_{{ $permission->id }}"
                                                                            value="{{ $permission->id }}">
                                                                        <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                                            {{ $permission->name }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                                <br>
                                                            </div>
                                                        </div>
                            @endforeach

                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
        <!-- middle wrapper end -->
    </div>
</div>

<!--<script type="text/javascript">
    $(document).ready(function () {
        // Main "Permission All" checkbox functionality
        $('#checkAllPermissions').click(function () {
            $('input[type=checkbox]').prop('checked', $(this).is(':checked'));
        });

        // Each group's checkbox to select/deselect all its permissions
        $('.group-checkbox').click(function () {
            const groupId = $(this).attr('id'); // Get this group’s ID
            $(`.${groupId}`).prop('checked', $(this).is(':checked'));
        });

        // Automatically check/uncheck group checkbox based on its permissions
        $('.permission-checkbox').change(function () {
            const groupClass = $(this).attr('class').split(' ').pop(); // Get the group class
            const groupCheckbox = $(`#${groupClass}`);
            const allPermissions = $(`.${groupClass}`);
            const allChecked = allPermissions.length === allPermissions.filter(':checked').length;

            groupCheckbox.prop('checked', allChecked);
        });
    });
</script>-->

<script type="text/javascript">
    $(document).ready(function () {
        // Main "Permission All" checkbox functionality
        $('#checkAllPermissions').click(function () {
            $('input[type=checkbox]').prop('checked', $(this).is(':checked'));
        });

        // Each group's checkbox to select/deselect all its permissions
        $('.group-checkbox').click(function () {
            const groupId = $(this).attr('id'); // Get this group’s ID
            $(`.${groupId}`).prop('checked', $(this).is(':checked'));
        });

        // Automatically check/uncheck group checkbox based on its permissions
        $('.permission-checkbox').change(function () {
            const groupClass = $(this).attr('class').split(' ').pop(); // Get the group class
            const groupCheckbox = $(`#${groupClass}`);
            const allPermissions = $(`.${groupClass}`);
            const anyChecked = allPermissions.filter(':checked').length > 0;

            // Keep the group checkbox checked if any permission is selected
            groupCheckbox.prop('checked', anyChecked);
        });
    });
</script>


@endsection
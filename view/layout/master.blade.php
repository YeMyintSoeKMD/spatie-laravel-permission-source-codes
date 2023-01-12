<ul class="nav">
    @php
        function conditions($permission) {
            if(auth()->user()->hasanyrole(['super-admin', 'supervisor', 'technician', 'receptionist']) && auth()->user()->hasAnyPermission(['all-menu', $permission])){
                return true;
            };
            return false;
        }
    @endphp

    @if(conditions('job'))
    <li class="nav-item">
        <a href="{{ url('admin/jobs') }}" class="nav-link">
            <i class="nav-icon fa fa-chain"></i> Job
        </a>
    </li>
    @endif

    @if(conditions('job-cancel'))
    <li class="nav-item">
        <a href="{{ url('admin/job-cancels') }}" class="nav-link">
            <i class="nav-icon fa fa-bell-o"></i> Job Cancel
            <span class="badge badge-danger">{{ $pending_jobs_count }}</span>
        </a>
    </li>
    @endif

    @if(conditions('assign-technician'))
    <li class="nav-item">
        <a href="{{ url('admin/assign_technicians') }}" class="nav-link">
            <i class="nav-icon fa fa-wrench"></i> Assign Technician
        </a>
    </li>
    @endif
</ul>
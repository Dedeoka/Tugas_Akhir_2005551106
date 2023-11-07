<a href="#" data-id="{{ $data->id }}">
    <i class='bx bx-edit'></i>
</a>
<div class="btn-group">
    <button type="button" class="btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown"
        aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
    <ul class="dropdown-menu dropdown-menu-end">
        <li><a class="dropdown-item" href="#" data-id="{{ $data->id }}">Action</a></li>
        <li><a class="dropdown-item" href="#" data-id="{{ $data->id }}">Another action</a></li>
        <li><a class="dropdown-item" href="#" data-id="{{ $data->id }}">Something else here</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="#" data-id="{{ $data->id }}">Separated link</a></li>
    </ul>
</div>

<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; height: 100vh;">
    <a href="{{ route('admin.index') }}"
        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32">
            <use xlink:href="{{ route('admin.index') }}"></use>
        </svg>
        <span class="fs-4">My Blog</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('main.blog.index') }}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="{{ route('main.blog.index') }}"></use>
                </svg>
                View
            </a>
        </li>
        <li>
            <a href="{{ route('admin.index') }}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="{{ route('admin.index') }}"></use>
                </svg>
                Posts
            </a>
        </li>
        <li>
          <a href="{{ route('category.index') }}" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16">
                  <use xlink:href="{{ route('category.index') }}"></use>
              </svg>
              Categories
          </a>
      </li>
    </ul>
</div>

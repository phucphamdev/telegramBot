<x-auth-layout>
    <form class="form w-100 " novalidate="novalidate" id="kt_sign_in_form" action="{{ route('login') }}" >
            @csrf

        <div class="text-center mb-11">

            <h1 class="text-dark fw-bolder mb-3">Sign In</h1>

        </div>

        <div class="fv-row mb-8 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">

            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" value="{{ old('email', '') }}" required autofocus>

        </div>

        <div class="fv-row mb-3 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">

            <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" value="">

        </div>

        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>
        </div>

        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                @include('partials.general._button-indicator', ['label' => __('Continue')])
            </button>
        </div>
    </form>


</x-auth-layout>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/admiko/css/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/admiko/css/theme/'.config('admin.settings.default_template', 'admiko').'/theme.css') }}">
    <title>Install</title>
</head>
<body>
<div class="public-container">
    <div style="max-width: 40rem;margin: auto">
        <div class="form-container" style="padding: 2rem 2.5rem;">
            <div class="form-header">
                <h2>Install</h2>
                @if($errors->any())
                    <div class="alert-danger-container">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <form method="POST" action="{{ route("admin.save") }}" class="form-page validate-form" novalidate>
                <div class="form-content">
                    <div hidden>
                        @csrf
                    </div>
                    <div class="row-50 input-container">
                        <div class="input-label">
                            <label for="DB_HOST">Host *</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" required id="DB_HOST" name="DB_HOST" value="{{ old('DB_HOST', $data['DB_HOST']) }}">
                            <div class="error-message">{{ trans('admin/form.required_text') }}</div>
                        </div>
                    </div>
                    <div class="row-50 input-container">
                        <div class="input-label">
                            <label for="DB_DATABASE">Database *</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" required id="DB_DATABASE" name="DB_DATABASE" value="{{ old('DB_DATABASE', $data['DB_DATABASE']) }}">
                            <div class="error-message">{{ trans('admin/form.required_text') }}</div>
                        </div>
                    </div>
                    <div class="row-50 input-container">
                        <div class="input-label">
                            <label for="DB_USERNAME">Username *</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" required id="DB_USERNAME" name="DB_USERNAME" value="{{ old('DB_USERNAME', $data['DB_USERNAME']) }}">
                            <div class="error-message">{{ trans('admin/form.required_text') }}</div>
                        </div>
                    </div>
                    <div class="row-50 input-container">
                        <div class="input-label">
                            <label for="DB_PASSWORD">Password</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" id="DB_PASSWORD" name="DB_PASSWORD" value="{{ old('DB_PASSWORD', $data['DB_PASSWORD']) }}">
                        </div>
                    </div>
                    <div class="row-50 input-container">
                        <div class="input-label">
                            <label for="DB_CONNECTION">Database connection *</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" required id="DB_CONNECTION" name="DB_CONNECTION" value="{{ old('DB_CONNECTION', $data['DB_CONNECTION']) }}" autofocus>
                            <div class="error-message">{{ trans('admin/form.required_text') }}</div>
                        </div>
                    </div>
                    <div class="row-50 input-container">
                        <div class="input-label">
                            <label for="DB_PORT">Port *</label>
                        </div>
                        <div class="input-data">
                            <input type="text" class="form-input" required id="DB_PORT" name="DB_PORT" value="{{ old('DB_PORT', $data['DB_PORT']) }}">
                            <div class="error-message">{{ trans('admin/form.required_text') }}</div>
                        </div>
                    </div>
                    <div class="row-100 input-container">
                        <div class="input-label">
                            <label for="ADMIKO_APP_KEY">API KEY *</label>
                        </div>
                        <div class="input-data">
                            <textarea class="form-textarea" style="height: 80px" required id="ADMIKO_APP_KEY" name="ADMIKO_APP_KEY">{{ old('ADMIKO_APP_KEY', $data['ADMIKO_APP_KEY']) }}</textarea>
                            <div class="error-message">{{ trans('admin/form.required_text') }}</div>
                        </div>
                    </div>
                </div>
                <div class="form-footer">
                    <div class="form-buttons-container" style="display: block">
                        <div>
                            <button type="submit" class="button primary-button submit-button js-ak-submit-button" style="width: 100%">
                                    <span>
                                        @includeIf("admin.admin_layout/partials/misc/loading")
                                        Save to .env
                                    </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="alert-info-container">
                    <div>
                        Before proceeding with the installation process, it's essential to ensure that your server meets the system requirements for Laravel and that you have the necessary write permissions.
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('assets/admiko/vendors/jquery/jquery.min.js') }}"></script>
<script>
    $('form.validate-form').on('submit', function (event) {
        let form = $(this);
        disableButton(form);
        if (form[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            enableButton(form);
        }
        form.addClass('validated');
    });

    function enableButton(form) {
        form.find('.js-ak-submit-button').attr("disabled", false)
    }

    function disableButton(form) {
        form.find('.js-ak-submit-button').attr("disabled", true);
    }
</script>
</body>
</html>




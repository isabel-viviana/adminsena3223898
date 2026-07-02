
<style>
    .form-control, .form-select {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 12px 15px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #3A9484;
        box-shadow: 0 0 0 0.2rem rgba(58, 148, 132, 0.1);
    }

    .form-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .form-group, .mb-3 {
        margin-bottom: 20px;
    }

    .btn {
        padding: 12px 30px;
        font-weight: 600;
        border-radius: 8px;
        border: none;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-primary {
        background: linear-gradient(135deg, #a1b7f3 0%, #7e92c9 100%);
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #8fa3e3 0%, #6b7eb9 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(161, 183, 243, 0.3);
        color: white;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(108, 117, 125, 0.3);
    }
</style>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card border-0 shadow-lg bg-white">
                
                @if($title ?? false)
                    <div class="card-header text-white py-4" style="background: linear-gradient(135deg, #3A9484 0%, #478694 100%);">
                        <h4 class="mb-0">{{ $title }}</h4>
                    </div>
                @endif

                <div class="card-body p-5">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>

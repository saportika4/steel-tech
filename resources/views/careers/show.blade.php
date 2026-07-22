@extends('layouts.app')

@section('title', $career->title . ' - Careers - Steel Tech Engineering & Equipment Solutions')

@push('styles')
<style>
.career-card {
    background: #fff;
    border: 1px solid rgba(0,0,0,.08);
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 8px 28px rgba(0,0,0,.05);
}

.career-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin: 15px 0 20px;
}

.career-meta span {
    display: inline-flex;
    align-items: center;
    padding: 7px 14px;
    border-radius: 100px;
    background: #f7f7f7;
    font-size: 13px;
}

.is-invalid {
    border-color: #dc3545 !important;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 13px;
    margin-top: 6px;
}

#detailApplySubmit {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

#detailApplySubmit[disabled] {
    opacity: 0.7;
    pointer-events: none;
}
</style>
@endpush

@section('content')
<div class="page-header parallaxie">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header-box">
                    <h1 class="text-anime-style-3" data-cursor="-opaque">{{ $career->title }}</h1>
                    <nav class="wow fadeInUp">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('careers') }}">careers</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $career->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-services">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="career-card">
                    <h2>{{ $career->title }}</h2>

                    <div class="career-meta mb-4">
                        <span>{{ $career->department ?: 'General' }}</span>
                        <span>{{ $career->employment_type ?: 'Full Time' }}</span>
                        <span>{{ $career->location ?: 'Location not specified' }}</span>
                        <span>{{ $career->vacancies }} {{ $career->vacancies > 1 ? 'Vacancies' : 'Vacancy' }}</span>
                    </div>

                    @if($career->short_description)
                        <p><strong>{{ $career->short_description }}</strong></p>
                    @endif

                    <div class="career-description">
                        {!! nl2br(e($career->description)) !!}
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="career-card sticky-top" style="top: 120px;">
                    <h4>Apply for this role</h4>
                    <p>Send your profile and resume for this opening.</p>

                    <form id="careerDetailApplyForm" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Your Name*" required>
                        </div>

                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Your Email*" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                        </div>

                        <div class="mb-3">
                            <textarea name="message" rows="4" class="form-control" placeholder="Message"></textarea>
                        </div>

                        <div class="mb-3">
                            <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx" required>
                        </div>

                        <button type="submit" class="btn-default w-100" id="detailApplySubmit">
                            <span class="btn-text">Submit Application</span>
                            <span class="btn-loader" style="display:none;">
                                <i class="fa-solid fa-spinner fa-spin"></i> Submitting...
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('careerDetailApplyForm');
    if (!form) return;

    const submitBtn = document.getElementById('detailApplySubmit');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoader = submitBtn.querySelector('.btn-loader');

    function clearCareerErrors() {
        form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        form.querySelectorAll('.invalid-feedback').forEach(el => el.remove());
    }

    function showCareerErrors(errors = {}) {
        Object.keys(errors).forEach(name => {
            const field = form.querySelector(`[name="${name}"]`);
            if (!field) return;

            field.classList.add('is-invalid');

            const error = document.createElement('div');
            error.className = 'invalid-feedback d-block';
            error.textContent = errors[name][0];
            field.insertAdjacentElement('afterend', error);
        });
    }

    function setLoadingState(loading) {
        submitBtn.disabled = loading;
        btnText.style.display = loading ? 'none' : 'inline';
        btnLoader.style.display = loading ? 'inline' : 'none';
    }

    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        clearCareerErrors();
        setLoadingState(true);

        const formData = new FormData(form);

        try {
            const response = await fetch(`{{ route('careers.apply', $career->slug) }}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await response.json();

            if (!response.ok) {
                if (response.status === 422) {
                    showCareerErrors(data.errors || {});
                }

                throw new Error(data.message || 'Something went wrong while submitting your application.');
            }

            form.reset();

            Swal.fire({
                icon: 'success',
                title: 'Application Submitted',
                text: data.message || 'Your application has been submitted successfully.',
                confirmButtonColor: '#fea935'
            });
        } catch (error) {
            Swal.fire({
                icon: 'error',
                title: 'Submission Failed',
                text: error.message || 'Something went wrong. Please try again.',
                confirmButtonColor: '#fea935'
            });
        } finally {
            setLoadingState(false);
        }
    });
});
</script>
@endpush

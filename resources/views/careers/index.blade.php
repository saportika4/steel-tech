@extends('layouts.app')

@section('title', 'Careers - Steel Tech Engineering & Equipment Solutions')

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
                    <h1 class="text-anime-style-3" data-cursor="-opaque">Careers</h1>
                    <nav class="wow fadeInUp">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Careers</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-services">
    <div class="container">
        <div class="row" id="careerItemsRow"></div>

        <div class="row">
            <div class="col-lg-12">
                <div id="careerLoader" style="display:none; text-align:center; padding:40px 0;">
                    <i class="fa-solid fa-spinner fa-spin"></i> Loading vacancies...
                </div>
                <div id="careerEmpty" style="display:none; text-align:center; padding:40px 0;">
                    <p>No vacancies available right now.</p>
                </div>
                <div id="careerEnd" style="display:none; text-align:center; padding:30px 0; color:#999;">
                    <p>You've reached the end of openings.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="career-apply-modal" id="careerApplyModal">
    <div class="career-apply-backdrop"></div>
    <div class="career-apply-dialog">
        <button type="button" class="career-apply-close" id="careerApplyClose">&times;</button>
        <h3 id="careerApplyTitle">Apply Now</h3>

        <form id="careerApplyForm" enctype="multipart/form-data">
            <input type="hidden" id="careerSlug" name="career_slug">

            <div class="row g-3">
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Your Name*" required>
                </div>
                <div class="col-md-6">
                    <input type="email" name="email" class="form-control" placeholder="Your Email*" required>
                </div>
                <div class="col-md-12">
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                </div>
                <div class="col-md-12">
                    <textarea name="message" rows="4" class="form-control" placeholder="Message"></textarea>
                </div>
                <div class="col-md-12">
                    <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx" required>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn-default" id="careerApplySubmit">Submit Application</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
.career-card{background:#fff;border:1px solid rgba(0,0,0,.08);border-radius:20px;padding:30px;height:100%;box-shadow:0 8px 28px rgba(0,0,0,.05)}
.career-meta{display:flex;flex-wrap:wrap;gap:10px;margin:15px 0 20px}
.career-meta span{display:inline-flex;align-items:center;padding:7px 14px;border-radius:100px;background:#f7f7f7;font-size:13px}
.career-apply-modal{position:fixed;inset:0;display:none;align-items:center;justify-content:center;z-index:9999}
.career-apply-modal.open{display:flex}
.career-apply-backdrop{position:absolute;inset:0;background:rgba(0,0,0,.6)}
.career-apply-dialog{position:relative;background:#fff;border-radius:20px;padding:30px;width:min(92%,720px);z-index:2}
.career-apply-close{position:absolute;top:15px;right:15px;font-size:30px;line-height:1}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){
    const row = document.getElementById('careerItemsRow');
    const loader = document.getElementById('careerLoader');
    const emptyBox = document.getElementById('careerEmpty');
    const endBox = document.getElementById('careerEnd');
    const modal = document.getElementById('careerApplyModal');
    const closeBtn = document.getElementById('careerApplyClose');
    const form = document.getElementById('careerApplyForm');

    let currentPage = 1;
    let hasMore = true;
    let isLoading = false;

    function cardTemplate(item) {
        return `
            <div class="col-lg-6 mb-4">
                <div class="career-card wow fadeInUp">
                    <div class="career-card-top">
                        <h3>${item.title}</h3>
                        <div class="career-meta">
                            <span>${item.department || 'General'}</span>
                            <span>${item.employment_type || 'Full Time'}</span>
                            <span>${item.location || 'Location not specified'}</span>
                            <span>${item.vacancies} ${item.vacancies > 1 ? 'Vacancies' : 'Vacancy'}</span>
                        </div>
                        <p>${item.short_description || 'Explore this role and apply now.'}</p>
                    </div>

                    <div class="career-actions mt-4 d-flex gap-2 flex-wrap">
                        <a href="${item.details_url}" class="btn-default">View Details</a>
                        <button
                            type="button"
                            class="btn-default apply-btn"
                            data-title="${item.title.replace(/"/g, '&quot;')}"
                            data-slug="${item.slug}">
                            Apply Now
                        </button>
                    </div>
                </div>
            </div>
        `;
    }

    function loadCareers(){
        if(isLoading || !hasMore) return;

        isLoading = true;
        loader.style.display = 'block';

        fetch(`{{ route('careers.ajax') }}?page=${currentPage}`, {
            headers:{ 'X-Requested-With':'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(data => {
            const careers = Array.isArray(data.careers) ? data.careers : [];

            if(careers.length === 0 && currentPage === 1) {
                emptyBox.style.display = 'block';
            }

            careers.forEach(item => row.insertAdjacentHTML('beforeend', cardTemplate(item)));

            hasMore = !!data.has_more;
            currentPage = Number(data.next_page || (currentPage + 1));
            isLoading = false;
            loader.style.display = 'none';

            if(!hasMore) {
                endBox.style.display = 'block';
            }
        })
        .catch(() => {
            isLoading = false;
            loader.style.display = 'none';
        });
    }

    let timer;
    window.addEventListener('scroll', function(){
        clearTimeout(timer);
        timer = setTimeout(function(){
            if((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 150){
                loadCareers();
            }
        }, 120);
    });

    loadCareers();

    document.addEventListener('click', function(e){
        const btn = e.target.closest('.apply-btn');

        if(btn){
            document.getElementById('careerApplyTitle').textContent = 'Apply for ' + btn.dataset.title;
            document.getElementById('careerSlug').value = btn.dataset.slug;
            modal.classList.add('open');
        }

        if(e.target === closeBtn || e.target.classList.contains('career-apply-backdrop')){
            modal.classList.remove('open');
        }
    });

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

    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        clearCareerErrors();

        const slug = document.getElementById('careerSlug').value;
        const formData = new FormData(form);
        const submitBtn = document.getElementById('careerApplySubmit');

        submitBtn.disabled = true;
        submitBtn.textContent = 'Submitting...';

        try {
            const response = await fetch(`/careers/${slug}/apply`, {
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

                throw new Error(data.message || 'Something went wrong.');
            }

            Swal.fire({
                icon: 'success',
                title: 'Application Submitted',
                text: data.message,
                confirmButtonColor: '#fea935'
            });

            form.reset();
            modal.classList.remove('open');
        } catch (error) {
            Swal.fire({
                icon: 'error',
                title: 'Submission Failed',
                text: error.message,
                confirmButtonColor: '#fea935'
            });
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Submit Application';
        }
    });
});
</script>
@endpush
